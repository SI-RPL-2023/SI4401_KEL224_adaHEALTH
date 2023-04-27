@extends('layout.layout')

@section('content')

<div class="flex justify-center items-center w-screen h-screen">
    <img src="{{ url('asset/obesitywoman.png') }}" alt="" class="w-[337px]">
    <div class="mt-4 flex flex-col lg:row-span-3 lg:mt-0 items-center">
        <p class="text-[40px] mt-[40px] text-center font-bold tracking-tight text-gray-900">Kalkulator BMI</p>
        <a class="text-[32px] mt-[40px] text-gray-900 font-regular text-[#BEBEBE] ">Yuk, ketahui berat badan ideal kamu dengan kalkulator BMI</a>
        <button class="bg-[#3F55AC] mt-[40px] drop-shadow-lg opacity-90 w-[800px] h-[100px] font-bold text-white text-[32px] rounded-[15px]"">Hitung BMI</button>
    </div>

    
</div>
@endsection