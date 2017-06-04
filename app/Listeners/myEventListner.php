<?php

namespace App\Listeners;

use App\Events\myEvent;
use App\Notifications\toggleStatus;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class myEventListner
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
     * @param  myEvent  $event
     * @return void
     */
    public function handle(myEvent $event)
    {
        $event->user->notify(new toggleStatus());
    }
}
