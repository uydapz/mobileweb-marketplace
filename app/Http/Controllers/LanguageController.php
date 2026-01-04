<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    public function index()
    {
        return view('pages.auth.language.Index', []);
    }

    public function create() {}

    public function store(Request $request) {}

    // public function update(Request $request, Collection $collection)
    // {
    // }

    // public function destroy(Collection $collection)
    // {
    // }
}
