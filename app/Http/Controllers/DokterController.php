<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\Dokter;
use App\Models\User;
use App\Models\Konsultasi;
use Session;
session_start();
class DokterController extends Controller
{
    public function dokter_view()
    {
        $dokter = Dokter::all();
        $konsultasi = DB::table('konsultasi as a')
                    ->join('users as b', 'a.id_dokter', '=', 'b.id')
                    ->join('users as c', 'a.id_pasien', '=', 'c.id')
                    ->join('dokters as d', 'b.email', '=', 'd.email')
                    ->select('a.*', 'b.name as nama_dokter', 'c.name as nama_pasien', 'd.spesialis')
                    ->where('a.id_dokter', '=', Auth::user()->id)
                    ->get();
        // dd($konsultasi);
        return view('dokter', compact('dokter', 'konsultasi'));
    }

    public function form_konsultasi() {
        $pasien = User::where('roles', 0)->get();
        return view('konsultasi-form-tambah', compact('pasien'));
    }

    public function save_konsultasi(Request $request) {
        // dd(Auth::user()->id);
        $params = $request->all();

        // validasi
        $validatedData = $request->validate([
            'id_pasien' => 'required',
            'penyakit' => 'required',
            'obat' => 'required',
            'saran' => 'required',
            'rujukan_rs' => 'required'
        ]);

        $konsultasi = new Konsultasi([
            'id_dokter' => Auth::user()->id,
            'id_pasien' => $validatedData['id_pasien'],
            'email_pasien' => $params['email_pasien'],
            'penyakit' => $validatedData['penyakit'],
            'obat' => $validatedData['obat'],
            'saran' => $validatedData['saran'],
            'rujukan_rs' => $validatedData['rujukan_rs']
        ]);

        $konsultasi->save();

        return redirect()->to('dokter')->with('success', 'Data konsultasi berhasil ditambahkan');
    }

    public function form_konsultasi_edit($id) {
        $id = Crypt::decryptString($id);
        
        $konsultasi = Konsultasi::findOrFail($id);
        $pasien = User::where('roles', 0)->get();
        if($konsultasi) 
        {
            return view('konsultasi-form-edit', compact('konsultasi', 'pasien'));
        }
    }

    public function form_konsultasi_update(Request $request, $id) {
        $id = Crypt::decryptString($id);
        $konsultasi = Konsultasi::findOrFail($id);
        $params = $request->all();
        if($konsultasi) {
            $validatedData = $request->validate([
                'id_pasien' => 'required',
                'penyakit' => 'required',
                'obat' => 'required',
                'saran' => 'required',
                'rujukan_rs' => 'required'
            ]);

            Konsultasi::where('id', $id)->update([
                'id_pasien' => $validatedData['id_pasien'],
                'email_pasien' => $params['email_pasien'],
                'penyakit' => $validatedData['penyakit'],
                'obat' => $validatedData['obat'],
                'saran' => $validatedData['saran'],
                'rujukan_rs' => $validatedData['rujukan_rs']
            ]);

            return redirect()->to('dokter')->with('success', 'Data konsultasi berhasil diubah');
        }
    }

    public function form_konsultasi_delete($id) {
        $id = Crypt::decryptString($id);
        $konsultasi = Konsultasi::findOrFail($id);
        if($konsultasi) { 
            Konsultasi::where('id', $id)->delete();

            return redirect()->to('dokter')->with('success', 'Data konsultasi berhasil dihapus');
        }
    }
}
