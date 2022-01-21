<?php

namespace App\Listeners;

use App\Events\Approved;
use App\Mail\ApprovalNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendApprovalNotification
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
     * @param Approved $event
     * @return void
     */
    public function handle(Approved $event)
    {
        $name = $event->member->first_name . ' ' . $event->member->last_name;
        Mail::to($event->member->email, $name)->bcc(config('mail.pops')[0]['address'], config('mail.pops')[0]['name'])->send(new ApprovalNotification($event->member, $event->password));
        Mail::to(config('mail.pops')[0]['address'], config('mail.pops')[0]['name'])->send(new ApprovalNotification($event->member, $event->password));
    }
}
