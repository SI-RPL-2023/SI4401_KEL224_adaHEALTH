@extends('layout.layout')

@section('content')
<div>
    <h1 class="text-[#6A62C4] mt-[80px] ml-[185px] text-[16px]">History Transaksi</h1>
    <div class="flex justify-center ">
        <div class="w-[1220px] h-[1px] bg-[#6A62C4] mt-[8px] "></div>
    </div>

    <div class="flex mt-[33px]">
        <h1 class="ml-[257px]">Deskripsi</h1>
        <h1 class="ml-[200px]">Waktu</h1>
        <h1 class="ml-[400px]">Status Transaksi</h1>
        <h1 class="ml-[200px]">Total</h1>
    </div>

    <div class="flex justify-center">
        <div class="border w-[1190px] h-[660px] rounded-[12px] mt-[30px]">
            <div class="flex ">
                <div>
                    <h1 class="ml-[92px] text-[14px]">Resep Dr.andi</h1>
                    <p class="ml-[92px] text-[10px] text-[#6A62C4]">Mefinal x4</p>
                </div>
                <h1 class="ml-[170px] text-[14px]">8.50 AM 20 Juli 2021</h1>
                <h1 class="ml-[400px] text-[14px]">Lunas</h1>
                <div>
                    <h1 class="ml-[200px] text-[14px]">IDR 95.000</h1>
                    <p class="ml-[200px] text-[10px] text-[#6A62C4]">Mefinal x4</p>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection
