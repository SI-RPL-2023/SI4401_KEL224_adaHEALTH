@extends('layout.layout')

@section('content')

<div class="relative w-screen h-screen flex items-center justify-center">
    <div class="absolute inset-0 z-0">
      <img src="{{ asset('upload/artikel/'.$article->images) }}" class="w-screen h-screen object-cover" alt="userphoto">
    </div>
    <div class="bg-[#6A62C4] h-[303px] flex justify-center items-end">
      <button class="w-[242px] h-[48px] bg-white text-red-500 rounded-[20px] font-bold text-[20px]">logout</button>
    </div>
    <div class="w-[190px] h-[190px] flex justify-center items-center bg-white rounded-full shadow-lg z-0">
      <img src="{{ asset('upload/artikel/'.$article->images) }}" class="rounded-full w-[170px] h-[170px]" alt="userphoto">
    </div>
    <div class="bg-[#6A62C4] bg-opacity-75 text-white text-center z-0 absolute top-0 bottom-0 left-0 right-0 px-10 py-20 flex flex-col justify-center">
      <h1 class="text-4xl font-bold">{{ $article->title }}</h1>
      <p class="text-sm mt-8 self-end">Published {{ $article->created_at->diffForHumans() }}</p>
    </div>
  </div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-[100px]">
    <a href="{{ url('/artikel') }}" class="flex">
        <svg style="width:24px;height:24px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <title>arrow-left-thick</title>
            <path d="M20,10V14H11L14.5,17.5L12.08,19.92L4.16,12L12.08,4.08L14.5,6.5L11,10H20Z" />
        </svg>
        <span>Back</span>
    </a>
    <div class="top-0 left-[202px] flex items-center mt-16 mb-32    ">
        <div class="text-sm breadcrumbs">
            <ul>
                <li><a href="{{ url('/') }}" class="text-[#756e6e]">Home</a></li>
                <li><a href="{{ url('/artikel') }}" class="text-[#756e6e]">Artikel</a></li>
                <li><a href="{{ url('#') }}" class="text-[#3b529d]">{{ $article->title }}</a></li>
            </ul>
        </div>
    </div>
    <div class="flex flex-col lg:flex-row">
        <div class="w-full lg:w-3/4">
            <h1 class="text-4xl font-bold mb-4">{{ $article->title }}</h1>
            <div class="flex mb-16 mt-5">
                <span class="badge badge-accent badge-outline ">@if($article->category) {{ $article->category }} @else @endif</span>
                <span class="text-sm ml-5 text-[#7a6b6b]"> {{ $article->created_at->diffForHumans() }}</span>
                <span class="ml-5 text-[#7a6b6b]">-</span> <span class="text-[#7a6b6b] ml-2">Dibuat oleh</span>
                <a href="" class="ml-5 text-[#3b68d7]"> {{ $article->user->name }}</a>
                <span class="ml-3 text-[#7a6b6b]">{{ date('d M Y', strtotime($article->created_at)) }}</span>
            </div>
            <div class="mb-4">
                <img src="{{ asset('upload/artikel/'.$article->images) }}" alt="Article Image" class="w-50 object-cover rounded-lg">
            </div>
            <div class="text-gray-700 text-lg mb-4">
                <strong>{{ $article->title_content }}</strong>
                <div class="text-gray-700 text-lg mb-4 mt-8">
                    <p class="mt-8"> {!! $article->isi_content !!}</p>
                    <hr>

                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/4 lg:pl-8">
            <h2 class="text-xl font-bold mb-4">Artikel Terkait</h2>
            <div class="grid gap-4 grid-cols-1">
                @foreach ($relatedArticles as $relatedArticle)
                <div class="flex bg-white rounded-lg shadow-md">
                    <img src="{{ asset('upload/artikel/'.$relatedArticle->images) }}" alt="Article Image" class="w-1/3 h-32 object-cover rounded-lg rounded-r-none">
                    <div class="p-4 flex flex-col justify-between">
                        <h3 class="text-md font-medium text-gray-900 mb-4">{{ $relatedArticle->title }}</h3>
                        <p class="text-sm leading-relaxed mb-2">{!! Str::limit(strip_tags($relatedArticle->isi_content), 80) !!}</p>
                        <div class="flex justify-between items-center">
                            <a href="{{ url('/artikel/'.$relatedArticle->id) }}" class="text-md font-medium text-[#3b529d] hover:text-[#5b5b5b]">Read more</a>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current text-gray-600 mr-1" viewBox="0 0 24 24">
                                    <path d="M12 4.984c-4.406 0-8 3.594-8 8.016 0 4.422 3.594 8.016 8 8.016s8-3.594 8-8.016c0-4.422-3.594-8.016-8-8.016zM12 19c-2.203 0-4-1.781-4-3.984h1.5c0 1.078.891 1.969 2.016 1.969s2.016-.891 2.016-1.969h1.5c0 2.203-1.797 3.984-4 3.984z"/>
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                </svg>
                                <p class="text-sm text-gray-600">{{ $relatedArticle->created_at}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
