<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class Home extends Component
{
	public $data;
    public $initial_data_req = null;

	public function mount(Request $request){
        $this->initial_data_req = $request->request->all();
	}

    public function render()
    {
        $this->data['testimonis'] = Testimoni::all();
        return view('livewire.frontend.home')
			->extends('layouts.app', ['title' => 'Beranda'])
			->section('content');
    }
}
