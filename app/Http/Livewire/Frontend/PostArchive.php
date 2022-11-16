<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class PostArchive extends Component
{
    public function render()
    {
        return view('livewire.frontend.post-archive')
			->extends('layouts.app', ['title' => 'List Berita'])
			->section('content');
    }
}
