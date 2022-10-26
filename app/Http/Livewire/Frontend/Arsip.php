<?php																										

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Arsip extends Component
{
	public $meta;
	
	public function mount($meta_type, $meta_val){
		//$meta = kategori atau prodi atau tag
		$this->meta['type'] = $meta_type;
		$this->meta['value'] = $meta_val;
	}
	
    public function render()
    {
        return view('livewire.frontend.arsip')
			->extends('layouts.app', ['title' => 'Kategori'	])
			->section('content');
    }
}
