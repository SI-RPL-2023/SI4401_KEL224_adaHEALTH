@extends('layout.layout-admin')

@section('content')
<div class="ml-48 p-8">
    <div class="bg-[#6A62C4] rounded-full w-100 inline-block align-middle p-2">
        <span class="text-1xl font-semibold text-white">Dashboard</span>
    </div>
</div>

  
<div class="flex flex-row ml-48 p-8">
    <div class="basis-5/6">
        <div class="bg-gradient w-full min-h-min p-10 rounded-3xl mt-5 mb-5">
            <div class="flex justify-between items-center">
                <div class="relative">
                    <h1 class="text-lg font-semibold">Histori Pembelian Obat</h1>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path d="M9 11l3 3l3-3l1.41 1.41L10 16.83l-4.41-4.42L6 11l3 3z" />
                    </svg>
                  </div>
                </div>
                <div>
                    <a href="{{ url('dashboard')}}" class="btn btn-active btn-ghost text-white">All</a>
                    <a href="{{ route('dashboard.report', ['selectedDate' => 'Bulan Sekarang']) }}" class="btn btn-active btn-ghost text-white">Bulan Sekarang</a>
                    <a href="{{ route('dashboard.report', ['selectedDate' => 'Bulan Kemarin']) }}" class="btn btn-active btn-ghost text-white">Bulan Kemarin</a>
                </div>
            </div>
            <p class="text-6xl font-serif mt-6 mb-6">
                @if(isset(  $data['total_transaksiObat'] ))
                {{ $data['total_transaksiObat'] }}
                @else
                
                @endif

                @if(isset(  $total_transaksiObat ))
                    {{ $total_transaksiObat  }}
                @else
                0
                @endif
            </p>
            <div class="flex flex-row mt-10">
                <div class="basis-1/4 md:basis-1/3">
                    <div class="bg-white rounded-lg shadow-md p-10">
                        <div class="flex items-center">
                            <div class="bg-[#6A62C4] text-white font-bold rounded-full p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><title>account-convert</title>
                                    <path d="M12 0L11.34 .03L15.15 3.84L16.5 2.5C19.75 4.07 22.09 7.24 22.45 11H23.95C23.44 4.84 18.29 0 12 0M12 4C10.07 4 8.5 5.57 8.5 7.5C8.5 9.43 10.07 11 12 11C13.93 11 15.5 9.43 15.5 7.5C15.5 5.57 13.93 4 12 4M.05 13C.56 19.16 5.71 24 12 24L12.66 23.97L8.85 20.16L7.5 21.5C4.25 19.94 1.91 16.76 1.55 13H.05M12 13C8.13 13 5 14.57 5 16.5V18H19V16.5C19 14.57 15.87 13 12 13Z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h6 class="text-gray-500 font-semibold">Pasien Baru </h6>
                                @if(isset($data['total_pasien_baru'])  > 0)
                                    <h6 class="font-extrabold mb-0">{{$data['total_pasien_baru'] }}</h6>
                                @else
                                    <h6 class="text-gray-500 mb-0"></h6>
                                @endif

                                @if(isset(  $total_user_register ))
                                {{ $total_pasien_baru  }}
                                @else
                                0
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <div class="basis-1/3 md:basis-1/3 ml-3">
                    <div class="bg-white rounded-lg shadow-md p-10">
                        <div class="flex items-center">
                            <div class="bg-[#6A62C4] text-white font-bold rounded-full p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><title>account-clock</title>
                                    <path d="M10.63,14.1C12.23,10.58 16.38,9.03 19.9,10.63C23.42,12.23 24.97,16.38 23.37,19.9C22.24,22.4 19.75,24 17,24C14.3,24 11.83,22.44 10.67,20H1V18C1.06,16.86 1.84,15.93 3.34,15.18C4.84,14.43 6.72,14.04 9,14C9.57,14 10.11,14.05 10.63,14.1V14.1M9,4C10.12,4.03 11.06,4.42 11.81,5.17C12.56,5.92 12.93,6.86 12.93,8C12.93,9.14 12.56,10.08 11.81,10.83C11.06,11.58 10.12,11.95 9,11.95C7.88,11.95 6.94,11.58 6.19,10.83C5.44,10.08 5.07,9.14 5.07,8C5.07,6.86 5.44,5.92 6.19,5.17C6.94,4.42 7.88,4.03 9,4M17,22A5,5 0 0,0 22,17A5,5 0 0,0 17,12A5,5 0 0,0 12,17A5,5 0 0,0 17,22M16,14H17.5V16.82L19.94,18.23L19.19,19.53L16,17.69V14Z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h6 class="text-gray-500 font-semibold">Total Hospital </h6>
                                @if(isset($data['total_hospital'] ) > 0)
                                    <h6 class="font-extrabold mb-0">{{ $data['total_hospital'] }}</h6>
                                @else
                                    <h6 class="text-gray-500 mb-0"></h6>
                                @endif
                                
                                @if(isset(  $total_hospital ))
                                {{ $total_hospital  }}
                                @else
                                0
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="basis-1/2 md:basis-1/3 ml-3">
                    <div class="bg-white rounded-lg shadow-md p-10">
                        <div class="flex items-center">
                            <div class="bg-[#6A62C4] text-white font-bold rounded-full p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><title>doctor</title>
                                    <path d="M14.84,16.26C17.86,16.83 20,18.29 20,20V22H4V20C4,18.29 6.14,16.83 9.16,16.26L12,21L14.84,16.26M8,8H16V10A4,4 0 0,1 12,14A4,4 0 0,1 8,10V8M8,7L8.41,2.9C8.46,2.39 8.89,2 9.41,2H14.6C15.11,2 15.54,2.39 15.59,2.9L16,7H8M12,3H11V4H10V5H11V6H12V5H13V4H12V3Z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h6 class="text-gray-500 font-semibold">Total Dokter </h6>
                                @if(isset($data['total_dokter'] ) > 0)
                                    <h6 class="font-extrabold mb-0">{{$data['total_dokter']}}</h6>
                                @else
                                    <h6 class="text-gray-500 mb-0"></h6>
                                @endif

                                @if(isset(  $total_dokter ))
                                {{ $total_dokter  }}
                                @else
                                0
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="basis-2/4 p-4 ml-5">
            <div class="container">
                <h1 class="text-2xl font-bold mb-4">Dokter Yang Tersedia Hari ini
                      <div class="divider"></div>
                </h1>
                <div class="overflow-x-auto w-full">
                    <table class="table w-full">
                      <!-- head -->
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Spesialis</th>
                          <th>Praktek Mulai Jam</th>
                          <th>Praktek Tutup Jam</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- row 1 -->
                        @forelse ($doctors as $doctor)
                        <tr>
                          <td>
                            <div class="flex items-center space-x-3">
                              <div class="avatar">
                                <div class="mask mask-squircle w-12 h-12">
                                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{asset('upload/dokter/'.$doctor->foto)}}" alt=""/>
                                </div>
                              </div>
                              <div>
                                <div class="font-bold">{{ $doctor->nama_dokter }}</div>
                                <div class="text-sm opacity-50">{{ $doctor->alamat }}</div>
                              </div>
                            </div>
                          </td>
                          <td>
                            {{ $doctor->spesialis }}
                            {{-- <br/> --}}
                            {{-- <span class="badge badge-ghost badge-sm">Desktop Support Technician</span> --}}
                          </td>
                          <td>{{ $doctor->jam_buka }}</td>

                          <td>{{ $doctor->jam_tutup }}</td>
                        </tr>
                        @empty
                        <td>Tidak ada yang buka Praktek hari ini</td>
                        @endforelse
                      </tbody>
                      
                    </table>
                  </div>
            </div>

    
        </div>
    </div>
</div>

@endsection
