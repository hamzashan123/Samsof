<?php

namespace App\Http\Controllers\Members;

use App\Announcement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        return view('members.dashboard', [
            'announcements' => Announcement::where('notify_members', true)->orderBy('id', 'desc')->get(),
        ]);
    }
}
