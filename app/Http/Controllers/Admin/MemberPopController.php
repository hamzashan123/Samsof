<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MemberPopController extends Controller
{
    public function download(Member $member)
    {
        if (!Storage::disk('local')->exists('pops/'.$member->id.'.pdf')) {
            abort(404);
        }

        return Storage::disk('local')
            ->download('pops/'.$member->id.'.pdf', Str::slug($member->name).'-pop.pdf');
    }

    public function destroy(Member $member)
    {
        if (!Storage::disk('local')->exists('pops/'.$member->id.'.pdf')) {
            abort(404);
        }

        Storage::disk('local')
            ->delete('pops/'.$member->id.'.pdf');

        return redirect()->route('admin.members.index');
    }
}
