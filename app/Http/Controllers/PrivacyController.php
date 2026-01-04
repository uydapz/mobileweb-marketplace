<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index()
    {
        return view('pages.auth.privacy.Index', []);
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
