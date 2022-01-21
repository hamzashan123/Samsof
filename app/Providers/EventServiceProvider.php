<?php

namespace App\Providers;

use App\Events\Approved;
use App\Events\PaymentApproved;
use App\Events\PopUploaded;
use App\Listeners\SendApprovalNotification;
use App\Listeners\SendPaymentNoticication;
use App\Listeners\SendPopNotification;
use App\Listeners\SendRegistrationNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            //SendEmailVerificationNotification::class,
            SendRegistrationNotification::class,
        ],
        Approved::class => [
            SendApprovalNotification::class,
        ],
        PaymentApproved::class => [
//            SendPaymentNoticication::class,
        ],
        PopUploaded::class => [
            SendPopNotification::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
