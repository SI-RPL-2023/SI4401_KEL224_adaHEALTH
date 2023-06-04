@extends('layout.layout')

@section('content')
    <div class="container mx-auto px-12">
        <div class=" top-0 left-[202px] flex items-center mt-32">

            <div class="text-sm breadcrumbs">
                <ul>
                    <li><a href="{{ url('/') }}" class="text-[#756e6e]">Home</a></li>
                    <li><a href="{{ url('/artikel') }}" class="text-[#756e6e]">Artikel</a></li>
                    <li><a href="#" class="text-[#3b529d]">Membuat Artikel Baru</a></li>
                </ul>
            </div>
        </div>
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('artikel.store') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="title">
                    Judul Artikel
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="title" name="title" type="text" placeholder="Bagaimana Supaya Wajah Cerah di Pagi Hari"
                    value="{{ old('title') }}" required autofocus>
                @error('title')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>




            <div class="mb-4">
                <div class="col-span-full">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Foto Artikel</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="thumbnail"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                        to upload</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG or JPG</p>
                            </div>
                            <input id="thumbnail" type="file" name="images" accept=".jpg,.jpeg,.png" class="hidden" />
                        </label>
                    </div>
                </div>
                <figure class="max-w-lg mx-auto mt-6">
                    <img class="h-auto max-w-full rounded-lg mx-auto" src="{{ asset('images/thumbnail.jpg') }}"
                        width="300" height="300" id="foto" alt="image description">
                    <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400" id="image-caption">Gambar
                        yang anda upload</figcaption>
                </figure>
                <div class="border-b border-gray-900/10 pb-12"></div>
                @error('images')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="title_content">
                    Judul Konten Artikel
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="title_content" name="title_content" placeholder="Tips Agar Wajah Kamu Cerah"
                    value="{{ old('title_content') }}" required>
                @error('title_content')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="editor" class="block text-gray-700 font-bold mb-2">Konten</label>
                <textarea id="editor" name="editor" value="{{ old('editor') }}"></textarea>

                @error('editor')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                 @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="category">
                    Kategori Artikel
                </label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="category" name="category" required>
                    <option value="">Pilih kategori artikel</option>
                    <option value="Berita" {{ old('category') == 'Berita' ? 'selected' : '' }}>Berita</option>
                    <option value="Kesehatan" {{ old('category') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                    <option value="Penyakit Diabetes" {{ old('category') == 'Penyakit Diabetes' ? 'selected' : '' }}>Penyakit Diabetes</option>
                    <option value="Tutorial" {{ old('category') == 'Tutorial' ? 'selected' : '' }}>Tutorial</option>
                    <option value="All Penyakit" {{ old('category') == 'All Penyakit' ? 'selected' : '' }}>All Penyakit</option>
                    <option value="Review" {{ old('category') == 'Review' ? 'selected' : '' }}>Review</option>
                    <option value="Penyakit Flu" {{ old('category') == 'Penyakit Flu' ? 'selected' : '' }}>Penyakit Flu</option>
                </select>
                @error('category')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Tambah Artikel
                </button>
                <a href="{{ url('/artikel') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script>
        // Muncul nama foto
        $('#thumbnail').change(function() {
            var file = $('#thumbnail')[0].files[0].name;
            $('#image-caption').text(file);
        });
        // image preview
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#foto').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#thumbnail").change(function() {
            readURL(this);
        });
        // END of image preview
    </script>
@endsection
