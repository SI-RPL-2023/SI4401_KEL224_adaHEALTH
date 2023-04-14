@extends('layout.layout-admin')

@section('content')

     <!-- Main Content -->
    <div class="ml-48 p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex items-center justify-between mb-4">
            <div class="text-lg font-bold text-gray-800">Total Doctors</div>
            <div class="flex items-center justify-center h-10 w-10 bg-blue-600 rounded-md text-white font-semibold">
                32
            </div>
            </div>
            <div class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex items-center justify-between mb-4">
            <div class="text-lg font-bold text-gray-800">Total Hospitals</div>
            <div class="flex items-center justify-center h-10 w-10 bg-blue-600 rounded-md text-white font-semibold">
                12
            </div>
            </div>
            <div class="text-gray-600">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
        </div>
        <!-- Total Apotek -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="text-lg font-bold text-gray-800">Total Apotek</div>
                <svg class="h-6 w-6 text-gray-400 fill-current" viewBox="0 0 24 24">
                    <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M12 1C8.141 1 5 4.141 5 8c0 2.054.773 3.932 2.027 5.364l-.084.082 4.557 4.556a.5.5 0 00.707 0l4.557-4.556a7.472 7.472 0 002.027-5.364c0-3.859-3.141-7-7-7zm0 11.5c-1.93 0-3.5-1.57-3.5-3.5S10.07 5.5 12 5.5s3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"
                    />
                </svg>
            </div>
            <div class="text-5xl font-bold text-gray-800">24</div>
        </div>
        <!-- Total Obat -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="text-lg font-bold text-gray-800">Total Obat</div>
                <svg class="h-6 w-6 text-gray-400 fill-current" viewBox="0 0 24 24">
                    <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M20.364 4.636c1.172 1.172 1.828 2.734 1.828 4.364a7.472 7.472 0 01-2.027 5.364l-.084.082-4.557 4.556a.5.5 0 01-.707 0l-4.557-4.556a7.472 7.472 0 01-2.027-5.364c0-1.63.656-3.192 1.828-4.364l.082-.084 4.556-4.557a.5.5 0 01.707 0l4.557 4.557.083.082zm-1.414 1.414L12 4.414 5.05 11.364a5.472 5.472 0 001.474 7.393l.112.084 4.557 4.556a.5.5 0 00.707 0l4.557-4.556a5.472 5.472 0 001.474-7.393l-.083-.082z"
                    />
                </svg>
            </div>
            <div class="text-5xl font-bold text-gray-800">87</div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex items-center justify-between mb-4">
            <div class="text-lg font-bold text-gray-800">Total Doctors</div>
                <svg class="h-6 w-6 text-gray-400 fill-current" viewBox="0 0 24 24">
                    <path
                    d="M3 4v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1zm2 2h12v12H5V6z"
                    />
                </svg>
            </div>
            <div class="text-3xl font-bold text-gray-800">10</div>
        </div>
    </div>
    <!-- Main Content -->
    <div class="">
        <div class="">
        <div class="flex items-center justify-between mb-8">
            <div class="text-2xl font-bold text-gray-800">
            Welcome, Admin!
            </div>
            {{-- <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add New
            </button> --}}
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="text-xl font-bold text-gray-800">Total Hospital</div>
                <div class="flex items-center justify-center bg-gray-200 rounded-lg h-8 w-8">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-gray-500 h-6 w-6">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 3L4 8v10c0 1.1.9 2 2 2h12a2 2 0 002-2V8l-8-5zm6 13h-2v-2h2v2zm0-4h-2v-2h2v2zm0-4h-2V6h2v2z"/>
                </svg>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-800">135</div>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="text-xl font-bold text-gray-800">Total Apotek</div>
                <div class="flex items-center justify-center bg-gray-200 rounded-lg h-8 w-8">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-gray-500 h-6 w-6">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm-8 12h-4v-4h4v4zm4 0h-4v-4h4v4zm2-8h-8V6h8v2z"/>
                </svg>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-800">78</div>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-xl font-bold text-gray-800">Total Users</div>
                        <div class="flex items-center justify-center bg-gray-200 rounded-lg h-8 w-8">
                            <svg xmlns="http://www.w3.org-2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-current text-gray-600">
                                <path d="M21 17c0 .9-.7 1.7-1.7 1.7h-3.3c-.9 0-1.7-.7-1.7-1.7v-2.1c0-2.7-2.2-4.9-4.9-4.9h-1.6c-2.7 0-4.9 2.2-4.9 4.9v2.1c0 .9-.7 1.7-1.7 1.7H3.7c-.9 0-1.7-.7-1.7-1.7v-2.1c0-4.5 3.7-8.2 8.2-8.2h1.6c4.5 0 8.2 3.7 8.2 8.2v2.1z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="text-4xl font-bold text-gray-800">782</div>
                </div>
            </div>
            <div class="flex items-center justify-between mb-8 mt-5">
                <div class="text-2xl font-bold text-gray-800">
                Total Hospitals
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md p-8">
                <div class="flex items-center justify-between mb-8">
                <div class="flex items-center">
                    <div class="rounded-full bg-red-500 h-12 w-12 flex items-center justify-center mr-4">
                    <i class="fas fa-hospital text-white text-2xl"></i>
                    </div>
                    <div>
                    <div class="text-xl font-bold text-gray-800">
                        Total Hospitals
                    </div>
                    <div class="text-lg font-medium text-gray-500">
                        50
                    </div>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="rounded-full bg-green-500 h-12 w-12 flex items-center justify-center mr-4">
                    <i class="fas fa-arrow-up text-white text-2xl"></i>
                    </div>
                    <div>
                    <div class="text-xl font-bold text-gray-800">
                        Increased by
                    </div>
                    <div class="text-lg font-medium text-gray-500">
                    30 from last week
                    </div>
                    </div>
                </div>
                </div>
                <div class="border-t border-gray-200 pt-6">
                <div class="flex justify-between">
                    <div class="flex items-center">
                    <div class="rounded-full bg-yellow-500 h-12 w-12 flex items-center justify-center mr-4">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <div>
                        <div class="text-xl font-bold text-gray-800">
                        Total Users
                        </div>
                        <div class="text-lg font-medium text-gray-500">
                        100
                        </div>
                    </div>
                    </div>
                    <div class="flex items-center">
                    <div class="rounded-full bg-green-500 h-12 w-12 flex items-center justify-center mr-4">
                        <i class="fas fa-arrow-up text-white text-2xl"></i>
                    </div>
                    <div>
                        <div class="text-xl font-bold text-gray-800">
                        Increased by
                        </div>
                        <div class="text-lg font-medium text-gray-500">
                        20 from last week
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
