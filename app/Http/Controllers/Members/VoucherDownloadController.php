<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VoucherDownloadController extends Controller
{
    public function download()
    {
        $member = Auth::guard('member')->user();
        if (!$member->has_voucher) {
            abort(404);
        }

        return Storage::disk('local')
            ->download('vouchers/' . $member->id . '.pdf');
    }
}
