<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PelacakController extends Controller
{

    public function pelacakView()
    {
        if (session()->has('fever')) {
            session()->forget([
                'fever',
                'cough',
                'headache',
                'sorethroat',
                'sneezing',
                'stomach_ache',
                'nausea'
            ]);
        }

        return view('pelacak', ['question' => 0]);
    }

    public function pelacakRequest(Request $request)
    {
        $question = $request->input('question');

        if ($question == 1) {
            $fever = $request->input('fever');
            session(['fever' => $fever]);

            return view('pelacak', ['question' => 1]);
        } elseif ($question == 2) {
            $cough = $request->input('cough');
            session(['cough' => $cough]);

            return view('pelacak', ['question' => 2]);
        } elseif ($question == 3) {
            $headache = $request->input('headache');
            session(['headache' => $headache]);

            return view('pelacak', ['question' => 3]);
        } elseif ($question == 4) {
            $sorethroat = $request->input('sorethroat');
            session(['sorethroat' => $sorethroat]);

            return view('pelacak', ['question' => 4]);
        } elseif ($question == 5) {
            $fever = session('fever', 'no');
            $cough = session('cough', 'no');
            $headache = session('headache', 'no');
            $sorethroat = session('sorethroat', 'no');
            dd($fever, $cough, $headache, $sorethroat);

            $diagnosis = $this->diagnose($fever, $cough, $headache, $sorethroat);

            return view('pelacak', ['question' => 5, 'diagnosis' => $diagnosis]);
        }
    }

    private function diagnose($fever, $cough, $headache, $sorethroat)
    {
                         
            if ($fever == "yes" && $cough == "yes" && $headache == "yes" && $sorethroat =="yes") {
                return "Anda berkemungkinan besar mengalami infeksi saluran pernapasan, dari flu biasa hingga faringitis, sangat penting untuk mencari nasihat medis untuk diagnosis yang lebih akurat dan perawatan yang tepat.";
            } elseif ($fever == "no" && $cough == "no" && $headache == "no" && $sorethroat == "no") {
                return "Anda dalam kondisi yang sehat. Tetap jaga pola hidup sehat dan jika Anda mengalami gejala sakit, disarankan beristirahat atau berkonsultasi ke dokter terdekat.";
            } elseif ($fever == "yes" && $cough == "no" && $headache == "no" && $sorethroat == "yes") {
                return "Anda mungkin mengalami demam biasa. Istirahat yang cukup dan minum yang banyak untuk membantu pemulihan.";
            }elseif ($fever == "yes" && $cough == "yes" && $headache == "no" && $sorethroat == "no") {
                return "Anda mungkin mengalami infeksi saluran pernapasan atas. Beristirahatlah dengan cukup dan minum banyak. Jika gejala bertahan atau memburuk, disarankan untuk berkonsultasi dengan tenaga medis.";
            }elseif ($fever == "no" && $cough == "yes" && $headache == "yes" && $sorethroat == "no") {
                return "Anda mungkin mengalami migrain. Istirahat dan cobalah mengurangi faktor yang memicu kepala anda bertambah stress. Jika serangan migrain berkelanjutan atau parah, disarankan untuk berkonsultasi dengan tenaga medis.";
            }elseif ($fever == "no" && $cough == "yes" && $headache == "no" && $sorethroat == "yes") {
                return "Anda mungkin mengalami radang tenggorokan. Istirahat vokal dan minum banyak air hangat untuk mengurangi gejala.";
            }elseif ($fever == "no" && $cough == "no" && $headache == "yes" && $sorethroat == "yes") {
                return "Anda mungkin mengalami infeksi saluran pernapasan atas ringan. Istirahat dan minum banyak. Jika gejala bertahan atau memburuk, disarankan untuk berkonsultasi dengan tenaga medis.";
            }elseif ($fever == "yes" && $cough == "yes" && $headache == "yes" && $sorethroat == "no") {
                return "Anda mungkin mengalami infeksi saluran pernapasan atas atau sinusitis. Istirahat dan minum banyak cairan. Jika gejala bertahan atau memburuk, disarankan untuk berkonsultasi dengan tenaga medis.";
            }elseif ($fever == "yes" && $cough == "no" && $headache == "yes" && $sorethroat == "yes") {
                return "Anda mungkin mengalami flu atau infeksi saluran pernapasan atas. Istirahat dan minum banyak cairan. Jika gejala bertahan atau memburuk, disarankan untuk berkonsultasi dengan tenaga medis.";
            }elseif ($fever == "no" && $cough == "yes" && $headache == "yes" && $sorethroat == "yes") {
                return "Anda mungkin mengalami infeksi saluran pernapasan atas atau sinusitis. Istirahat dan minum banyak cairan. Jika gejala bertahan atau memburuk, disarankan untuk berkonsultasi dengan tenaga medis.";
            }elseif ($fever == "yes" && $cough == "yes" && $headache == "no" && $sorethroat == "no") {
                return "Anda mungkin mengalami flu atau infeksi saluran pernapasan atas. Istirahat dan minum banyak cairan. Jika gejala bertahan atau memburuk, disarankan untuk berkonsultasi dengan tenaga medis.";
            }elseif ($fever == "no" && $cough == "yes" && $headache == "yes" && $sorethroat == "no") {
                return "Anda mungkin mengalami migrain. Istirahat dan cobalah mengurangi faktor pemicu. Jika serangan migrain berulang atau parah, disarankan untuk berkonsultasi dengan tenaga medis.";
            }elseif ($fever == "no" && $cough == "no" && $headache == "yes" && $sorethroat == "no") {
                return "Anda mungkin mengalami sakit kepala. Cobalah istirahat dan minum banyak air. Jika sakit kepala tidak reda atau terasa parah, disarankan untuk berkonsultasi dengan tenaga medis.";
            }elseif ($fever == "no" && $cough == "no" && $headache == "yes" && $sorethroat == "yes") {
                return "Anda mungkin mengalami infeksi saluran pernapasan atas ringan. Istirahat dan minum banyak cairan. Jika gejala bertahan atau memburuk, disarankan untuk berkonsultasi dengan tenaga medis.";
            }else
                return "Penyakit Anda belum terdiagnosa dalam database kami. Disarankan untuk mencari nasihat medis agar dapat menerima diagnosis yang lebih akurat.";

        }
}

