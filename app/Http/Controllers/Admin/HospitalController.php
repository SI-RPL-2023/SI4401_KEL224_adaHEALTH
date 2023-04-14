<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $hospitals = Hospital::all();
        return view('admin.hospital',  compact('hospitals'));
    }
    public function store(Request $request)
    {
        // Validasi input form
        $test = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'images' => 'required|image|max:2048'
        ]);

        // Upload gambar ke direktori public/images/hospitals
        $imageName = time().'.'.$request->images->extension();
        $request->images->move(public_path('images/'), $imageName);

        // Simpan data hospital ke database
        $hospital = Hospital::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'images' => $imageName
        ]);
        return redirect('/add/hospital')->with('success', 'Hospital added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
