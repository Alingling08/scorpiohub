<?php

namespace App\Listeners;

use App\Events\UserSubscribed;
use App\Mail\SubscriptionThankYou;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendSubscriberEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserSubscribed $event): void
    {
        Mail::to($event->user->email)->send(new SubscriptionThankYou($event->user));

        // Mail::raw(
        //     'Thank you for subscribing to our newsletter',
        //     function ($message) use ($event) {
        //         $message->to($event->user->email);
        //         $message->subject('Thank you.');
        //     }
        // );
    }
}
