<?php

namespace App\Http\Livewire\Event;

use Livewire\Component;
use App\Models\Event;

class PesertaEvent extends Component
{
	public $data;
	
	protected $listeners = ['get_peserta_event'];
	
	public function mount($event_id){
		$this->data = Event::find($event_id)->peserta_event;
	}
	
    public function render()
    {
        return view('livewire.event.peserta-event');
    }
	
	public function get_peserta_event($event_id){
		$event = Event::find($event_id);
		dd($event->peserta_event);
		// foreach($event->peserta_event->get() as $peserta){
			// $data[] = $peserta;
		// }
		// $this->data = $data;
	}
}
