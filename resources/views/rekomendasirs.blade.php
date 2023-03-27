@extends('layout.layout')

@section('content')
<div    >
    <h1 class="flex justify-center items-center font-bold text-[40px] mt-[80px]"> Rekomendasi Rumah Sakit</h1>
    <div class="flex justify-center">
        <div>
            <img class="shadow-2xl w-[200px] h-[200px] m-[100px] rounded-[5px]" src="{{url('asset/hasansadikin.jpg')}}" alt="">

            <h1 class="flex justify-center items-center mt-[-50px] text-[20px] font-bold hover:text-[#6A62C4]">RSUP Dr. Hasan Sadikin</h1>
        </div>

        <div>
            <img class="shadow-2xl w-[200px] h-[200px] m-[100px] rounded-[5px]" src="{{url('asset/rssantosa.jpg')}}" alt="">

            <h1 class="flex justify-center items-center mt-[-50px] text-[20px] font-bold hover:text-[#6A62C4]">Santosa Hospital Bandung Central</h1>
        </div>

        <div>
            <img class="shadow-2xl w-[200px] h-[200px] m-[100px] rounded-[5px]" src="{{url('asset/rsudbandung.jpg')}}" alt="">

            <h1 class="flex justify-center items-center mt-[-50px] text-[20px] font-bold hover:text-[#6A62C4]">RSUD KOTA BANDUNG</h1>
        </div>


    </div>

    <div class="flex justify-center">
        <div>
            <img class="shadow-2xl w-[200px] h-[200px] m-[100px] rounded-[5px]" src="{{url('asset/rspindad.jpg')}}" alt="">

            <h1 class="flex justify-center items-center mt-[-50px] text-[20px] font-bold hover:text-[#6A62C4]">RS PINDAD</h1>
        </div>

        <div>
            <img class="shadow-2xl w-[200px] h-[200px] m-[100px] rounded-[5px]" src="{{url('asset/rslimijati.jpg')}}" alt="">

            <h1 class="flex justify-center items-center mt-[-50px] text-[20px] font-bold hover:text-[#6A62C4]">RSIA Limijati</h1>
        </div>

        <div>
            <img class="shadow-2xl w-[200px] h-[200px] m-[100px] rounded-[5px]" src="{{url('asset/rsudalihsan.jpeg')}}" alt="">

            <h1 class="flex justify-center items-center mt-[-50px] text-[20px] font-bold hover:text-[#6A62C4]">RSUD AL IHSAN</h1>
        </div>


    </div>






</div>
</div>
@endsection
