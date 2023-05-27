@extends('layout.layout')

@section('content')

<div class="px-[180px]">
    <div class=" top-0 left-[202px] flex items-center mt-32">

        <div class="">
            <h1 class="ml-2 text-base font-semibold text-[#6A62C4]">
                Home
            </h1>
        </div>
        <div class="w-[20px] border-b-2  border-slate-400 m-4"></div>

        <div class="">
            <h1 class="ml-2 text-base font-semibold text-black">
                All Services
            </h1>
        </div>

    </div>
    <div class="flex flex-row">
        <div class="basis-1/4">
            <div class="card w-96 bg-base-100 shadow-xl mt-10 mr-3">
                <figure><img src="{{ asset('images/hospital.webp') }}"  alt="Shoes" /></figure>
                <div class="card-body">
                  <h2 class="card-title">
                    Rekomendasi Rumah Sakit
                    <div class="badge badge-secondary">NEW</div>
                  </h2>
                  <p>Learn how to grow your Hospital with our recommended facility.</p>
                  <div class="card-actions justify-end">
                    <div class="badge badge-outline">Hospital</div>
                    <div class="badge badge-outline">Recommended</div>
                  </div>
                </div>
            </div>
        </div>
        <div class="basis-1/4">
            <div class="card w-96 bg-base-100 shadow-xl mt-10 mr-3">
                <figure><img src="{{ asset('images/apotek.png') }}"  alt="Shoes" /></figure>
                <div class="card-body">
                  <h2 class="card-title">
                    Rekomendasi Apotek
                    <div class="badge badge-primary">HOT</div>
                  </h2>
                  <p>Learn how to grow your Apotek with our recommended facility.</p>
                  <div class="card-actions justify-end">
                    <div class="badge badge-outline">Apotek</div>
                    <div class="badge badge-outline">Recommended</div>
                  </div>
                </div>
            </div>
        </div>
        <div class="basis-1/4">
            <div class="card w-96 bg-base-100 shadow-xl mt-10">
                <figure><img src="{{ asset('images/obat 3.png') }}"  alt="Shoes" /></figure>
                <div class="card-body">
                  <h2 class="card-title">
                    Rekomendasi Obat
                    <div class="badge badge-accent">Promo</div>
                  </h2>
                  <p>Learn how to grow your Health. Check Obat if you want now information.</p>
                  <div class="card-actions justify-end">
                    <div class="badge badge-outline">Obat</div>
                    <div class="badge badge-outline">Recommended</div>
                  </div>
                </div>
            </div>
        </div>
      </div>







</div>




@endsection
