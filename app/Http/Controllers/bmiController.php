<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bmiController extends Controller
{
    //
    public function index(){
        return view('kalkulatorbmi');
    }
    
    public function CalculateBMI(Request $request) {
        $weight = $request->input('weight');
        $height = $request->input('height') / 100; // convert height to meters
    
        $bmi = $weight / ($height * $height);
        
        // Redirect to another page
        return redirect()->route('result')->with('bmi', $bmi);
    }
    
    public function indexResult(){
        // Retrieve the BMI value from session
        $bmi = session('bmi');
    
        return view('resultbmi', ['bmi'=>$bmi]);
    }
    
}