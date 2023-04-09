<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();
        if ($obats->isEmpty()) {
            throw new \Exception('Tidak terdapat data obat.');
        }
        $kategori_obat = collect();
        $kategori_groups = $obats->groupBy('kategori');
        foreach ($kategori_groups as $kategori => $group) {
            $kategori_obat->push($group->first());
            if ($kategori_obat->count() >= 5) {
                break;
            }
        }
        return view('hargadanjenisobat', ['kategori_obat' => $kategori_obat, 'title'=>'Obat']);
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

