<?php

namespace App\Http\Controllers\Members;

use App\Events\PopUploaded;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentPopController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('file');

        $member = Auth::guard('member')->user();

        $file->move(storage_path('app/pops'),$member->id.'.pdf');

        //event(new PopUploaded($member));

        return response()->json([
            'success' => true,
            'temp' => null,
        ]);
    }
}
