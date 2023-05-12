<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Article;

class ArtikelController extends Controller
{
    public function index()
    {
        $articlesAll = Article::all();
        return view('admin.artikel.index', ['title'=>'adaHEALTH | Artikel'],
        ['articlesAll' => $articlesAll]
    );
    }

    public function create()
    {
        return view('admin.artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles|max:255',
            'content' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|in:Berita,Tutorial,Review',
        ]);

        $imagePath = $request->file('images');
        $imagePath->store('upload/artikel', ['disk' => 'public_uploads']);


        $article = new Article;
        $article->title = $request->title;
        $article->slug = \Str::slug($request->title);
        $article->content = $request->content;
        $article->content2 = $request->content2;
        $article->content3 = $request->content3;
        $article->content4 = $request->content4;
        $article->category = $request->category;
        $article->images = $imagePath->hashName();
        $article->user_id = auth()->user()->id;
        $article->save();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }
}
