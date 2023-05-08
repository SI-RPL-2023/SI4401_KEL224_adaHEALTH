@extends('layout.layout-admin')

@section('content')
<div class="flex justify-between items-center mt-6 ml-48">
    <a href="{{ url('/add/apotek') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 hover:text-gray-900 rounded-lg py-2 px-4 mr-10">
        Back
    </a>
</div>
    <div class="ml-48 mt-5 flex items-center mb-32">

        <div class="">
            <h1 class="ml-2 text-base font-semibold text-[#6A62C4]">
                Dashboard
            </h1>
        </div>
        <div class="w-[20px] border-b-2  border-slate-400 m-4"></div>

        <div class="">
            <h1 class="text-base font-semibold text-black">
                Detail apotek
            </h1>
        </div>

    </div>

    <div class="w-full max-w-6xl ml-48 my-8">
        @if (session('success'))
        <div class="alert alert-success shadow-lg mb-4">
            <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('success') }}</span>
            </div>
        </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger shadow-lg">
                {{ session('error') }}
            </div>
        @endif
        <h1 class="text-2xl font-bold mb-4">Detail Data apotek</h1>
        <div class="badge badge-success text-white">Dibuat Pada : {{ $apotek->created_at }}</div>
        <div class="flex justify-end p-4">
            <button class="badge badge-accent text-white"><a href="{{ route('apotek.edit', $apotek->id) }}">Edit</a></button>
        </div>
        <div class="max-w-full mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
              <div class="px-4 py-5 sm:px-6">
                <img class="h-auto max-w-full rounded-lg mx-auto" src="{{asset('upload/apotek/'.$apotek->images)}}" width="300" height="300" id="images" alt="image description">
              </div>
              <div class="border-t border-gray-200">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" readonly  name="name" id="name" value="{{ $apotek->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                <textarea name="description" readonly  id="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $apotek->description }}</textarea>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                                <input type="text" readonly  name="phone_number" id="phone_number" value="{{ $apotek->phone_number }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                                <input type="text" readonly  name="provinsi" id="provinsi" value="{{ $apotek->provinsi }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="kota" class="block text-sm font-medium text-gray-700">Kota</label>
                                <input type="text" readonly  name="kota" id="kota" value="{{ $apotek->kota }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="alamat_lengkap" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                                <textarea name="alamat_lengkap" readonly  id="alamat_lengkap" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $apotek->alamat_lengkap }}</textarea>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>

@endsection
