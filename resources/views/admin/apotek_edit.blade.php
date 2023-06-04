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
        <h1 class="text-2xl font-bold mb-4">Edit Data Apotek</h1>

        <div class="max-w-full mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
              <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Apotek</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Silakan ubah data Apotek pada formulir berikut.</p>
              </div>
              <div class="border-t border-gray-200">
                <form method="POST" action="{{ route('apotek.update', $apotek->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" name="name" id="name" value="{{ $apotek->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                <textarea name="description" id="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $apotek->description }}</textarea>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                                <input type="text" name="phone_number" id="phone_number" value="{{ $apotek->phone_number }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                                <input type="text" name="provinsi" id="provinsi" value="{{ $apotek->provinsi }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="kota" class="block text-sm font-medium text-gray-700">Kota</label>
                                <input type="text" name="kota" id="kota" value="{{ $apotek->kota }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="alamat_lengkap" class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                                <textarea name="alamat_lengkap" id="alamat_lengkap" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $apotek->alamat_lengkap }}</textarea>
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block text-sm font-medium leading-6 text-gray-900">Upload Images</label>
                                <div class="flex items-center justify-center w-full">
                                <label for="thumbnail" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG or JPG</p>
                                    </div>
                                    <input id="thumbnail" type="file" name="images" accept=".jpg,.jpeg,.png" class="hidden" />
                                </label>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <figure class="max-w-lg mx-auto mt-6">
                                    @if($apotek->images != null)
                                    <img class="h-auto max-w-full rounded-lg mx-auto" src="{{asset('upload/apotek/'.$apotek->images)}}" width="300" height="300" id="images" alt="image description">
                                    <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400" id="image-caption">{{ $apotek->images }}</figcaption>
                                    @else
                                    <img class="h-auto max-w-full rounded-lg mx-auto" src="{{asset('images/thumbnail.jpg')}}" id="images" alt="image description">
                                    <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400" id="image-caption">Image Caption</figcaption>
                                    @endif
                                </figure>
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

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script>

        $('#thumbnail').change(function() {
            var file = $('#thumbnail')[0].files[0].name;
            $('#image-caption').text(file);
        });
        // image preview
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#images').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#thumbnail").change(function(){
            readURL(this);
        });
        // END of image preview
        </script>
@endsection
