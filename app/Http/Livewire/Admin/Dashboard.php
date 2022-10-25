<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
	public $title = 'ini judul lain';
    public function render()
    {
        return view('livewire.admin.dashboard')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Dashboard']);
    }
	
	public function logout()
	{
		Auth::logout();
		return redirect()->route('login');
	}
}
