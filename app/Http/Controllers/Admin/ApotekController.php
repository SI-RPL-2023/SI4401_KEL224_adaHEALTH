<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apotek;

class ApotekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $apoteks = Apotek::all();
        return view('admin.apotek',  compact('apoteks'));
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

        // Upload gambar ke direktori public/images/apotek
        $imageName = time().'.'.$request->images->extension();
        $request->images->move(public_path('images/'), $imageName);

        // Simpan data apotek ke database
        $apotek = Apotek::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'images' => $imageName
        ]);
        return redirect('/add/apotek')->with('success', 'apotek added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $apotek = Apotek::find($id);

        return view('Admin/apotek_edit', compact('apotek'));
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
