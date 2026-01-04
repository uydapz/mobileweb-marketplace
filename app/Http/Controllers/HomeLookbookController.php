<?php

namespace App\Http\Controllers;

use App\Models\{Banner, Lookbook};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeLookbookController extends Controller
{
    public function index()
    {
        // Ambil lookbook milik user, urut terbaru, include relasi collections dan featuredDesign
        $lookbooks = Lookbook::with('collections.featuredDesign')
            ->orderByDesc('period_year')
            ->orderByDesc('period_month')
            ->paginate(12);

        // Contoh banner
        $banners = Banner::first();

        return view('pages.home.lookbooks.Index', compact('lookbooks', 'banners'));
    }
}

