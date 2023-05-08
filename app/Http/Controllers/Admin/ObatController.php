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
    public function index(Obat $obat)
    {

        return view('admin.obat_show',  compact('obat'));
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

        $imageName = $request->file('photo');
        $imageName->store('upload/obat', ['disk' => 'public_uploads']);

        // Simpan data obat ke database
        $obat = Obat::create([
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'jenis' => $request->input('jenis'),
            'kategori' => $request->input('kategori'),
            'harga' => $request->input('harga'),
            'qty' => $request->input('qty'),
            'photo' => $imageName->hashName()
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
            'photo' => 'nullable',
            'nama' => 'required',
            'jenis' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'qty' => 'required',
        ]);


        // Jika ada file gambar yang diupload
        if($request->hasFile('photo')) {
            $imageName = $request->file('photo');
            $imageName->store('upload/obat', ['disk' => 'public_uploads']);

            //delete gambar image
            if($obat->photo != null) {
                $path = public_path('upload/obat/'.$obat->photo);
                if(file_exists($path)) {
                    unlink($path);
                } else {
                    return response()->json(['message' => 'File not found.'], 404);
                }
            }

            // Simpan nama gambar yang baru ke dalam database
            $obat->photo = $imageName->hashName(); // atau $imageName->getClientOriginalName()
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
        return redirect()->route('add.obat', compact('obat'))->with('success', 'Data obat berhasil diupdate');

    }
    public function delete($id)
    {
        $obat = Obat::findOrFail($id);

        // cek apakah obat tersebut memiliki transaksi
        if ($obat->transactions()->count() > 0) {
            return redirect('/add/obat')->with('error', 'Data obat tidak bisa dihapus karena sudah ada transaksi!');
        }

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
