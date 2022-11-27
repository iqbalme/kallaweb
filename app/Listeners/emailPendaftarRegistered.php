<?php

namespace App\Listeners;

use App\Events\PendaftarRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\registrationMail;
use App\Http\Traits\CommonTrait;

class emailPendaftarRegistered
{
	use CommonTrait;
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
     * @param  \App\Events\PendaftarRegistered  $event
     * @return void
     */
    public function handle(PendaftarRegistered $event)
    {
        $this->kirimEmail($event->pendaftar->email, new registrationMail($event->pendaftar));
    }
}
