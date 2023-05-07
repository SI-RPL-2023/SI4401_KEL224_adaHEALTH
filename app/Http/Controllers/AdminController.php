<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hospital;
use App\Models\Apotek;
use App\Models\Obat;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Kalender
        $date = Carbon::now(); // tanggal saat ini
        $month = $request->get('month') ?? $date->month; // ambil bulan dari parameter url, atau gunakan bulan saat ini
        $year = $request->get('year') ?? $date->year; // ambil tahun dari parameter url, atau gunakan tahun saat ini
        $daysInMonth = Carbon::create($year, $month)->daysInMonth; // jumlah hari dalam bulan tersebut
        //Kalender

        $totalUsers = User::count();
        $totalHospital = Hospital::count();
        $totalApotek = Apotek::count();
        $totalObat = Obat::count();
        $dokter = User::where('roles', '2')->get();

        $totalNew = User::whereDate('created_at', Carbon::today())->count();

        return view('admin.dashboard',[
        'totalUsers' => $totalUsers,
        'totalHospital' =>  $totalHospital,
        'totalApotek' =>  $totalApotek,
        'totalObat' =>  $totalObat,
        'dokter' =>  $dokter,
        'days' => $date,
        'month' => $month,
        'year' => $year,
        'daysInMonth' => $daysInMonth
        // 'totalNew' => $totalNew

        ]);
    }


}
