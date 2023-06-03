<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Transaction;
use Illuminate\Http\Request;

use function App\Models\obat;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::where('rekomendasi', 'not like', '%Rekomendasi Dokter%')->get();
        $rekomendasi = Obat::where('rekomendasi', 'like', '%Rekomendasi Dokter%')->get();

        return view('hargadanjenisobat', ['obats' => $obats, 'title'=>'Obat'], compact('rekomendasi'));
    }

    public function show($id)
    {
        $obat = Obat::find($id);
        $transactions = Transaction::with('obat')
                  ->where('status', 'Belum Bayar')
                  ->get();

        if (!$obat) {
            abort(404);
        }


        return view('show_obat_detail', ['obat' => $obat], ['transactions' => $transactions], compact('obat'), ['title'=>'Detail Obat']);
    }

    // public function detail($id)
    // {
    //     $obat = Obat::find($id);
    //     if (!$obat) {
    //         throw new \Exception('Obat tidak ditemukan.');
    //     }
    //     return view('show_obat_detail', compact('obat'));
    // }
    public function store_pesan(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);

        $jumlah = $request->input('qty');

        if ($jumlah < 5) {
            return redirect()->back()->with('error', 'Minimal pembelian adalah 5 buah.');
        }

        if ($obat->qty < $jumlah) {
            return redirect()->back()->with('error', 'Stok obat tidak mencukupi.');
        }

        $total_harga = $jumlah * $obat->harga;

        $transaction = new Transaction();
        $transaction->id_user = auth()->user()->id;
        $transaction->id_obat = $obat->id;
        $transaction->type = 'Pemesanan Obat';
        $transaction->qty_item = $jumlah;
        $transaction->total_harga = $total_harga;
        $transaction->status = 'Belum Bayar';
        $transaction->save();

        // Kurangi stok obat
        $obat->qty -= $jumlah;
        $obat->save();

        return redirect()->back()->with('success', 'Pesanan berhasil dilakukan. Silakan Melakukan Pembayaran.');
    }
        public function cancel_order($id)
    {
        $transaction = Transaction::findOrFail($id);

        // Mengembalikan stok obat
        $obat = $transaction->obat;
        $obat->qty += $transaction->qty_item;
        $obat->save();

        // Menghapus pesanan
        $transaction->delete();

        return redirect()->back()->with('success', 'Pesanan berhasil dibatalkan.');
    }


    public function updateStatus(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        if ($request->hasFile('images')) {
            $image = $request->file('images');

            if ($image->isValid()) {
                $imageName = $image->hashName();
                $image->storeAs('upload/payment', $imageName, 'public_uploads');
                $transaction->images = $imageName;
            } else {
                // Handle invalid file
                return redirect()->back()->with('error', 'Invalid file uploaded.');
            }
        }
        $transaction->status = 'Tertunda';

        $transaction->metode_payment = $request->metode_payment;
        $transaction->save();

        return view('payment', compact('transaction'))->with('success', 'Pembayaran berhasil dilakukan. Silakan Tunggu Konfirmasi Accepeted. Cek Histori transaksi anda.');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $obats = Obat::where('nama', 'like', '%'.$search.'%')
            ->orWhere('harga', 'like', '%'.$search.'%')
            ->orWhere('kategori', 'like', '%'.$search.'%')
            ->orWhere('jenis', 'like', '%'.$search.'%')
            ->orWhere('deskripsi', 'like', '%'.$search.'%')
            ->get();
        $rekomendasi = Obat::where('rekomendasi', 'like', '%Rekomendasi Dokter%')->get();
        $title = "Search Results for '{$search}'";

        return view('hargadanjenisobat', compact('obats', 'title', 'rekomendasi'));
    }

    // public function recommend(Request $request)
    // {
    //     $rekomendasi = $request->get('recommend');
    //     $obats = Obat::where('rekomendasi', 'like', '%'.$rekomendasi.'%')
    //         ->get();

    //     $title = "Search Results for '{$rekomendasi}'";

    //     return view('hargadanjenisobat', compact('obats', 'title'));

    
    
    // ... method-method lainnya ...

}
