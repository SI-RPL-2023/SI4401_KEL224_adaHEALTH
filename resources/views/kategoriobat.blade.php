@extends('layout.layout')

@section('content')
    <div class="bg-[#6A62C4] pt-10 pl-10 h-screen w-screen">
        <div class="flex">
            <a href="" class="text-white mr-2">Home</a>
            <h1 class="text-white mr-2">></h1>
            <a href="" class="text-white">Obat & Vitamin</a>
        </div>
        <div class="flex flex-col justify-center items-center text-white">
            <h1 class="font-bold text-3xl mt-[150px]">Kategori</h1>
            <div class="mt-[62px] flex gap-[46px] justify-center text-[#6A62C4]">
                <a href=""><div class="w-[251px] h-[155px] rounded-[20px] bg-white pb-[17px] flex justify-center items-end font-bold">FLU</div></a>
                <a href=""><div class="w-[251px] h-[155px] rounded-[20px] bg-white pb-[17px] flex justify-center items-end font-bold">SAKIT GIGI</div></a>
                <a href=""><div class="w-[251px] h-[155px] rounded-[20px] bg-white pb-[17px] flex justify-center items-end font-bold">LUKA KULIT</div></a>
                <a href=""><div class="w-[251px] h-[155px] rounded-[20px] bg-white pb-[17px] flex justify-center items-end font-bold">COVID-19</div></a>
            </div>
            <h1 class="text-white text-[24px] mt-[70px] font-medium">lainnya&nbsp;></h1>
        </div>
    </div>
@endsection