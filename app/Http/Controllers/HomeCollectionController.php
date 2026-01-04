<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Collection;
use Illuminate\Http\Request;

class HomeCollectionController extends Controller
{
    public function index()
    {
        // Ambil semua koleksi user, bisa disesuaikan jika ada relasi user
        $collections = Collection::with(['featuredDesign', 'category'])->get();

        // Banner contoh, bisa dari database
        $banners = Banner::first();

        return view('pages.home.collections.Index', compact('collections', 'banners'));
    }
}
