<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Role;
//use Illuminate\Support\Facades\Hash;

class UserCreate extends Component
{
	use WithFileUploads;
	
	public $avatar = null;
	public $nama = null;
	public $email = null;
	public $password = null;
	public $roles = [];
	public $user_roles = [];
	
	public function mount(){
		$this->roles = Role::all();
		// $this->avatar = null;
		// $this->nama = null;
		// $this->email = null;
		// $this->password = null;
	}
	
    public function render()
    {
        return view('livewire.user.user-create');
    }
	
	public function removeAvatar(){
		$this->avatar->delete();
		$this->avatar = null;
	}
	
	public function tambahUser(){
		$avatar = null;
		if(isset($this->avatar)){
			$this->avatar->storeAs('public/images', $this->avatar->getFilename());
			$avatar = $this->avatar->getFilename();
			$this->avatar->delete();
		}
		$newUser = [
			'nama' => $this->nama,
			'email' => $this->email,
			'password' => bcrypt($this->password),
			'avatar' => $avatar
		];
		//dd($newUser);
		User::create($newUser);
		$this->emitUp('refreshUser');
	}
}
