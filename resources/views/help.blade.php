@extends('layout.layout')

@section('content')
<!-- Container for demo purpose -->
<div class="container my-24 px-6 mx-auto">

    <!-- Section: Design Block -->
    <section class="mb-32 text-gray-800">
      <div class="grid lg:grid-cols-2 gap-4 lg:gap-x-12 lg:mb-0">
        <div class="mb-12 lg:mb-0">

          <h2 class="text-3xl font-bold mb-6">Frequently asked questions</h2>

          <p class=" mb-12">
            Didn't find your answer in the FAQ? Write here or Click
            <a href="https://wa.me/6281381796079?text=Nama%3A%0AEmail%3A%0AMesaage%3A" class="underline">here</a> for live chat.
          </p>


          <form>
            <div class="form-group mb-6">
              <input type="text"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="exampleInput7" placeholder="Name" />
            </div>
            <div class="form-group mb-6">
              <input type="email"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="exampleInput8" placeholder="Email address" />
            </div>
            <div class="form-group mb-6">
              <textarea
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="exampleFormControlTextarea13" rows="3" placeholder="Message"></textarea>
            </div>

            @if (Auth::check() && (empty(Auth::user()->name) || empty(Auth::user()->date_birth) || empty(Auth::user()->gender) || empty(Auth::user()->address)))
            <div class="alert alert-error shadow-lg">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span class="">Wait! Please complete your profile before send questions.</span>
                </div>
                <div class="flex-none">
                    <button class="btn btn-sm"><a href="{{ url('profile') }}"></a> Isi Profile</button>
                </div>
            </div>
            @else
            <div class="form-group form-check text-center mb-6">
              <input type="checkbox"
                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain mr-2 cursor-pointer"
                id="exampleCheck87" checked />
              <label class="form-check-label inline-block text-gray-800" for="exampleCheck87">Send me a copy of this
                message</label>
            </div>
            <button type="submit"
              class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
              Send
            </button>
            @endif
          </form>
        <div class="overflow-x-auto mt-5">
            <table class="table table-zebra w-full">
              <!-- head -->
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Question</th>
                      <th>Answer</th>
                    </tr>
              </thead>
            <tbody>
                <!-- row 1 -->
                @if (count($questions) > 0)
                @foreach ($questions as $question)
                    <tr>
                        <th>{{ $question->user_id }}</th>
                        <td>{{ $question->messages }}</td>
                        @foreach ($question->answers as $answer)
                            <td> {{ $answer->description }} </td>
                        @endforeach
                @endforeach
                    </tr>
                @else
                    <td class="text-center mt-10">Belum ada pertanyaan dan jawaban yang tersedia.</td>
                @endif
              </tbody>
            </table>
          </div>

        </div>
        <div class="mb-6 md:mb-0">
          <p class="font-bold mb-4">Jam operasional live chat aplikasi website ADAHEALTH?</p>
          <p class="text-gray-500 mb-12">
            Fitur live chat pada aplikasi ADAHEALTH siap membantu anda dalam 24 Jam
          </p>

          <p class="font-bold mb-4">Live chat dapat menjawab seputar apa?</p>
          <p class="text-gray-500 mb-12">
            Fitur live chat pada website ADAHEALTH dapat menjawab seluruh kendala dan cara penggunaan aplikasi website ADAHEALTH.
          </p>

          <p class="font-bold mb-4">Saya sudah melakukan pembayaran obat. Bagaimana cara mengecek status pesanan?</p>
          <p class="text-gray-500 mb-12">
            * Kunjungi 'History Transaksi' dari bagian bawah aplikasi website ADAHEALTH. Kemudian,
             pilih pesanan terkait untuk melihat statusnya.<br>
            * User akan ditampilkan halaman status pesanan.
          </p>

          <p class="font-bold mb-4">
            Bagaimana cara menemukan rumah sakit terdekat dari lokasi tempat tinggal saya?
          </p>
          <p class="text-gray-500 mb-12">
            * User dapat menentukan alamat tempat tinggal pada ‘Akun Profil’ <br>
            * Selanjutnya pilih ‘Rekomendasi Rumah Sakit’ <br>
            * User akan ditampilkan halaman Rekomendasi Rumah Sakit sesuai dengan alamat terdekat
          </p>

          <p class="font-bold mb-4">
            Apakah saya dapat mengecek keadaan kesehatan saya saat ini?
          </p>
          <p class="text-gray-500 mb-12">
            Tentu bisa, dengan cara: <br>
            * Pilih ‘Pelacak Kesehatan’ <br>
            * User dapat mengisi survei yang telah disediakan sampai mengirimkan hasil jawaban survei tersebut<br>
            * User akan ditampilkan hasil pelacak kesehatan berdasarkan jwaban survei yang diberikan
          </p>


        </div>
      </div>
    </section>
    <!-- Section: Design Block -->

  </div>
  <!-- Container for demo purpose -->
    @endsection
