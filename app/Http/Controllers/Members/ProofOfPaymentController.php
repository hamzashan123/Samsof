<?php

namespace App\Http\Controllers\Members;

use App\Events\PopUploaded;
use App\Http\Controllers\Controller;
use App\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProofOfPaymentController extends Controller
{
    public function update(Request $request)
    {
        $member = Auth::guard('member')->user();
        event(new PopUploaded($member, $request->get('payment_at_date')));
        $date = new Carbon($request->get('payment_at_date'));
        $months = 13 - ($date->format('m'));
        $member->update([
            'payment_at' => Carbon::createFromFormat('Y-m-d', $request->get('payment_at_date')),
            'expires_at' => new Carbon('first day of January' . $date->addMonths($months)->format('Y')),
            'pop_approved' => false,
        ]);
        return redirect()->route('members.payments.index', [$member])->with('success', 'Thank you for uploading your proof of payment. As soon as it has been processed, the payment will be allocated.');
    }

    protected function updatePop(Request $request)
    {
        $request->validate([
            'payment_at_date' => 'required',
            'pop-uploader' => 'required',
        ]);
    }
}
