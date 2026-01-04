<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CategoryCollection;
use App\Models\Collection;
use App\Models\Event;
use App\Models\VoteCollection;
use App\Models\Article;
use App\Models\Partnership;
use App\Models\Tutorial;
use App\Models\Documentation;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AnalyticController extends Controller
{
    public function index()
    {
        // 1️⃣ Users per month
        $users = User::select(
            DB::raw('MONTH(created_at) as month_num'),
            DB::raw('MONTHNAME(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('month_num', 'month')
            ->orderBy('month_num')
            ->get();

        $months = $users->pluck('month');
        $userTotals = $users->pluck('total');

        // 2️⃣ Collections per Category
        $categories = CategoryCollection::withCount('collections')->get();
        $categoryLabels = $categories->pluck('name');
        $categoryTotals = $categories->pluck('collections_count');

        // 3️⃣ Votes per Collection
        $votes = VoteCollection::select('collection_id', DB::raw('SUM(vote_count) as total'))
            ->groupBy('collection_id')
            ->get();

        $votes = VoteCollection::with('collection')
            ->selectRaw('collection_id, COUNT(*) as total')
            ->groupBy('collection_id')
            ->get();

        $voteLabels = $votes->map(fn($v) => $v->collection?->name ?? 'Unknown')->toArray();
        $voteTotals = $votes->pluck('total')->toArray();


        // 4️⃣ Event Durations
        $events = Event::all();
        $eventLabels = $events->pluck('title');
        $eventDurations = $events->map(
            fn($e) =>
            $e->start_date && $e->end_date
                ? Carbon::parse($e->start_date)->diffInDays($e->end_date)
                : 0
        );

        // 5️⃣ Articles per Author
        $articles = Article::select('user_id', DB::raw('COUNT(*) as total'))
            ->whereHas('user', function ($query) {
                $query->where('role', 1);
            })
            ->groupBy('user_id')
            ->get();


        $articleLabels = [];
        $articleTotals = [];
        foreach ($articles as $a) {
            $author = User::find($a->user_id);
            $articleLabels[] = $author?->name ?? 'Unknown';
            $articleTotals[] = $a->total;
        }

        // 6️⃣ Additional Metrics
        $totalPartnerships = Partnership::count();
        $totalTutorials = Tutorial::count();
        $totalDocs = Documentation::count();

        return view('pages.auth.analytic.index', compact(
            'months',
            'userTotals',
            'categoryLabels',
            'categoryTotals',
            'voteLabels',
            'voteTotals',
            'eventLabels',
            'eventDurations',
            'articleLabels',
            'articleTotals',
            'totalPartnerships',
            'totalTutorials',
            'totalDocs'
        ));
    }
}
