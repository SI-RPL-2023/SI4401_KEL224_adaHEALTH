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
            'editor' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'category' => 'required|in:Berita,Tutorial,Review,Kesehatan,Penyakit Diabetes,Penyakit Flu,All Penyakit',
        ]);

        $imagePath = $request->file('images');
        $imagePath->store('upload/artikel', ['disk' => 'public_uploads']);


        $article = new Article;
        $article->title = $request->title;
        $article->slug = \Str::slug($request->title);

        $article->title_content = $request->title_content;
        $article->isi_content = $request->editor;



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

    public function edit($id)
    {
        $article = Article::find($id);
        if (!$article) {
            abort(404);
        }
        return view('admin.artikel.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);


        $article->title = $request->title;
        $article->slug = \Str::slug($request->title);

        $article->title_content = $request->title_content;
        $article->isi_content = $request->editor;

        $article->category = $request->category;
        if($request->hasFile('images')) {
            $imageName = $request->file('images');
            $imageName->store('upload/artikel', ['disk' => 'public_uploads']);

            //delete gambar image
            if($article->images != null) {
                $path = public_path('upload/artikel/'.$article->images);
                if(file_exists($path)) {
                    unlink($path);
                } else {
                    return response()->json(['message' => 'File not found.'], 404);
                }
            }

            // Simpan nama gambar yang baru ke dalam database
            $article->images = $imageName->hashName(); // atau $imageName->getClientOriginalName()
        }


        $article->save();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $artikel = Article::findOrFail($id);
        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $searchResults = Article::where('title', 'like', '%' . $keyword . '%')
                ->orWhere('category', 'like', '%' . $keyword . '%')
                ->orWhere('isi_content', 'like', '%' . $keyword . '%')
                ->orWhere('title_content', 'like', '%' . $keyword . '%')
                ->get();
        } else {
            $searchResults = collect(); // Menggunakan koleksi kosong jika keyword tidak ada
        }

        return view('admin.artikel.search', compact('searchResults', 'keyword'));
    }


}
