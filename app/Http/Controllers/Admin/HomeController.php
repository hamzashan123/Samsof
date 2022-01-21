<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::orderBy('starts_at', 'asc')->get();

        $ongoingEvents = $events->where('starts_at', '<=', Carbon::now())->where('ends_at', '>=', Carbon::now());
        $upcomingEvents = $events->take(5);
        
        return view('admin.dashboard', [
            'ongoingEvents' => $ongoingEvents,
            'upcomingEvents' => $upcomingEvents,
        ]);
    }
}
