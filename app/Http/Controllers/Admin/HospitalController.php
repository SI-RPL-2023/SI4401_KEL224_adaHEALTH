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
    public function index(Hospital $hospital)
    {

        return view('admin.hospital_show',  compact('hospital'));
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

        $imageName = $request->file('images');
        $imageName->store('upload/hospital', ['disk' => 'public_uploads']);

        // Simpan data hospital ke database
        $hospital = Hospital::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'phone_number' => $request->input('phone_number'),
            'alamat_lengkap' => $request->input('jalan'),
            'provinsi' => $request->input('provinsi'),
            'kota' => $request->input('kota'),
            'images' => $imageName->hashName()
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
            'images' => 'nullable',
            'name' => 'required',
            'description' => 'required',
            'phone_number' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'alamat_lengkap' => 'required',
        ]);


        // Jika ada file gambar yang diupload
        if($request->hasFile('images')) {
            $imageName = $request->file('images');
            $imageName->store('upload/hospital', ['disk' => 'public_uploads']);

            //delete gambar image
            if($hospital->images != null) {
                $path = public_path('upload/hospital/'.$hospital->images);
                if(file_exists($path)) {
                    unlink($path);
                } else {
                    return response()->json(['message' => 'File not found.'], 404);
                }
            }

            // Simpan nama gambar yang baru ke dalam database
            $hospital->images = $imageName->hashName(); // atau $imageName->getClientOriginalName()
        }
        // Update data hospital
        $hospital->name = $request->name;
        $hospital->description = $request->description;
        $hospital->phone_number = $request->phone_number;
        $hospital->alamat_lengkap = $request->alamat_lengkap;
        $hospital->provinsi = $request->provinsi;
        $hospital->kota = $request->kota;
        $hospital->save();

        // Redirect ke halaman detail hospital
        return redirect()->route('add.hospital', compact('hospital'))->with('success', 'Data hospital berhasil diupdate');

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
