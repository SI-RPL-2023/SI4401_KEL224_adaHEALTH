@extends('layout.layout-admin')

@section('content')
<div class="ml-48 p-8">
    <div class="bg-[#f8ff27] rounded-full w-100 inline-block align-middle p-2">
        <span class="text-1xl font-bold text-gray-900">Dashboard</span>
    </div>
</div>
<div class="flex flex-row ml-48 p-8">
    <div class="basis-5/6">
        <div class="bg-gradient w-full min-h-min p-10 rounded-3xl mt-5 mb-5">
            <h1 class="text-lg font-serif mb-4">Berobat</h1>
            <p class="text-6xl font-serif mt-6 mb-6">8</p>
            <div class="flex flex-row mt-10">
                <div class="basis-1/4 md:basis-1/3">
                    <div class="stats shadow">

                        <div class="stat relative w-40 h-23">
                          <div class="stat-title">News patient</div>
                          <div class="stat-value text-lg font-normal mt-5 mb-5">40</div>
                          <div class="absolute stat-desc p-2 text-sm top-14 right-0 font-sans bg-success rounded-lg text-white">51% ↗︎</div>
                        </div>

                    </div>
                </div>
                <div class="basis-1/4 md:basis-1/3 ml-3">
                    <div class="stats shadow">

                        <div class="stat relative  w-40 h-23">
                          <div class="stat-title">News patient</div>
                          <div class="stat-value text-lg font-normal mt-5 mb-5">40</div>
                          <div class="absolute stat-desc p-2 text-sm top-14 right-0 font-sans bg-success rounded-lg text-white">51% ↗︎</div>
                        </div>

                    </div>
                </div>
                <div class="basis-1/3 md:basis-1/3 ml-3">
                    <div class="stats shadow ">

                        <div class="stat relative  w-40 h-23">
                          <div class="stat-title">News patient</div>
                          <div class="stat-value text-lg font-normal mt-5 mb-5">40</div>
                          <div class="absolute stat-desc p-2 text-sm top-14 right-0 font-sans bg-success rounded-lg text-white">51% ↗︎</div>
                        </div>

                    </div>
                </div>
                <div class="basis-1/2 md:basis-1/3 ml-3">
                    <div class="stats shadow">

                        <div class="stat relative  w-32 h-23">
                          <div class="stat-title">News patient</div>
                          <div class="stat-value text-lg font-normal mt-5 mb-5">40</div>
                          <div class="absolute stat-desc p-2 text-sm top-14 right-0 font-sans bg-success rounded-lg text-white">51% ↗︎</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-row justify-between items-center py-4">
            <h2 class="text-lg font-bold">List Doctors</h2>
        </div>
        <div class="flex justify-start mt-8">
            <div class="w-full md:basis-1/2">
              <div class="flex justify-between items-center">
                <div class="relative">
                  <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" id="grid-state">
                    <option>All</option>
                    <option>Today</option>
                    <option>Tomorrow</option>
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path d="M9 11l3 3l3-3l1.41 1.41L10 16.83l-4.41-4.42L6 11l3 3z" />
                    </svg>
                  </div>
                </div>
                <div>
                  <span class="bg-green-500 rounded-full px-2 py-1 text-white font-bold">Available</span>
                  <span class="bg-red-500 rounded-full px-2 py-1 text-white font-bold ml-2">Busy</span>
                </div>
              </div>
              <div class="mt-4">
                <div class="flex bg-gray-100 p-4">
                  <div class="w-1/3 font-bold">Doctor</div>
                  <div class="w-1/3 font-bold">Status</div>
                  <div class="w-1/3 font-bold">Total Consultations</div>
                </div>
                <div class="flex border-t border-gray-200 p-4">
                  <div class="w-1/3">Dr. John Doe</div>
                  <div class="w-1/3"><span class="bg-green-500 rounded-full px-2 py-1 text-white font-bold">Available</span></div>
                  <div class="w-1/3">10</div>
                </div>
                <div class="flex border-t border-gray-200 p-4">
                  <div class="w-1/3">Dr. Jane Smith</div>
                  <div class="w-1/3"><span class="bg-red-500 rounded-full px-2 py-1 text-white font-bold">Busy</span></div>
                  <div class="w-1/3">5</div>
                </div>
                <div class="flex border-t border-gray-200 p-4">
                  <div class="w-1/3">Dr. Bob Johnson</div>
                  <div class="w-1/3"><span class="bg-green-500 rounded-full px-2 py-1 text-white font-bold">Available</span></div>
                  <div class="w-1/3">15</div>
                </div>
              </div>
            </div>
            <div class="md:w-2/4 ml-5 w-full">
                <div class="text-lg font-bold mb-2">History Consultation</div>
                <div class="grid w-full">
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <div class="text-gray-700 font-bold mb-2">User A</div>
                        <div class="text-gray-600 mb-2">Type: Video Call</div>
                        <div class="text-gray-600 mb-2">Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod, purus non rhoncus lobortis, urna purus tempor mauris, ac imperdiet mauris massa id urna. Sed dictum est at diam iaculis, eu consectetur nunc ultrices.</div>
                        <div class="text-gray-600">Dated: 2023-04-19 15:30:00</div>
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

@endsection
