<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class InfoBeasiswa extends Component
{
    public function render()
    {
        return view('livewire.frontend.info-beasiswa')
			->extends('layouts.app', ['title' => 'Informasi Beasiswa'])
			->section('content');
    }
}
