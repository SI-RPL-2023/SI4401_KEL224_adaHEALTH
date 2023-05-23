@extends('layout.layout')

@section('content')
    <div class="bg-[#6A62C4] pt-10 pl-10 h-screen w-screen">
        <div class="flex">
            <a href="" class="text-white mr-2">Home</a>
            <h1 class="text-white mr-2">></h1>
            <a href="" class="text-white">Obat & Vitamin</a>
        </div>
        <div class="flex flex-col justify-center items-center text-white">
            <h1 class="font-bold text-3xl mt-[150px]">Kategori</h1>
            <div class="mt-[62px] flex gap-[46px] justify-center text-[#6A62C4]">
                @foreach ($kategoriObat->take(4) as $kategori)
                    <a href="{{ route('obatkategori', ['kategori' => $kategori->kategori]) }}"><div class="w-[251px] h-[155px] rounded-[20px] bg-white pb-[17px] flex justify-center items-end font-bold uppercase">{{ $kategori->kategori }}</div></a>
                @endforeach
            </div>
            <div id="hiddenDiv" class="mt-[62px] hidden flex gap-[46px] justify-center text-[#6A62C4]">
                @foreach ($kategoriObat->skip(4)->take(4) as $kategori)
                    <a href=""><div class="w-[251px] h-[155px] rounded-[20px] bg-white pb-[17px] flex justify-center items-end font-bold uppercase">{{ $kategori->kategori }}</div></a>
                @endforeach
            </div>
            <div id="toggleBtn"><h1 id="toggleText" class="text-white text-[24px] mt-[70px] font-medium">see more&nbsp;></h1></div>
        </div>
    </div>

    <script>
        const toggleBtn = document.getElementById('toggleBtn');
        const hiddenDiv = document.getElementById('hiddenDiv');
        const toggleText = document.getElementById('toggleText');

        toggleBtn.addEventListener('click', function() {
            hiddenDiv.classList.toggle('hidden');
            if (hiddenDiv.classList.contains('hidden')) {
                toggleText.textContent = 'see more >';
            } else {
                toggleText.textContent = 'see less';
            }
        });
    </script>
@endsection
