@extends('layout.layout')
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
@section('content')
<style>
    body{
        background-color: #f7f7f7 !important;
    }
</style>
<div class="px-[236px]">
    <div class=" top-0 left-[202px] flex items-center mt-32">

        <div class="">
            <h1 class="ml-2 text-base font-semibold text-[#6A62C4]">
                Home
            </h1>
        </div>
        <div class="w-[20px] border-b-2  border-slate-400 m-4"></div>

        <div class="">
            <h1 class="ml-2 text-base font-semibold text-black">
                Obat & Vitamin
            </h1>
        </div>


    </div>
    @auth
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
    @forelse ($transactions as $transaction)
    <div class="mt-5 bg-[#ffff] p-5 rounded-lg max-h-fit min-h-fit shadow-lg mb-5">
        <div class="flex justify-end">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-[25px] text-[#d36161]" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20h44v44c0 11 9 20 20 20s20-9 20-20V180h44c11 0 20-9 20-20s-9-20-20-20H356V96c0-11-9-20-20-20s-20 9-20 20v44H272c-11 0-20 9-20 20z"/></svg>
        </div>

        <p class="font-medium">
            Pesanan Anda <span class="font-medium text-[#ccc8c8]"> #{{ $transaction->id }}</span>
        </p>
        <p class="">Transaksi : {{ $transaction->type }}</p>
        <p class="">Jenis Obat : {{ $transaction->obat->nama }}</p>
        <p class="">Jumlah : {{ $transaction->qty_item }}</p>
        <p class="">Harga : Rp. {{ $transaction->total_harga }}</p>
        <span class="">Status : <div class="badge badge-error text-white">{{ $transaction->status }}</div></span>
        <div class="w-full border-b-2  border-slate-100 mt-4"></div>
        <form action="{{ route('transaction.update', $transaction->id) }}" method="POST" onsubmit="return validateForm();">
            @csrf
            <p class="font-medium mt-3">Metode Pembayaran : </p>
            <select class="select w-full max-w-xs" name="metode_payment" id="metode_payment" required>
                <option disabled selected>Pilih Metode</option>
                <option value="OVO">OVO</option>
                <option value="DANA">DANA</option>
                <option value="LINK AJA">LINK AJA</option>
                <option value="GOPAY">GOPAY</option>
            </select>
            <button type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Bayar Sekarang</button>
        </form>
    </div>
    <script>
        function validateForm() {
            var paymentMethod = document.getElementById("metode_payment").value;
            if (paymentMethod == "Pilih Metode") {
                alert("Silakan pilih metode pembayaran terlebih dahulu");
                return false;
            }
        }
    </script>

    @empty
    @endforelse
    @else

    @endauth
    <div class="flex flex-row mt-16">
        <div class="basis-3/4 p-5 w-[1366px] max-h-fit">
            <div class="bg-[#6A62C4] p-5 max-h-fit  rounded-t-lg">
                <div class="badge badge-primary">Rekomendasi Dokter</div>
                <img class="object-cover h-56 w-full mt-5" src="{{asset('upload/obat/'.$obat->photo)}}" alt="{{ $obat->photo }}">
            </div>
            <div class="rounded-b-lg border-black p-5 bg-[#e1dff6]">
                <p class="text-[#2fa3fc] font-medium ">adaHEALTH, <span class="text-[#817676] text-[10px]">{{ $obat->created_at }}</span></p>
                <label for="">Di Tinjau Oleh <span class="text-[#a72ffc] font-medium">Team Dokter Spesialis</span></label>
                <div class="w-full border-b-2  border-slate-400 mt-5"></div>
                <h1 class="text-[#313131] font-regular text-[24px] mt-5">{{ $obat->nama }}<div class="badge badge-primary ml-3">{{ $obat->jenis }}</div></h1>
                <div class="w-[50px] border-b-2  border-slate-400 mt-3"></div>
                <p class="mt-5 font-medium">Deskripsi Obat</p>
                <p class="mt-5">{{ $obat->deskripsi }}</p>
            </div>
        </div>
        <div class="basis-2/5 mt-5 bg-[#ffff] p-5 rounded-lg w-[1366px] h-[100px] shadow-lg mb-5">
            <div class="p-5 ">
                <div class="font-medium">Stock Obat <span class="ml-32 bg-[#1e74d1] p-1 text-white rounded-md">{{ $obat->qty }}</span></div>

            </div>
            <div class="flex flex-col p-5 mt-10 bg-[#ffff] rounded-lg  h-[280px] shadow-lg">
                <div>
                    <p class="font-medium">Pesan Sekarang <label for="" class="text-[8px] text-[#c93030] mt-5">*pembelian min 5 pcs</label></p>
                    <div class="w-full border-b-2  border-slate-100 mt-4"></div>

                    <form method="POST" action="{{ route('obat.store_pesan', ['id' => $obat->id]) }}">
                        @csrf
                        <h2 class="mt-5">Masukkan Jumlah</h2>
                        <input type="number" class="input input-bordered mt-3" name="qty" step="1" min="5" max="10" placeholder="5" required> / Rp{{ number_format($obat->harga, 0, ',', '.') }}
                        <button type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Pesan</button>
                    </form>
                </div>

            </div>
        </div>
    </div>



@endsection
