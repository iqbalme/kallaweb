<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Prodi;
use Illuminate\Http\Request;

class TentangKampus extends Component
{
    public $initial_data_req = null;
    public $gambar_tentang_prodi = null;

    public function mount(Request $request){
        $this->initial_data_req = $request->request->all();
    }

    public function render()
    {
        if(!$this->initial_data_req['is_main_domain']){
            $prodi = Prodi::find($this->initial_data_req['subdomain']['id']);
            $this->gambar_tentang_prodi = 'storage/images/'.$prodi->visi_misi;
        }
        return view('livewire.frontend.tentang-kampus')
			->extends('layouts.app', ['title' => 'Tentang Kampus'])
			->section('content');
    }
}
