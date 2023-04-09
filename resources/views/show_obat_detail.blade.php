@extends('layout.layout')

@section('content')

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

    <div class="mt-[120px]">
        <div class="flex items-center justify-between">
            <div class="flex items-center mt-4">
                <h1 class="text-black font-bold text-[24px]">{{ $obat->nama }}</h1>
                <div class="w-[20px] border-b-2 ml-4 border-slate-400"></div>
                <h2 class="text-black font-bold text-[24px] ml-4">{{ $obat->kategori }}</h2>
            </div>
            <div class="flex items-center mt-4">
                <h2 class="text-black font-semibold text-[18px] mr-2">Rp. {{ $obat->harga }}</h2>
                <img src="{{ $obat->gambar }}" alt="{{ $obat->nama }}" class="h-[30px]">
            </div>
        </div>
        <div class="flex mt-8">
            <img src="{{ $obat->gambar }}" alt="{{ $obat->nama }}" class="w-[250px] h-[250px] object-cover rounded-[10px]">
            <div class="ml-8">
                <p class="text-[16px] text-black font-bold">Deskripsi Produk</p>
                <p class="mt-2 text-[16px] text-black">{{ $obat->deskripsi }}</p>
                <button class="bg-[#6A62C4] rounded-[5px] text-white font-bold text-[16px] py-2 px-4 mt-8 hover:bg-opacity-90 focus:outline-none">
                    Tambahkan ke Keranjang
                </button>
            </div>
        </div>
    </div>


@endsection
