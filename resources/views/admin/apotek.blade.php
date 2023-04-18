@extends('layout.layout-admin')

@section('content')

<div class="flex justify-between items-center mt-6">
    <h1 class="text-2xl font-bold text-gray-800 ml-60">Add apotek</h1>
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
                Add Apotek
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
    <div class="container mx-auto mt-8">
        @if (count($apoteks) == 0)
          <p class="text-gray-700 text-center">Data Apotek kosong, silahkan tambahkan</p>
          <div class="flex justify-center mt-5">
            <button type="button" onclick="toggleApotekForm()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                + Add Apotek
            </button>
          </div>

        @else
          <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="w-full">
              <thead class="bg-gray-200 text-gray-700">
                <tr>
                  <th class="py-3 px-4 text-left">Nama</th>
                  <th class="py-3 px-4 text-left">Deskripsi</th>
                  <th class="py-3 px-4 text-left">Nomor Telepon</th>
                  <th class="py-3 px-4 text-left">Alamat</th>
                  <th class="py-3 px-4 text-left">Gambar</th>
                  <th class="py-3 px-4 text-right">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($apoteks as $apotek)
                  <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-gray-100' : 'bg-white' }}">
                    <td class="py-3 px-4">{{ $apotek->name }}</td>
                    <td class="py-3 px-4">{{ $apotek->description }}</td>
                    <td class="py-3 px-4">{{ $apotek->phone_number }}</td>
                    <td class="py-3 px-4">{{ $apotek->address }}</td>
                    <td class="py-3 px-4"><img src="{{ url('images/'.$apotek->images) }}" alt="{{ $apotek->name }}" class="w-20 rounded-lg"></td>
                    <td class="py-3 px-4 text-right">
                      <a href="{{ route('edit.apotek', $apotek->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                      <form action="#" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                      </form>
                    </td>
                  </tr>

                @empty
                  <tr>
                    <td class="py-3 px-4 text-center" colspan="6">Tidak ada data rumah sakit yang ditemukan.</td>
                  </tr>

                @endforelse
              </tbody>
            </table>
          </div>
        <!-- Add apotek button -->
        <div class="flex justify-end mb-4 mt-5">
            <button type="button" onclick="toggleApotekForm()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                + Add apotek
            </button>
        </div>
        @endif
    </div>
    <div id="apotek-form" class="hidden">
        <form action="{{ route('store.apotek') }}" class="pt-20" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="images" class="block text-gray-700 font-bold mb-2">Image:</label>
                <input type="file" name="images" id="images" class="border rounded-lg py-2 px-3 w-full @error('images') border-red-500 @enderror" value="{{ old('images') }}">


                @error('images')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">apotek Name:</label>
                <input type="text" name="name" id="name" class="border rounded-lg py-2 px-3 w-full @error('name') border-red-500 @enderror" value="{{ old('name') }}" placeholder="Enter apotek name">

                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                <textarea name="description" id="description" cols="30" rows="10" class="border rounded-lg py-2 px-3 w-full @error('description') border-red-500 @enderror" placeholder="Enter apotek description">{{ old('description') }}</textarea>

                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone_number" class="block text-gray-700 font-bold mb-2">Phone Number:</label>
                <input type="text" name="phone_number" id="phone_number" class="border rounded-lg py-2 px-3 w-full @error('phone_number') border-red-500 @enderror" value="{{ old('phone_number') }}" placeholder="Enter apotek phone number">

                @error('phone_number')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="address" class="block text-gray-700 font-bold mb-2">Address:</label>
                <textarea name="address" id="address" cols="30" rows="10" class="border rounded-lg py-2 px-3 w-full @error('address') border-red-500 @enderror" placeholder="Enter apotek address">{{ old('address') }}</textarea>

                @error('address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-[#6A62C4] w-full flex justify-center text-white hover:bg-sky-700 p-1.5 ml-1.5 rounded-full">
                Add apotek
            </button>
        </form>
    </div>
</div>
<script>
    function toggleApotekForm() {
        var form = document.getElementById('apotek-form');
        if (form.classList.contains('hidden')) {
            form.classList.remove('hidden');
        } else {
            form.classList.add('hidden');
        }
    }
</script>
@endsection
