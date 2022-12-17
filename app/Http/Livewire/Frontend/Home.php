<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Testimoni;
use App\Models\Prodi;
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
        if(!$this->initial_data_req['is_main_domain']){
            $this->data['visi_misi'] = Prodi::find($this->initial_data_req['subdomain']['id'])->visi_misi;
        }
        return view('livewire.frontend.home')
			->extends('layouts.app', ['title' => 'Beranda'])
			->section('content');
    }
}
