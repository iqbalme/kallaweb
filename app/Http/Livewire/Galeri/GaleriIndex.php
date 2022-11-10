<?php

namespace App\Http\Livewire\Galeri;

use Livewire\Component;

class GaleriIndex extends Component
{
    public function render()
    {
        return view('livewire.galeri.galeri-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Galeri']);
    }
}
