<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Apotek;
use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Transaction;
use App\Models\User;


use Carbon\Carbon;
// use App\Models\Article;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $today = Carbon::today();
        $currentTime = Carbon::now()->format('H:i');

        // Mendapatkan semua dokter dengan jadwal praktek sesuai hari ini
        $doctors = Dokter::where(function ($query) use ($currentTime) {
            $query->whereRaw("TIME_FORMAT(jam_buka, '%H:%i') <= ?", [$currentTime])
                ->whereRaw("TIME_FORMAT(jam_tutup, '%H:%i') >= ?", [$currentTime]);
        })->get();

        $total_pasien_baru = User::all()->count();
        $total_pasien_lama = User::where('created_at', '<', $today)->count();
        $total_pasien_baru = User::whereDate('created_at', $today)->count();
        $total_apotek = Apotek::all()->count();
        $total_hospital = Hospital::all()->count();
        $total_transaksiObat = Transaction::all()->count();
        // $artikelViews = Article::all();
        // dd($total_user);
        return view('admin.dashboard',
        [
        'total_pasien_baru'=> $total_pasien_baru,
        'total_pasien_lama'=> $total_pasien_lama,
        'total_apotek'=> $total_apotek,
        'total_hospital'=> $total_hospital,
        'total_dokter' => Dokter::all()->count(),
        'total_transaksiObat'=> $total_transaksiObat,
        'doctors' => $doctors,
      
        ]
        // ['artikelViews'=> $artikelViews],
        );
    }


        
        
    }

