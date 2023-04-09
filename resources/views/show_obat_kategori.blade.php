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


    <form class="flex items-center justify-end">
        <label for="simple-search" class="sr-only">Search</label>
        <div class=" top-52 w-[300px] right-0">
            <div class="absolute mt-3 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <input type="text" id="simple-search" class="bg-gray-50 border focus:outline-none    border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 " placeholder="Search" required>
        </div>
    </form>
    <div class="mt-[120px]">
        <h1 class="mt-[-20px] text-center font-bold text-black text-[24px]">{{ $kategori }}</h1>
        <div class="flex justify-center mt-[62px] items-center">
            @if ($obats->isEmpty())
                <p>Tidak terdapat data obat.</p>
            @else
                @foreach($obats as $obat)
                    <div class="mt-[20px] bg-[#6A62C4] w-[251px] h-[124px] m-8 rounded-[5px]">
                        <a href="{{ route('obat.detail', $obat->id) }}">
                            <p class="grid justify-items-center m-12 font-bold text-[16px] text-white">{{ $obat->nama }}</p>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>


@endsection
