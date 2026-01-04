<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Helpers\XOImageHelper;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->latest()->paginate(6);
        return view('pages.auth.article.index', compact('articles'));
    }

    public function create()
    {
        $users = User::pluck('name', 'id');
        return view('pages.auth.article.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        // Generate slug unik dari title
        $slug = Str::slug($validated['title']);
        $count = Article::where('slug', 'LIKE', "{$slug}%")->count();
        $validated['slug'] = $count ? "{$slug}-{$count}" : $slug;

        // Tambahkan user_id dari Auth
        $validated['user_id'] = Auth::id();

        // Upload image jika ada
        if ($request->hasFile('image')) {
            $validated['image'] = XOImageHelper::resizeCropSquareWebp(
                $request->file('image'),
                'articles'
            );
        }

        Article::create($validated);

        return redirect()->route('article.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        // Update slug jika title berubah
        if ($article->title !== $validated['title']) {
            $slug = Str::slug($validated['title']);
            $count = Article::where('slug', 'LIKE', "{$slug}%")->where('id', '!=', $article->id)->count();
            $validated['slug'] = $count ? "{$slug}-{$count}" : $slug;
        }

        // Upload image baru jika ada
        if ($request->hasFile('image')) {
            if ($article->image && Storage::disk('public')->exists($article->image)) {
                Storage::disk('public')->delete($article->image);
            }
            $validated['image'] = XOImageHelper::resizeCropSquareWebp(
                $request->file('image'),
                'articles'
            );
        }

        $article->update($validated);

        return redirect()->route('article.index')->with('success', 'Artikel berhasil diperbarui.');
    }


    public function destroy(Article $article)
    {
        if ($article->image && Storage::disk('public')->exists($article->image)) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('article.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
