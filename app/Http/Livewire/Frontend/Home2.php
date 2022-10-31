<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Home2 extends Component
{
    public function render()
    {
        return view('livewire.frontend.home2')
			->extends('layouts.app', ['title' => 'Beranda'])
			->section('content');
    }
}
