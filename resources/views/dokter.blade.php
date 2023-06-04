@extends('layout.layout')

@section('content')


@if(session()->has('success'))
<div id="toast-success" class="fixed top-5 right-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ml-3 text-sm font-normal">{{ Session::get('success') }}</div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
</div>
@endif
<div class="container my-12 mx-auto px-1 md:px-12 space-y-5">
    <p class="normal-case ...">Chat dokter spesialis</p>
    @if(Auth::user()->roles != 1)
    @else
    <a href="{{ url('dokter/add') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Tambah Dokter</a>
    @endif
</div>

<div class="container my-12 mx-auto px-1 md:px-12 space-y-5">
    <div class="flex flex-wrap -mx-1 lg:-mx-4">
        
        <!-- Column -->
        @forelse($dokter as $d) 
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
            <!-- Article -->                  
            <div class="w-full max-w-sm bg-[#ECF2FF] border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-col items-center pb-10">
                    <br>
                    <!-- <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{asset('storage/upload/dokter/'.$d->foto)}}" alt=""/> -->
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{asset('upload/dokter/'.$d->foto)}}" alt=""/>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $d->nama_dokter }}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Dokter Spesialis {{ $d->spesialis }}</span>
                    <span class="mt-4 text-sm text-gray-500 dark:text-gray-400">Jam Praktek <br>{{ $d->jam_buka }} - {{ $d->jam_tutup }}</span>
                    <hr style="color: red">
                    <div class="flex mt-4 space-x-3 md:mt-6">
                        <button type="button" id="btnMessage" data-no_telp="{{$d->no_telp}}" data-jam_buka="{{$d->jam_buka}}" data-jam_tutup="{{$d->jam_tutup}}" href="https://wa.me/{{$d->no_telp}}?text=Halo dok!" target="_blank" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Message</button>
                    </div>
                    @if(Auth::user()->roles == 1)
                    <div class="flex mt-4 space-x-3 md:mt-6">
                        <a href="{{ url('dokter/edit/'.Crypt::encryptString($d->id)) }}" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Edit</a>
                        <a href="{{ url('dokter/delete/'.Crypt::encryptString($d->id)) }}" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</a>
                    </div>
                    @else
                    @endif
                </div>
            </div>
        </div>       
        @empty
        <p class="container my-12 mx-auto px-1 md:px-12 space-y-5 text-center text-gray-500 dark:text-gray-400">Tidak ada data</p>
        <!-- END Article -->
        @endforelse
        <!-- END Column -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script>
    $(document).ready(function() {
        // $('#toast-warning').hide();
        // Get all buttons with the class "my-button"
        const buttons = document.querySelectorAll('#btnMessage');

        // Loop through each button
        buttons.forEach((button) => {
            button.addEventListener('click', (event) => {
                // Do something when the button is clicked
                const jam_buka = button.getAttribute('data-jam_buka');
                const jam_tutup = button.getAttribute('data-jam_tutup');
                const no_telp = button.getAttribute('data-no_telp');

                const now = new Date();
                const hours = now.getHours().toString().padStart(2, '0');
                const minutes = now.getMinutes().toString().padStart(2, '0');
                const currentTime = `${hours}:${minutes}`;
                const isWithinRange = currentTime >= jam_buka && currentTime <= jam_tutup;

                if(isWithinRange == false) {
                    alert('Mohon maaf, jam operasional belum buka');
                } else {
                    const pesan = `Halo, dokter!`;
                    const url = `https://wa.me/${no_telp}?text=` + pesan + ``;
                    window.open(url);
                }          
            });
        });
    });
</script>
@endsection