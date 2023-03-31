<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    function show(){
        return view('LandingPage', ['title'=>'Home']);
    }
    public function index()
    {
        $roles = Auth::user()->roles;

        if ($roles == 0){

            return view('LandingPage', ['title' => 'Home']);
        }
        if ($roles == 1){

            return view('dashboard', ['title' => 'Dashboard']);
        }
        if ($roles == 2){

            return view('dashboard', ['title' => 'Dashboard']);
        }
        else{
            return view('register');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
