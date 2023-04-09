<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            // if ($user->roles == '1') {
            //     return redirect()->intended('dashboard');
            // } elseif ($user->roles == '2') {
            //     return redirect()->intended('dokter');
            // }
            return redirect()->intended('/');
        }

        return view('auth.login', ['title'=>'Login']);
    }
    public function proses(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => 'required',
        ],
            [
                'email.required' => 'email tidak boleh kosong',
            ]
        );

        $kredensial = $request->only('email', 'password');

        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->roles == '1') {
                return redirect()->intended('/dashboard');
            } elseif ($user->roles == '2') {
                return redirect()->intended('/dokter');
            }
             elseif ($user->roles == '0') {
                return redirect()->intended('/');
            }

            if ($user) {
                return redirect()->intended('/');
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Maaf email atau password anda salah',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
