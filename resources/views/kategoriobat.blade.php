@extends('layout.layout')

@section('content')
    <div class="bg-[#6A62C4] pt-10 pl-10 min-h-min w-screen">
        <div class="flex">
            <a href="" class="text-white mr-2">Home</a>
            <h1 class="text-white mr-2">></h1>
            <a href="" class="text-white">Obat & Vitamin</a>
        </div>
        <div class="flex flex-col justify-center items-center text-white">
            <h1 class="font-bold text-3xl mt-[150px]">Kategori</h1>
            <div id="visibleDiv" class="mt-[62px] grid grid-cols-4 gap-4 justify-center text-[#6A62C4]">
                @foreach ($kategoriObat->take(4) as $kategori)
                    @php
                        $obat = App\Models\Obat::where('kategori', $kategori->kategori)->first();
                    @endphp
                    <a href="{{ route('obatkategori', ['kategori' => $kategori->kategori]) }}">
                        <div class="w-[251px] h-[155px] rounded-[20px] bg-white pb-[17px] flex flex-col items-center font-bold uppercase">
                            <img class="w-full object-cover mb-2 rounded-t-[20px] h-[100px]" src="{{ asset('upload/obat/'. $obat->photo) }}" />
                            {{ $kategori->kategori }}
                        </div>
                    </a>
                @endforeach
            </div>
            <div id="hiddenDiv" class="hidden grid grid-cols-4 gap-4 justify-center text-[#6A62C4] mt-5">
                @foreach ($kategoriObat->skip(4) as $kategori)
                    @php
                        $obat = App\Models\Obat::where('kategori', $kategori->kategori)->first();
                    @endphp
                    <a href="{{ route('obatkategori', ['kategori' => $kategori->kategori]) }}">
                        <div class="w-[251px] h-[155px] rounded-[20px] bg-white pb-[17px] flex flex-col items-center font-bold uppercase">
                            <img class="w-full object-cover mb-2 rounded-t-[20px] h-[100px]" src="{{ asset('upload/obat/'. $obat->photo) }}" />
                            {{ $kategori->kategori }}
                        </div>
                    </a>
                @endforeach
            </div>
            <div id="toggleBtn">
                <h1 id="toggleText" class="text-white text-[24px] mt-[70px] font-medium">See More&nbsp;&gt;</h1>
            </div>
        </div>
    </div>

    <script>
        const toggleBtn = document.getElementById('toggleBtn');
        const visibleDiv = document.getElementById('visibleDiv');
        const hiddenDiv = document.getElementById('hiddenDiv');
        const toggleText = document.getElementById('toggleText');

        toggleBtn.addEventListener('click', function() {
            hiddenDiv.classList.toggle('hidden');
            if (hiddenDiv.classList.contains('hidden')) {
                toggleText.textContent = 'See More&nbsp;&gt;';
            } else {
                toggleText.textContent = 'See Less';
            }
        });
    </script>
@endsection
