<?php

namespace App\Listeners;

use App\Models\Wallet;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateWalletForRegisteredUser
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
    public function handle(Registered $event): void
    {
        $wallet = new Wallet();
        $wallet->user()->associate($event->user);
        $wallet->save();
    }
}
