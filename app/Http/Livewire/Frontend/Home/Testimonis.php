<?php

namespace App\Http\Livewire\Frontend\Home;

use Livewire\Component;
use App\Models\Testimoni;

class Testimonis extends Component
{
	public $data;
	
	public function mount(){
		$this->data['testimonis'] = Testimoni::all();
	}
	
    public function render()
    {
        return view('livewire.frontend.home.testimonis');
    }
}
