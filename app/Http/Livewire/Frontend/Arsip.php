<?php																										

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Arsip extends Component
{
	
	public function mount($meta_type, $meta_val){
		//$meta = kategori atau prodi atau tag
		dd($meta_type);
	}
	
    public function render()
    {
        return view('livewire.frontend.arsip');
    }
}
