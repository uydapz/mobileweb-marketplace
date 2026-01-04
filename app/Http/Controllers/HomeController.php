<?php

namespace App\Http\Controllers;

use App\Models\{Article, Banner, Collection, Partnership, Testimoni, User};
use App\Models\Faq;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::first();
        $collabs = Partnership::count();
        $designs = Collection::count();
        $customers = User::where('role',0)->count();
        $partnerships = Partnership::orderBy('created_at', 'desc')->get();
        $testimonis = Testimoni::where('show', true)->paginate(10);
        $articles = Article::latest()->take(5)->get();
        $faqs = Faq::latest()->take(3)->get();

        return view(
            'pages.Home',
            [
                'banners' => $banners,
                'partnerships' => $partnerships,
                'testimonis' => $testimonis,
                'faqs' => $faqs,
                'articles' => $articles,
                'designs' => $designs,
                'customers' => $customers,
                'collabs' => $collabs,
            ]
        );
    }
}
