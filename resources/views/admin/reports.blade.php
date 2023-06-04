@extends('layout.layout-admin')

@section('content')
<div class="ml-32 p-8">
            <div class="bg-[#6266F4]  rounded-lg max-h-max w-full  p-10">
                <span class="text-1xl font-italic text-white text-lg tracking-widest">Selamat Datang , <span class="font-bold text-lg">{{ Auth::user()->name }}</span></span>
                <p class="text-slate-300 mt-5">Semoga hari-hari mu senin terus. :)</p>
                <div class="relative">
                    <div class="bottom-0 right-0 "></div>
                    <div class="absolute -right-1 -bottom-0 text-slate-300 ">
                            <a href="{{ url('/logout') }}"> <div class=" p-3 rounded-md btn btn-active btn-ghost text-white">Keluar <span class="mdi mdi-logout ml-3"></span></div></a>

                    </div>
                </div>
            </div>
</div>

<div class="flex flex-row  ml-32 p-8">
    <div class="basis-3/4">
        <div class="bg-[#6266F4] min-w-min min-h-min p-10 rounded-3xl mt-5 mb-5">
            <div class="flex justify-between items-center">
                <div class="relative">
                    <h1 class="text-lg font-semibold text-white">Laporan Pembelian Obat</h1>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  </div>
                </div>
                <style>
                    .card {
                        border: 2px solid transparent;
                        transition: border-color 0.3s ease;
                    }

                    .card.active {
                        border-color: #6A62C4;
                    }
                </style>

                <div>
                    <a href="{{ route('reports.index') }}" class="btn btn-active btn-ghost text-white" id="btn-all">Semua</a>
                    <a href="{{ route('reports.index', ['periode' => 'bulan_sekarang']) }}" class="btn btn-active btn-ghost text-white" id="btn-this-month">Bulan Sekarang</a>
                    <a href="{{ route('reports.index', ['periode' => 'bulan_lalu']) }}" class="btn btn-active btn-ghost text-white" id="btn-last-month">Bulan Kemarin</a>
                    <a href="{{ route('detail.report')}}" class="btn btn-active btn-ghost text-white" id="btn-last-month">Rincian Laporan</a>
                </div>

                <script>
                    const btnAll = document.getElementById('btn-all');
                    const btnThisMonth = document.getElementById('btn-this-month');
                    const btnLastMonth = document.getElementById('btn-last-month');

                    const currentUrl = "<?php echo $_SERVER['REQUEST_URI']; ?>";

                    if (currentUrl.includes('periode=') || currentUrl.endsWith('/dashboard')) {
                        btnAll.classList.add('btn-success');
                    } else if (currentUrl.includes('periode=bulan_sekarang')) {
                        btnThisMonth.classList.add('btn-success');
                    } else if (currentUrl.includes('periode=bulan_lalu')) {
                        btnLastMonth.classList.add('btn-success');
                    }
                </script>

            </div>
            <p class="text-6xl font-serif mt-6 mb-6">
                @if(isset( $reports->transaction_count  ))
                {{ $reports->transaction_count  }}
                @else

                @endif

            </p>
            <div class="flex flex-row mt-10">
                <div class="basis-1/4 md:basis-1/3">
                    <div class="bg-white rounded-lg shadow-md p-10">
                        <div class="flex items-center">
                            <div class="bg-error text-white font-bold rounded-full p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><title>account-convert</title>
                                    <path d="M12 0L11.34 .03L15.15 3.84L16.5 2.5C19.75 4.07 22.09 7.24 22.45 11H23.95C23.44 4.84 18.29 0 12 0M12 4C10.07 4 8.5 5.57 8.5 7.5C8.5 9.43 10.07 11 12 11C13.93 11 15.5 9.43 15.5 7.5C15.5 5.57 13.93 4 12 4M.05 13C.56 19.16 5.71 24 12 24L12.66 23.97L8.85 20.16L7.5 21.5C4.25 19.94 1.91 16.76 1.55 13H.05M12 13C8.13 13 5 14.57 5 16.5V18H19V16.5C19 14.57 15.87 13 12 13Z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h6 class="text-gray-500 font-semibold">Transaksi Tertunda</h6>

                                    <h6 class="font-extrabold mb-0">{{ $reports->tertunda_count }}</h6>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="basis-1/3 md:basis-1/3 ml-3">
                    <div class="bg-white rounded-lg shadow-md p-10">
                        <div class="flex items-center">
                            <div class="bg-warning text-white font-bold rounded-full p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><title>account-clock</title>
                                    <path d="M10.63,14.1C12.23,10.58 16.38,9.03 19.9,10.63C23.42,12.23 24.97,16.38 23.37,19.9C22.24,22.4 19.75,24 17,24C14.3,24 11.83,22.44 10.67,20H1V18C1.06,16.86 1.84,15.93 3.34,15.18C4.84,14.43 6.72,14.04 9,14C9.57,14 10.11,14.05 10.63,14.1V14.1M9,4C10.12,4.03 11.06,4.42 11.81,5.17C12.56,5.92 12.93,6.86 12.93,8C12.93,9.14 12.56,10.08 11.81,10.83C11.06,11.58 10.12,11.95 9,11.95C7.88,11.95 6.94,11.58 6.19,10.83C5.44,10.08 5.07,9.14 5.07,8C5.07,6.86 5.44,5.92 6.19,5.17C6.94,4.42 7.88,4.03 9,4M17,22A5,5 0 0,0 22,17A5,5 0 0,0 17,12A5,5 0 0,0 12,17A5,5 0 0,0 17,22M16,14H17.5V16.82L19.94,18.23L19.19,19.53L16,17.69V14Z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h6 class="text-gray-500 font-semibold">Transaksi Gagal </h6>

                                    <h6 class="font-extrabold mb-0">{{ $reports->gagal_count }}</h6>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="basis-1/2 md:basis-1/3 ml-3">
                    <div class="bg-white rounded-lg shadow-md p-10">
                        <div class="flex items-center">
                            <div class="bg-success text-white font-bold rounded-full p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><title>doctor</title>
                                    <path d="M14.84,16.26C17.86,16.83 20,18.29 20,20V22H4V20C4,18.29 6.14,16.83 9.16,16.26L12,21L14.84,16.26M8,8H16V10A4,4 0 0,1 12,14A4,4 0 0,1 8,10V8M8,7L8.41,2.9C8.46,2.39 8.89,2 9.41,2H14.6C15.11,2 15.54,2.39 15.59,2.9L16,7H8M12,3H11V4H10V5H11V6H12V5H13V4H12V3Z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h6 class="text-gray-500 font-semibold">Transaksi Selesai </h6>

                                <h6 class="font-extrabold mb-0">{{ $reports->selesai_count }}</h6>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="basis-2/5 bg-blue-300 ml-5 p-10 rounded-3xl mt-5 mb-5 drop-shadow-lg w-[100px] ">
      <!-- Konten 2 -->
      <div class="relative">
        <h1 class="text-lg font-semibold mt-3">Transaksi Terakhir Pemesanan Obat</h1>

      </div>
        <div class="basis-1/4 md:basis-1/3">

            <div class="bg-white rounded-lg shadow-md mt-3">
                <div class="flex items-center">
                    <div class="ml-4">
                        <ul role="list" class="divide-y divide-gray-100 p-3">
                            @foreach ($last_transaksi as $transaction)

                            @if ($transaction)
                            <li class="flex justify-between mt-3">
                              <div class="flex">
                                <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{asset('upload/profile/'.$transaction->user->photo)}}" alt="">
                                <div class="min-w-0 flex-auto">
                                  <p class="text-sm font-semibold leading-6 text-gray-900 ml-3">   {{ ucwords($transaction->user->name) }}  </p>
                                  <div class="flex">
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500 ml-3">  {{$transaction->type}}  </p>
                                    <span class="mt-1 truncate text-xs leading-5 text-gray-500"> &nbsp;&nbsp; </span>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500"> {{ date('d F Y H:i:s', strtotime($transaction->created_at)) }} </p>
                                  </div>

                                </div>
                              </div>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="flex flex-row ml-32 p-8 place-items-center">
    <div class="basis-1/2">
        <div class="relative">
            <h1 class="text-lg font-semibold">Total Keseluruhan.</h1>
            <div class="grid grid-cols-4 gap-4 ">
                <div class=" bg-white shadow-lg p-5 justify-center rounded-lg ">
                    <div class="bg-[#6266F4] rounded-lg flex justify-center min-w-min p-3">

                        <span class="mdi mdi-account-multiple-plus text-white text-[30px]"></span>
                    </div>
                    <div class="text-center">
                        <p class="text-slate-300 justify-self-center">User</p>
                        <p class="font-medium mt-4">{{ $reports->user_count }}</p>
                    </div>
                </div>
                <div class=" bg-white shadow-lg p-5 justify-center rounded-lg ">
                    <div class="bg-error rounded-lg flex justify-center min-w-min p-3">


                        <span class="mdi mdi-doctor text-white text-[30px]"></span>
                    </div>
                    <div class="text-center">
                        <p class="text-slate-300 justify-self-center">Dokter</p>
                        <p class="font-medium mt-4">{{ $reports->doctor_count }}</p>
                    </div>
                </div>
                <div class=" bg-white shadow-lg p-5 justify-center rounded-lg ">
                    <div class="bg-accent rounded-lg flex justify-center min-w-min p-3">

                        <span class="mdi mdi-phone-message text-white text-[30px]"></span>
                    </div>
                    <div class="text-center">
                        <p class="text-slate-300 justify-self-center">Konsultasi</p>
                        <p class="font-medium mt-4">{{ $reports->user_count }}</p>
                    </div>
                </div>
                <div class=" bg-white shadow-lg p-5 justify-center rounded-lg ">
                    <div class="bg-info rounded-lg flex justify-center min-w-min p-3">

                        <span class="mdi mdi-pill-multiple text-white text-[30px]"></span>
                    </div>
                    <div class="text-center">
                        <p class="text-slate-300 justify-self-center">Obat</p>
                        <p class="font-medium mt-4">{{ $reports->obat_count }}</p>
                    </div>
                </div>
                <div class=" bg-white shadow-lg p-5 justify-center rounded-lg ">
                    <div class="bg-secondary rounded-lg flex justify-center min-w-min p-3">

                        <span class="mdi mdi-hospital-building text-white text-[30px]"></span>
                    </div>
                    <div class="text-center">
                        <p class="text-slate-300 justify-self-center">Rumah Sakit</p>
                        <p class="font-medium mt-4">{{ $reports->rs_count }}</p>
                    </div>
                </div>
                <div class=" bg-white shadow-lg p-5 justify-center rounded-lg ">
                    <div class="bg-success rounded-lg flex justify-center min-w-min p-3">

                        <span class="mdi mdi-medical-cotton-swab text-white text-[30px]"></span>
                    </div>
                    <div class="text-center">
                        <p class="text-slate-300 justify-self-center">Apotek</p>
                        <p class="font-medium mt-4">{{ $reports->apotek_count }}</p>
                    </div>
                </div>
                <div class=" bg-white shadow-lg p-5 justify-center rounded-lg ">
                    <div class="bg-orange-300 rounded-lg flex justify-center min-w-min p-3">

                        <span class="mdi mdi-medical-bag text-white text-[30px]"></span>
                    </div>
                    <div class="text-center">
                        <p class="text-slate-300 justify-self-center">Layanan</p>
                        <p class="font-medium mt-4">{{ $reports->service_count }}</p>
                    </div>
                </div>
                <div class=" bg-white shadow-lg p-5 justify-center rounded-lg ">
                    <div class="bg-secondary-focus rounded-lg flex justify-center min-w-min p-3">

                        <span class="mdi mdi-star-plus text-white text-[30px]"></span>
                    </div>
                    <div class="text-center">
                        <p class="text-slate-300 justify-self-center">Rating</p>
                        <p class="font-medium mt-4">{{ $reports->rating_count }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="basis-3/4 bg-white ml-5 p-10 rounded-3xl mt-5 mb-5 drop-shadow-lg w-[100px]">
        <div class="relative">
            <h1 class="text-lg font-semibold">Daftar Dokter yang Buka Mall Praktek Jam {{ $selectedJam }}</h1>
        </div>
        <ul role="list" class="divide-y divide-gray-100">
            @foreach ($doctors as $doctor)
            <li class="flex justify-between gap-x-6 py-5">
              <div class="flex gap-x-4">
                <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{asset('upload/dokter/'.$doctor->foto)}}" alt="">
                <div class="min-w-0 flex-auto">
                  <p class="text-sm font-semibold leading-6 text-gray-900">{{ $doctor->nama_dokter }}</p>
                  <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$doctor->email}}</p>
                </div>
              </div>
              <div class="hidden sm:flex sm:flex-col sm:items-end">
                <p class="badge badge-accent badge-outline text-sm leading-6 text-white">{{ $doctor->spesialis }}</p>
                <p class="mt-1 text-xs leading-5 text-success">{{ $doctorStatuses[$doctor->id] }} </p>
              </div>
            </li>
            @endforeach
        </ul>

    </div>
</div>


@endsection
