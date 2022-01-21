<?php

namespace App\Http\Controllers\Admin;

use App\Events\Approved;
use App\Http\Controllers\Controller;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MemberApprovalController extends Controller
{
    public function showApproval(Member $member)
    {
        return view('admin.members.approve', [
            'member' => $member,
        ]);
    }

    public function approve(Request $request, Member $member)
    {
        $password = Str::random(12);
        $member->update([
            'approved' => true,
            'password' => Hash::make($password),
        ]);

        event(new Approved($member, $password));

        return redirect()->route('admin.members.index');
    }
}
