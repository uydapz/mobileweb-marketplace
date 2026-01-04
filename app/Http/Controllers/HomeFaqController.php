<?php

namespace App\Http\Controllers;

use App\Models\{Banner,Faq};
use Illuminate\Http\Request;

class HomeFaqController extends Controller
{
    public function index()
    {
        // Ambil semua FAQ aktif
        $faqs = Faq::orderBy('created_at', 'desc')->get();

        // Banner contoh (opsional)
        $banners = Banner::first();

        return view('pages.home.faqs.Index', compact('faqs', 'banners'));
    }
}
