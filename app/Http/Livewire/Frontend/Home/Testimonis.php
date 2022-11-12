<?php

namespace App\Http\Livewire\Frontend\Home;

use Livewire\Component;
use App\Models\Testimoni;

class Testimonis extends Component
{
	public $data;
	
    public function render()
    {
		$this->data = Testimoni::all();
        return view('livewire.frontend.home.testimonis');
    }
}
