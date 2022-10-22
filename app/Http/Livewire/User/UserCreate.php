<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;

class UserCreate extends Component
{
	use WithFileUploads;
	
	public $avatar = null;
	public $nama = null;
	public $email = null;
	public $password = null;
	
	public function mount(){
		// $this->avatar = null;
		// $this->nama = null;
		// $this->email = null;
		// $this->password = null;
	}
	
    public function render()
    {
        return view('livewire.user.user-create');
    }
	
	public function updatedAvatar(){
		$this->render();
	}
	
	public function tambahUser(){
		$newUser = [
			'nama' => $this->nama,
			'email' => $this->email,
			'password' => bcrypt($this->password),
			'avatar' => $this->avatar
		];
		dd($newUser);
		//User::create($newUser);
	}
}
