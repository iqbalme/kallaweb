<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class StrukturOrganisasi extends Component
{
    public function render()
    {
        return view('livewire.frontend.struktur-organisasi')
			->extends('layouts.app', ['title' => 'Struktur Organisasi'])
			->section('content');
    }
}
