<!-- Header -->
<div class="bg-[#6A62C4] shadow-md p-4 flex items-center justify-between">
    {{-- <div class="text-white font-bold text-xl ml-48">Ada Health</div> --}}
    <button class="btn btn-square btn-ghost ml-48">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
    </button>
    <div class="flex items-center">
      <div class="mr-2 text-white">Hello, {{ Auth::user()->email }}</div>
      <button class="bg-white text-blue-600 hover:bg-blue-100 font-bold py-2 px-4 rounded">
       <a href="{{ route('logout') }}">Logout</a>
      </button>
    </div>
</div>

<!-- Sidebar -->
<div class="bg-gray-800 text-gray-100 w-48 py-7 px-2 fixed left-0 top-0 h-full hidden">

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
    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-gray-100">
      Add User
    </a>
    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-gray-100">
      Add Dokter
    </a>
  </div>

  <script>
    // Ambil elemen tombol dan sidebar
    const button = document.querySelector('.btn');
    const sidebar = document.querySelector('.bg-gray-800');

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
