@extends('layout.layout-admin')

@section('content')

<div class="flex justify-between items-center mt-6">
    <h1 class="text-2xl font-bold text-gray-800 ml-60">Add obat</h1>
    <a href="{{ url('/dashboard') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 hover:text-gray-900 rounded-lg py-2 px-4 mr-10">
        Back to Dashboard
    </a>
</div>
<div class="ml-48 p-8 mt-8">
    <div class=" top-0 left-[202px] flex items-center mb-32">

        <div class="">
            <h1 class="ml-2 text-base font-semibold text-[#6A62C4]">
                Dashboard
            </h1>
        </div>
        <div class="w-[20px] border-b-2  border-slate-400 m-4"></div>

        <div class="">
            <h1 class="text-base font-semibold text-black">
                Add obat
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
        <div class="alert alert-error shadow-lg">
            {{ session('error') }}
        </div>
    @endif
    <div class="container mx-auto mt-8">
        @if (count($obats) == 0)
          <p class="text-gray-700 text-center">Data obat kosong, silahkan tambahkan</p>
        <div id="obat-form">
            <form action="{{ route('store.obat') }}" class="pt-20" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="photo" class="block text-gray-700 font-bold mb-2">Image:</label>
                    <input type="file" name="photo" id="photo" class="border rounded-lg py-2 px-3 w-full @error('photo') border-red-500 @enderror" value="{{ old('photo') }}">


                    @error('photo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-bold mb-2">obat Name:</label>
                    <input type="text" name="nama" id="nama" class="border rounded-lg py-2 px-3 w-full @error('nama') border-red-500 @enderror" value="{{ old('nama') }}" placeholder="Enter obat nama , ex : obat Kimia Farma  Bandung ">

                    @error('nama')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="jenis" class="block text-gray-700 font-bold mb-2">Jenis Obat:</label>
                    <input type="text" name="jenis" id="jenis" class="border rounded-lg py-2 px-3 w-full @error('jenis') border-red-500 @enderror" value="{{ old('jenis') }}" placeholder="Enter obat jenis , ex : Antiseptik">

                    @error('jenis')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="kategori" class="block text-gray-700 font-bold mb-2">Kategori Obat:</label>
                    <input type="text" name="kategori" id="kategori" class="border rounded-lg py-2 px-3 w-full @error('kategori') border-red-500 @enderror" value="{{ old('kategori') }}" placeholder="Enter obat kategori , ex : Flu">

                    @error('kategori')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 font-bold mb-2">Description:</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="border rounded-lg py-2 px-3 w-full @error('deskripsi') border-red-500 @enderror" placeholder="Enter obat deskripsi
                    ex : 'obat ini adalah obat flu yang diproduksi didaerah dan banyak disarankan oleh dokter2 terbaik '
                    ">{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="qty" class="block text-gray-700 font-bold mb-2">Jumlah Stock Obat</label>
                    <input type="text" name="qty" id="qty" class="border rounded-lg py-2 px-3 w-full @error('qty') border-red-500 @enderror" value="{{ old('qty') }}" placeholder="Enter Stock obat , ex : 100">

                    @error('qty')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="harga" class="block text-gray-700 font-bold mb-2">Harga</label>
                    <input type="text" name="harga" id="harga" class="border rounded-lg py-2 px-3 w-full @error('harga') border-red-500 @enderror" value="{{ old('harga') }}" placeholder="Enter Price obat , ex : 15000">

                    @error('harga')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-[#6A62C4] w-full flex justify-center text-white hover:bg-sky-700 p-1.5 ml-1.5 rounded-full">
                    Add obat
                </button>
            </form>
        </div>

        @else
        <!-- Add obat button -->
            <div class="flex justify-end mb-4 mt-5">
                <button type="button" onclick="toggleobatForm()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <a href="#obat-form"> + Add obat</a>
                </button>
            </div>
          <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="w-full">
              <thead class="bg-gray-200 text-gray-700">
                <tr>
                  <th class="py-3 px-4 text-left">Nama</th>
                  <th class="py-3 px-4 text-left">Jenis</th>
                  <th class="py-3 px-4 text-left"> Kategori</th>
                  <th class="py-3 px-4 text-left">harga</th>
                  <th class="py-3 px-4 text-left">stok</th>
                  <th class="py-3 px-4 text-left">gambar</th>
                  <th class="py-3 px-4 text-right">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($obats as $obat)
                  <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-gray-100' : 'bg-white' }}">
                    <td class="py-3 px-4">{{ $obat->nama }}</td>
                    <td class="py-3 px-4">{{ $obat->jenis }}</td>
                    <td class="py-3 px-4">{{ $obat->kategori }}</td>
                    <td class="py-3 px-4">{{ $obat->harga }}</td>
                    <td class="py-3 px-4">{{ $obat->qty }} pcs</td>
                    <td class="py-3 px-4"><img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{asset('upload/obat/'.$obat->photo)}}" alt=""/></td>
                    <td class="py-3 px-4 text-right">
                        <div class="badge badge-secondary"><a href="{{ route('obat.show', $obat->id) }}" class="text-white">Detail</a></div>
                      <a href="{{ route('obat.edit', $obat->id) }}" class="badge badge-accent text-white">Edit</a>
                      <form action="{{ route('delete.obat', $obat->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="badge badge-error text-white">Hapus</button>
                      </form>
                    </td>
                  </tr>

                @empty
                  <tr>
                    <td class="py-3 px-4 text-center" colspan="6">Tidak ada data obat yang ditemukan.</td>
                  </tr>

                @endforelse
              </tbody>
            </table>
          </div>

        @endif
    </div>
    <div id="obat-form" class="hidden">
        <form action="{{ route('store.obat') }}" class="pt-20" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="photo" class="block text-gray-700 font-bold mb-2">Image:</label>
                <input type="file" name="photo" id="photo" class="border rounded-lg py-2 px-3 w-full @error('photo') border-red-500 @enderror" value="{{ old('photo') }}">


                @error('photo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="nama" class="block text-gray-700 font-bold mb-2">obat Name:</label>
                <input type="text" name="nama" id="nama" class="border rounded-lg py-2 px-3 w-full @error('nama') border-red-500 @enderror" value="{{ old('nama') }}" placeholder="Enter obat nama , ex : obat Kimia Farma  Bandung ">

                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="jenis" class="block text-gray-700 font-bold mb-2">Jenis Obat:</label>
                <input type="text" name="jenis" id="jenis" class="border rounded-lg py-2 px-3 w-full @error('jenis') border-red-500 @enderror" value="{{ old('jenis') }}" placeholder="Enter obat jenis , ex : Antiseptik">

                @error('jenis')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="kategori" class="block text-gray-700 font-bold mb-2">Kategori Obat:</label>
                <input type="text" name="kategori" id="kategori" class="border rounded-lg py-2 px-3 w-full @error('kategori') border-red-500 @enderror" value="{{ old('kategori') }}" placeholder="Enter obat kategori , ex : Flu">

                @error('kategori')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-700 font-bold mb-2">Description:</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="border rounded-lg py-2 px-3 w-full @error('deskripsi') border-red-500 @enderror" placeholder="Enter obat deskripsi
                ex : 'obat ini adalah obat flu yang diproduksi didaerah dan banyak disarankan oleh dokter2 terbaik '
                ">{{ old('deskripsi') }}</textarea>

                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="qty" class="block text-gray-700 font-bold mb-2">Jumlah Stock Obat</label>
                <input type="text" name="qty" id="qty" class="border rounded-lg py-2 px-3 w-full @error('qty') border-red-500 @enderror" value="{{ old('qty') }}" placeholder="Enter Stock obat , ex : 100">

                @error('qty')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="harga" class="block text-gray-700 font-bold mb-2">Harga</label>
                <input type="text" name="harga" id="harga" class="border rounded-lg py-2 px-3 w-full @error('harga') border-red-500 @enderror" value="{{ old('harga') }}" placeholder="Enter Price obat , ex : 15000">

                @error('harga')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-[#6A62C4] w-full flex justify-center text-white hover:bg-sky-700 p-1.5 ml-1.5 rounded-full">
                Add obat
            </button>
        </form>
    </div>
</div>

<script>
    function toggleobatForm() {
        var form = document.getElementById('obat-form');
        if (form.classList.contains('hidden')) {
            form.classList.remove('hidden');
        } else {
            form.classList.add('hidden');
        }
    }
</script>
@endsection
