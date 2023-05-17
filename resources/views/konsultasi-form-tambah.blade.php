@extends('layout.layout')
@section('content')
<div class="container my-12 mx-auto px-1 md:px-12 space-y-5">
<h4 class="text-2xl font-bold dark:text-white">Form Konsultasi Pasien</h4>
    <form method="post" action="{{ url('konsultasi/save') }}">
        @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
            <label for="pasien" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pasien</label>
                <select id="pasien" name="id_pasien" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option hidden>Pilih Pasien</option>
                @foreach($pasien as $p)
                <option value="{{ $p->id }}" data-email="{{ $p->email }}">{{ $p->name }}</option>
                @endforeach
                </select>
            </div>
            <div>
                <label for="email_pasien" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Pasien</label>
                <input type="email" value="{{ old('email_pasien') }}" id="email_pasien" name="email_pasien" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe@example.com" readonly>
            </div>
            <div>
                <label for="penyakit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penyakit Yang Diderita</label>
                <input type="text" value="{{ old('penyakit') }}" id="penyakit" name="penyakit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Asma" required>
            </div>  
            <div>
                <label for="rujukan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rujukan RS</label>
                <select id="rujukan" name="rujukan_rs" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option hidden>Status Rujukan</option>
                    <option value="0">Tidak Disetujui</option>
                    <option value="1">Disetujui</option>
                </select>
            </div>
            <div>
                <label for="obat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Obat Yang Harus Dikonsumsi</label>
                <textarea id="message" value="{{ old('obat') }}" name="obat" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Obat">{{ old('obat') }}</textarea>
            </div>
            <div>
            <label for="saran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Saran Dokter</label>
                <textarea id="saran" name="saran" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Saran">{{ old('saran') }}</textarea>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{ url('dokter') }}" class="text-sm font-semibold leading-6 text-gray-900">Batal</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

<script>
    $(document).ready(function(){
        $('#pasien').on('change', function() {
            // alert('tes');
            const email = $(this).find(':selected').attr('data-email');
            $('#email_pasien').val(email);
        })
    });
</script>
@endsection