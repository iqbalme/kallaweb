<?php

namespace App\Http\Livewire\Demo;

use Livewire\Component;

class TesComponent extends Component
{
    public function render()
    {
        return view('livewire.demo.tes-component')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Event']);
    }
}
