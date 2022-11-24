<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;
use App\Models\Post;
use App\Models\Event;
use App\Models\Category;
use App\Models\Pendaftar;


class Dashboard extends Component
{
	public $data;
	
	public function mount(){
		$this->data['posts'] = Post::all();
		$this->data['events'] = Event::all();
		$this->data['categories'] = Category::all();
		$this->data['pendaftar'] = Pendaftar::all();
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
