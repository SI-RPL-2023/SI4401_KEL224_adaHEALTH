@extends('layout.layout')

@section('content')
<div class="landing-container flex justify-center items-center flex-col">
  <img src="{{ url('asset/icon-icon.png') }}" alt="" class="mb-4">
  <h1 class="text-2xl font-bold">Penjelasan mengenai program ini.</h1>
  <br>
  <p class="text-center">
    Para peserta hanya memiliki kesempatan satu kali <br>
    Sebelum mengikuti program ini, diharapkan untuk login atau register ke dalam website terlebih dahulu.<br>
    Setelah anda telah login, peserta akan menjawab pertanyaan-pertanyaan seputar kesehatan yang berada dalam modul.<br>

    <a href="https://drive.google.com/file/d/1k4GcpLefVDHgVCB4Pm9dmLLkt7un0y9t/view?usp=sharing" class="text-primary" target="_blank">Lihat Modul Disini</a> <br>

  </p>
    <p class="text-center mt-4">
        <strong>Pra-syarat untuk lolos program ini:</strong><br>
        <strong>Peserta dengan poin kurang dari target dianggap tidak lolos.</strong>
    </p>
    <br>
    <br>
    <a href="{{ Auth::check() ? route('quiz.start') : '#' }}" class="btn btn-primary">Mulai Program</a>
    @if (!Auth::check())
      <script>
          document.querySelector('.btn-primary').addEventListener('click', function(event) {
              event.preventDefault();
              alert("Anda harus login terlebih dahulu!");
          });
      </script>
    @endif
</div>
@endsection

