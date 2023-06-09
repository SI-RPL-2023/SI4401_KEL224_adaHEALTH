<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Obat;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
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
    public function store(Request $request)
    {
        // Validasi input form
        $test = $request->validate([
            'photo' => 'required|image|max:2048',
            'nama' => 'required',
            'jenis' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'qty' => 'required',
        ]);

        $imageName = time() . '.' . $request->photo->getClientOriginalExtension();
        if (!$request->photo->storeAs('images', $imageName, 'public')) {
            return back()->with('error', 'Gagal upload gambar.');
        }

        // Simpan data obat ke database
        $obat = Obat::create([
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'jenis' => $request->input('jenis'),
            'kategori' => $request->input('kategori'),
            'harga' => $request->input('harga'),
            'qty' => $request->input('qty'),
            'photo' => $imageName
        ]);
        return redirect('/add/obat')->with('success', 'obat added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $obats = Obat::all();
        return view('admin.obat',  compact('obats'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
    {
        return view('admin.obat_edit', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {
        // Validasi input form
        $validated = $request->validate([
            'photo' => 'required|image|max:2048',
            'nama' => 'required',
            'jenis' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'qty' => 'required',
        ]);


        // Jika ada file gambar yang diupload
        if ($request->hasFile('photo')) {
            // Hapus gambar yang lama
            Storage::delete('public/images/' . $obat->images);

            // Upload gambar yang baru
            $imageName = time() . '.' . $request->photo->getClientOriginalExtension();
            if (!$request->photo->storeAs('images', $imageName, 'public')) {
                return back()->with('error', 'Gagal upload gambar.');
            }

            // Simpan nama gambar yang baru ke dalam database
            $obat->photo = $imageName;
        }
        // Update data obat
        $obat->nama = $request->nama;
        $obat->deskripsi = $request->deskripsi;
        $obat->jenis = $request->jenis;
        $obat->kategori = $request->kategori;
        $obat->qty = $request->qty;
        $obat->harga = $request->harga;
        $obat->save();

        // Redirect ke halaman detail obat
        return redirect()->route('obat.update', compact('obat'))->with('success', 'Data obat berhasil diupdate');

    }
    public function delete($id)
    {
        $obat = Obat::findOrFail($id);

        // hapus gambar dari public/images
        Storage::delete('public/images/'.$obat->image_path);

        // hapus data obat dari database
        $obat->delete();

        return redirect('/add/obat')->with('success', 'Data obat berhasil dihapus!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
