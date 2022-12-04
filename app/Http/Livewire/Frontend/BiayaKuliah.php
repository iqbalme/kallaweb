<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class BiayaKuliah extends Component
{
    public function render()
    {
        return view('livewire.frontend.biaya-kuliah')
			->extends('layouts.app', ['title' => 'Biaya Kuliah'])
			->section('content');
    }
}
