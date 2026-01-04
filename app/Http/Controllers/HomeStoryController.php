<?php

namespace App\Http\Controllers;

use App\Models\{Banner, Story};
use Illuminate\Http\Request;

class HomeStoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Story::latest();

        if ($search = $request->input('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }
        $stories = $query->paginate(6);
        $banners = Banner::first();

        return view('pages.home.stories.Index', compact('stories', 'banners'));
    }

    public function show($id)
    {
        $story = Story::findOrFail($id);
        $banners = Banner::first();
        return view('pages.home.stories.Show', compact('story', 'banners'));
    }
}
