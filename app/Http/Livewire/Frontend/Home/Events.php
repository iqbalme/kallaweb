<?php

namespace App\Http\Livewire\Frontend\Home;

use Livewire\Component;
use App\Models\Event;

class Events extends Component
{
	public $data;
	
    public function render()
    {
		$events = Event::whereDate('waktu_mulai', '>=', date('Y-m-d H:m:s'))->orderBy('waktu_mulai')->limit(3)->get();
		$this->data['events'] = $events;
        return view('livewire.frontend.home.events');
    }
}
