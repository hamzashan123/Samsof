<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PopDownloadController extends Controller
{
    public function download()
    {
        $member = Auth::guard('member')->user();
        if (!$member->has_pop) {
            abort(404);
        }

        return Storage::disk('local')
            ->download('pops/' . $member->id . '.pdf');
    }
}
