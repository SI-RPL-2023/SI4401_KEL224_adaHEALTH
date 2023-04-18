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
                Edit Apotek
            </h1>
        </div>

    </div>
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
    <div class="w-full max-w-lg ml-48 my-8">
        <h1 class="text-2xl font-bold mb-4">Edit Data Apotek</h1>
        <form action="{{ route('update.apotek', $apotek->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Nama Apotek</label>
                <input type="text" name="name" id="name" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 py-2 px-4" value="{{ $apotek->name }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                <textarea name="description" id="description" rows="3" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 py-2 px-4" required>{{ $apotek->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="phone_number" class="block text-gray-700 font-bold mb-2">Nomor Telepon</label>
                <input type="text" name="phone_number" id="phone_number" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 py-2 px-4" value="{{ $apotek->phone_number }}" required>
            </div>
            <div class="mb-4">
                <label for="address" class="block text-gray-700 font-bold mb-2">Alamat</label>
                <textarea name="address" id="address" rows="3" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 py-2 px-4" required>{{ $apotek->address }}</textarea>
            </div>
            <div class="mb-4">
                <label for="images" class="block text-gray-700 font-bold mb-2">Gambar</label>
                <input type="file" name="images" id="images" class="w-full border-gray-300" accept="image/*">
                @if($apotek->images)
                    <div class="mt-2">
                        <img src="{{ asset('images/' . $apotek->images) }}" alt="Gambar Apotek" class="w-32">
                    </div>
                @endif
            </div>
            <div class="flex items-center justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
            </div>
        </form>
    </div>
@endsection
