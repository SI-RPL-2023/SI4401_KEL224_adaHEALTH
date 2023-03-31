<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::all();

        return view('rekomendasirs', ['hospitals' => $hospitals], ['title'=>'Hospital']);
    }
    public function show($id)
    {
        $hospital = Hospital::find($id);
        return view('detailrs', ['hospital' => $hospital], ['title'=>'Detail RS']);
    }

}


