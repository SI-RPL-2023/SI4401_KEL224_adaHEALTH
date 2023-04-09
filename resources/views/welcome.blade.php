@extends('layout.layout')

@section('content')
<div class="w-screen h-screen bg-white">
    <div class="bg-[#6A62C4] h-[471px] w-screen">
        <div class="flex">
            <div class="w-[314px] flex flex-col justify-center items-center h-[471px]">
                <h1 class="text-white">-> Services</h1>
                <ul class="mt-[23px] text-[#BBBBBB]">
                    <li>
                        <a href="#">Pelatihan</a>
                    </li>
                    <li>
                        <a href="#">Chat dokter Spesialis</a>
                    </li>
                    <li>
                        <a href="#">Layanan kesehatan</a>
                    </li>
                    <li>
                        <a href="#">BMI</a>
                    </li>
                    <li>
                        <a href="#">Pelacakan kesehatan</a>
                    </li>
                </ul>
                <button class="w-[136px] h-[35px] border border-white rounded-[10px] text-white mt-[32px]">
                    Show All
                </button>
            </div>
            <div class="w-full h-[471px] flex flex-col justify-center ml-[100px] items-start">
                <img src="{{ url('asset/logokepotong.png') }}" alt="">
                <h1 class="text-white text-[64px] font-bold -mt-[50px]">Solusi Kesehatan <span class="font-medium text-[40px] text-white ml-[20px]">Terlengkap</span></h1>
                <div class="flex items-end gap-[33px] ml-[191px] mt-[65px]">
                    <a href="{{ url('rekomendasirs') }}">

                        <button>
                            <div class="bg-white w-[174px] h-[103px] rounded-[15px] text-start flex items-end p-[15px]">
                                Rekomendasi</br>Rumah Sakit
                            </div>
                        </button>
                    </a>
                    <button>
                        <div class="bg-white w-[174px] h-[103px] rounded-[15px] flex text-start items-end p-[15px]">
                            Rekomendasi</br>Apotek
                        </div>
                    </button>
                    <button>
                        <div class="bg-white w-[174px] h-[103px] rounded-[15px] text-start flex items-end p-[15px]">
                            Rekomendasi</br>Obat
                        </div>
                    </button>
                    <button>
                        <div class="bg-white bg-opacity-50 w-[174px] h-[103px] rounded-[15px] flex items-end p-[15px]">
                            Show All
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-around items-center mt-[62px] pb-[100px]">
        <div class="flex">
            <img src="{{ url('asset/icon-icon.png') }}" alt="">
            <div>
                <h1 class="text-[14px] font-semibold">Pelatihan (sertifikasi)</h1>
                <h1 class="font-medium text-[12px] mt-[46px]">Pelatihan secara online</br> atau daring</h1>
                <h1 class="text-[12px] text-[#8F8989] mt-[26px]">Anda bisa mendapatkan</br>
                    promo menarik untuk mengikuti</br>
                    sesi pelatihan ini !
                </h1>
                <button class="w-[111px] h-[38px] rounded-[10px] mt-[54px] bg-[#B982FF] text-white">Join Now</button>
            </div>
        </div>
        <div class="w-[4px] h-[273px] bg-[#D9D9D9]"></div>
        <div class="flex">
            <div>
                <h1 class="text-[14px] font-semibold">Chat dokter spesialis</h1>
                <h1 class="font-medium text-[12px] mt-[35px]">Layanan telemedisin</br>yang siap siaga untuk bantu</br>kamu hidup lebih sehat.</h1>
                <h1 class="text-[10px] text-[#8F8989] mt-[19px]">
                    Mengapa Harus Chat dengan Dokter Spesialis?
                </h1>
                <ol class="text-[10px] text-[#8F8989] list-disc">
                    <li>
                        <p>Satu aplikasi untuk berbagai kebutuhan</br>periksa dokter, tes lab hingga penebusan resep obat.</p>
                    </li>
                    <li>
                        <p>Dapatkan rujukan ke pemeriksaan offline</br>di RS atau pemeriksaan diagnostik jika diperlukan.</p>
                    </li>
                    <li>
                        <p>Dapat diintegrasikan dengan asuransimu agar</br>kebutuhan kesehatan online terjamin asuransi.</p>
                    </li>
                </ul>
                <button class="w-[111px] h-[38px] rounded-[10px] mt-[19px] bg-[#B982FF] text-white">Lihat Dokter</button>
            </div>
            <img src="{{ url('asset/dokter.png') }}" alt="" class="w-[337px]">
        </div>
        <div class="w-[4px] h-[273px] bg-[#D9D9D9]"></div>
        <div>
            <button>
                <img src="{{ url('asset/lainnya.png') }}" alt="">
                <h1>Lainnya</h1>
            </button>
        </div>
    </div>
</div>
@endsection
