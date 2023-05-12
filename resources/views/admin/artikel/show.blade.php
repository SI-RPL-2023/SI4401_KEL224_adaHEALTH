@extends('layout.layout')

@section('content')

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-[100px]">
        <a href="{{ url('/artikel') }}" class="flex">
        <svg style="width:24px;height:24px"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>arrow-left-thick</title><path d="M20,10V14H11L14.5,17.5L12.08,19.92L4.16,12L12.08,4.08L14.5,6.5L11,10H20Z" />
        <span>Back</span>
        </svg>
        </a>
        <div class=" top-0 left-[202px] flex items-center mt-32">
            
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
                <div class="mb-4">
                    <img src="{{ asset('upload/artikel/'.$article->images) }}" alt="Article Image" class="w-50 object-cover rounded-lg">
                </div>
                <div class="text-gray-700 text-lg mb-4">
                    <strong>{{ $article->title_content }}</strong>
                    <div class="text-gray-700 text-lg mb-4">

                    
                    @php
                        $content = $article->isi_content;
                        $sentences = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $content);
                    @endphp
                    @foreach ($sentences as $sentence)
                        <p>{{ $sentence }}</p>
                    @endforeach
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/4 lg:pl-8">
                <h2 class="text-xl font-bold mb-4">Artikel Terkait</h2>
                @foreach ($relatedArticles as $relatedArticle)
                <div class="my-4">
                    <img src="{{ asset('upload/artikel/'.$relatedArticle->images) }}" alt="Article Image" class="w-full h-48 object-cover">
                    <h3 class="text-xl font-bold"><a href="{{ route('artikel.show', $relatedArticle->id) }}">{{ $relatedArticle->title_content }}</a></h3>
                    <p class="text-gray-600">{{ $relatedArticle->created_at }}</p>
                </div>
                @endforeach
            
            </div>
        </div>
    </div>
@endsection
