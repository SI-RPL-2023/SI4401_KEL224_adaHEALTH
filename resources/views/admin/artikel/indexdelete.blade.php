@extends('layout.layout')

@section('content')
    <div class="container mx-auto px-12">
        <div class=" top-0 left-[202px] flex items-center mt-32">

            <div class="text-sm breadcrumbs">
                <ul>
                  <li><a href="{{ url('/') }}" class="text-[#756e6e]">Home</a></li>
                  <li><a href="#" class="text-[#3b529d]">Artikel</a></li>
                </ul>
            </div>
        </div>
        @if (session('success'))
        <div class="alert alert-success shadow-lg mb-4">
            <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('success') }}</span>
            </div>
        </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger shadow-lg">
                {{ session('error') }}
            </div>
        @endif
        <div class=" mt-[100px]">
                <form action="" class="flex">
                    <input type="text" placeholder="Cari artikel, seperti mencari peniti ditempat beras" class="input input-bordered flex-1 rounded-full" />
                    <button type="submit" class="btn btn-primary ml-2 rounded-full w-20 h-8 text font-mono">Cari</button>
                </form>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Foto</th>
                    <th>Jenis</th>
                    <th>Published</th>
                    <th>Checkbox</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->judul }}</td>
                    <td><img src="{{ $article->foto }}" alt="{{ $article->judul }}" width="50"></td>
                    <td>{{ $article->jenis }}</td>
                    <td>{{ $article->published }}</td>
                    <td><input type="checkbox" name="article[]" value="{{ $article->id }}"></td>
                    <td>
                        <form action="{{ route('article.delete', $article->id) }}" method="POST">
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
@endsection
