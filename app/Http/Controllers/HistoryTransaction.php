<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class HistoryTransaction extends Controller
{
    /**
     * Menampilkan semua transaksi.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $transactions =  Transaction::where('id_user', $user->id)->get();
        return view('historytransaksi', compact('transactions'));
    }

    /**
     * Menampilkan halaman pembuatan transaksi.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Menyimpan transaksi baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);

        // Simpan transaksi ke dalam database
        $transaction = new Transaction([
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
        ]);
        $transaction->save();

        // Redirect ke halaman daftar transaksi dengan pesan sukses
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil disimpan.');
    }

    /**
     * Menampilkan detail transaksi.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Menampilkan halaman edit transaksi.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Memperbarui data transaksi yang sudah ada di dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);

        // Cari transaksi yang akan diupdate
        $transaction = Transaction::findOrFail($id);

        // Update data transaksi
        $transaction->amount = $request->input('amount');
        $transaction->description = $request->input('description');
        $transaction->save();

        // Redirect ke halaman daftar transaksi dengan pesan sukses
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Menghapus transaksi dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Cari transaksi yang akan dihapus
        $transaction = Transaction::findOrFail($id);

        // Hapus transaksi
        $transaction->delete();

        // Redirect ke halaman daftar transaksi dengan pesan sukses
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }


}
