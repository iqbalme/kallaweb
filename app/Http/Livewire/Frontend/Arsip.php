<?php																										

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Arsip extends Component
{
	public $meta;
	
	public function mount($meta_type, $meta_val){
		//$meta = kategori atau prodi atau tag
		if((strtolower($meta_type) == 'kategori') || (strtolower($meta_type) == 'prodi') || (strtolower($meta_type) == 'tag')){
			$this->meta['type'] = $meta_type;
			$this->meta['value'] = $meta_val;
		} else {
			return redirect()->to('/');
		}		
	}
	
    public function render()
    {
        return view('livewire.frontend.arsip')
			->extends('layouts.app', ['title' => ucfirst($this->meta['type'])])
			->section('content');
    }
}
