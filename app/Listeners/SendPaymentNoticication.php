<?php

namespace App\Listeners;

use App\Events\PaymentApproved;
use App\Mail\PaymentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPaymentNoticication
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param PaymentApproved $event
     * @return void
     */
    public function handle(PaymentApproved $event)
    {
        Mail::to((object)[
            'email' => config('mail.registrations.address'),
            'name' => config('mail.registrations.name'),
        ])->send(new PaymentNotification($event->member));
    }
}
