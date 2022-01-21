<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\PopApprovedMail;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PopApproveController extends Controller
{
    public function approve(Member $member)
    {
        $member->update([
            'pop_approved' => true,
        ]);
        Mail::to($member)->send(new PopApprovedMail($member));

        return response()->json([
            'approved' => true,
        ]);
    }
}
