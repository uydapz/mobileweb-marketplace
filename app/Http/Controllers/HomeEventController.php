<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeEventController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        // Ambil event yang akan datang
        $events = Event::whereDate('start_date', '>=', $today)
                        ->orderBy('start_date', 'asc')
                        ->paginate(6);

        // Contoh banner
        $banners = [
            ['title' => 'Upcoming Events', 'image' => asset('assets/images/banner-events1.jpg')],
            ['title' => 'Join Now', 'image' => asset('assets/images/banner-events2.jpg')],
        ];

        return view('pages.home.events.Index', compact('events', 'banners'));
    }
}
