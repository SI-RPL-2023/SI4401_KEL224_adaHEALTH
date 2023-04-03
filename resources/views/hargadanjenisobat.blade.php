@extends('layout.layout')

@section('content')

<div class="container mx-auto">
    <div class="w-full p-2 p-20 bg-center bg-cover h-[800px]" style="background-image: url(asset/bghargadanjenisobat.png);">
    </div>

    <div class="absolute top-0 left-[202px] flex items-center mt-32">

        <div class="">
            <h1 class="ml-2 text-base font-semibold text-Black-Normal">
                Home
            </h1>
        </div>
        <div class="w-[20px] border-b-2 border-[#FFFFFF] border-slate-400 m-4"></div>

        <div class="">
            <h1 class="ml-2 text-base font-semibold text-[#FFFFFF]">
                Obat & Vitamin
            </h1>
        </div>

    </div>


    <form class="flex items-center">
        <label for="simple-search" class="sr-only">Search</label>
        <div class="absolute top-52 w-[300px] right-0 mr-[296px]">
            <div class="absolute inset-y-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <input type="text" id="simple-search" class="bg-gray-50 border focus:outline-none    border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
        </div>
    </form>
    <div class="flex justify-center">
        <h1 class="absolute top-72 font-bold text-white text-[24px]">Kategori</h1>
    </div>
    <div class="flex justify-center">
        
        <div class="absolute top-80 card w-[184px] h-[124px] m-8 rounded-[5px] bg-white">fasdasf</div>

    </div>

    <div class="flex justify-center">
        <h1 class="absolute bottom-40 font-bold text-white text-[16px] hover:text-black">Lainnya ></h1>
    </div>
</div>


@endsection
 