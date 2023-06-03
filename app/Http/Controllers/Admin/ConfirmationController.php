<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Obat;
use App\Models\User;

class ConfirmationController extends Controller
{
    public function index()
    {
        $transaction = Transaction::all();
        return view('admin.reporting.index',[
            'title'=>'adaHealth | Reporting',
            'transaction'=> $transaction,
        ]);
    }
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('admin.reporting.edit',[
            'title'=>'adaHealth | Reporting',
            'transaction'=> $transaction,
        ]);
    }
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
        }

        $status = $request->input('status');

        if ($status == 'Selesai' || $status == 'Gagal') {
            $transaction->status = $status;
            $transaction->save();

            if ($status == 'Gagal') {
                // Mengembalikan stok obat sesuai dengan qty_item yang dipesan
                $obat = Obat::find($transaction->id_obat);
                $obat->qty += $transaction->qty_item;
                $obat->save();
            }

            return redirect()->route('index.show')->with('success', 'Status transaksi berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Status transaksi tidak valid.');
    }
}
