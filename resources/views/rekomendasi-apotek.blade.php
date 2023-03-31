@extends('layout.layout')

@section('content')
<div class="pb-[100px]">
    <h1 class="flex justify-center items-center font-bold text-[40px] mt-[80px]">Rekomendasi Apotek</h1>
    <div class="flex justify-center">
        <div>
            <a href="{{ url('detailapotek') }}">
                <img class="shadow-2xl w-[200px] h-[200px] m-[100px] rounded-[5px]" src="{{url('asset/kimiafarma.jpg')}}" alt="">
    
                <h1 class="flex justify-center items-center mt-[-50px] text-[20px] font-bold hover:text-[#6A62C4]">Apotek Kimia Farma</h1>
            </a>
        </div>

        <div>
            <img class="shadow-2xl w-[200px] h-[200px] m-[100px] rounded-[5px]" src="{{url('asset/apollo.webp')}}" alt="">

            <h1 class="flex justify-center items-center mt-[-50px] text-[20px] font-bold hover:text-[#6A62C4]">Apotek Apollo Bandung</h1>
        </div>

        <div>
            <img class="shadow-2xl w-[200px] h-[200px] m-[100px] rounded-[5px]" src="{{url('asset/k24.jpg')}}" alt="">

            <h1 class="flex justify-center items-center mt-[-50px] text-[20px] font-bold hover:text-[#6A62C4]">Apotek K24 Bandung</h1>
        </div>


    </div>

    <div class="flex justify-center">
        <div>
            <img class="shadow-2xl w-[200px] h-[200px] m-[100px] rounded-[5px]" src="{{url('asset/vita.jpg')}}" alt="">

            <h1 class="flex justify-center items-center mt-[-50px] text-[20px] font-bold hover:text-[#6A62C4]">Apotek Vita</h1>
        </div>

        <div>
            <img class="shadow-2xl w-[200px] h-[200px] m-[100px] rounded-[5px]" src="{{url('asset/bonafarma.jpg')}}" alt="">

            <h1 class="flex justify-center items-center mt-[-50px] text-[20px] font-bold hover:text-[#6A62C4]">Apotek Bona Farma</h1>
        </div>

        <div>
            <img class="shadow-2xl w-[200px] h-[200px] m-[100px] rounded-[5px]" src="{{url('asset/medika.jpg_small')}}" alt="">

            <h1 class="flex justify-center items-center mt-[-50px] text-[20px] font-bold hover:text-[#6A62C4]">Apotek Medika Antapani</h1>
        </div>


    </div>






</div>
</div>
@endsection