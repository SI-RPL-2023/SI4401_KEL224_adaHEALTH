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
        <div class=" mt-[100px]">
                <form action="" class="flex">
                    <input type="text" placeholder="Cari artikel, seperti mencari peniti ditempat beras" class="input input-bordered flex-1 rounded-full" />
                    <button type="submit" class="btn btn-primary ml-2 rounded-full w-20 h-8 text font-mono">Cari</button>
                </form>
        </div>


        {{-- Bagian Artikel banyak akses --}}
        <section class="mt-[100px]">
            <div class="flex flex-row p-8">
                <div class="basis-5/6">
                    <div class="relative bg-[#75e7db] w-full min-h-min p-10 rounded-3xl mt-5 mb-5">
                        <img src="https://source.unsplash.com/640x360/?sports,running" alt="">
                        <div class="absolute bottom-0 left-0 w-full bg-black bg-opacity-50 text-center">
                            <h1 class="text-lg font-serif mb-4 text-white">Mengatasi Insomnia</h1>
                            <p class="text-sm font-serif mt-6 mb-6 text-white">Tidur yang cukup adalah kebutuhan penting bagi kesehatan fisik dan mental. Namun, beberapa orang menderita insomnia dan mengalami kesulitan untuk tidur atau tetap tertidur.</p>
                        </div>
                    </div>

                    <div class="flex flex-row justify-between items-center py-4">
                        <h2 class="text-lg font-bold">Artikel Berita</h2>
                    </div>
                    <div class="flex justify-start mt-8">
                        <div class="w-full md:basis-1/2">
                          <div class="flex justify-between items-center">
                            <div class="relative">
                                <div class="bg-white shadow rounded-lg">
                                    <img src="/images/placeholder.jpg" alt="Gambar artikel" class="rounded-t-lg w-full">
                                    <div class="px-6 py-4">
                                      <h2 class="text-lg font-bold mb-2">Mengatasi Insomnia</h2>
                                      <p class="text-gray-700 text-base mb-2">Tidur yang cukup adalah kebutuhan penting bagi kesehatan fisik dan mental. Namun, beberapa orang menderita insomnia dan mengalami kesulitan untuk tidur atau tetap tertidur.</p>
                                      <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-block">Baca selengkapnya</a>
                                    </div>
                                </div>
                            </div>

                          </div>
                        </div>
                        <div class="md:w-2/4 ml-5 w-full">
                            <div class="bg-white shadow rounded-lg">
                                <img src="/images/placeholder.jpg" alt="Gambar artikel" class="rounded-t-lg w-full">
                                <div class="px-6 py-4">
                                  <h2 class="text-lg font-bold mb-2">Mengatasi Insomnia</h2>
                                  <p class="text-gray-700 text-base mb-2">Tidur yang cukup adalah kebutuhan penting bagi kesehatan fisik dan mental. Namun, beberapa orang menderita insomnia dan mengalami kesulitan untuk tidur atau tetap tertidur.</p>
                                  <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-block">Baca selengkapnya</a>
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
                      <div class="grid w-full">
                        <div class="bg-white rounded-lg overflow-hidden shadow-md">
                            <img src="https://via.placeholder.com/400x200.png?text=Article+Image" alt="Article Image" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="font-bold text-lg mb-2">Judul Artikel Pertama</h3>
                                <p class="text-gray-700 text-base mb-4">Deskripsi artikel pertama. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>


        <section class="container mx-auto py-8">
            <h1 class="text-3xl font-bold mb-8">Artikel Kesehatan</h1>
            <div class="grid grid-cols-3 gap-8">
              <div class="bg-white shadow rounded-lg">
                <img src="/images/placeholder.jpg" alt="Gambar artikel" class="rounded-t-lg w-full">
                <div class="px-6 py-4">
                  <h2 class="text-lg font-bold mb-2">Mengatasi Insomnia</h2>
                  <p class="text-gray-700 text-base mb-2">Tidur yang cukup adalah kebutuhan penting bagi kesehatan fisik dan mental. Namun, beberapa orang menderita insomnia dan mengalami kesulitan untuk tidur atau tetap tertidur.</p>
                  <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-block">Baca selengkapnya</a>
                </div>
              </div>

              <div class="bg-white shadow rounded-lg">
                <img src="/images/placeholder.jpg" alt="Gambar artikel" class="rounded-t-lg w-full">
                <div class="px-6 py-4">
                  <h2 class="text-lg font-bold mb-2">Mengatasi Stres</h2>
                  <p class="text-gray-700 text-base mb-2">Stres dapat mempengaruhi kesehatan fisik dan mental. Namun, ada berbagai cara untuk mengatasi stres agar dapat menghadapi tantangan hidup dengan lebih baik.</p>
                  <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-block">Baca selengkapnya</a>
                </div>
              </div>
              <div class="bg-white shadow rounded-lg">
                <img src="/images/placeholder.jpg" alt="Gambar artikel" class="rounded-t-lg w-full">
                <div class="px-6 py-4">
                  <h2 class="text-lg font-bold mb-2">Mengatasi Stres</h2>
                  <p class="text-gray-700 text-base mb-2">Stres dapat mempengaruhi kesehatan fisik dan mental. Namun, ada berbagai cara untuk mengatasi stres agar dapat menghadapi tantangan hidup dengan lebih baik.</p>
                  <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-block">Baca selengkapnya</a>
                </div>
              </div>
              <div class="bg-white shadow rounded-lg">
                <img src="/images/placeholder.jpg" alt="Gambar artikel" class="rounded-t-lg w-full">
                <div class="px-6 py-4">
                  <h2 class="text-lg font-bold mb-2">Mengatasi Stres</h2>
                  <p class="text-gray-700 text-base mb-2">Stres dapat mempengaruhi kesehatan fisik dan mental. Namun, ada berbagai cara untuk mengatasi stres agar dapat menghadapi tantangan hidup dengan lebih baik.</p>
                  <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-block">Baca selengkapnya</a>
                </div>
              </div>
              <div class="bg-white shadow rounded-lg">
                <img src="/images/placeholder.jpg" alt="Gambar artikel" class="rounded-t-lg w-full">
                <div class="px-6 py-4">
                  <h2 class="text-lg font-bold mb-2">Mengatasi Stres</h2>
                  <p class="text-gray-700 text-base mb-2">Stres dapat mempengaruhi kesehatan fisik dan mental. Namun, ada berbagai cara untuk mengatasi stres agar dapat menghadapi tantangan hidup dengan lebih baik.</p>
                  <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-block">Baca selengkapnya</a>
                </div>
              </div>
              <div class="bg-white shadow rounded-lg">
                <img src="/images/placeholder.jpg" alt="Gambar artikel" class="rounded-t-lg w-full">
                <div class="px-6 py-4">
                  <h2 class="text-lg font-bold mb-2">Mengatasi Stres</h2>
                  <p class="text-gray-700 text-base mb-2">Stres dapat mempengaruhi kesehatan fisik dan mental. Namun, ada berbagai cara untuk mengatasi stres agar dapat menghadapi tantangan hidup dengan lebih baik.</p>
                  <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-block">Baca selengkapnya</a>
                </div>
              </div>
        <section>

