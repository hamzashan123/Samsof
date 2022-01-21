<?php

namespace App\Listeners;

use App\Mail\RegistrationNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendRegistrationNotification
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
     * @param Registered $event
     * @return void
     */
    public function handle(Registered $event)
    {
        Mail::to($this->notify())->send(new RegistrationNotification($event->user));
    }

    protected function notify(): array
    {
        return array_map(static function ($to) {
            return (object)[
                'name' => $to['name'],
                'email' => $to['address'],
            ];
        }, config('mail.registrations'));
    }
}
