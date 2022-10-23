<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;

class UserIndex extends Component
{
	public $isFormVisible = false;
	public $isUpdate = false;
	public $data;
	public $user_id;
	
	protected $listeners = [
		'refreshUser'
	];
	public function mount(){
		$this->data = User::all();
	}
	
    public function render()
    {
        return view('livewire.user.user-index')
			->layout(\App\View\Components\AdminLayout::class);
    }
	
	public function tambahUser(){
		$this->isUpdate = false;
		$this->isFormVisible = true;
	}
	
	public function getUser($id){
		$this->isUpdate = true;
		$user = User::find($id);
		$this->emit('getUser', $user);
		$this->isFormVisible = true;
	}
	
	public function refreshUser(){
	
	}
}
