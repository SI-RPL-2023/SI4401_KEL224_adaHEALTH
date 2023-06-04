@extends('layout.layout')

@section('content')
<div class="flex justify-center mt-8">
    <div class="min-w-min">
        <div>Cari Artikel lain :</div>
        <form action="{{ route('artikel.search') }}" method="GET" class="flex">
            <input
                type="text"
                name="keyword"
                placeholder="Search"
                class="px-4 py-2 pr-10 rounded-lg border-2 border-gray-200 focus:outline-none focus:border-blue-500">
            <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                Search
            </button>
        </form>
    </div>
</div>

@if (isset($keyword))
    <div class="mt-4">
        <h2 class="text-xl font-semibold mb-2">"</h2>

        <div class="bg-white">
            <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Search Results for "{{ $keyword }}"</h2>

            @foreach ($searchResults as $result)
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                <div class="group relative">
                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                    <img src="{{ asset('upload/artikel/'.$result->images) }}" alt="{{ asset('upload/artikel/'.$result->title) }}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                    <h3 class="text-sm text-gray-700">
                        <a href="{{  route('artikel.show', $result->id) }}">
                        <span aria-hidden="true" class="absolute inset-0"></span>
                        {{ $result->title }}
                        </a>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">{{ $result->category  }}</p>
                    </div>
                    <p class="text-sm font-medium text-gray-900">{{ $result->user_id }}</p>
                </div>
                </div>
            </div>
            @endforeach
            @if ($searchResults->isEmpty())
                <p>No results found.</p>
            @endif


            </div>
        </div>


    </div>
@endif
@endsection
