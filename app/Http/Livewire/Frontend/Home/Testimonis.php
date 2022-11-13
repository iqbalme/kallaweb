<?php

namespace App\Http\Livewire\Frontend\Home;

use Livewire\Component;
use App\Models\Testimoni;

class Testimonis extends Component
{
	public $data;
	
	public function mount(){
		$this->data['testimonis'] = Testimoni::orderByDesc('created_at')->limit(3)->get();
	}
	
    public function render()
    {
        return view('livewire.frontend.home.testimonis');
    }
}
