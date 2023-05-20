<!-- Header -->
{{-- <div class="bg-[#6A62C4] shadow-md p-4 flex items-center justify-between"> --}}
    {{-- <div class="text-white font-bold text-xl ml-48">Ada Health</div> --}}
    {{-- <button class="btn btn-square btn-ghost ml-48">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
    </button> --}}
    {{-- <div class="flex items-center">
      <div class="mr-2 text-white">Hello, {{ Auth::user()->email }}</div>
      <button class="bg-white text-blue-600 hover:bg-blue-100 font-bold py-2 px-4 rounded">
       <a href="{{ route('logout') }}">Logout</a>
      </button>
    </div> --}}
{{-- </div> --}}

<!-- Sidebar -->
<ul class="menu bg-[#6266F4] text-white w-15 max-h-full p-2 rounded-r-lg fixed" style="position: fixed; top: 0; left: 0; bottom: 0;">
    <div class="relative h-full flex flex-col justify-center items-center">
        <div class=" h-full flex flex-col justify-start items-start">
            <li class="flex justify-center">
                <a href="" class="flex items-center justify-center tooltip tooltip-right tooltip-primary text-red" data-tip="Tutup Menu">
                    <label class=" swap swap-rotate">

                        <!-- this hidden checkbox controls the state -->
                        <input type="checkbox" />

                        <!-- hamburger icon -->
                        <svg class="swap-off fill-current" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 512 512"><path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z"/></svg>

                        <!-- close icon -->
                        <svg class="swap-on fill-current" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 512 512"><polygon points="400 145.49 366.51 112 256 222.51 145.49 112 112 145.49 222.51 256 112 366.51 145.49 400 256 289.49 366.51 400 400 366.51 289.49 256 400 145.49"/></svg>

                      </label>
                </a>
            </li>
        </div>
        <li class="flex justify-center">
            <a href="{{ url('/dashboard') }}" class="flex items-center justify-center tooltip tooltip-right tooltip-primary text-red" data-tip="Ini Dashboard">
                <span class="mdi mdi-view-dashboard" ></span>
            </a>
        </li>
        <li class="flex justify-center">
            <a href="{{ route('add.hospital') }}" class="flex items-center justify-center tooltip tooltip-right tooltip-primary text-red" data-tip="Tambah Rumah Sakit">
                <span class="mdi mdi-hospital-building"></span>
            </a>
        </li>
        <li class="flex justify-center">
            <a href="{{ route('add.apotek') }}" class="flex items-center justify-center tooltip tooltip-right tooltip-primary text-red" data-tip="Tambah Apotek">

                <span class="mdi mdi-store-plus"></span>
            </a>
        </li>
        <li class="flex justify-center">
            <a href="{{ route('add.obat') }}" class="flex items-center justify-center tooltip tooltip-right tooltip-primary text-red" data-tip="Tambah Obat">
                <span class="mdi mdi-pill-multiple"></span>
            </a>
        </li>
        <li class="flex justify-center">
            <a href="{{ url('/dokter') }}" class="flex items-center justify-center tooltip tooltip-right tooltip-primary text-red" data-tip="Tambah Dokter">
                <span class="mdi mdi-doctor"></span>
            </a>
        </li>
        <div class="relative h-full flex flex-col justify-end items-end">
            <li class="flex justify-center">
                <a href="{{ url('/logout') }}" class="flex items-center justify-center tooltip tooltip-right tooltip-primary text-red" data-tip="Logout">
                    <span class="mdi mdi-logout"></span>
                </a>
            </li>

        </div>
    </div>
</ul>




{{-- <div class="drawer drawer-mobile fixed active " >
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle"/>
    <div class="drawer-content flex flex-col items-center justify-center">
      <!-- Page content here -->
      <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">Open drawer</label>

    </div>
    <div class="drawer-side place-items-center">
      <label for="my-drawer-2" class="drawer-overlay"></label>
      <ul class="menu p-4 w-15 bg-[#6266F4] text-white place-items-center">
        <!-- Sidebar content here -->
        <li style="background-color: rgba(0, 0, 0, 0.2);border-radius:0.5rem">
            <a class="tooltip tooltip-right tooltip-primary text-red" data-tip="Ini Dashboard">
                <span class="mdi mdi-view-dashboard"></span>
            </a>
        </li>
        <li><a><span class="mdi mdi-view-dashboard"></span></a></li>
      </ul>

    </div>
</div> --}}



{{-- <div class="bg-gray-800 text-gray-100 w-48 py-7 px-2 fixed left-0 top-0 h-full hidden ">

    <a href="{{ url('/dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-gray-100">
      Dashboard
    </a>
    <a href="{{ route('add.hospital') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-gray-100">
      Add Hospital
    </a>
    <a href="{{ route('add.apotek') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-gray-100">
      Add Apotek
    </a>
    <a href="{{ route('add.obat') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-gray-100">
      Add Obat
    </a>
    <a href="{{ url('/dokter') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-gray-100">
      Add Dokter
    </a>
    <a href="{{ url('/transaksi') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-gray-100">
      Transaksi
    </a>
</div> --}}

  <script>
    // Ambil elemen tombol dan sidebar
    const button = document.querySelector('.btn');
    const sidebar = document.querySelector('.drawer');

    // Tambahkan event listener untuk tombol
    button.addEventListener('click', function() {
      if (sidebar.classList.contains('hidden')) {
        sidebar.classList.remove('hidden'); // Hapus kelas 'hidden' untuk menampilkan sidebar
        button.classList.add('active'); // Tambahkan kelas 'active' pada tombol
      } else {
        sidebar.classList.add('hidden'); // Tambahkan kelas 'hidden' untuk menyembunyikan sidebar
        button.classList.remove('active'); // Hapus kelas 'active' pada tombol
      }
    });
  </script>
