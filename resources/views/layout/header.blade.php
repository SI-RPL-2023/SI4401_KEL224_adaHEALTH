<!-- Header -->
<div class="bg-[#6A62C4] shadow-md p-4 flex items-center justify-between">
    <div class="text-white font-bold text-xl">Ada Health</div>
    <div class="flex items-center">
      <div class="mr-2 text-white">Hello, Admin</div>
      <button class="bg-white text-blue-600 hover:bg-blue-100 font-bold py-2 px-4 rounded">
        Logout
      </button>
    </div>
</div>

  <!-- Sidebar -->
  <div class="bg-gray-800 text-gray-100 w-48 py-7 px-2 fixed left-0 top-0 h-full">
    <a href="{{ url('/dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-gray-100">
      Dashboard
    </a>
    <a href="{{ route('add.hospital') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-gray-100">
      Add Hospital
    </a>
    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-gray-100">
      Add Apotek
    </a>
    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-gray-100">
      Add Obat
    </a>
    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-gray-100">
      Add User
    </a>
    <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-gray-100">
      Add Dokter
    </a>
  </div>
