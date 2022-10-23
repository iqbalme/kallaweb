<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;

class UserUpdate extends Component
{
	use WithFileUploads;
	//public $user;
	public $avatar;
	public $nama;
	public $email;
	public $password;
	public $user_id;
	
	protected $listeners = [
		'getUser', 'updateUser'
	];
	
	public function mount(){
		
	}
	
    public function render()
    {
        return view('livewire.user.user-update');
    }
	
	public function getUser($user){
		$this->user_id = $user['id'];
		$this->nama = $user['nama'];
		$this->email = $user['email'];
		$this->avatar = $user['avatar'];
		$this->password = null;
	}
	
	public function updatedAvatar(){
		//$this->emit('refreshUser');
	}
	
	
	public function update(){
		$avatar = null;
		if(isset($this->avatar)){
			$this->avatar->storeAs('public/images', $this->avatar->getFilename());
			$avatar = $this->avatar->getFilename();
			$this->avatar->delete();
		}
		$user = User::find($this->user_id);
		$user->nama = $this->nama;
		$user->email = $this->email;
		$user->avatar = $avatar;
		if($this->password !== null){
			$user->password = bcrypt($this->password);
		}
		$user->save();
		$this->emit('refreshUser');
	}
}
