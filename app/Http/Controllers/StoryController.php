<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    /**
     * Tampilkan daftar story
     */
    public function index()
    {
        $stories = Story::latest()->get();
        return view('pages.auth.story.index', compact('stories'));
    }

    /**
     * Tampilkan form tambah story
     */
    public function create()
    {
        return view('pages.auth.story.create');
    }

    /**
     * Simpan story baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image',
        ]);

        $data = $request->only(['title', 'content']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('stories', 'public');
        }

        Story::create($data);

        return redirect()->route('story.index')->with('success', __('msg.story_created'));
    }

    /**
     * Tampilkan form edit story
     */
    public function edit(Story $story)
    {
        return view('pages.auth.story.edit', compact('story'));
    }

    /**
     * Update story
     */
    public function update(Request $request, Story $story)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image',
        ]);

        $data = $request->only(['title', 'content']);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($story->image && Storage::disk('public')->exists($story->image)) {
                Storage::disk('public')->delete($story->image);
            }
            $data['image'] = $request->file('image')->store('stories', 'public');
        }

        $story->update($data);

        return redirect()->route('story.index')->with('success', __('msg.story_updated'));
    }

    /**
     * Hapus story
     */
    public function destroy(Story $story)
    {
        if ($story->image && Storage::disk('public')->exists($story->image)) {
            Storage::disk('public')->delete($story->image);
        }

        $story->delete();

        return redirect()->route('story.index')->with('success', __('msg.story_deleted'));
    }
}