@extends('layout.layout')

@section('content')
<div class="w-screen h-screen bg-white">
    <div class="h-[471px] w-screen justify-around items-center">
        <div class="flex">
            <div class="row">
                <div class="col-md-12">
                
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-sm-5 my-1 rounded-lg" style="background-color: #E8E6FD; padding: 100px; width: 90%; margin: 0 auto; display: flex; justify-content: center; border-radius: 30px">
    <div class="row">
        <div class="col-md-12" style="text-align: left;">
        @if ($question == 0)
            <form action="{{ route('pelacakRequest') }}" method="post" id="question-form">
                @csrf
                    <h1 style="font-size: 50px; color:black;">Pelacak Kesehatan</h1>
                    <p1 style="font-size: 40px; color:black;">Yuk, ketahui kesehatan kamu dengan Pelacak Kesehatan</p1>
                <div style="display: flex; justify-content: flex-end;">
                    <button type="submit" name="question" value="1" style="border-radius: 10px; padding: 20px 45px; font-size: 18px; background-color: #6A62C4; color: white;">Mulai</button>
                </div>
            </form>
        @elseif ($question == 1)
            <form action="{{ route('pelacakRequest') }}" method="post" id="question-form">
                @csrf
                <h1 style="font-size: 50px; color:black;">Apakah anda mengalami demam?</h1>
                <div style="display: flex; align-items: center;">
                    <input type="radio" name="fever" value="yes" id="fever-yes" style="transform: scale(1.5);">
                    <label for="fever-yes" style="font-size: 24px; color: black; margin-left: 10px;">Iya</label>
                </div>
                <div style="display: flex; align-items: center;">
                    <input type="radio" name="fever" value="no" id="fever-no" style="transform: scale(1.5);">
                    <label for="fever-no" style="font-size: 24px; color: black; margin-left: 10px;">Tidak</label>
                </div>
                <div style="display: flex; justify-content: flex-end;">
                    <button type="submit" name="question" value="2" style="border-radius: 10px; padding: 20px 45px; font-size: 18px; background-color: #6A62C4; color: white;" onclick="return validateForm()">Next</button>
                </div>
            </form>
        @elseif ($question == 2)
            <form action="{{ route('pelacakRequest') }}" method="post" id="question-form">
                @csrf
                <h1 style="font-size: 50px; color:black;">Apakah anda mengalami batuk?</h1>
                <div style="display: flex; align-items: center;">
                    <input type="radio" name="cough" value="yes" id="fever-yes" style="transform: scale(1.5);">
                    <label for="cough-yes" style="font-size: 24px; color: black; margin-left: 10px;">Iya</label>
                </div>
                <div style="display: flex; align-items: center;">
                    <input type="radio" name="cough" value="no" id="fever-no" style="transform: scale(1.5);">
                    <label for="cough-no" style="font-size: 24px; color: black; margin-left: 10px;">Tidak</label>
                </div>
                <div style="display: flex; justify-content: flex-end;">
                    <button type="submit" name="question" value="3" style="border-radius: 10px; padding: 20px 45px; font-size: 18px; background-color: #6A62C4; color: white;" onclick="return validateForm()">Next</button>
                </div>
            </form>
            @elseif ($question == 3)
                <form action="{{ route('pelacakRequest') }}" method="post" id="question-form">
                    @csrf
                    <h1 style="font-size: 50px; color:black;">Apakah anda mengalami pusing?</h1>
                    <div style="display: flex; align-items: center;">
                        <input type="radio" name="headache" value="yes" id="headache-yes" style="transform: scale(1.5);">
                        <label for="headache-yes" style="font-size: 24px; color: black; margin-left: 10px;">Iya</label>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <input type="radio" name="headache" value="no" id="headache-no" style="transform: scale(1.5);">
                        <label for="headache-no" style="font-size: 24px; color: black; margin-left: 10px;">Tidak</label>
                    </div>
                    <div style="display: flex; justify-content: flex-end;">
                    <button type="submit" name="question" value="4" style="border-radius: 10px; padding: 20px 45px; font-size: 18px; background-color: #6A62C4; color: white;" onclick="return validateForm()">Next</button>
                </div>
                </form>
            @elseif ($question == 4)
                <form action="{{ route('pelacakRequest') }}" method="post" id="question-form">
                    @csrf
                    <h1 style="font-size: 50px; color:black;">Apakah anda mengalami sakit tenggorokan?</h1>
                    <div style="display: flex; align-items: center;">
                        <input type="radio" name="sore_throat" value="yes" id="sore-throat-yes" style="transform: scale(1.5);">
                        <label for="sore-throat-yes" style="font-size: 24px; color: black; margin-left: 10px;">Iya</label>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <input type="radio" name="sore_throat" value="no" id="sore-throat-no" style="transform: scale(1.5);">
                        <label for="sore-throat-no" style="font-size: 24px; color: black; margin-left: 10px;">Tidak</label>
                    </div>
                    <div style="display: flex; justify-content: flex-end;">
                        <button type="submit" name="question" value="5" style="border-radius: 10px; padding: 20px 45px; font-size: 18px; background-color: #6A62C4; color: white;" onclick="return validateForm()">Next</button>
                    </div>
                </form>
                @elseif ($question == 5)
                    <form action="{{ route('pelacakRequest') }}" method="post" id="question-form">
                        @csrf
                        <h1 style="font-size: 40px; color:black;">Hasil Diagnosis anda adalah: {{$diagnosis}}  </h1>
                    </form>
        @endif 
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var form = document.getElementById('question-form');
                var radioInputs = form.querySelectorAll('input[type="radio"]');
                var questionValue = document.querySelector('input[name="question"]').value;
        
                // Mengecualikan validasi untuk pertanyaan pertama
                if (questionValue !== "0") {
                    form.addEventListener('submit', function(event) {
                        var isRadioChecked = false;
        
                        // Cek apakah ada input radio yang tercentang
                        for (var i = 0; i < radioInputs.length; i++) {
                            if (radioInputs[i].checked) {
                                isRadioChecked = true;
                                break;
                            }
                        }
        
                        if (!isRadioChecked) {
                            event.preventDefault(); // Mencegah pengiriman formulir jika tidak ada input radio yang tercentang
                            alert('Silakan pilih salah satu opsi sebelum melanjutkan.'); // Tampilkan pesan peringatan
                        }
                    });
                }
            });
        </script>

            </div>
        </div>
    </div>
</div>
@endsection
