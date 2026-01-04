<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\FeaturedDesign;
use Illuminate\Http\Request;

class FeaturedDesignController extends Controller
{
    public function index()
    {
        $featured = FeaturedDesign::paginate(6);
        $collections = Collection::pluck('name', 'id')->toArray();
        return view('pages.auth.featured_design.index', compact('featured', 'collections'));
    }

    public function create()
    {
        // Ambil daftar koleksi untuk dipilih (optional)
        $collections = Collection::pluck('name', 'id');
        return view('pages.auth.featured_design.create', compact('collections'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'theme' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        FeaturedDesign::create($validated);
        return redirect()->route('featured-design.index')->with('success', 'Featured design added.');
    }

    public function update(Request $request, FeaturedDesign $featured_design)
    {
        $validated = $request->validate([
            'theme' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $featured_design->update($validated);
        return redirect()->route('featured-design.index')->with('success', 'Featured design updated.');
    }

    public function destroy($id)
    {
        $featured = FeaturedDesign::findOrFail($id);
        $featured->delete();
        return redirect()->route('featured-design.index')->with('success', 'Featured design removed.');
    }
}
