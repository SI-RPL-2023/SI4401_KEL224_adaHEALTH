<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Hospital;

use Carbon\Carbon;
use App\Models\Dokter;

use Illuminate\Support\Facades\DB;

class ReportingController extends Controller
{
    public function index(Request $request)
    {

        // Mengambil query parameter "periode" dari URL
        $periode = $request->query('periode', 'semua');

        // Mengambil data berdasarkan periode
        $reports = $this->getReportsByPeriode($periode);


        $topHospitals = DB::table('hospital_ratings')
        ->join('hospitals', 'hospital_ratings.hospital_id', '=', 'hospitals.id')
        ->select(
            'hospitals.name',
            DB::raw('AVG(hospital_ratings.rating) as average_rating'),
            DB::raw('COUNT(hospital_ratings.rating) as total_rating')
        )
        ->groupBy('hospitals.name')
        ->orderByDesc('average_rating')
        ->limit(3)
        ->get();

        $topApoteks = DB::table('apotek_ratings')
        ->join('apotek', 'apotek_ratings.apotek_id', '=', 'apotek.id')
        ->select(
            'apotek.name',
            DB::raw('AVG(apotek_ratings.rating) as average_rating'),
            DB::raw('COUNT(apotek_ratings.rating) as total_rating')
        )
        ->groupBy('apotek.name')
        ->orderByDesc('average_rating')
        ->limit(3)
        ->get();

        $selectedJam = $this->getCurrentTime();

        $doctors = Dokter::where(function ($query) use ($selectedJam) {
            $query->where('jam_buka', '<=', $selectedJam)
                ->where('jam_tutup', '>=', $selectedJam);
        })->get();
        return view('admin.reports', compact('reports', 'periode', 'topHospitals', 'topApoteks', 'doctors', 'selectedJam'));
    }

    private function getReportsByPeriode($periode)
    {
        $data = new \stdClass();
        // Mengambil data berdasarkan periode yang dipilih
        if ($periode === 'bulan_lalu') {
            $data->user_count = User::whereMonth('created_at', '=', now()->subMonth()->month)->count();
            $data->transaction_count = Transaction::whereMonth('created_at', '=', now()->subMonth()->month)->count();
            $data->tertunda_count = Transaction::whereMonth('created_at', '=', now()->subMonth()->month)->where('status', 'Tertunda')->count();
            $data->gagal_count = Transaction::whereMonth('created_at', '=', now()->subMonth()->month)->where('status', 'Gagal')->count();
            $data->selesai_count = Transaction::whereMonth('created_at', '=', now()->subMonth()->month)->where('status', 'Selesai')->count();

        } elseif ($periode === 'bulan_sekarang') {
            $data->user_count = User::whereMonth('created_at', '=', now()->month)->count();
            $data->transaction_count = Transaction::whereMonth('created_at', '=', now()->month)->count();
            $data->tertunda_count = Transaction::whereMonth('created_at', '=', now()->month)->where('status', 'Tertunda')->count();
            $data->gagal_count = Transaction::whereMonth('created_at', '=', now()->month)->where('status', 'Gagal')->count();
            $data->selesai_count = Transaction::whereMonth('created_at', '=', now()->month)->where('status', 'Selesai')->count();
        } else {    
            $data->user_count = User::count();
            $data->transaction_count = Transaction::count();
            $data->tertunda_count = Transaction::where('status', 'Tertunda')->count();
            $data->gagal_count = Transaction::where('status', 'Gagal')->count();
            $data->selesai_count = Transaction::where('status', 'Selesai')->count();
        }
        return $data;
    }

    private function getCurrentTime()
    {
        $now = now();
        $currentTime = $now->format('H:i');
        return $currentTime;
    }
}
