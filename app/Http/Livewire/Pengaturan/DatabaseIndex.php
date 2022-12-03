<?php

namespace App\Http\Livewire\Pengaturan;

use Livewire\Component;

class DatabaseIndex extends Component
{
    public function render()
    {
        return view('livewire.pengaturan.database-index')
        ->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Pengaturan / Database']);
    }
}
