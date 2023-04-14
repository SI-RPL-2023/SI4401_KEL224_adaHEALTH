<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function show()
    {
        return view('admin.hospital');
    }

    public function addApotek()
    {
        return view('admin.hospital');
    }

    public function addObat()
    {
        return view('admin.hospital');
    }
}
