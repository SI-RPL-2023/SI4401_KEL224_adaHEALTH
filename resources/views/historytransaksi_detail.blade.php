@extends('layout.layout')

@section('content')

{{-- <div class="hero min-h-screen bg-base-200">
    <div class="hero-content text-center">
      <div class="max-w-md">
        @if (session('success'))
        <div class="alert alert-success shadow-lg mb-4">
            <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('success') }}</span>
            </div>
        </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger shadow-lg">
                {{ session('error') }}
            </div>
        @endif
        <h1 class="text-5xl font-bold">Pembayaran Berhasil</h1>
        <p class="py-6"></p>
        <a href="{{ url('/history') }}" class="btn btn-primary">Lihat Transaksi</a>
        <a href="{{ url('/obats') }}" class="btn btn-ghost">Kembali</a>
        <div class="mt-32">
            <p>Metode Pembayaran: {{ $transaction->metode_payment }}</p>
            <p>Jumlah: {{ $transaction->qty_item }}</p>
        </div>
      </div>
    </div>
</div> --}}
<div class="bg-gray-200 py-4 px-6 rounded-lg shadow-lg">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <svg class="w-6 h-6 text-green-500"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><title>check-circle</title><path d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z" /></svg>
            <p class="text-sm text-[#acacac]">Pembayaran berhasil dilakukan.</p>
        </div>
        <a href="{{ url('/history') }}" class="text-sm text-blue-500 hover:text-blue-700">Kembali Halaman Sebelumnya</a>
    </div>
    <div class="mt-4 border-b border-gray-300"></div>
    <div class="mt-4">
        <p class="text-sm text-gray-600">Id Transaksi Pemesanan: # {{ $transaction->id }}</p>
        <p class="text-sm text-gray-600">Metode Pembayaran: {{ $transaction->metode_payment }}</p>
        <p class="text-sm text-gray-600">Detail Pemesanan:</p>
        <ul class="list-disc list-inside text-sm text-gray-600">
            <li>Jumlah: {{ $transaction->qty_item }}</li>
            <li>Jenis Obat: {{ $transaction->obat->nama }}</li>
            <li>Harga: Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</li>
        </ul>
        @if ($transaction->status == "Tertunda")
            <p class="mt-10">Status Transaksi : <span class="badge badge-error text-white">{{ $transaction->status }}</span></p>
            <div class="alert alert-error shadow-lg mt-4">
                <div>

                <span>Status "Tertunda" dapat diartikan, Transaksi anda masih dalam tahap pengecekan oleh admin adaHEALTH. Mohon Tunggu 3x24 jam</span>
                </div>
            </div>
        @elseif ($transaction->status == "Selesai")
            <p class="mt-10">Status Transaksi : <span class="badge badge-success text-white">{{ $transaction->status }}</span></p>
            <div class="alert alert-success shadow-lg mt-4">
                <div>

                <span>Status "Selesai" dapat diartikan, Transaksi anda Sudah diterima dan barang akan dikirim 7x24 jam oleh admin adaHEALTH.</span>
                </div>
            </div>
            @elseif ($transaction->status = "Gagal")
            <p class="mt-10">Status Transaksi : <span class="badge badge-warning text-white">{{ $transaction->status }}</span></p>
            <div class="alert alert-warning shadow-lg mt-4">
                <div>

                <span>Status "Gagal" dapat diartikan, Transaksi anda Gagal, Karena pembayaran anda tidak valid setelah dilakukan pengecekan oleh admin adaHEALTH.</span>
                </div>
            </div>
        @endif

        <p class="mt-10">Bukti Pembayaran</p>
        <img class="mt-5" src="{{asset('upload/payment/'.$transaction->images)}}" width="15%" alt="{{ $transaction->images }}">
    </div>
</div>

@endsection
