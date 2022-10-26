<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;

class Dashboard extends Component
{
	public function mount(){
		
	}

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
