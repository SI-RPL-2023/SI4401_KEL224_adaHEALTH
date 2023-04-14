@extends('layout.layout-admin')

@section('content')
<!-- Header -->
<div class="bg-[#6A62C4] shadow-lg p-4">
    <div class="flex items-center justify-between">
      <div class="text-lg font-bold text-white">Ada Health</div>
      <div class="flex items-center">
        <div class="mr-2">Hello, Admin</div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          Logout
        </button>
      </div>
    </div>
  </div>

  <!-- Sidebar -->
    <div class="bg-gray-800 text-gray-100 w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
        <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-gray-100">
        Dashboard
        </a>
        <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-gray-100">
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
@endsection
