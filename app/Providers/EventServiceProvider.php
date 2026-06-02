<?php

namespace App\Providers;

<<<<<<< HEAD
=======
use App\Events\UserRegistered;
use App\Listeners\SendWelcomeEmail;
>>>>>>> c57bb21 (subscription module)
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \App\Events\InvoiceLinkRequested::class => [
        \App\Listeners\SendInvoiceLinkSms::class,
    ],
    \App\Events\SingleInvoiceLinkRequested::class => [
        \App\Listeners\SendSingleInvoiceLinkSms::class,
    ],
<<<<<<< HEAD
=======
        UserRegistered::class => [
            SendWelcomeEmail::class,   // এই listener চলেব
        ],
>>>>>>> c57bb21 (subscription module)
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
