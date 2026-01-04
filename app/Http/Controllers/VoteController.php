<?php

namespace App\Http\Controllers;

use App\Models\{Collection, Mart, Vote, VoteCollection};
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index()
    {
        $votes = Vote::with('collections')->latest()->get();
        $collections = Collection::all(); // untuk preview gambar
        $collectionsOptions = $collections->pluck('name', 'id')->toArray(); // untuk select input

        return view('pages.auth.vote.Index', compact('votes', 'collections', 'collectionsOptions'));
    }

    public function create()
    {
        $collections = Collection::all(); // untuk preview gambar
        $collectionsOptions = $collections->pluck('name', 'id')->toArray(); // untuk select input
        return view('pages.auth.vote.create', compact('collections', 'collectionsOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'collections' => 'required|array|min:2|max:3', // minimal 2 batik untuk "vs"
            'collections.*' => 'exists:collections,id',
            'start_at' => 'nullable|date',
            'end_at' => 'nullable|date|after_or_equal:start_at',
            'is_active' => 'nullable|boolean',
        ]);

        $isActive = $request->has('is_active');
        $vote = Vote::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_at' => $request->start_at ?? now(),
            'end_at' => $request->end_at ?? now()->addDays(7),
            'is_active' => $isActive,
        ]);

        // Simpan peserta koleksi (pivot)
        foreach ($request->collections as $collectionId) {
            VoteCollection::create([
                'vote_id' => $vote->id,
                'collection_id' => $collectionId,
                'vote_count' => 0,
            ]);
        }

        return redirect()->route('vote.index')->with('success', 'Vote event berhasil dibuat.');
    }

    public function update(Request $request, Vote $vote)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'collections' => 'required|array|min:2|max:3',
            'collections.*' => 'exists:collections,id',
            'start_at' => 'nullable|date',
            'end_at' => 'nullable|date|after_or_equal:start_at',
            'is_active' => 'nullable|boolean',
        ]);

        $isActive = $request->has('is_active');

        $vote->update([
            'title' => $request->title,
            'description' => $request->description,
            'start_at' => $request->start_at ?? $vote->start_at,
            'end_at' => $request->end_at ?? $vote->end_at,
            'is_active' => $isActive,
        ]);

        // Update pivot (reset vote count = 0 jika ganti koleksi)
        $vote->collections()->sync(
            collect($request->collections)->mapWithKeys(fn($id) => [$id => ['vote_count' => 0]])
        );

        return redirect()->route('vote.index')->with('success', 'Vote event berhasil diperbarui.');
    }


    public function destroy(Vote $vote)
    {
        $vote->collections()->detach();
        $vote->delete();

        return redirect()->route('vote.index')->with('success', 'Vote event dihapus.');
    }

    public function closeVote(Vote $vote)
    {
        // Pastikan voting sudah tidak aktif lagi
        $vote->update(['is_active' => false]);

        // Ambil koleksi dengan vote_count tertinggi
        $winner = $vote->collections()->orderByDesc('vote_count')->first();

        if ($winner) {
            // Buat produk di Mart untuk koleksi pemenang
            Mart::create([
                'collection_id' => $winner->id,
                'product_name' => "{$winner->name} Exclusive Series",
                'description' => "Exclusive item from {$winner->name} collection — crafted with elegance and culture.",
                'price' =>  $winner->estimated_price ?? 500000,
                'stock' => $winner->stock ?? 10,
                'image' => $winner->image,
            ]);
        }

        return redirect()->route('vote.index')
            ->with('success', "Voting event closed. Winner '{$winner->name}' moved to Mart.");
    }
}
