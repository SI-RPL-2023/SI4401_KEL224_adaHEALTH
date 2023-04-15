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
    public function index()
    {
        $totalUsers = User::count();
        $totalHospital = Hospital::count();
        $totalApotek = Apotek::count();
        $totalObat = Obat::count();
        $totalNew = User::whereDate('created_at', Carbon::today())->count();

        return view('admin.dashboard',[
        'totalUsers' => $totalUsers,
        'totalHospital' =>  $totalHospital,
        'totalApotek' =>  $totalApotek,
        'totalObat' =>  $totalObat
        // 'totalNew' => $totalNew

        ]);
    }


}
