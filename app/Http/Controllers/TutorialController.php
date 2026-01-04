<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function index()
    {
        return view('pages.auth.tutorial.Index', []);
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
