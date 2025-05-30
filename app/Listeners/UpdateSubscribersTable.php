<?php

namespace App\Listeners;

use App\Events\UserSubscribed;
use App\Models\Subscriber;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class UpdateSubscribersTable
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
        Subscriber::create([
            'email' => $event->user->email,
        ]);
        // DB::insert('Insert into subscribers (email) values (?)', [$event->user->email]);
    }
}
