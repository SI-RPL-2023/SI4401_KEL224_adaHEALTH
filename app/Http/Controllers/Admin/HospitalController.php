<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'images' => 'required|image|max:2048',
            'name' => 'required',
            'description' => 'required',
            'phone_number' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'jalan' => 'required',
        ]);

        $imageName = time() . '.' . $request->images->getClientOriginalExtension();
        if (!$request->images->storeAs('images', $imageName, 'public')) {
            return back()->with('error', 'Gagal upload gambar.');
        }
        // Simpan data hospital ke database
        $hospital = Hospital::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'phone_number' => $request->input('phone_number'),
            'alamat_lengkap' => $request->input('jalan'),
            'provinsi' => $request->input('provinsi'),
            'kota' => $request->input('kota'),
            'images' => $imageName
        ]);
        return redirect('/add/hospital')->with('success', 'Hospital added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hospital $hospital)
    {
        return view('admin.hospital_edit', compact('hospital'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hospital $hospital)
    {
        // Validasi input form
        $validated = $request->validate([
            'images' => 'nullable|image|max:2048',
            'name' => 'required',
            'description' => 'required',
            'phone_number' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'alamat_lengkap' => 'required',
        ]);


        // Jika ada file gambar yang diupload
        if ($request->hasFile('images')) {
            // Hapus gambar yang lama
            Storage::delete('public/images/' . $hospital->images);

            // Upload gambar yang baru
            $imageName = time() . '.' . $request->images->getClientOriginalExtension();
            if (!$request->images->storeAs('images', $imageName, 'public')) {
                return back()->with('error', 'Gagal upload gambar.');
            }

            // Simpan nama gambar yang baru ke dalam database
            $hospital->images = $imageName;
        }
        // Update data rumah sakit
        $hospital->name = $request->name;
        $hospital->description = $request->description;
        $hospital->phone_number = $request->phone_number;
        $hospital->alamat_lengkap = $request->alamat_lengkap;
        $hospital->provinsi = $request->provinsi;
        $hospital->kota = $request->kota;
        $hospital->save();

        // Redirect ke halaman detail rumah sakit
        return redirect()->route('hospital.update', compact('hospital'))->with('success', 'Data Rumah Sakit berhasil diupdate');

    }
    public function delete($id)
    {
        $hospital = Hospital::findOrFail($id);

        // hapus gambar dari public/images
        Storage::delete('public/images/'.$hospital->image_path);

        // hapus data hospital dari database
        $hospital->delete();

        return redirect('/add/hospital')->with('success', 'Data rumah sakit berhasil dihapus!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
