<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();

        return view('hargadanjenisobat', ['obats' => $obats, 'title'=>'Obat']);
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

        $qty = $request->input('qty');

        if ($qty < 5) {
            return redirect()->back()->with('error', 'Minimal pembelian adalah 5 buah.');
        }

        $total_harga = $qty * $obat->harga;

        $transaction = new Transaction();
        $transaction->id_user = auth()->user()->id;
        $transaction->id_obat = $obat->id;
        $transaction->type = 'Pemesanan Obat';
        $transaction->qty_item = $qty;
        $transaction->total_harga = $total_harga;
        $transaction->status = 'Belum Bayar';
        $transaction->save();

        return redirect()->back()->with('success', 'Pesanan berhasil dilakukan. Silakan Melakukan Pembayaran.');
    }
    public function updateStatus(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->status = 'Selesai (sudah melakukan pembayaran)';
        $transaction->metode_payment = $request->metode_payment;
        $transaction->save();

        return redirect()->back()->with('success', 'Pembayaran berhasil dilakukan. Silakan Cek Kembali Pesanan.');
    }


}