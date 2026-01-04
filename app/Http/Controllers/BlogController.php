<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Banner;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        // Fitur Search
        $query = Article::with('user')->latest();

        if ($search = $request->input('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }
        $banners = Banner::first();
        $articles = $query->paginate(6);

        return view('pages.home.blogs.Index', compact('articles', 'banners'));
    }

    public function show($slug)
    {
        $banners = Banner::first();
        $collections = Collection::first();
        $article = Article::where('slug', $slug)->with('user')->firstOrFail();

        // ambil 3 artikel lain selain yang sedang dibuka
        $relatedArticles = Article::where('id', '!=', $article->id)
            ->latest()
            ->take(2)
            ->get();

        return view('pages.home.blogs.show', [
            'article' => $article,
            'banners' => $banners,
            'relatedArticles' => $relatedArticles,
            'title' => $article->title,
            'meta_description' => Str::limit(strip_tags($article->content), 160, '...'),
            'meta_keywords' => 'batik modern, ndexo, ' . $collections->pluck('name')->join(', '),
            'meta_image' => $article->image ? asset('storage/' . $article->image) : asset('assets/images/logos/favicon.webp'),
        ]);
    }
}
