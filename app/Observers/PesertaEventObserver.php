<?php

namespace App\Observers;

use App\Models\PesertaEvent;
use App\Models\Event;
use App\Models\Voucher;
use App\Events\EventRegistered;

class PesertaEventObserver
{
    /**
     * Handle the PesertaEvent "created" event.
     *
     * @param  \App\Models\PesertaEvent  $PesertaEvent
     * @return void
     */
    public function created(PesertaEvent $pesertaEvent)
    {
        $event = Event::find($pesertaEvent->event_id);
		if(isset($event->voucher_id)){
			event(new EventRegistered($pendaftar));	
		}
    }

    /**
     * Handle the PesertaEvent "updated" event.
     *
     * @param  \App\Models\PesertaEvent  $PesertaEvent
     * @return void
     */
    public function updated(PesertaEvent $pesertaEvent)
    {
        //
    }

    /**
     * Handle the PesertaEvent "deleted" event.
     *
     * @param  \App\Models\PesertaEvent  $PesertaEvent
     * @return void
     */
    public function deleted(PesertaEvent $pesertaEvent)
    {
        //
    }

    /**
     * Handle the PesertaEvent "restored" event.
     *
     * @param  \App\Models\PesertaEvent  $PesertaEvent
     * @return void
     */
    public function restored(PesertaEvent $pesertaEvent)
    {
        //
    }

    /**
     * Handle the PesertaEvent "force deleted" event.
     *
     * @param  \App\Models\PesertaEvent  $PesertaEvent
     * @return void
     */
    public function forceDeleted(PesertaEvent $pesertaEvent)
    {
        //
    }
}
