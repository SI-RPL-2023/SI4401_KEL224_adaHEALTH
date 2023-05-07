@extends('layout.layout-admin')

@section('content')
    <style>
        .bg-gradient{
            /* background-image: linear-gradient( 109.6deg,  rgba(79,148,243,0.73) 11.2%, rgba(140,105,193,0.87) 91.2% ); */
            background-image: linear-gradient( 90.6deg,  rgb(104, 174, 243) -1.2%, rgb(101, 91, 211) 98.6% );
        }
        .bg-gradient2{
            background-image: linear-gradient( 179.7deg,  rgba(197,214,227,1) 2.9%, rgba(144,175,202,1) 97.1% );
        }
    </style>
     <!-- Main Content -->
    <div class="ml-48 p-8">
        <div class="bg-[#f8ff27] rounded-full w-100 inline-block align-middle p-2">
            <span class="text-3xl font-bold text-gray-900">Dashboard</span>
        </div>

        <div class="bg-gradient w-full min-h-min p-10 rounded-3xl mt-5 mb-5">
            <h1 class="text-lg font-serif mb-4">Berobat</h1>
            <p class="text-6xl font-serif mt-6">8</p>
            <div class="grid grid-cols-4 gap-4 mt-10">
                <div>
                    <div class="stat bg-gradient2 rounded-lg h-40">
                        <div class="stat-figure text-secondary">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                        </div>
                        <div class="stat-title">Total Apotek</div>
                        <div class="stat-value">{{ $totalApotek }}</div>
                    </div>
                </div>
                <div>
                    <div class="stat bg-gradient2 rounded-lg h-40">
                        <div class="stat-figure text-primary">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </div>
                        <div class="stat-title">Total Hospital</div>
                        <div class="stat-value text-primary">{{  $totalHospital }}</div>
                    </div>
                </div>
                <div>
                    <div class="stat bg-gradient2 rounded-lg h-40">
                        <div class="stat-figure text-secondary">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <div class="stat-title">Total Obat</div>
                        <div class="stat-value text-secondary">{{ $totalObat }}</div>
                    </div>
                </div>
                <div>
                    <div class="stat bg-gradient2 rounded-lg h-40">
                        <div class="stat-figure text-secondary">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                        </div>
                        <div class="stat-title">Total Users</div>
                        <div class="stat-value">{{ $totalUsers }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row">
            <div class="grid flex-grow card rounded-box place-items-start">

                <div class="stats bg-primary text-primary-content mt-5">
                    <div class="stat">
                      <div class="stat-title">Account balance</div>
                      <div class="stat-value">$89,400</div>
                      <div class="stat-actions">
                        <button class="btn btn-sm btn-success">Add funds</button>
                      </div>
                    </div>

                    <div class="stat">
                      <div class="stat-title">Current balance</div>
                      <div class="stat-value">$89,400</div>
                      <div class="stat-actions">
                        <button class="btn btn-sm">Withdrawal</button>
                        <button class="btn btn-sm">deposit</button>
                      </div>
                    </div>
                </div>
            </div>
            <div class="grid flex-grow card rounded-box place-items-center">
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full">
                      <!-- head -->
                      <thead>
                        <tr>
                          <th></th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($dokter as $view)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $view->name }}</td>
                            <td>{{ $view->email }}</td>
                            <td>{{ $view->address }}</td>
                            <td>

                                <button class="btn btn-xs btn-primary"><a href="">Edit</a></button>
                                <button class="btn btn-xs btn-error"><a href="">Delete</a></button>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="5"><button class="btn btn-xs btn-success text-white font-bold"><a href="">+ Add Doctors</a></button></td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="flex flex-row">
            <div class="basis-2/4">
                <canvas id="myChart" width="25" height="25"></canvas>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            </div>
            <div class="basis-1/4 flex justify-end">
                <div class="row-span-2 col-span-2  mt-10 ml-10">
                    <div class="card w-96 bg-base-100 shadow-xl image-full ">
                        <figure><img src="https://picsum.photos/400/300" alt="" /></figure>
                        <div class="card-body">
                            <h2 class="card-title">Shoes!</h2>
                            <p>If a dog chews shoes whose shoes does he choose?</p>
                            <div class="card-actions justify-end">
                            <button class="btn btn-primary">Thanks</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Total Users', 'Total Hospitals', 'Total Apoteks', 'Total Obats'],
                    datasets: [{
                        label: 'Total',
                        data: [{{ $totalUsers }}, {{ $totalHospital }}, {{ $totalApotek }}, {{ $totalObat }}],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
        </div>
        <footer class="footer footer-center p-10 bg-base-200 text-base-content rounded">
            <div class="grid grid-flow-col gap-4">
              <a class="link link-hover">About us</a>
              <a class="link link-hover">Contact</a>
              <a class="link link-hover">Jobs</a>
              <a class="link link-hover">Press kit</a>
            </div>
            <div>
              <div class="grid grid-flow-col gap-4">
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a>
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a>
                <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
              </div>
            </div>
            <div>
              <p>Copyright © 2023 - All right reserved by AdaHealth</p>
            </div>
          </footer>

    </div>

@endsection
