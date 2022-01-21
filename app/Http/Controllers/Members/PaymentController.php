<?php

namespace App\Http\Controllers\Members;

use App\Events\PaymentApproved;
use App\Http\Controllers\Controller;
use App\Services\MoneyService;
use App\Services\PayWebService;
use App\Support\PayWebSettings;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $member = $request->user();
        $date = date('Y-m-d H:i:s');
        return view('members.payments', [
            'member' => $member,
            'date' => $date,
            'payments' => $member->payments()->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function initiate(Request $request)
    {
        $payWebService = new PayWebService();
        $data = $payWebService->initiate(
            'SASMFOS-' . $request->user()->name,
            (new MoneyService())->memberFee(),
            $request->user()->email
        );

        return view('members.process', [
            'id' => $data['PAY_REQUEST_ID'],
            'checksum' => $data['CHECKSUM'],
        ]);
    }

    public function paid(Request $request)
    {
        switch ($request->get('TRANSACTION_STATUS')) {
            case '1':
                return $this->approved($request);
            case '2':
                return $this->declined($request);
            case '3':
            case '4':
                return $this->cancelled($request);
            default:
                return $this->incomplete($request);
        }
    }

    protected function approved(Request $request)
    {
        $member = $request->user();
        $member->payments()->create([
            'amount' => (new MoneyService())->memberFee(),
        ]);

        $member->update([
            'payment_at' => Carbon::now(),
        ]);

        event(new PaymentApproved($member));

        return view('members.approved', [
            'member' => $member,
        ]);
    }

    protected function declined(Request $request)
    {
        return view('members.declined');
    }

    protected function cancelled(Request $request)
    {
        return view('members.cancelled');
    }

    protected function incomplete(Request $request)
    {
        return view('members.incomplete');
    }
}
