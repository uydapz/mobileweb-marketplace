<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class HomeContactController extends Controller
{
    public function index()
    {
        // Contoh koordinat kantor
        $banners = Banner::first();
        $location = [
            'lat' => -7.9198222148006305,
            'lng' => 112.58995324867234,
            'address' => 'Gang 2, Margobasuki, Malang, Indonesia'

        ];

        return view('pages.home.contacts.Index', compact('location', 'banners'));
    }
}
