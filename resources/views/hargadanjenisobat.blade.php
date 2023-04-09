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
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">{{ $title }}</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          @foreach($obats as $obat)
          <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <img class="object-cover h-56 w-full" src="{{ $obat->photo }}" alt="{{ $obat->nama }}">
            <div class="p-4">
              <h2 class="text-xl font-bold mb-2">{{ $obat->nama }}</h2>
              <p class="text-gray-700 text-base">{{ $obat->deskripsi }}</p>
              <p class="text-gray-700 text-base mt-2">Harga: {{ $obat->harga }}</p>
              <p class="text-gray-700 text-base mt-2">Kategori: {{ $obat->kategori }}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>







    {{-- <div class="mt-[20px]">
        <div class="drawer">
            <input id="my-drawer" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content">
                <!-- Page content here -->
                <label for="my-drawer" class="btn btn-primary drawer-button">Tampilkan Jenis Penyakit</label>
            </div>
            <div class="drawer-side">
                <label for="my-drawer" class="drawer-overlay"></label>
                <div class="menu p-4 w-80 text-base-content bg-[#6A62C4]">
                    <label for="my-modal" class="text-white">FLU</label>

                    <!-- Put this part before </body> tag -->
                    <input type="checkbox" id="my-modal" class="modal-toggle" />
                    <div class="modal">
                        <div class="modal-box">
                            <h3 class="font-bold text-lg">Jenis Obat Untuk Sakit FLU</h3>
                            <ul class="menu text-base-content">
                                <li><a>Loratadine</a></li>
                                <li><a>Pseudoephedrine</a></li>
                                <li><a>Paracetamol</a></li>
                                <li><a>Guaifenesin</a></li>
                                <li><a>Oseltamivir</a></li>
                            <div class="modal-action">
                                <label for="my-modal" class="btn">tutup</label>
                            </div>
                        </div>
                    </div>
                    <li>
                        <a class="text-white">Sakit Gigi</a>
                    </li>
                    <li>
                        <a class="text-white">Luka Kulit</a>
                    </li>
                    <li>
                        <a class="text-white">Covid-19</a>
                    </li>
                    <label for="my-drawer" class="btn">Tutup</label>
                </div>

            </div>
        </div>
    </div> --}}
</div>




@endsection
