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
            <h1 class="text-lg font-serif">Berobat</h1>
            <p class="text-6xl font-serif mt-4">8</p>
            <div class="grid grid-cols-4 gap-4 mt-5">
                <div>
                    <div class="stat bg-gradient2 rounded-lg">
                        <div class="stat-figure text-secondary">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                        </div>
                        <div class="stat-title">New Registers</div>
                        <div class="stat-value">1,200</div>
                        <div class="stat-desc">↘︎ 90 (14%)</div>
                    </div>
                </div>
                <div>
                    <div class="stat bg-gradient2 rounded-lg">
                        <div class="stat-figure text-primary">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </div>
                        <div class="stat-title">Total Likes</div>
                        <div class="stat-value text-primary">25.6K</div>
                        <div class="stat-desc">21% more than last month</div>
                    </div>
                </div>
                <div>
                    <div class="stat bg-gradient2 rounded-lg">
                        <div class="stat-figure text-secondary">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <div class="stat-title">Page Views</div>
                        <div class="stat-value text-secondary">2.6M</div>
                        <div class="stat-desc">21% more than last month</div>
                    </div>
                </div>
                <div>
                    <div class="stat bg-gradient2 rounded-lg">
                        <div class="stat-figure text-secondary">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                        </div>
                        <div class="stat-title">New Users</div>
                        <div class="stat-value">4,200</div>
                        <div class="stat-desc">↗︎ 400 (22%)</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="stats shadow">

            <div class="stat">
              <div class="stat-figure text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
              </div>
              <div class="stat-title">Total Likes</div>
              <div class="stat-value text-primary">25.6K</div>
              <div class="stat-desc">21% more than last month</div>
            </div>

            <div class="stat">
              <div class="stat-figure text-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
              </div>
              <div class="stat-title">Page Views</div>
              <div class="stat-value text-secondary">2.6M</div>
              <div class="stat-desc">21% more than last month</div>
            </div>

            <div class="stat">
              <div class="stat-figure text-secondary">
                <div class="avatar online">
                  <div class="w-16 rounded-full">
                    <img src="/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                  </div>
                </div>
              </div>
              <div class="stat-value">86%</div>
              <div class="stat-title">Tasks done</div>
              <div class="stat-desc text-secondary">31 tasks remaining</div>
            </div>

            <div class="stat">
                <div class="stat-figure text-secondary">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                </div>
                <div class="stat-title">New Users</div>
                <div class="stat-value">4,200</div>
                <div class="stat-desc">↗︎ 400 (22%)</div>
            </div>

            <div class="stat">
                <div class="stat-figure text-secondary">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                </div>
                <div class="stat-title">New Registers</div>
                <div class="stat-value">1,200</div>
                <div class="stat-desc">↘︎ 90 (14%)</div>
            </div>
        </div>
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
        <div class="overflow-x-auto w-full mt-5 mb-5">
            <table class="table w-full">
              <!-- head -->
              <thead>
                <tr>
                  <th>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </th>
                  <th>Name</th>
                  <th>Job</th>
                  <th>Favorite Color</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <!-- row 1 -->
                <tr>
                  <th>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </th>
                  <td>
                    <div class="flex items-center space-x-3">
                      <div class="avatar">
                        <div class="mask mask-squircle w-12 h-12">
                          <img src="/tailwind-css-component-profile-2@56w.png" alt="Avatar Tailwind CSS Component" />
                        </div>
                      </div>
                      <div>
                        <div class="font-bold">Hart Hagerty</div>
                        <div class="text-sm opacity-50">United States</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    Zemlak, Daniel and Leannon
                    <br/>
                    <span class="badge badge-ghost badge-sm">Desktop Support Technician</span>
                  </td>
                  <td>Purple</td>
                  <th>
                    <button class="btn btn-ghost btn-xs">details</button>
                  </th>
                </tr>
                <!-- row 2 -->
                <tr>
                  <th>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </th>
                  <td>
                    <div class="flex items-center space-x-3">
                      <div class="avatar">
                        <div class="mask mask-squircle w-12 h-12">
                          <img src="/tailwind-css-component-profile-3@56w.png" alt="Avatar Tailwind CSS Component" />
                        </div>
                      </div>
                      <div>
                        <div class="font-bold">Brice Swyre</div>
                        <div class="text-sm opacity-50">China</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    Carroll Group
                    <br/>
                    <span class="badge badge-ghost badge-sm">Tax Accountant</span>
                  </td>
                  <td>Red</td>
                  <th>
                    <button class="btn btn-ghost btn-xs">details</button>
                  </th>
                </tr>
                <!-- row 3 -->
                <tr>
                  <th>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </th>
                  <td>
                    <div class="flex items-center space-x-3">
                      <div class="avatar">
                        <div class="mask mask-squircle w-12 h-12">
                          <img src="/tailwind-css-component-profile-4@56w.png" alt="Avatar Tailwind CSS Component" />
                        </div>
                      </div>
                      <div>
                        <div class="font-bold">Marjy Ferencz</div>
                        <div class="text-sm opacity-50">Russia</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    Rowe-Schoen
                    <br/>
                    <span class="badge badge-ghost badge-sm">Office Assistant I</span>
                  </td>
                  <td>Crimson</td>
                  <th>
                    <button class="btn btn-ghost btn-xs">details</button>
                  </th>
                </tr>
                <!-- row 4 -->
                <tr>
                  <th>
                    <label>
                      <input type="checkbox" class="checkbox" />
                    </label>
                  </th>
                  <td>
                    <div class="flex items-center space-x-3">
                      <div class="avatar">
                        <div class="mask mask-squircle w-12 h-12">
                          <img src="/tailwind-css-component-profile-5@56w.png" alt="Avatar Tailwind CSS Component" />
                        </div>
                      </div>
                      <div>
                        <div class="font-bold">Yancy Tear</div>
                        <div class="text-sm opacity-50">Brazil</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    Wyman-Ledner
                    <br/>
                    <span class="badge badge-ghost badge-sm">Community Outreach Specialist</span>
                  </td>
                  <td>Indigo</td>
                  <th>
                    <button class="btn btn-ghost btn-xs">details</button>
                  </th>
                </tr>
              </tbody>
              <!-- foot -->
              <tfoot>
                <tr>
                  <th></th>
                  <th>Name</th>
                  <th>Job</th>
                  <th>Favorite Color</th>
                  <th></th>
                </tr>
              </tfoot>

            </table>
          </div>
    </div>

@endsection
