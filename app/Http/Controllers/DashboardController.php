<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Collection;
use App\Models\CategoryCollection;
use App\Models\VoteCollection;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        // === USERS PER BULAN ===
        $userQuery = DB::table('users')
            ->selectRaw('MONTH(created_at) as month_num, DATE_FORMAT(created_at, "%M") as month_name, COUNT(*) as total')
            ->groupBy('month_num', 'month_name')
            ->orderBy('month_num')
            ->get();

        $months = $userQuery->pluck('month_name');
        $userTotals = $userQuery->pluck('total');

        // === COLLECTIONS PER KATEGORI ===
        $catQuery = CategoryCollection::withCount('collections')->get();
        $catLabels = $catQuery->pluck('name');
        $catTotals = $catQuery->pluck('collections_count');

        // === VOTES PER COLLECTION ===
        $voteQuery = DB::table('vote_collections')
            ->select('collection_id', DB::raw('SUM(vote_count) as total'))
            ->groupBy('collection_id')
            ->get();

        $voteLabels = [];
        $voteTotals = [];
        foreach ($voteQuery as $v) {
            $collection = Collection::find($v->collection_id);
            $voteLabels[] = $collection?->name ?? 'Unknown';
            $voteTotals[] = $v->total;
        }

        // === STATISTIK RINGKAS ===
        $stats = [
            'users'       => User::where('role',0)->count(),
            'collections' => Collection::count(),
            'votes'       => VoteCollection::sum('vote_count'),
            'events'      => Event::count(),
        ];

        return view('pages.Dashboard', compact(
            'months',
            'userTotals',
            'catLabels',
            'catTotals',
            'voteLabels',
            'voteTotals',
            'stats'
        ));
    }
}
