<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class RegistrasiUlang extends Component
{
    public function render()
    {
        return view('livewire.frontend.registrasi-ulang')
			->extends('layouts.app', ['title' => 'Registrasi Ulang'])
			->section('content');
    }
}
