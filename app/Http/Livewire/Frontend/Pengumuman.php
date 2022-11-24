<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Pengumuman as PengumumanModel;

class Pengumuman extends Component
{
	public $data;
	public $perhalaman = 5;
	public $cari_pengumuman = '';
	
    public function render()
    {
		$this->data['pengumuman'] = PengumumanModel::orderBy('created_at', 'desc')->where('judul', 'LIKE', '%'.$this->cari_pengumuman.'%')->paginate($this->perhalaman);
        return view('livewire.frontend.pengumuman')
			->extends('layouts.app', ['title' => 'Pengumuman'])
			->section('content');
    }
}
