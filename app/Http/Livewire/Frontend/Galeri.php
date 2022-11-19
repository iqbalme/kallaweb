<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Galeri extends Component
{
    public function render()
    {
        return view('livewire.frontend.galeri')
			->extends('layouts.app', ['title' => 'Galeri'])
			->section('content');
    }
}
