@extends('layout.layout')

@section('content')
<div class="flex justify-center items-center w-screen h-screen">
    <div class="bg-[#E8E6FD] w-[1200px] h-[800px] rounded-[20px] flex-col justify-between mt-[100px]">
        <div class="ml-[55px] mr-[55px]">
            <h1 class="font-bold text-[32px] pt-[15px]">Hasil BMI</h1>
            <p class="text-[#5D5B5B]"> Berikut merupakan hasil dari perhitungan BMI</p>
        </div>
        <div class="flex justify-center items-center mt-[100px]">
            <div class="mt-4 flex flex-col lg:row-span-3 lg:mt-0 ml-[30px]  items-center">
                <div class="mt-4 flex flex-col lg:-span-3 lg:mt-0 ml-[30px]  items-center mt[-250px]">
                    @if (number_format($bmi, 1) <= 18.5)
                    <img src="{{ url('asset/kurangberatbadan.png') }}" alt="" class="flex justify-center items-center w-[96px] h-[180px]">
                    <p class="text-[32px] mt-[40px] text-center text-[#00B2FF] font-bold">Kurang berat badan</p>
                    <div class="flex flex-col items-center justify-center h-full mt-[200px]">
                        <div class="text-justify mt-[-100px]">
                            <h1 class="font-bold text-[24px]">Saran untukmu:</h1>
                            <p class="text-[#5D5B5B] flex items-center"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                </svg>
                                Konsumsi makanan yang mengandung banyak kalori dan nutrisi.  </p>
                                <p class="text-[#5D5B5B] flex items-center"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                        <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                    </svg> Makan lebih sering dalam porsi kecil. Daripada makan tiga kali sehari, coba makan lima sampai enam kali sehari dalam porsi yang lebih kecil.  </p>
                                    <p class="text-[#5D5B5B] flex items-center"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                        </svg> Lakukan latihan kekuatan. Olahraga kekuatan dapat membantu membangun otot dan meningkatkan berat badan. </p>
                                        <p class="text-[#5D5B5B] flex items-center"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                            </svg> Minum susu atau suplemen penambah berat badan. </p>
                        </div>
                    @elseif(number_format($bmi, 1) >= 18.5 && $bmi <= 24.9)
                    <img src="{{ url('asset/normal.png') }}" alt="" class="flex justify-center items-center w-[96px] h-[180px]">
                    <p class="text-[32px] mt-[40px] text-center text-[#00FF38] font-bold">Normal</p>
                    <div class="flex flex-col items-center justify-center h-full mt-[200px]">
                        <div class="text-justify mt-[-100px]">
                            <h1 class="font-bold text-[24px]">Saran untukmu:</h1>
                            <p class="text-[#5D5B5B] flex items-center"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                </svg>
                                Pilihlah makanan yang mengandung semua nutrisi yang dibutuhkan oleh tubuh, seperti protein, karbohidrat, lemak sehat, vitamin, dan mineral.  </p>
                                <p class="text-[#5D5B5B] flex items-center"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                        <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                    </svg> Pertahankan pola makan yang teratur. Cobalah untuk makan dalam porsi kecil tapi sering, minimal tiga kali sehari. </p>
                                    <p class="text-[#5D5B5B] flex items-center"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                        </svg> Lakukan olahraga secara teratur. Olahraga dapat membantu menjaga berat badan normal dan meningkatkan kesehatan secara keseluruhan. </p>
                                        <p class="text-[#5D5B5B] flex items-center"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                            </svg> Pertahankan kebiasaan hidup sehat lainnya. </p>
                        </div>
                    @else
                    <img src="{{ url('asset/obesitas.png') }}" alt="" class="flex justify-center items-center w-[96px] h-[180px]">
                    <p class="text-[32px] mt-[40px] text-center text-[#FF0000] font-bold">Obesitas</p>
                    <div class="flex flex-col items-center justify-center h-full mt-[200px]">
                        <div class="text-justify mt-[-100px]">
                            <h1 class="font-bold text-[24px]">Saran untukmu:</h1>
                            <p class="text-[#5D5B5B] flex items-center"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                </svg>
                                konsumsi makanan yang sehat dan seimbang, seperti buah-buahan, sayuran, biji-bijian, protein rendah lemak, dan lemak sehat. </p>
                                <p class="text-[#5D5B5B] flex items-center"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                        <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                    </svg> hindari makanan cepat saji, camilan manis dan berlemak, minuman bersoda, serta makanan olahan yang mengandung banyak gula dan garam. </p>
                                    <p class="text-[#5D5B5B] flex items-center"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                        </svg> Lakukan olahraga secara teratur, minimal 30 menit sehari, setidaknya lima kali seminggu. </p>
                                        <p class="text-[#5D5B5B] flex items-center"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                            </svg> Hindari kekurangan tidur, karena dapat memicu nafsu makan dan mengganggu metabolisme tubuh. </p>
                        </div>
                    @endif
                    <div class="mt-[-350px]">
                    <p class="text-[20px] mt-[30px] font-regular">Hasil BMI kamu {{ number_format($bmi, 1) }}</p></div>
                    <button class="bg-[#3F55AC] mt-[30px] drop-shadow-lg opacity-90 w-[200px] h-[70px] font-bold text-white text-[24px] rounded-[15px]"><a href="{{ url('/kalkulatorbmi') }}">test ulang</a></button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="flex justify-center items-center w-screen h-screen mt-[-200px]">
    <div class="bg-[#E8E6FD] w-[1200px] h-[150px] rounded-[20px] mt-[50px]">
        <div class=" mr-[55px]">
            <div class="flex ml-[20px] gap-2 items-center mt-[15px]">
                <div class="w-[25px] h-[25px] rounded-full flex justify-center items-center bg-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi text-white bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>
                </div>
                <h1 class="font-bold text-[20px]">Disclaimer</h1>
            </div>
            <p class="pb-[20px] ml-[55px]">BMI adalah alat penghitungan indeks massa tubuh yang dirancang untuk memberikan perkiraan kasar tentang berat badan ideal seseorang berdasarkan tinggi dan berat badannya. Namun, hasil kalkulator BMI tidak dapat dianggap sebagai diagnosis medis atau pengganti saran medis yang diberikan oleh dokter atau profesional kesehatan lainnya.</p>
        </div>
    </div>
</div>

@endsection 