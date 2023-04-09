<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();

        return view('hargadanjenisobat', ['obats' => $obats, 'title'=>'Obat']);
    }


    public function kategori($kategori)
    {
        $obats = Obat::where('kategori', $kategori)->get();
        return view('show_obat_kategori', compact('obats', 'kategori'), ['title'=>'Obat']);
    }

    public function detail($id)
    {
        $obat = Obat::find($id);
        if (!$obat) {
            throw new \Exception('Obat tidak ditemukan.');
        }
        return view('show_obat_detail', compact('obat'));
    }



}

