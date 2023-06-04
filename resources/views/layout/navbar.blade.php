<nav class="bg-[#6A62C4]">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <img class="w-[100px] h-[80px] ml-[-97px] " src="{{url('asset/logonavbar.png')}}" alt="">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">

            </div>
            <div class="flex flex-1 items-center justify-center  sm:justify-start">
                <div class="w-[5px] h-[40px] bg-[#FFFFFF] ml-[95px]"></div>
                <label for="default-search" class="mb-2 text-sm font-medium  sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 ml-[20px] flex items-center pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input class=" w-[500px] ml-[10px] p-4 pl-10 text-sm bg-transparent focus:outline-none text-white placeholder:text-white " placeholder="Search">

                </div>
                <div class="flex flex-shrink-0 items-center">
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{ url('/') }}" class="text-gray-300 hover:bg-gray-700 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Beranda</a>

                        <a href="{{ url('/') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Layanan</a>

                        <a href="{{ url('/') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Tentang</a>

                        <a href="{{ url('/help') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Bantuan </a>
                    </div>
                    <div class="group">
                        <a href="#" class="text-gray-300 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">{{ Auth::user()->email }}</a>

                        <div class="group-hover:block hidden w-[100px] h-[150px] bg-white shadow-lg absolute mt-[5px]">
                        <a href="{{ route('profile.show', ['id' => Auth::user()->id]) }}"><button class="border-b border-black w-full flex items-center justify-center"> Profile</button></a>
                            <button class="border-b border-black w-full flex items-center justify-center"> <a href="{{ url('/feedback') }}"> Feedback Application</a></button>
                </div>
            </div>
            @auth
            <div class="relative">
                <div class="flex items-center">
                    <img src="{{ asset('upload/profile/' . Auth::user()->photo) }}" class="rounded-full w-8 h-8" alt="userphoto">
                    <button type="button" class="flex rounded-md bg-gray-800 text-sm text-gray-300 px-3 py-2 font-medium focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true" onclick="toggleDropdown()">
                        <span class="mr-1">{{ Auth::user()->email }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 h-4 text-white" fill="currentColor"><title>menu-down</title><path d="M7,10L12,15L17,10H7Z" /></svg>
                    </button>
                </div>
                <ul id="user-menu" class="hidden absolute right-0 mt-2 w-52 bg-white rounded-md shadow-lg py-1" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                    <li><a href="{{ route('profile.show', ['id' => Auth::user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Profile</a></li>
                    <li><a href="{{ url('/feedback') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Feedback Application</a></li>
                    <li><a href="{{ url('/history') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">History Pembelian</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="w-full block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>

            <script>
                function toggleDropdown() {
                    var dropdown = document.getElementById("user-menu");
                    dropdown.classList.toggle("hidden");
                }
            </script>
            @else
                <div>
                    <button class="bg-sky-500 hover:bg-sky-700 p-1.5 ml-1.5 rounded-lg">
                        <a href="{{ url('/login') }}">Login</a>
                    </button>
                    <button class="bg-[#4c1d95] text-white hover:bg-sky-700 p-1.5 ml-1.5 rounded-lg">
                        <a href="{{ url('/register') }}">Register</a>
                    </button>
                </div>
            @endauth

            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Dashboard</a>

            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Team</a>

            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Projects</a>

            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Calendar</a>
        </div>
    </div>
</nav>
