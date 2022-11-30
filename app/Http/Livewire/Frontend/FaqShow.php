<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\FAQ;

class FaqShow extends Component
{
	public $data;
	
    public function render()
    {
		$this->data['faqs'] = FAQ::all();
        return view('livewire.frontend.faq-show');
    }
}
