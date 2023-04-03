<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apotek;

class ApotekController extends Controller
{
    public function index()
    {
        $apoteks = Apotek::all();

        return view('rekomendasiapotek', ['apoteks' => $apoteks], ['title'=>'Apotek']);
    }
    public function show($id)
    {
        $apotek = Apotek::find($id);
        return view('detailapotek', ['apotek' => $apotek], ['title'=>'Detail Apotek']);
    }
}