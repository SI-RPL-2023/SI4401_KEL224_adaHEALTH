@extends('layout.layout')

@section('content')
<div>
    <style>
                .description {
        max-height: 80px; /* maksimum 4 baris dengan line-height 20px */
        line-height: 20px; /* jarak antar baris */
        overflow: hidden; /* teks yang melebihi 4 baris akan dihilangkan */
        }

    </style>
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Rekomendasi Rumah Sakit</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">Learn how to grow your Hospital with our recommended facility.</p>
          </div>
          <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @forelse($hospitals as $hospital)
            <article class="flex max-w-xl flex-col items-start justify-between">
              <div class="flex items-center gap-x-4 text-xs">
                <time datetime="2020-03-16" class="text-gray-500">Mar 16, 2020</time>
                <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">Recommended</a>
              </div>
              <div class="group relative">
                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                    <a href="{{ url('/hospitals/'.$hospital->id) }}">

                    <span class="absolute inset-0"></span>
                    {{ $hospital->name }}
                  </a>
                </h3>
                <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600 description">{{ $hospital->description}}</p>
              </div>
              <div class="relative mt-8 flex items-center gap-x-4">
                <img src="{{asset('upload/hospital/'.$hospital->images)}}" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                <div class="text-sm leading-6">
                  <p class="font-semibold text-gray-900">
                    <a href="#">
                      <span class="absolute inset-0"></span>
                      {{ $hospital->address }}
                    </a>
                  </p>
                  <p class="text-gray-600">{{ $hospital->phone_number }}</p>
                </div>
              </div>
            </article>
            @empty
            <div class="alert alert-info shadow-lg">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span>Tidak ada Rumah Sakit.</span>
                </div>
            </div>
            @endforelse
            <!-- More posts... -->
          </div>
        </div>
      </div>




</div>
@endsection
