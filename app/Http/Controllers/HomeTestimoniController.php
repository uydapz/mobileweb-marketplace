<?php

namespace App\Http\Controllers;

use App\Models\{Banner, Testimoni};
use Illuminate\Http\Request;

class HomeTestimoniController extends Controller
{
    public function index()
    {
        // Ambil testimoni aktif / yang show = true
        $testimonis = Testimoni::where('show', true)->paginate(10);


        // Banner contoh
        $banners = Banner::first();

        return view('pages.home.testimonis.Index', compact('testimonis', 'banners'));
    }
}
