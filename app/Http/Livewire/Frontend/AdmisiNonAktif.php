<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Setting;

class AdmisiNonAktif extends Component
{
	public $data;
	
    public function render()
    {
		$settings = Setting::where('nama_setting', 'pesan_admisi_non_aktif')->first();
		$this->data = $settings;
        return view('livewire.frontend.admisi-non-aktif')
			->extends('layouts.app', ['title' => 'Admisi'])
			->section('content');
    }
}
