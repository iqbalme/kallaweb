<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Profil extends Component
{
	use WithFileUploads;
	public $avatar;
	public $nama;
	public $email;
	public $password = null;
	public $user_id;
	public $user;
	public $avatarInitState = true;
	
	public function mount(){
		$user = User::find(Auth::user()->id);
		$this->user_id = $user->id;
		$this->nama = $user->nama;
		$this->email = $user->email;
		$this->avatar = $user->avatar;
		$this->user = $user;
	}
	
    public function render()
    {
        return view('livewire.admin.profil')
			->layout(\App\View\Components\AdminLayout::class);
    }
	
	public function removeAvatar(){
		$this->avatar->delete();
		$this->avatar = null;
		if($this->avatarInitState){
			$this->avatarInitState = false;
		}
		// else {
			// $this->avatarInitState = true;
		// }
	}
	
	public function updatedAvatar(){
		$this->avatarInitState = false;
	}
	
	public function update(){
		$avatar = null;
		if(isset($this->avatar)){
			$this->avatar->storeAs('public/images', $this->avatar->getFilename());
			$avatar = $this->avatar->getFilename();
			$this->avatar->delete();
		}
		$user = $this->user;
		$user->nama = $this->nama;
		$user->email = $this->email;
		$user->avatar = $avatar;
		if($this->password !== null){
			$user->password = bcrypt($this->password);
		}
		$user->save();
		return redirect()->route('profil');
	}
}
