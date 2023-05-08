@extends('layout.layout-admin')

@section('content')

<div class="flex justify-between items-center mt-6">
    <h1 class="text-2xl font-bold text-gray-800 ml-60">Add Hospital</h1>
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
                Add Hospital
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
        @if (count($hospitals) == 0)
          <p class="text-gray-700 text-center">Data rumah sakit kosong, silahkan tambahkan</p>
        <div id="hospital-form">
            <form action="{{ route('store.hospital') }}" class="pt-20" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="images" class="block text-gray-700 font-bold mb-2">Image:</label>
                    <input type="file" name="images" id="images" class="border rounded-lg py-2 px-3 w-full @error('images') border-red-500 @enderror" value="{{ old('images') }}">


                    @error('images')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Hospital Name:</label>
                    <input type="text" name="name" id="name" class="border rounded-lg py-2 px-3 w-full @error('name') border-red-500 @enderror" value="{{ old('name') }}" placeholder="Enter hospital name , ex : Rumah Sakit Umum Daerah Bandung ">

                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="border rounded-lg py-2 px-3 w-full @error('description') border-red-500 @enderror" placeholder="Enter hospital description
                    ex : 'Rumah sakit ini adalah rumah sakit terbesar se Bandung Raya '
                    ">{{ old('description') }}</textarea>

                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="phone_number" class="block text-gray-700 font-bold mb-2">Phone Number:</label>
                    <input type="text" name="phone_number" id="phone_number" class="border rounded-lg py-2 px-3 w-full @error('phone_number') border-red-500 @enderror" value="{{ old('phone_number') }}" placeholder="Enter hospital phone number">

                    @error('phone_number')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="provinsi" class="block text-gray-700 font-bold mb-2">Pilih Provinsi Rumah Sakit:</label>
                    <select name="provinsi" id="provinsi" class="border-gray-400 border rounded-md px-4 py-2 mt-2">
                        <option value="">Pilih Provinsi</option>
                        <option value="Aceh">Aceh</option>
                        <option value="Bali">Bali</option>
                        <option value="Bangka Belitung">Bangka Belitung</option>
                        <option value="Banten">Banten</option>
                        <option value="Bengkulu">Bengkulu</option>
                        <option value="DI Yogyakarta">DI Yogyakarta</option>
                        <option value="DKI Jakarta">DKI Jakarta</option>
                        <option value="Gorontalo">Gorontalo</option>
                        <option value="Jambi">Jambi</option>
                        <option value="Jawa Barat">Jawa Barat</option>
                        <option value="Jawa Tengah">Jawa Tengah</option>
                        <option value="Jawa Timur">Jawa Timur</option>
                        <option value="Kalimantan Barat">Kalimantan Barat</option>
                        <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                        <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                        <option value="Kalimantan Timur">Kalimantan Timur</option>
                        <option value="Kalimantan Utara">Kalimantan Utara</option>
                        <option value="Kepulauan Riau">Kepulauan Riau</option>
                        <option value="Lampung">Lampung</option>
                        <option value="Maluku">Maluku</option>
                        <option value="Maluku Utara">Maluku Utara</option>
                        <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                        <option value="Papua">Papua</option>
                        <option value="Papua Barat">Papua Barat</option>
                        <option value="Riau">Riau</option>
                        <option value="Sulawesi Barat">Sulawesi Barat</option>
                        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                        <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                        <option value="Sulawesi Utara">Sulawesi Utara</option>
                        <option value="Sumatera Barat">Sumatera Barat</option>
                        <option value="Sumatera Selatan">Sumatera Selatan</option>
                        <option value="Sumatera Utara">Sumatera Utara</option>
                    </select>

                    @error('provinsi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <label for="kota" class="block text-gray-700 font-bold mb-2">Pilih Kota Rumah Sakit:</label>
                    <select name="kota" id="kota" disabled class="border-gray-400 border rounded-md px-4 py-2 mt-2">
                        <option value="">Pilih Kota</option>
                    </select>
                    @error('kota')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <script>
                        const kotaSelect = document.getElementById('kota');
                        const propinsiSelect = document.getElementById('provinsi');

                        const kota = {
                            'Aceh': ['Baitussalam', 'Banda Aceh', 'Lhokseumawe', 'Meulaboh', 'Sigli'],
                            'Sumatera Utara': ['Binjai', 'Medan', 'Pematang Siantar', 'Tanjung Balai'],
                            'Sumatera Barat': ['Bukittinggi', 'Padang', 'Pariaman', 'Payakumbuh', 'Sawahlunto'],
                            'Riau': ['Dumai', 'Pekanbaru', 'Siak'],
                            'Kepulauan Riau': ['Batam', 'Tanjung Pinang'],
                            'Jambi': ['Jambi', 'Sungai Penuh'],
                            'Bengkulu': ['Bengkulu', 'Mukomuko', 'Rejang Lebong'],
                            'Sumatera Selatan': ['Lahat', 'Lubuk Linggau', 'Palembang', 'Prabumulih'],
                            'Bangka Belitung': ['Bangka', 'Belitung', 'Pangkal Pinang'],
                            'Lampung': ['Bandar Lampung', 'Kotabumi', 'Liwa', 'Metro'],
                            'Banten': ['Cilegon', 'Serang', 'Tangerang', 'Tigaraksa'],
                            'DKI Jakarta': ['Jakarta Barat', 'Jakarta Pusat', 'Jakarta Selatan', 'Jakarta Timur', 'Kepulauan Seribu'],
                            'Jawa Barat': ['Bandung', 'Cimahi', 'Garut', 'Tasikmalaya'],
                            'Jawa Tengah': ['Semarang', 'Solo', 'Yogyakarta', 'Magelang'],
                            'DI Yogyakarta': ['Bantul', 'Gunung Kidul', 'Kulon Progo', 'Sleman', 'Yogyakarta'],
                            'Jawa Timur': ['Banyuwangi', 'Blitar', 'Gresik', 'Kediri', 'Madiun', 'Malang', 'Mojokerto', 'Probolinggo', 'Sidoarjo', 'Surabaya'],
                            'Bali': ['Denpasar', 'Gianyar', 'Singaraja', 'Tabanan'],
                            'Nusa Tenggara Barat': ['Bima', 'Mataram', 'Sumbawa Besar', 'Taliwang'],
                            'Nusa Tenggara Timur': ['Ende', 'Kupang', 'Maumere', 'Ruteng'],
                            'Kalimantan Barat': ['Ketapang', 'Pontianak', 'Singkawang'],
                            'Kalimantan Tengah': ['Palangka Raya', 'Sampit', 'Tanjung Puting'],
                            'Kalimantan Selatan': ['Banjarbaru', 'Banjarmasin', 'Martapura'],
                            'Kalimantan Timur': ['Bontang', 'Samarinda', 'Tenggarong'],
                            'Kalimantan Utara': ['Bulungan', 'Tarakan'],
                            'Sulawesi Utara': ['Bitung', 'Manado', 'Tomohon'],
                            'Gorontalo': ['Gorontalo', 'Limboro'],
                            'Sulawesi Tengah': ['Donggala', 'Palu', 'Parigi Moutong'],
                            'Sulawesi Barat': ['Majene', 'Mamuju'],
                            'Sulawesi Selatan': ['Makassar', 'Palopo', 'Parepare'],
                            'Sulawesi Tenggara': ['Bau-Bau', 'Kendari', 'Raha'],
                            'Maluku': ['Ambon', 'Tual'],
                            'Maluku Utara': ['Ternate', 'Tidore Kepulauan'],
                            'Papua Barat': ['Fakfak', 'Manokwari', 'Sorong'],
                            'Papua': ['Jayapura', 'Merauke', 'Timika']


                            // tambahkan daftar kecamatan lainnya
                        };

                        propinsiSelect.addEventListener('change', function() {
                            const selectedPropinsi = propinsiSelect.value;
                            if (selectedPropinsi) {
                                kotaSelect.disabled = false;
                                kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                                kota[selectedPropinsi].forEach(function(item) {
                                    const option = document.createElement('option');
                                    option.value = item;
                                    option.text = item;
                                    kotaSelect.add(option);
                                });
                            } else {
                                kotaSelect.disabled = true;
                                kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                            }
                        });

                    </script>

                    <label class="block">
                        <label for="kode_pos" class="block text-gray-700 font-bold mb-2">Kode Pos:</label>

                        <input type="text" name="kode_pos" class="border rounded-lg py-2 px-3 w-full @error('kode_pos') border-red-500 @enderror" value="{{ old('kode_pos') }}">
                    </label>
                    @error('kode_pos')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <label class="block">
                        <label for="alamat_lengkap" class="block text-gray-700 font-bold mb-2">Alamat lengkap:</label>
                        <textarea name="jalan" id="jalan" cols="30" rows="10" class="border rounded-lg py-2 px-3 w-full @error('jalan') border-red-500 @enderror" placeholder="Enter hospital jalan Ex: Jalan BojongSoang Raya no.41">{{ old('description') }}</textarea>
                    </label>
                    @error('jalan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-[#6A62C4] w-full flex justify-center text-white hover:bg-sky-700 p-1.5 ml-1.5 rounded-full">
                    Add Hospital
                </button>
            </form>
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
                @forelse ($hospitals as $hospital)
                  <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-gray-100' : 'bg-white' }}">
                    <td class="py-3 px-4">{{ $hospital->name }}</td>
                    <td class="py-3 px-4">{{ $hospital->description }}</td>
                    <td class="py-3 px-4">{{ $hospital->phone_number }}</td>
                    <td class="py-3 px-4">{{ $hospital->alamat_lengkap }}</td>
                    <td class="py-3 px-4"><img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{asset('upload/hospital/'.$hospital->images)}}" alt=""/></td>
                    <td class="py-3 px-4 text-right">
                        <div class="badge badge-secondary"><a href="{{ route('hospital.show', $hospital->id) }}" class="text-white">Detail</a></div>
                        <div class="badge badge-accent"><a href="{{ route('hospital.edit', $hospital->id) }}" class="text-white">Edit</a></div>
                      <form action="{{ route('delete.hospital', $hospital->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="badge badge-error text-white">Hapus</button>
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
        <!-- Add hospital button -->
        <div class="flex justify-end mb-4 mt-5">
            <button type="button" onclick="toggleHospitalForm()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                + Add Hospital
            </button>
        </div>
        @endif
    </div>
    <div id="hospital-form" class="hidden">
        <form action="{{ route('store.hospital') }}" class="pt-20" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="images" class="block text-gray-700 font-bold mb-2">Image:</label>
                <input type="file" name="images" id="images" class="border rounded-lg py-2 px-3 w-full @error('images') border-red-500 @enderror" value="{{ old('images') }}">


                @error('images')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Hospital Name:</label>
                <input type="text" name="name" id="name" class="border rounded-lg py-2 px-3 w-full @error('name') border-red-500 @enderror" value="{{ old('name') }}" placeholder="Enter hospital name , ex : Rumah Sakit Umum Daerah Bandung ">

                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                <textarea name="description" id="description" cols="30" rows="10" class="border rounded-lg py-2 px-3 w-full @error('description') border-red-500 @enderror" placeholder="Enter hospital description
                ex : 'Rumah sakit ini adalah rumah sakit terbesar se Bandung Raya '
                ">{{ old('description') }}</textarea>

                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="phone_number" class="block text-gray-700 font-bold mb-2">Phone Number:</label>
                <input type="text" name="phone_number" id="phone_number" class="border rounded-lg py-2 px-3 w-full @error('phone_number') border-red-500 @enderror" value="{{ old('phone_number') }}" placeholder="Enter hospital phone number">

                @error('phone_number')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="provinsi" class="block text-gray-700 font-bold mb-2">Pilih Provinsi Rumah Sakit:</label>
                <select name="provinsi" id="provinsi" class="border-gray-400 border rounded-md px-4 py-2 mt-2">
                    <option value="">Pilih Provinsi</option>
                    <option value="Aceh">Aceh</option>
                    <option value="Bali">Bali</option>
                    <option value="Bangka Belitung">Bangka Belitung</option>
                    <option value="Banten">Banten</option>
                    <option value="Bengkulu">Bengkulu</option>
                    <option value="DI Yogyakarta">DI Yogyakarta</option>
                    <option value="DKI Jakarta">DKI Jakarta</option>
                    <option value="Gorontalo">Gorontalo</option>
                    <option value="Jambi">Jambi</option>
                    <option value="Jawa Barat">Jawa Barat</option>
                    <option value="Jawa Tengah">Jawa Tengah</option>
                    <option value="Jawa Timur">Jawa Timur</option>
                    <option value="Kalimantan Barat">Kalimantan Barat</option>
                    <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                    <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                    <option value="Kalimantan Timur">Kalimantan Timur</option>
                    <option value="Kalimantan Utara">Kalimantan Utara</option>
                    <option value="Kepulauan Riau">Kepulauan Riau</option>
                    <option value="Lampung">Lampung</option>
                    <option value="Maluku">Maluku</option>
                    <option value="Maluku Utara">Maluku Utara</option>
                    <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                    <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                    <option value="Papua">Papua</option>
                    <option value="Papua Barat">Papua Barat</option>
                    <option value="Riau">Riau</option>
                    <option value="Sulawesi Barat">Sulawesi Barat</option>
                    <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                    <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                    <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                    <option value="Sulawesi Utara">Sulawesi Utara</option>
                    <option value="Sumatera Barat">Sumatera Barat</option>
                    <option value="Sumatera Selatan">Sumatera Selatan</option>
                    <option value="Sumatera Utara">Sumatera Utara</option>
                </select>

                @error('provinsi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                <label for="kota" class="block text-gray-700 font-bold mb-2">Pilih Kota Rumah Sakit:</label>
                <select name="kota" id="kota" disabled class="border-gray-400 border rounded-md px-4 py-2 mt-2">
                    <option value="">Pilih Kota</option>
                </select>
                @error('kota')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                <script>
                    const kotaSelect = document.getElementById('kota');
                    const propinsiSelect = document.getElementById('provinsi');

                    const kota = {
                        'Aceh': ['Baitussalam', 'Banda Aceh', 'Lhokseumawe', 'Meulaboh', 'Sigli'],
                        'Sumatera Utara': ['Binjai', 'Medan', 'Pematang Siantar', 'Tanjung Balai'],
                        'Sumatera Barat': ['Bukittinggi', 'Padang', 'Pariaman', 'Payakumbuh', 'Sawahlunto'],
                        'Riau': ['Dumai', 'Pekanbaru', 'Siak'],
                        'Kepulauan Riau': ['Batam', 'Tanjung Pinang'],
                        'Jambi': ['Jambi', 'Sungai Penuh'],
                        'Bengkulu': ['Bengkulu', 'Mukomuko', 'Rejang Lebong'],
                        'Sumatera Selatan': ['Lahat', 'Lubuk Linggau', 'Palembang', 'Prabumulih'],
                        'Bangka Belitung': ['Bangka', 'Belitung', 'Pangkal Pinang'],
                        'Lampung': ['Bandar Lampung', 'Kotabumi', 'Liwa', 'Metro'],
                        'Banten': ['Cilegon', 'Serang', 'Tangerang', 'Tigaraksa'],
                        'DKI Jakarta': ['Jakarta Barat', 'Jakarta Pusat', 'Jakarta Selatan', 'Jakarta Timur', 'Kepulauan Seribu'],
                        'Jawa Barat': ['Bandung', 'Cimahi', 'Garut', 'Tasikmalaya'],
                        'Jawa Tengah': ['Semarang', 'Solo', 'Yogyakarta', 'Magelang'],
                        'DI Yogyakarta': ['Bantul', 'Gunung Kidul', 'Kulon Progo', 'Sleman', 'Yogyakarta'],
                        'Jawa Timur': ['Banyuwangi', 'Blitar', 'Gresik', 'Kediri', 'Madiun', 'Malang', 'Mojokerto', 'Probolinggo', 'Sidoarjo', 'Surabaya'],
                        'Bali': ['Denpasar', 'Gianyar', 'Singaraja', 'Tabanan'],
                        'Nusa Tenggara Barat': ['Bima', 'Mataram', 'Sumbawa Besar', 'Taliwang'],
                        'Nusa Tenggara Timur': ['Ende', 'Kupang', 'Maumere', 'Ruteng'],
                        'Kalimantan Barat': ['Ketapang', 'Pontianak', 'Singkawang'],
                        'Kalimantan Tengah': ['Palangka Raya', 'Sampit', 'Tanjung Puting'],
                        'Kalimantan Selatan': ['Banjarbaru', 'Banjarmasin', 'Martapura'],
                        'Kalimantan Timur': ['Bontang', 'Samarinda', 'Tenggarong'],
                        'Kalimantan Utara': ['Bulungan', 'Tarakan'],
                        'Sulawesi Utara': ['Bitung', 'Manado', 'Tomohon'],
                        'Gorontalo': ['Gorontalo', 'Limboro'],
                        'Sulawesi Tengah': ['Donggala', 'Palu', 'Parigi Moutong'],
                        'Sulawesi Barat': ['Majene', 'Mamuju'],
                        'Sulawesi Selatan': ['Makassar', 'Palopo', 'Parepare'],
                        'Sulawesi Tenggara': ['Bau-Bau', 'Kendari', 'Raha'],
                        'Maluku': ['Ambon', 'Tual'],
                        'Maluku Utara': ['Ternate', 'Tidore Kepulauan'],
                        'Papua Barat': ['Fakfak', 'Manokwari', 'Sorong'],
                        'Papua': ['Jayapura', 'Merauke', 'Timika']


                        // tambahkan daftar kecamatan lainnya
                    };

                    propinsiSelect.addEventListener('change', function() {
                        const selectedPropinsi = propinsiSelect.value;
                        if (selectedPropinsi) {
                            kotaSelect.disabled = false;
                            kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                            kota[selectedPropinsi].forEach(function(item) {
                                const option = document.createElement('option');
                                option.value = item;
                                option.text = item;
                                kotaSelect.add(option);
                            });
                        } else {
                            kotaSelect.disabled = true;
                            kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                        }
                    });

                </script>

                <label class="block">
                    <label for="kode_pos" class="block text-gray-700 font-bold mb-2">Kode Pos:</label>

                    <input type="text" name="kode_pos" class="border rounded-lg py-2 px-3 w-full @error('kode_pos') border-red-500 @enderror" value="{{ old('kode_pos') }}">
                </label>
                @error('kode_pos')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <label class="block">
                    <label for="alamat_lengkap" class="block text-gray-700 font-bold mb-2">Alamat lengkap:</label>
                    <textarea name="jalan" id="jalan" cols="30" rows="10" class="border rounded-lg py-2 px-3 w-full @error('jalan') border-red-500 @enderror" placeholder="Enter hospital jalan Ex: Jalan BojongSoang Raya no.41">{{ old('description') }}</textarea>
                </label>
                @error('jalan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-[#6A62C4] w-full flex justify-center text-white hover:bg-sky-700 p-1.5 ml-1.5 rounded-full">
                Add Hospital
            </button>
        </form>
    </div>
</div>
<script>
    function toggleHospitalForm() {
        var form = document.getElementById('hospital-form');
        if (form.classList.contains('hidden')) {
            form.classList.remove('hidden');
        } else {
            form.classList.add('hidden');
        }
    }
</script>
@endsection
