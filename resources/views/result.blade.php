@extends('layout.layout')

@section('content')

<div class="landing-container flex justify-center items-center flex-col">
  <img src="{{ url('asset/icon-icon.png') }}" alt="" class="mb-4">
  <h1 class="text-2xl font-bold">Anda telah menyelesaikan program ini</h1>
  <br>
  <p class="text-center">
    Para peserta hanya memiliki kesempatan satu kali<br>
    Peserta dapat melihat kelulusan program sertifikasi dibawah<br>
    Peserta juga dapat melihat skor yang didapat<br>
    Peserta yang lulus diharuskan menginput nama lengkap sesuai KTP untuk sertifkasi<br>
    Peserta yang tidak lulus diharapkan untuk tetap semangat!<br>
  </p>
    <p class="text-center mt-4">
        <strong>Terima Kasih telah mengikuti program sertifkasi adaHEALTH!</strong><br>
    </p>
    <br>
    <br>
    @if ($score >= 4)
      <p class="text-center mt-4">
        Selamat Anda <strong>lulus</strong> program sertifikat!<br>
        Skor Anda: {{ $score }} / {{ count($questions) }}<br>
      </p>
      <br>
      <form action="{{ route('certificate.generate') }}" method="POST" class="flex flex-col items-center">
          @csrf
          <div class="form-group mb-6">
            <input type="text" name="name" id="exampleInput7" placeholder="Masukkan Nama Lengkap (KTP) anda"
              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              required>
          </div>
          <button type="submit" class="btn btn-primary">Generate Certificate</button>
      </form>
    @else
      <p>Maaf, Anda tidak mendapatkan sertifikat.</p>
      <p>Skor Anda: {{ $score }} / {{ count($questions) }}</p>
    @endif
  </div>
</div>

<!--
<div class="result-container">
  <h2>Hasil Quiz</h2>
  <div class="score">
    <p>Skor Anda: {{ $score }} / {{ count($questions) }}</p>
    @if ($score >= 4)
      <p>Selamat Anda lulus!</p>
      <form action="{{ route('certificate.generate') }}" method="POST">
        @csrf
        <label for="name">Masukkan Nama:</label>
        <input type="text" name="name" required>
        <button type="submit" class="btn btn-primary">Generate Certificate</button>
      </form>
    @else
      <p>Maaf, Anda tidak mendapatkan sertifikat.</p>
    @endif
  </div>
</div>
-->
@endsection
