<?php

namespace App\Providers;

use App\Events\EventRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class emailEventRegistered
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
     * @param  \App\Events\EventRegistered  $event
     * @return void
     */
    public function handle(EventRegistered $event)
    {
        //
    }
}
