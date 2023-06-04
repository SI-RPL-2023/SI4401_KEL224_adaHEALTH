@extends('layout.layout')

@section('content')

<div class="flex justify-center items-center w-screen h-screen mb-[-130px]">
    <img src="{{ url('asset/obesitywoman.png') }}" alt="" class="w-[337px]">
    <div class="mt-4 flex flex-col lg:row-span-3 lg:mt-0 ml-[30px]  items-center">
        <p class="text-[32px] mt-[40px] text-center font-bold">Kalkulator BMI</p>
        <a class="text-[20px] mt-[40px] text-gray-900 font-regular text-[#BEBEBE] ">Yuk, ketahui berat badan ideal kamu dengan kalkulator BMI</a>
        <button class="bg-[#3F55AC] mt-[32px] drop-shadow-lg opacity-90 w-[500px] h-[90px] font-bold text-white text-[32px] rounded-[15px]"><a href="#bmi">Hitung BMI</a> </button>
    </div>
</div>

<div>
    <div class="ml-[320px] mb-[300px]">
        <h1 class="text-[32px] font-bold">Manfaat Kalkulator BMI</h1>
        <p class="text-[20px] gap-3 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
            Bisa mengetahui indeks massa tubuh</p>
        <p class="text-[20px] gap-3 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
            Mudah untuk mencari solusi berat badan </p>
            <p class="text-[20px] gap-3 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg> Lebih waspada terhadap massa tubuh </p>
                <p class="text-[20px] gap-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg> Jauhi obesitas </p>
    </div>
</div>

<div class="flex justify-center items-center w-screen h-screen">
    <div class="bg-[#E8E6FD] w-[1200px] h-[700px] rounded-[20px]">
        <h1 class="font-bold mt-[32px] ml-[32px] text-[32px]" id="bmi"> Kalkulator BMI (IMT) </h1>
        <a class="font-regular text-[#5D5B5B] mt-[56px] ml-[32px] text-[20px] "> Gunakan kalkulator ini untuk memeriksa Indeks Massa Tubuh (IMT) dan mengecek apakah berat badan Anda ideal atau tidak. </a>
<style>
.card.active {
    border: 2px solid #6A62C4;
}
</style>
            <div class="flex justify-center items-center mt-[50px]">
                <div class="card bg-white flex justify-center items-center w-[300px] h-[190px] rounded-[35px] flex-col mr-6" data-card="male">
                    <img src="{{ url('asset/male.png') }}" alt="" class="flex justify-center items-center w-[120px] h-[123px]">
                    <a class="text-bold text-[#6A62C4]">male</a>
                </div>
                <div class="card bg-white flex justify-center items-center w-[300px] h-[190px] rounded-[35px] flex-col ml-6" data-card="female">
                    <img src="{{ url('asset/women.png') }}" alt="" class="w-[120px] h-[123px]">
                    <a class="text-bold text-[#6A62C4]">female</a>
                </div>
            </div>
<script>
    const cards = document.querySelectorAll('.card');
    
    
    cards.forEach(card => {
        card.addEventListener('click', () => {
            
            cards.forEach(c => c.classList.remove('active'));
            
            card.classList.add('active');
        });
    });
</script>
        
        <form action="{{ route('kalkulatorbmi.check') }}" method="POST" class="flex justify-center items-center flex-col text-start">
            @csrf
            <label class="text-[#909090] mb-[20px]" for=""></label>
                <input type="text" class="w-[400px] h-[45px] pl-[30px] rounded-[20px]" name="height" id="height" placeholder="Tinggi Badan (cm)">
            <label class="text-[#909090] mt-[20px]" for=""></label>
                <input type="text" class="w-[400px] h-[45px] pl-[30px] rounded-[20px]" name="weight" id="weight" placeholder="Berat Badan (kg)">
            <button type="submit" class="bg-[#3F55AC] mt-[20px] drop-shadow-lg opacity-90 w-[250px] h-[70px] font-semi-bold text-white text-[20px] rounded-[20px]"">Hitung</button>
        </form>
        

    </div>
</div>

<div class="flex justify-center items-center w-screen h-screen mt-[-250px]">
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