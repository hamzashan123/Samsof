<?php

namespace App\Listeners;

use App\Events\PopUploaded;
use App\Mail\PopNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPopNotification
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
     * @param PopUploaded $event
     * @return void
     */
    public function handle(PopUploaded $event)
    {
        Mail::to($this->notify())->send(new PopNotification($event->member, $event->date));
    }

    protected function notify(): array
    {
        return array_map(function ($to) {
            return (object)[
                'name' => $to['name'],
                'email' => $to['address'],
            ];
        }, config('mail.pops'));
    }
}
