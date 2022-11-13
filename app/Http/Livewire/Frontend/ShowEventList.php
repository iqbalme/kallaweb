<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Event;

class ShowEventList extends Component
{
	public $data;
	
    public function render()
    {
		$this->data['events'] = Event::orderByDesc('waktu_mulai')->get();
        return view('livewire.frontend.show-event-list')
			->extends('layouts.app', ['title' => 'List Event'])
			->section('content');
    }
}
