<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Event;

class ShowEventSingle extends Component
{
	public $event;
	public $event_lain;
	
	public function mount($event_id){
		$this->event = Event::find($event_id);
		$this->event_lain = Event::whereNot('id', $event_id)->limit(3)->get();
		//dd($this->event_lain);
	}
	
    public function render()
    {
        return view('livewire.frontend.show-event-single')
			->extends('layouts.app', ['title' => $this->event->nama_event])
			->section('content');
    }
}
