<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CertificateDownloadController extends Controller
{
    public function download()
    {
        $member = Auth::guard('member')->user();
        if (!$member->has_certificate) {
            abort(404);
        }

        return Storage::disk('local')
            ->download('certificates/' . $member->id . '.pdf');
    }
}
