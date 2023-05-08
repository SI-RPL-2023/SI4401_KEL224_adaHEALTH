@extends('layout.layout-admin')

@section('content')
<div class="flex justify-between items-center mt-6 ml-48">
    <a href="{{ url('/add/hospital') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 hover:text-gray-900 rounded-lg py-2 px-4 mr-10">
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
                Edit Hospital
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
        <h1 class="text-2xl font-bold mb-4">Edit Data Hospital</h1>

        <div class="max-w-full mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
              <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Hospital</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Silakan ubah data rumah sakit pada formulir berikut.</p>
              </div>
              <div class="border-t border-gray-200">
                <form method="POST" action="{{ route('hospital.update', $hospital->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" name="name" id="name" value="{{ $hospital->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                <textarea name="description" id="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $hospital->description }}</textarea>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                                <input type="text" name="phone_number" id="phone_number" value="{{ $hospital->phone_number }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                                <input type="text" name="provinsi" id="provinsi" value="{{ $hospital->provinsi }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="kota" class="block text-sm font-medium text-gray-700">Kota</label>
                                <input type="text" name="kota" id="kota" value="{{ $hospital->kota }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="alamat_lengkap" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                                <textarea name="alamat_lengkap" id="alamat_lengkap" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $hospital->alamat_lengkap }}</textarea>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="images" class="blocktext-sm font-medium text-gray-700">Gambar</label>
                                <input type="file" name="images" id="images" multiple class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <h1 for="" class="text-base font-semibold text-[#ff3434]">*gambar sebelumnya</h1>
                            <div class="grid grid-cols-2 gap-4">
                                <td class="py-3 px-4"><img src="{{ asset('storage/images/'.$hospital->images) }}" alt="{{ $hospital->images }}" class="w-full rounded-lg"></td>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="flex justify-start py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                          Simpan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


@endsection
