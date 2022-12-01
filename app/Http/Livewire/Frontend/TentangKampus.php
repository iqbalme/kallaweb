<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class TentangKampus extends Component
{
    public function render()
    {
        return view('livewire.frontend.tentang-kampus')
			->extends('layouts.app', ['title' => 'Tentang Kampus'])
			->section('content');
    }
}
