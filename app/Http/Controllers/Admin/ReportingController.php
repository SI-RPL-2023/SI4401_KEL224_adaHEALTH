<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Hospital;
use App\Models\HospitalRating;

use Carbon\Carbon;
use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Apotek;
use App\Models\Service;

use Illuminate\Support\Facades\DB;

use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportingController extends Controller
{
    public function index(Request $request)
    {

        // Mengambil query parameter "periode" dari URL
        $periode = $request->query('periode', 'semua');

        // Mengambil data berdasarkan periode
        $reports = $this->getReportsByPeriode($periode);

        $last_transaksi = Transaction::whereMonth('created_at', '=', now()->month)
        ->latest('created_at')
        ->take(3)
        ->get();

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
        ->limit(1)
        ->get();

        $selectedJam = Carbon::now()->format('H:i');
        $doctors = Dokter::where(function ($query) use ($selectedJam) {
            $query->where('jam_buka', '<=', $selectedJam)
                ->where('jam_tutup', '>=', $selectedJam);
        })->get();

        $doctorStatuses = [];
        foreach ($doctors as $doctor) {
            $status = 'Last Seen ' . $doctor->jam_buka;

            // Periksa apakah dokter sedang dalam rentang waktu praktek
            if ($doctor->jam_buka <= $selectedJam && $doctor->jam_tutup >= $selectedJam) {
                $status = 'Online';
            }

            $doctorStatuses[$doctor->id] = $status;
        }



       return view('admin.reports', compact('reports', 'periode', 'topHospitals', 'topApoteks', 'doctors', 'selectedJam', 'doctorStatuses', 'last_transaksi'));
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
            $data->doctor_count = Dokter::all()->count();
            $data->obat_count = Obat::all()->count();
            $data->rs_count = Hospital::all()->count();
            $data->apotek_count = Apotek::all()->count();
            $data->service_count = Service::all()->count();
            $data->rating_count = HospitalRating::all()->count();

        } elseif ($periode === 'bulan_sekarang') {
            $data->user_count = User::whereMonth('created_at', '=', now()->month)->count();
            $data->transaction_count = Transaction::whereMonth('created_at', '=', now()->month)->count();
            $data->tertunda_count = Transaction::whereMonth('created_at', '=', now()->month)->where('status', 'Tertunda')->count();
            $data->gagal_count = Transaction::whereMonth('created_at', '=', now()->month)->where('status', 'Gagal')->count();
            $data->selesai_count = Transaction::whereMonth('created_at', '=', now()->month)->where('status', 'Selesai')->count();
            $data->doctor_count = Dokter::all()->count();
            $data->obat_count = Obat::all()->count();
            $data->rs_count = Hospital::all()->count();
            $data->apotek_count = Apotek::all()->count();
            $data->service_count = Service::all()->count();
            $data->rating_count = HospitalRating::all()->count();
        } else {
            $data->user_count = User::count();
            $data->transaction_count = Transaction::count();
            $data->tertunda_count = Transaction::where('status', 'Tertunda')->count();
            $data->gagal_count = Transaction::where('status', 'Gagal')->count();
            $data->selesai_count = Transaction::where('status', 'Selesai')->count();
            $data->doctor_count = Dokter::all()->count();
            $data->obat_count = Obat::all()->count();
            $data->rs_count = Hospital::all()->count();
            $data->apotek_count = Apotek::all()->count();
            $data->service_count = Service::all()->count();
            $data->rating_count = HospitalRating::all()->count();

        }
        return $data;
    }

    private function getCurrentTime()
    {
        $now = now();
        $currentTime = $now->format('H:i');
        return $currentTime;
    }


    public function report(Request $request)
{
    // Mengambil query parameter "periode" dari URL
    $periode = $request->input('period');

    // Mengambil data transaksi dari periode yang dipilih
    if ($periode === 'current_month') {
        $transactions = Transaction::where('status', 'Selesai')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
    } elseif ($periode === 'last_month') {
        $transactions = Transaction::where('status', 'Selesai')
            ->whereMonth('created_at', Carbon::now()->subMonths(2)->month)
            ->get();
    } else {
        $transactions = Transaction::where('status', 'Selesai')
            ->get();
    }

    $total_pendapatan = $transactions->sum('total_harga');

    // Mengambil tren obat yang banyak dipesan
    $trendObat = $transactions->where('status', 'Selesai')
        ->groupBy('id_obat')
        ->map(function ($group) {
            $obatId = $group->first()->id_obat;
            $jumlahTransaksi = $group->count();
            $totalObat = $group->sum('qty_item');

            $obat = Obat::find($obatId);

            if ($obat) {
                $obat->jumlahTransaksi = $jumlahTransaksi;
                $obat->totalObat = $totalObat;
            }

            return $obat;
        })
        ->sortByDesc('jumlahTransaksi');

    // Mengembalikan data transaksi dan memanggil view 'report' dengan parameter yang diperlukan
    return view('admin.reports_detail', ['title' => 'adaHEALTH | Rincian'], compact('transactions', 'total_pendapatan', 'trendObat'));
}
public function downloadTransactions(Request $request)
{
    $period = $request->input('period', 'all');
    $startDate = null;
    $endDate = null;

    if ($period === 'current_month') {
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
    } elseif ($period === 'last_month') {
        $startDate = Carbon::now()->subMonth()->startOfMonth();
        $endDate = Carbon::now()->subMonth()->endOfMonth();
    }

    $transactions = Transaction::query();

    if ($startDate && $endDate) {
        $transactions->whereBetween('created_at', [$startDate, $endDate]);
    }

    $transactions = $transactions->get();

    // Generate CSV data
    $csvData = [];

    // Add header
    $header = [
        'ID',
        'User ID',
        'Nama Pembeli',
        'Obat ID',
        'Obat Nama',
        'Jenis Transaksi',
        'Jumlah Item Pembelian',
        'Total Harga',
        'Metode Pembayaran',
        'Status',
        'Created At',
        'Updated At',
    ];
    $csvData[] = $header;

    // Add transaction data
    foreach ($transactions as $transaction) {
        $row = [
            $transaction->id,
            $transaction->id_user,
            $transaction->user->name,
            $transaction->id_obat,
            $transaction->obat->nama,
            $transaction->type,
            $transaction->qty_item,
            $transaction->total_harga,
            $transaction->metode_payment,
            $transaction->status,
            $transaction->created_at,
            $transaction->updated_at,
        ];
        $csvData[] = $row;
    }

    // Add total pendapatan transaksi to CSV data
    $total_pendapatan = $transactions->sum('total_harga');
    $csvData[] = ['Total Pendapatan Transaksi', $total_pendapatan];

    // Add trend obat to CSV data
    $trendObat = $transactions->groupBy('id_obat')
        ->map(function ($group) {
            $obatId = $group->first()->id_obat;
            $jumlahTransaksi = $group->count();
            $totalObat = $group->sum('qty_item');

            $obat = Obat::find($obatId);

            if ($obat) {
                $obat->jumlahTransaksi = $jumlahTransaksi;
                $obat->totalObat = $totalObat;
            }

            return $obat;
        })
        ->sortByDesc('jumlahTransaksi');

    $csvData[] = []; // Add empty line for separation
    $csvData[] = ['Trend Obat yang Banyak Dipesan'];
    $csvData[] = ['Obat ID', 'Nama Obat', 'Jumlah Transaksi', 'Total Obat Dibeli'];
    foreach ($trendObat as $item) {
        $csvData[] = [$item->id, $item->nama, $item->jumlahTransaksi, $item->totalObat];
    }

    // Create streamed response for download
    $response = new StreamedResponse(function () use ($csvData) {
        $output = fopen('php://output', 'w');
        foreach ($csvData as $row) {
            fputcsv($output, $row);
        }
        fclose($output);
    });

    // Set headers and file name
    $filename = 'transactions_' . Carbon::now()->format('Y-m-d_H-i-s') . '.csv';
    $response->headers->set('Content-Type', 'text/csv');
    $response->headers->set('Content-Disposition', 'attachment; filename="' . $filename . '"');

    return $response;
}


}
