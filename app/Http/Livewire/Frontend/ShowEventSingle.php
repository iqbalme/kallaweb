<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Event;

class ShowEventSingle extends Component
{
	public $event;
	
	public function mount($event_id){
		$this->event = Event::find($event_id);
	}
	
    public function render()
    {
        return view('livewire.frontend.show-event-single')
			->extends('layouts.app', ['title' => $this->event->nama_event])
			->section('content');
    }
}
