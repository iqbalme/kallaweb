<?php

namespace App\Http\Livewire\Event;

use Livewire\Component;
use App\Models\PesertaEvent as peserta_event;

class PesertaEvent extends Component
{
	public $data;
	public $numberOfPaginatorsRendered;
	
	public function mount($event_id){
		$this->data = peserta_event::where('event_id', $event_id)->orderBy('nama', 'asc')->paginate(10);
	}
	
    public function render()
    {
        return view('livewire.event.peserta-event');
    }

}
