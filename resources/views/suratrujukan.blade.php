@extends('layout.layout')

@section('content')

<p class="text-center font-bold text-[24px] mt-[50px]">Surat Rujukan Rumah Sakit</p>
<div class="grid gap-6 mb-6 ml-20 md:grid-cols-2">
    <form action="{{route('generate-pdf')}}" method="POST">
        @csrf
        <div>
            <label for="nama-dokter-rujukan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dokter yang merujuk</label>
            <input type="text" id="nama-dokter-rujukan" name="nama-dokter-rujukan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
        </div>

        <div>
            <label for="nama-dokter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Dokter</label>
            <input type="text" id="nama-dokter" name="nama-dokter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
        </div>
        
        <div>
            <label for="rumah-sakit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Rumah Sakit</label>
            <input type="text" id="rumah-sakit" name="rumah-sakit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
        </div>

        <div>
            <label for="nama-pasien" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pasien</label>
            <input type="text" id="nama-pasien" name="nama-pasien" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
        </div>

        <div>
            <label for="umur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
            <input type="text" id="umur" name="umur" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
        </div>

        <div>
            <label for="jenis-kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
            <input type="text" id="jenis-kelamin" name="jenis-kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
        </div>

        <div>
            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
            <input type="text" id="alamat" name="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
        </div>

        <div>
            <label for="keluhan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keluhan Pasien</label>
            <input type="text" id="keluhan" name="keluhan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
        </div>

        <div>
            <label for="diagnosa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diagnosa</label>
            <input type="text" id="diagnosa" name="diagnosa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
        </div>

        <div>
            <label for="alasan-dirujukan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alasan dirujuk</label>
            <input type="text" id="alasan-dirujuk" name="alasan-dirujuk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>
        </div>
        
        
        <button href="/hasilsuratpdf"type="submit" class="bg-[#3F55AC] mt-[20px] drop-shadow-lg opacity-90 w-[250px] h-[70px] font-semi-bold text-white text-[20px] rounded-[20px]"">Sumbit</button>

    </form>
</div>

@endsection