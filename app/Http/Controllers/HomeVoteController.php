<?php

namespace App\Http\Controllers;

use App\Models\{Collection, Vote, VoteUserLog};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeVoteController extends Controller
{
    public function index()
    {
        $votes = Vote::with('collections')
            ->where('is_active', true)  // hanya yang aktif
            ->latest()
            ->paginate(6);
        $collections = Collection::all(); // untuk preview gambar
        $collectionsOptions = $collections->pluck('name', 'id')->toArray(); // untuk select input

        return view('pages.home.voting.Index', compact('votes', 'collections', 'collectionsOptions'));
    }
    public function show(Vote $vote)
    {
        $user = Auth::user();

        $userVoted = $user
            ? VoteUserLog::where('vote_id', $vote->id)
            ->where('user_id', $user->id)
            ->exists()
            : false;

        return view('pages.home.voting.Show', compact('vote', 'userVoted'));
    }

    public function voteUser(Request $request, Vote $vote)
    {
        $request->validate([
            'vote_collection_id' => 'required|exists:collections,id',
        ]);

        $user = Auth::user();

        if ($vote->logs()->where('user_id', $user->id)->exists()) {
            return back()->with('error', 'Kamu sudah memberikan suara untuk event ini.');
        }

        // Ambil collection
        $collection = $vote->collections()
            ->where('collections.id', $request->vote_collection_id)
            ->firstOrFail();

        // Ambil pivot id
        $pivotId = DB::table('vote_collections')
            ->where('vote_id', $vote->id)
            ->where('collection_id', $collection->id)
            ->value('id');

        // Increment vote_count
        DB::table('vote_collections')
            ->where('id', $pivotId)
            ->increment('vote_count');

        // Simpan log user
        VoteUserLog::create([
            'vote_id' => $vote->id,
            'user_id' => $user->id,
            'vote_collection_id' => $pivotId,
        ]);

        return back()->with('success', 'Terima kasih, suara kamu sudah tersimpan!');
    }
}
