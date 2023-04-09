@extends('layout.layout')

@section('content')
<div class="bg-white">
    <div class="pt-6">
      <nav aria-label="Breadcrumb">
        <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
          <li>
            <div class="flex items-center">
              <a href="#" class="mr-2 text-sm font-medium text-gray-900">Home</a>
              <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
              </svg>
            </div>
          </li>

          <li>
            <div class="flex items-center">
              <a href="#" class="mr-2 text-sm font-medium text-gray-900">Rumah Sakit</a>
              <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
              </svg>
            </div>
          </li>

          <li class="text-sm">
            <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">{{ $hospital->name }}</a>
          </li>
        </ol>
      </nav>
      <button class="bg-[#4c1d95] text-white hover:bg-sky-700 p-1.5 mr-5.5 rounded-lg">
        <a href="{{ url('rekomendasirs') }}">Back</a>
    </button>
      <!-- Image gallery -->
      <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
        <div class="aspect-h-4 aspect-w-3 hidden overflow-hidden rounded-lg lg:block">
          <img src="{{ url('images/'.$hospital->images) }}"  class="h-full w-full object-cover object-center">
        </div>
        <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
          <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
            <img src="{{ url('images/fas1.jpg') }}" alt="Model wearing plain black basic tee." class="h-full w-full object-cover object-center">
          </div>
          <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
            <img src="{{ url('images/fas2.jpg') }}" alt="Model wearing plain gray basic tee." class="h-full w-full object-cover object-center">
          </div>
        </div>
        <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
          <img src="{{ url('images/'.$hospital->images) }}" alt="Model wearing plain white basic tee." class="h-full w-full object-cover object-center">
        </div>
      </div>

      <!-- Product info -->
      <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
          <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ $hospital->name }}</h1>
        </div>
        @auth


        <!-- Options -->
        <div class="mt-4 lg:row-span-3 lg:mt-0">
          <h2 class="sr-only">Product information</h2>
          <p class="text-3xl tracking-tight text-gray-900">Rekomendasi</p>

          <!-- Reviews -->
          <div class="mt-6">
            <h3 class="sr-only">Reviews</h3>
            <div class="flex items-center">
              <div class="flex items-center">
                <!-- Active: "text-gray-900", Default: "text-gray-200" -->
                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>

                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>

                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>

                <svg class="text-gray-900 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>

                <svg class="text-gray-200 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                </svg>
              </div>





              <p class="sr-only">4 out of 5 stars</p>
              <a href="#" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">

                @if($reviewCount > 0)
                    <h2>{{ $hospital->name }}</h2>
                    <p>Review count: {{ $reviewCount }}</p>
                @else
                    <h6 class="text-secondary mb-0">Kosong</h6>
                @endif




              </a>
            </div>
          </div>
          <h2>{{ $hospital->name }}</h2>

          @php
              $ratingCounts = $hospital->ratings->groupBy('rating')->map(function ($ratings) {
                  return $ratings->count();
              })->toArray();

              $stars = [5, 4, 3, 2, 1];
          @endphp

          @foreach ($stars as $star)
              <p>{{ $star }} star: {{ $ratingCounts[$star] ?? 0 }} ratings</p>
          @endforeach

          <div class="mt-10">

            <!-- Sizes -->
            <div class="mt-10">
              <div class="flex items-center justify-between">
                <h3 class="text-sm font-medium text-gray-900">Fasilitas</h3>
              </div>

              <fieldset class="mt-4">
                <legend class="sr-only">Choose a size</legend>
                <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                  <!-- Active: "ring-2 ring-indigo-500" -->
                  <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-not-allowed bg-gray-50 text-gray-200">
                    <input type="radio" name="size-choice" value="XXS" disabled class="sr-only" aria-labelledby="size-choice-0-label">
                    <span id="size-choice-0-label">Laboratorium</span>

                    <span aria-hidden="true" class="pointer-events-none absolute -inset-px rounded-md border-2 border-gray-200">
                      <svg class="absolute inset-0 h-full w-full stroke-2 text-gray-200" viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                        <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke" />
                      </svg>
                    </span>
                  </label>

                  <!-- Active: "ring-2 ring-indigo-500" -->
                  <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                    <input type="radio" name="size-choice" value="XS" class="sr-only" aria-labelledby="size-choice-1-label">
                    <span id="size-choice-1-label">Kamar rawat inap</span>

                    <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                  </label>

                  <!-- Active: "ring-2 ring-indigo-500" -->
                  <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                    <input type="radio" name="size-choice" value="S" class="sr-only" aria-labelledby="size-choice-2-label">
                    <span id="size-choice-2-label">CT Scan</span>

                    <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                  </label>

                  <!-- Active: "ring-2 ring-indigo-500" -->
                  <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                    <input type="radio" name="size-choice" value="M" class="sr-only" aria-labelledby="size-choice-3-label">
                    <span id="size-choice-3-label">UGD</span>

                    <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                  </label>

                  <!-- Active: "ring-2 ring-indigo-500" -->
                  <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                    <input type="radio" name="size-choice" value="L" class="sr-only" aria-labelledby="size-choice-4-label">
                    <span id="size-choice-4-label">Farmasi</span>

                    <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                  </label>

                  <!-- Active: "ring-2 ring-indigo-500" -->
                  <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                    <input type="radio" name="size-choice" value="XL" class="sr-only" aria-labelledby="size-choice-5-label">
                    <span id="size-choice-5-label">Ruang Operasi</span>

                    <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                  </label>

                  <!-- Active: "ring-2 ring-indigo-500" -->
                  <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                    <input type="radio" name="size-choice" value="2XL" class="sr-only" aria-labelledby="size-choice-6-label">
                    <span id="size-choice-6-label">MRI</span>

                    <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                  </label>

                  <!-- Active: "ring-2 ring-indigo-500" -->
                  <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                    <input type="radio" name="size-choice" value="3XL" class="sr-only" aria-labelledby="size-choice-7-label">
                    <span id="size-choice-7-label">Bedah Operasi</span>

                    <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                  </label>
                  <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                    <input type="radio" name="size-choice" value="3XL" class="sr-only" aria-labelledby="size-choice-7-label">
                    <span id="size-choice-7-label">Ruang Keluarga</span>

                    <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                  </label>
                  <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                    <input type="radio" name="size-choice" value="3XL" class="sr-only" aria-labelledby="size-choice-7-label">
                    <span id="size-choice-7-label">Kafetaria</span>

                    <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                  </label>
                  <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                    <input type="radio" name="size-choice" value="3XL" class="sr-only" aria-labelledby="size-choice-7-label">
                    <span id="size-choice-7-label">Layanan Transportasi</span>

                    <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                  </label>
                  <label class="group relative flex items-center justify-center rounded-md border py-3 px-4 text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6 cursor-pointer bg-white text-gray-900 shadow-sm">
                    <input type="radio" name="size-choice" value="3XL" class="sr-only" aria-labelledby="size-choice-7-label">
                    <span id="size-choice-7-label">Radiologi</span>

                    <!--
                      Active: "border", Not Active: "border-2"
                      Checked: "border-indigo-500", Not Checked: "border-transparent"
                    -->
                    <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                  </label>
                </div>
              </fieldset>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h2>Nilai Rata-rata: {{ $hospital->averageRating() }}</h2>

            <form method="POST" action="{{ route('hospital.storeRating', ['id' => $hospital->id]) }}">
                @csrf
                <h2>Beri Nilai Rumah Sakit</h2>
                <input type="number" name="rating" step="1" min="0" max="5" required>
                <button type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Beri Nilai</button>
            </form>
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        </div>

        <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
          <!-- Description and details -->
          <div>
            <h3 class="sr-only">Description</h3>

            <div class="space-y-6">
              <p class="text-base text-gray-900">{{ $hospital->description }}</p>
            </div>
          </div>

          <div class="mt-10">
            <h3 class="text-sm font-medium text-gray-900">Address</h3>

            <div class="mt-4">
              <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                <li class="text-gray-400"><span class="text-gray-600">{{ $hospital->address }}</span></li>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d506820.922159171!2d107.31028985804836!3d-7.063388480586449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68eeb88c17d7b1%3A0x301e8f1fc28b8e0!2sBandung%20Regency%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1680188149240!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

              </ul>
            </div>
          </div>

          <div class="mt-10">
            <h2 class="text-sm font-medium text-gray-900">Contact Us</h2>

            <div class="mt-4 space-y-6">
              <p class="text-sm text-blue-600">{{ $hospital->phone_number }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @else
  <p>Jika ingin melihat detail, Silahkan <a href="{{ url('login') }}" class="text-[#1600FF]">Login </a> dahulu.</p>
  @endauth
@endsection
