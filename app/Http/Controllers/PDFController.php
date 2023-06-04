<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Dompdf\Dompdf;
use Carbon\Carbon;


class PDFController extends Controller
{
    //
    public function generatePDF(Request $request)
    {
        $dokter = $request->input('nama-dokter');
        $dokterrujukan = $request->input('nama-dokter-rujukan');
        $rs = $request->input('rumah-sakit');
        $namapasien = $request-> input('nama-pasien');
        $umur = $request-> input('umur');
        $jeniskelamin = $request-> input('jenis-kelamin');
        $alamat = $request-> input('alamat');
        $keluhan = $request-> input('keluhan');
        $diagnosa = $request-> input('diagnosa');
        $alasandirujuk = $request-> input('alasan-dirujuk');
        $tanggalHariIni = Carbon::now()->formatLocalized('%e %B %Y');

    
        $data = [
            'dokter' => $dokter,
            'dokterrujukan' => $dokterrujukan,
            'rs' => $rs,
            'namapasien'=> $namapasien,
            'umur' => $umur,
            'jeniskelamin' => $jeniskelamin,
            'alamat'=> $alamat,
            'keluhan' => $keluhan,
            'diagnosa' => $diagnosa,
            'alasandirujuk' => $alasandirujuk,
            'tanggalHariIni'=> $tanggalHariIni,
    ];
    
        $pdf = PDF::loadView('hasilsuratpdf', $data);
    
        return $pdf->download("$namapasien-Surat Rujukan Rumah Sakit.pdf");
    }

}