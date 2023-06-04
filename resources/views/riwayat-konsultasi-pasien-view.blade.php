@extends('layout.layout')

@section('content')
<div class="container my-12 mx-auto px-1 md:px-12 space-y-5">
    <h4 class="text-2xl font-bold dark:text-white">Riwayat Konsultasi</h4>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Dokter
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Spesialis
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pasien
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email Pasien
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Penyakit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Rekomendasi Obat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Saran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Rujukan RS
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($konsultasi as $row)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                    {{ $row->nama_dokter }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $row->spesialis }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $row->nama_pasien }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $row->email_pasien }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $row->penyakit }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $row->obat }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $row->saran }}
                    </td>
                    <td class="px-6 py-4">
                    @if($row->rujukan_rs == 0)
                    <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Tidak Disetujui</span>
                    @elseif($row->rujukan_rs == 1)
                    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Disetujui</span>
                    @endif
                    </td>
                </tr>
                @empty
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4" colspan="7" align="center">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
@endsection