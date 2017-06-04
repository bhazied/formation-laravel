<?php

namespace App\Listeners;

use App\Events\myEvent;
use App\Mail\toggleMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class myEventListnerCustomEmail
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
        $user = $event->user;
        Mail::to($user)->send(new toggleMail($user));
    }
}
