@extends('layout.layout')

@section('content')
    <div class="container mx-auto px-12">
        <div class=" top-0 left-[202px] flex items-center mt-32">

            <div class="text-sm breadcrumbs">
                <ul>
                  <li><a href="{{ url('/') }}" class="text-[#756e6e]">Home</a></li>
                  <li><a href="#" class="text-[#3b529d]">Artikel</a></li>
                </ul>
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
        <div class=" mt-[100px]">
                <form action="" class="flex">
                    <input type="text" placeholder="Cari artikel, seperti mencari peniti ditempat beras" class="input input-bordered flex-1 rounded-full" />
                    <button type="submit" class="btn btn-primary ml-2 rounded-full w-20 h-8 text font-mono">Cari</button>
                </form>
        </div>
        @if(Auth::user()->roles != 1)
        @else
        <div class="container my-12 mx-auto px-1 md:px-12 flex flex-row">
            <div class="basis-1/2">
                <p class="normal-case ...">Buat Artikel Baru</p>

                <a href="{{ route('artikel.create') }}" class="inline-flex items-center mt-5 px-4 py-2 text-sm font-medium btn btn-outline text-center text-gray-900 bg-white border border-gray-300 rounded-lg  focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Buat Artikel Baru  +</a>
            </div>
            <div class="basis-1/2">
                <p class="normal-case ...">Hapus Artikel </p>
                <a href="" class="inline-flex items-center px-4 py-2 mt-5 text-sm font-medium text-center text-white btn btn-error rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Hapus Artikel   -</a>
            </div>
           
        </div>
           
        @endif
        {{-- Bagian Artikel banyak akses --}}
        <section class="mt-[100px]">
            <div class="flex flex-row p-8">
                <div class="basis-5/6">
                    <div class="flex flex-row justify-between items-center py-4">
                        <h2 class="text-lg font-bold flex">Artikel Populer <div class="badge badge-error text-white ml-3"> @if ($popularArticle){{ $popularArticle->views }} @else  <p>0</p> @endif
                            
                        </div><svg style="width:24px;height:24px" class="ml-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>Views</title><path d="M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M12,4.5C17,4.5 21.27,7.61 23,12C21.27,16.39 17,19.5 12,19.5C7,19.5 2.73,16.39 1,12C2.73,7.61 7,4.5 12,4.5M3.18,12C4.83,15.36 8.24,17.5 12,17.5C15.76,17.5 19.17,15.36 20.82,12C19.17,8.64 15.76,6.5 12,6.5C8.24,6.5 4.83,8.64 3.18,12Z" /></svg></h2>
                    </div>
                    @if ($popularArticle)
                    <a href="{{  route('artikel.show', $popularArticle->id) }}">  
                    <div class="relative bg-[#6A62C4] w-full min-h-min p-10 rounded-3xl mt-5 mb-5">
                        <img src="{{ asset('upload/artikel/'.$popularArticle->images) }}" alt="{{ $popularArticle->title }}" class="rounded-md object-cover object-center w-full h-48 sm:h-56 md:h-64 lg:h-72 xl:h-80">
                        <div class="absolute bottom-0 left-0 w-full bg-black bg-opacity-50 text-center rounded-3xl">
                            <h1 class="text-lg font-serif mb-4 text-white">{{ $popularArticle->title }}</h1>
                            <p class="text-sm font-serif mt-6 mb-6 text-white">{{ $popularArticle->excerpt }}</p>
                        </div>
                    </div>
                    </a>
                    @else
                    <p>Tidak Ada Artikel Populer</p>
                    @endif
                    

                    <div class="flex flex-row justify-between items-center py-4">
                        <h2 class="text-lg font-bold">Artikel Berita</h2>
                    </div>
                    <div class="flex justify-start mt-8">
                        <div class="w-full md:basis-1/2">
                          <div class="flex justify-between items-center">
                            <div class="relative">
                                @forelse ( $articlesBerita as $b )
                                <div class="bg-white shadow rounded-lg">
                                    <img src="{{ asset('upload/artikel/'.$b->images) }}" alt="Gambar artikel" class="rounded-t-lg w-full">
                                    <div class="px-6 py-4">
                                      <h2 class="text-lg font-bold mb-2">{{ $b->title }}</h2>
                                      <p class="text-gray-700 text-base mb-2">{{ $b->isi_content }}</p>

                                    </div>
                                </div>
                                @empty
                                    <p>Tidak ada Artikel Berita terkait.</p>
                                @endforelse
                            </div>
                          </div>
                        </div>
                    </div>

                </div>
                <div class="basis-2/4 p-4 ml-5">
                    <div class="container">
                        <h1 class="text-2xl font-bold mb-4">Kalender Bulan <?php
                            // mendapatkan bulan dan tahun dari URL atau default ke bulan dan tahun saat ini
                            $month = isset($_GET['month']) ? $_GET['month'] : date('m');
                            echo date('F', strtotime("2023-$month-01"));
                            ?>
                            <div class="badge badge-error gap-2 text-white">
                                hari ini
                              </div>
                              <div class="divider"></div>
                        </h1>
                        <table class="table-auto border-collapse border border-gray-400">
                            <thead>
                                <tr>
                                    <th class="border border-gray-400 p-2">Minggu</th>
                                    <th class="border border-gray-400 p-2">Senin</th>
                                    <th class="border border-gray-400 p-2">Selasa</th>
                                    <th class="border border-gray-400 p-2">Rabu</th>
                                    <th class="border border-gray-400 p-2">Kamis</th>
                                    <th class="border border-gray-400 p-2">Jumat</th>
                                    <th class="border border-gray-400 p-2">Sabtu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // mendapatkan bulan dan tahun dari URL atau default ke bulan dan tahun saat ini

                                    $year = isset($_GET['year']) ? $_GET['year'] : date('Y');

                                    // membuat objek Carbon untuk tanggal pertama di bulan dan tahun yang dipilih
                                    $firstDay = Carbon\Carbon::createFromDate($year, $month, 1);

                                    // menghitung jumlah hari di bulan dan tahun yang dipilih
                                    $daysInMonth = $firstDay->daysInMonth;

                                    // menentukan hari pertama dalam minggu
                                    $firstDayOfWeek = $firstDay->dayOfWeek;

                                    // membuat array untuk menampung tanggal
                                    $dates = [];

                                    // menambahkan tanggal kosong untuk hari pertama dalam minggu
                                    for ($i = 0; $i < $firstDayOfWeek; $i++) {
                                        $dates[] = null;
                                    }

                                    // menambahkan tanggal dari bulan dan tahun yang dipilih ke dalam array
                                    for ($i = 1; $i <= $daysInMonth; $i++) {
                                        $dates[] = Carbon\Carbon::createFromDate($year, $month, $i);
                                    }

                                    // menambahkan tanggal kosong untuk hari terakhir dalam minggu
                                    $lastDayOfWeek = end($dates)->dayOfWeek;
                                    for ($i = 0; $i < 6 - $lastDayOfWeek; $i++) {
                                        $dates[] = null;
                                    }

                                    // memecah array tanggal menjadi array mingguan
                                    $weeks = array_chunk($dates, 7);

                                    // menampilkan tanggal pada setiap sel tabel dan mewarnai tanggal hari ini dengan warna merah
                                    foreach ($weeks as $week) {
                                        echo '<tr>';
                                        foreach ($week as $date) {
                                            if ($date) {
                                                if ($date->isToday()) {
                                                    echo '<td class="border border-gray-400 p-2 bg-error text-white">' . $date->format('d') . '</td>';
                                                } else {
                                                    echo '<td class="border border-gray-400 p-2">' . $date->format('d') . '</td>';
                                                }
                                            } else {
                                                echo '<td class="border border-gray-400 p-2"></td>';
                                            }
                                        }
                                        echo '</tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex flex-row justify-between items-center py-4">
                        <h2 class="text-lg font-bold">Artikel Terbaru</h2>
                    </div>
                    @if($latestArticle)
                    <div class="grid w-full">
                        <div class="bg-white rounded-lg overflow-hidden shadow-md">
                            <img src="{{ asset('upload/artikel/'.$latestArticle->images) }}" alt="{{ $latestArticle->slug }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="font-bold text-lg mb-2">{{ $latestArticle->title }}</h3>
                                <p class="text-gray-700 text-base mb-4">{{ $latestArticle->isi_content }}</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <p>Tidak Ada Artikel Terbaru.</p>
                    @endif
                    
                    </div>

                </div>
            </div>

        </section>

{{-- ArtikeL Kesehatan --}}
<section class="container mx-auto py-8">
            <h1 class="text-3xl font-bold mb-8">Artikel Kesehatan</h1>
            <div class="grid grid-cols-3 gap-8">
                @forelse ( $articlesKesehatan as $s )
                <div class="bg-white shadow rounded-lg">
                    <img src="{{ asset('upload/artikel/'.$s->images) }}" alt="Gambar artikel" class="rounded-t-lg w-full">
                    <div class="px-6 py-4">
                      <h2 class="text-lg font-bold mb-2">{{ $s->title }}</h2>
                      <p class="text-gray-700 text-base mb-2">Tidur yang cukup adalah kebutuhan penting bagi kesehatan fisik dan mental. Namun, beberapa orang menderita insomnia dan mengalami kesulitan untuk tidur atau tetap tertidur.</p>
                    
                    </div>
                </div>
                @empty
                    <p>Tidak ada Artikel kesehatan terkait.</p>
                @endforelse


          

<section>
{{-- End Artikel Kesehatan --}}

{{-- ArtikeL All --}}

<style>
    .image {
  width: 100%;
  height: 300px;
  object-fit: cover !important;
  object-position: center !important;
  
}
.option-hover:hover
{
    transition: transform 0.2s ease-in-out;
}
    .option-hover:hover {
  transform: scale(1.05);
  box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.5);
}
.option-hover:hover::before {
  content: attr(alt);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: rgba(0, 0, 0, 0.8);
  color: #fff;
  font-size: 1.5rem;
  padding: 0.5rem;
  border-radius: 0.5rem;
  z-index: 1;
  white-space: nowrap;
}

</style>
{{-- End Artikel All --}}
    </div>
    <h1 class="text-3xl font-bold mb-8">Semua Artikel </h1>
    <div class="grid grid-cols-3 gap-8">

        @forelse ($articlesAll as $show)
        <div class="bg-white shadow rounded-lg option-hover">
            <a href=" {{  route('artikel.show', $show->id) }}" class="">
                <img src="{{asset('upload/artikel/'.$show->images)}}" alt="{{ $show->title }}"  class="rounded-t-lg w-full image">
                <div class="px-6 py-4"> 
                    <h2 class="text-lg font-bold mb-2">{{ $show->title }}</h2>
                    <p class="text-gray-700 text-base mb-2">{{ $show->isi_content }}</p>
                </div>
            </a>
        </div>
        @empty
        <p>Tidak ada Article Terkait</p>
        @endforelse
    </div>
@endsection
