<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;

class UserUpdate extends Component
{
	use WithFileUploads;
	//public $user;
	public $avatar = null;
	public $nama;
	public $email;
	public $password;
	public $user_id;
	public $loading = false;
	public $roles = [];
	public $user_roles = [];
	public $first_thumbnail = false;
	
	protected $listeners = [
		'getUser', 'updateUser'
	];
	
	public function mount(){
		$this->roles = Role::all();
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
		if($this->avatar){
			$this->first_thumbnail = true;
		}
		$this->password = null;
	}
	
	public function updatedAvatar(){
		//$this->emit('refreshUser');
	}
	
	public function removeAvatar(){
		if(!$this->first_thumbnail){
			$this->avatar->delete();
		}
		$this->first_thumbnail = false;
		$this->avatar = null;
	}
	
	
	public function update(){
		$this->loading = true;
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
		RoleUser::where('user_id', $this->user_id)->delete();
		if($this->user_roles){
			foreach($this->user_roles as $role){
				RoleUser::create([
					'user_id' => $this->user_id,
					'role_id' => $role
				]);
			}
		}
		$user->save();
		$this->emit('refreshUser');
		$this->closeModal();
	}
	
	public function closeModal(){
		$this->loading = false;
		$this->dispatchBrowserEvent('closeModalUserUpdate');
	}
}
