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

        @if(Auth::user()->roles != 1)
        @else
        <div class="container my-12 mx-auto px-1 md:px-12 flex flex-row">
            <div class="basis-1/2">
                <p class="normal-case ...">Buat Artikel Baru</p>

                <a href="{{ route('artikel.create') }}" class="inline-flex items-center mt-5 px-4 py-2 text-sm font-medium btn btn-outline text-center text-gray-900 bg-white border border-gray-300 rounded-lg  focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Buat Artikel Baru  +</a>
            </div>

        </div>

        @endif

        {{-- Bagian Artikel banyak akses --}}
        <section class="mt-[100px]">
            <div class="flex flex-row p-8">
                <div class="basis-5/6">
                    <div class="flex flex-row justify-between items-center py-4">
                        <h2 class="text-lg font-bold flex">Artikel Populer <div class="badge badge-ghost bg-gradient text-white ml-3"> @if ($popularArticle){{ $popularArticle->views }} @else  <p>0</p> @endif

                        </div><svg style="width:24px;height:24px" class="ml-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>Views</title><path d="M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M12,4.5C17,4.5 21.27,7.61 23,12C21.27,16.39 17,19.5 12,19.5C7,19.5 2.73,16.39 1,12C2.73,7.61 7,4.5 12,4.5M3.18,12C4.83,15.36 8.24,17.5 12,17.5C15.76,17.5 19.17,15.36 20.82,12C19.17,8.64 15.76,6.5 12,6.5C8.24,6.5 4.83,8.64 3.18,12Z" /></svg></h2>
                        @if(Auth::user()->roles != 1)
                        @else
                        <div class="mt-5 mb-5 flex justify-end">
                            <a href="{{ route('artikel.edit', $popularArticle->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded">Edit</a>
                            <form action="{{ route('artikel.destroy', $popularArticle->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </form>
                        </div>
                        @endif
                    </div>
                    @if ($popularArticle)
                    <a href="{{  route('artikel.show', $popularArticle->id) }}">
                    <div class="relative bg-gradient2 w-full min-h-min p-10 rounded-3xl mt-5 mb-5">
                        <img src="{{ asset('upload/artikel/'.$popularArticle->images) }}" alt="{{ $popularArticle->title }}" class="rounded-md object-cover object-center w-full h-48 sm:h-56 md:h-64 lg:h-72 xl:h-80">
                        @if($popularArticle)
                        <style>
                            .bg-gradient{
                                /* background-image: linear-gradient( 109.6deg,  rgba(79,148,243,0.73) 11.2%, rgba(140,105,193,0.87) 91.2% ); */
                                background-image: linear-gradient( 90.6deg,  rgb(104, 174, 243) -1.2%, rgb(101, 91, 211) 98.6% );
                            }
                            .bg-gradient2{
                                background-image: linear-gradient( 179.7deg,  rgba(197,214,227,1) 2.9%, rgba(144,175,202,1) 97.1% );
                            }
                        </style>
                        <div class="absolute top-3 right-3 transform rounded-full bg-gradient text-white text-xs px-2 py-1">Terpopuler</div>
                       @else
                        @endif
                        <div class="absolute bottom-0 left-0 w-full bg-black bg-opacity-50 text-center rounded-3xl">
                            <h1 class="text-lg font-serif mb-4 text-white">{{ $popularArticle->title }}</h1>
                            <p class="text-sm font-serif mt-6 mb-6 text-white">{{ $popularArticle->isi_content }}</p>
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
                                <div class="bg-white shadow rounded-lg relative">
                                    <img src="{{ asset('upload/artikel/'.$b->images) }}" alt="Gambar artikel" class="rounded-t-lg w-full">
                                    @if($b->category == "Berita")
                                    <div class="absolute top-3 right-3 transform rounded-full bg-accent text-white text-xs px-2 py-1">{{ $b->user->name }}</div>
                                   @else
                                    @endif
                                    <div class="px-6 py-4">
                                      <h2 class="text-lg font-bold mb-2">{{ $b->title }}</h2>
                                      <p class="text-gray-700 text-base mb-2">{{ $b->isi_content }}</p>
                                      @if(Auth::user()->roles != 1)
                                      @else
                                      <div class="mt-5 mb-5 flex justify-end">
                                          <a href="{{ route('artikel.edit', $b->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded">Edit</a>
                                          <form action="{{ route('artikel.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                          </form>
                                      </div>
                                      @endif
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
                <style>
                    .u-50-w{
                        width: 50% !important;
                    }
                        .text-2sm {
                        font-size: 1rem;
                    }

                    .table-auto {
                        font-size: 0.5rem;
                    }

                </style>
                <div class="basis-1/2 ml-5 u-50-w">
                    <div class="container flex justify-end mt-32">
                        <h1 class="text-2sm font-bold mb-4">Kalender Bulan <?php
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
                        <a href="{{ route('artikel.show', $latestArticle->id) }}">
                            <div class="bg-white rounded-lg overflow-hidden shadow-md relative">
                                <img src="{{ asset('upload/artikel/'.$latestArticle->images) }}" alt="{{ $latestArticle->slug }}" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3 transform rounded-full bg-error text-white text-xs px-2 py-1">{{ $latestArticle->user->name }}</div>
                                <div class="p-4">
                                    <h3 class="font-bold text-lg mb-2">{{ $latestArticle->title }}</h3>
                                    <p class="text-gray-700 text-base mb-4">{{ $latestArticle->isi_content }}</p>
                                    @if(Auth::user()->roles != 1)
                                    @else
                                    <div class="mt-5 mb-5 flex justify-end">
                                        <a href="{{ route('artikel.edit', $latestArticle->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded">Edit</a>
                                        <form action="{{ route('artikel.destroy', $latestArticle->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </a>
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
                <div class="bg-white shadow rounded-lg relative">
                    <a href="{{ route('artikel.show', $s->id) }}">
                        <img src="{{ asset('upload/artikel/'.$s->images) }}" alt="Gambar artikel" class="rounded-t-lg w-full">
                        @if($s->category == "Kesehatan")
                        <div class="absolute top-3 right-3 transform rounded-full bg-primary text-white text-xs px-2 py-1">{{ $s->user->name }}</div>
                       @else
                        @endif
                        <div class="px-6 py-4">
                        <h2 class="text-lg font-bold mb-2">{{ $s->title }}</h2>
                        <p class="text-gray-700 text-base mb-2">{{ $s->isi_content }}</p>
                        @if(Auth::user()->roles != 1)
                        @else
                        <div class="mt-5 mb-5 flex justify-end">
                            <a href="{{ route('artikel.edit', $s->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded">Edit</a>
                            <form action="{{ route('artikel.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </form>
                        </div>
                        @endif
                        </div>
                    </a>
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
        <div class="bg-white shadow rounded-lg option-hover relative">
            <a href="{{  route('artikel.show', $show->id) }}" class="">
              <img src="{{asset('upload/artikel/'.$show->images)}}" alt="{{ $show->title }}"  class="rounded-t-lg w-full image">
              @if($show->category == "Kesehatan")
              <div class="absolute top-3 right-3 transform rounded-full bg-primary text-white text-xs px-2 py-1">{{ $show->user->name }}</div>
              @elseif($show->category == "Berita")
              <div class="absolute top-3 right-3 transform rounded-full bg-accent text-white text-xs px-2 py-1">{{ $show->user->name }}</div>
              @elseif ($show->category == "Review")
              <div class="absolute top-3 right-3 transform rounded-full bg-secondary text-white text-xs px-2 py-1">{{ $show->user->name }}</div>
              @elseif ($show->category == "Tutorial")
              <div class="absolute top-3 right-3 transform rounded-full bg-neutral text-white text-xs px-2 py-1">{{ $show->user->name }}</div>
              @elseif ($latestArticle)
              <div class="absolute top-3 right-3 transform rounded-full bg-error text-white text-xs px-2 py-1">{{ $show->user->name }}</div>
              @else
              <div class="absolute top-3 right-3 transform rounded-full bg-ghost text-white text-xs px-2 py-1">{{ $show->user->name }}</div>
              @endif
              <div class="px-6 py-4">
                <h2 class="text-lg font-bold mb-2">{{ $show->title }}</h2>
                <p class="text-gray-700 text-base mb-2">{{ $show->isi_content }} </p>
                @if(Auth::user()->roles != 1)
                @else
                <div class="mt-5 mb-5 flex justify-end">
                    <a href="{{ route('artikel.edit', $show->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded">Edit</a>
                    <form action="{{ route('artikel.destroy', $show->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </form>
                </div>
                @endif
              </div>
            </a>
        </div>

        @empty
        <p>Tidak ada Article Terkait</p>
        @endforelse
    </div>
@endsection
