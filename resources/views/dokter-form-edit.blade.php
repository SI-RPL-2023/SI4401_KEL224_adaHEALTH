@extends('layout.layout')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
<div class="container my-12 mx-auto px-1 md:px-12 space-y-5">

@if(count($errors) > 0)       
    <div id="alert-border-2" class="flex p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
        <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div class="ml-3 text-sm font-medium">
            <ul>
            @foreach ($errors->all() as $error)
                <li><?php echo $error; ?></li>
            @endforeach
            </ul>
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-2" aria-label="Close">
        <span class="sr-only">Dismiss</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
@endif 

    <form method="post" action="{{ url('dokter/update/'.Crypt::encryptString($dokter->id)) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="nama_dokter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Dokter</label>
                <input type="text" id="nama_dokter" name="nama_dokter" value="{{ $dokter->nama_dokter }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" required>
            </div>
            <div>
                <label for="spesialis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Spesialis</label>
                <input type="text" id="spesialis" name="spesialis" value="{{ $dokter->spesialis }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Anak" required>
            </div>
            <div>
                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option hidden>Pilih Jenis Kelamin</option>
                    <option value="L" {{ ($dokter->gender == 'L') ? 'selected':'' }}>Laki-laki</option>
                    <option value="P" {{ ($dokter->gender == 'P') ? 'selected':'' }}>Perempuan</option>
                </select>
            </div>  
            <div>
                <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ $dokter->tanggal_lahir }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div>
                <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.Telp</label>
                <input type="text" maxlength="15" id="no_telp" name="no_telp" value="{{ $dokter->no_telp }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="62813xxxxxxxx" required>
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" id="email" name="email" value="{{ $dokter->email }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="johndoe@example.com" required>
            </div>
            <div>          
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                <textarea id="alamat" name="alamat" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tulis Alamat">{{ $dokter->alamat }}</textarea>          
           </div>
            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <label for="jam_buka" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Buka Praktek</label>
                    <input type="time" value="{{ $dokter->jam_buka }}" id="jam_buka" name="jam_buka" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                </div>
                <div>
                    <label for="jam_tutup" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Tutup Praktek</label>
                    <input type="time" value="{{ $dokter->jam_tutup }}" id="jam_tutup" name="jam_tutup" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>
                </div>
            </div>
            
        </div>
        
        <div class="mb-6">
            <div class="col-span-full">
                <label class="block text-sm font-medium leading-6 text-gray-900">Foto Dokter</label>
                <div class="flex items-center justify-center w-full">
                <label for="thumbnail" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG or JPG</p>
                    </div>
                    <input id="thumbnail" type="file" name="foto" accept=".jpg,.jpeg,.png" class="hidden" />
                </label>
            </div> 
            <figure class="max-w-lg mx-auto mt-6">
                @if($dokter->foto != null)
                <img class="h-auto max-w-full rounded-lg mx-auto" src="{{asset('upload/dokter/'.$dokter->foto)}}" width="300" height="300" id="foto" alt="image description">
                <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400" id="image-caption">{{ $dokter->foto }}</figcaption>
                @else
                <img class="h-auto max-w-full rounded-lg mx-auto" src="{{asset('images/thumbnail.jpg')}}" id="foto" alt="image description">
                <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400" id="image-caption">Image Caption</figcaption>
                @endif
            </figure>
            <div class="border-b border-gray-900/10 pb-12"></div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="{{ url('dokter') }}" class="text-sm font-semibold leading-6 text-gray-900">Batal</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
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

        reader.onload = function (e) {
            $('#foto').attr('src', e.target.result);
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