{{--
        <section class="mt-[100px]">
            <div class="grid grid-cols-4 gap-4">
                <div class="w-8/8">
                    <div class="card w-full glass">
                        <figure><img src="/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="car!"/></figure>
                        <div class="card-body">
                            <h2 class="card-title">Life hack</h2>
                            <p>How to park your car at your garage?</p>
                            <div class="card-actions justify-end">
                                <button class="btn btn-primary">Learn now!</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-8/8">
                    <div class="card w-full glass">
                        <figure><img src="/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="car!"/></figure>
                        <div class="card-body">
                            <h2 class="card-title">Life hack</h2>
                            <p>How to park your car at your garage?</p>
                            <div class="card-actions justify-end">
                                <button class="btn btn-primary">Learn now!</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-8/8">
                    <div class="card w-full glass">
                        <figure><img src="/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="car!"/></figure>
                        <div class="card-body">
                            <h2 class="card-title">Life hack</h2>
                            <p>How to park your car at your garage?</p>
                            <div class="card-actions justify-end">
                                <button class="btn btn-primary">Learn now!</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-8/8">
                    <div class="card w-full glass">
                        <figure><img src="/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="car!"/></figure>
                        <div class="card-body">
                            <h2 class="card-title">Life hack</h2>
                            <p>How to park your car at your garage?</p>
                            <div class="card-actions justify-end">
                                <button class="btn btn-primary">Learn now!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section> --}}
    </div>
@endsection
