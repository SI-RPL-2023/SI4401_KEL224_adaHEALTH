<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Models\Article;

class ArtikelController extends Controller
{
    public function index()
    {
        $articlesAll = Article::all(); // Artikel Semua
        $articlesKesehatan = Article::where('category', 'Kesehatan')->get(); // Artikel Category Kesehatan
        $articlesBerita = Article::where('category', 'Berita')->get(); // Artikel Category Berita
        $latestArticle = Article::latest()->first(); // Artikel Terbaru
        $popularArticle = Article::orderBy('views', 'desc')->first();

        return view('admin.artikel.index',  compact('popularArticle'), [
            'title' => 'adaHEALTH | Artikel',
            'articlesAll' => $articlesAll,
            'articlesKesehatan' => $articlesKesehatan,
            'articlesBerita' => $articlesBerita,
            'latestArticle' => $latestArticle

        ]);
    }

    public function create()
    {
        return view('admin.artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles|max:255',
            'title_content' => 'required',
            'isi_content' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|in:Berita,Tutorial,Review,Kesehatan,Penyakit Diabetes,Penyakit Flu,All Penyakit',
        ]);

        $imagePath = $request->file('images');
        $imagePath->store('upload/artikel', ['disk' => 'public_uploads']);


        $article = new Article;
        $article->title = $request->title;
        $article->slug = \Str::slug($request->title);

        $article->title_content = $request->title_content;
        $article->isi_content = $request->isi_content;

        $article->title_content2 = $request->title_content2;
        $article->isi_content2 = $request->isi_content2;

        $article->title_content3 = $request->title_content3;
        $article->isi_content3 = $request->isi_content3;

        $article->title_content4 = $request->title_content4;
        $article->isi_content4 = $request->isi_content4;

        $article->category = $request->category;
        $article->images = $imagePath->hashName();
        $article->user_id = auth()->user()->id;
        $article->save();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function show($id)
    {
        $article = Article::find($id);
        $relatedArticles = DB::table('articles')
        ->where('id', '!=', $id)
        ->where('category', $article->category)
        ->orderBy('views', 'desc')
        ->take(3)
        ->get();


        if (!$article) {
            abort(404);
        }

        $article->increment('views');
        return view('admin.artikel.show', compact('article','relatedArticles'));
    }

}
