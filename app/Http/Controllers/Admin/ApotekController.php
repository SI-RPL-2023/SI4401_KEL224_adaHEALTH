<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        // Simpan data apotek ke database
        $apotek = Apotek::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'phone_number' => $request->input('phone_number'),
            'alamat_lengkap' => $request->input('jalan'),
            'provinsi' => $request->input('provinsi'),
            'kota' => $request->input('kota'),
            'images' => $imageName
        ]);
        return redirect('/add/apotek')->with('success', 'apotek added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apotek $apotek)
    {
        return view('admin.apotek_edit', compact('apotek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apotek $apotek)
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
            Storage::delete('public/images/' . $apotek->images);

            // Upload gambar yang baru
            $imageName = time() . '.' . $request->images->getClientOriginalExtension();
            if (!$request->images->storeAs('images', $imageName, 'public')) {
                return back()->with('error', 'Gagal upload gambar.');
            }

            // Simpan nama gambar yang baru ke dalam database
            $apotek->images = $imageName;
        }
        // Update data apotek
        $apotek->name = $request->name;
        $apotek->description = $request->description;
        $apotek->phone_number = $request->phone_number;
        $apotek->alamat_lengkap = $request->alamat_lengkap;
        $apotek->provinsi = $request->provinsi;
        $apotek->kota = $request->kota;
        $apotek->save();

        // Redirect ke halaman detail apotek
        return redirect()->route('apotek.update', compact('apotek'))->with('success', 'Data Apotek berhasil diupdate');

    }
    public function delete($id)
    {
        $apotek = Apotek::findOrFail($id);

        // hapus gambar dari public/images
        Storage::delete('public/images/'.$apotek->image_path);

        // hapus data apotek dari database
        $apotek->delete();

        return redirect('/add/apotek')->with('success', 'Data apotek berhasil dihapus!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
