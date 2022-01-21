<?php

namespace App\Observers;

use App\Log;
use App\Member;
use Illuminate\Support\Facades\Auth;

class MemberObserver
{
    public function created(Member $member)
    {
        if (Auth::check()) {
            $member->logs()->create([
                'user_id' => Auth::user()->id,
                'action' => 'created',
            ]);
        }
    }

    public function updated(Member $member)
    {
        if (Auth::check()) {
            $member->logs()->create([
                'user_id' => Auth::user()->id,
                'action' => 'updated',
            ]);
        }
    }
}
