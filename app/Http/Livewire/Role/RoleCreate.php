<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use App\Models\Prodi;
use App\Models\Role;

class RoleCreate extends Component
{
	public $roles;
	
	public function mount(){
		$this->roles['nama_role'] = null;
		$this->roles['deskripsi_role'] = null;
		$prodis = Prodi::all();
		if($prodis->count()){
			$this->roles['prodis'] = Prodi::all();
			$this->roles['prodi'] = $prodis[0]['id'];
		};
	}
	
    public function render()
    {
        return view('livewire.role.role-create');
    }
	
	public function create(){
		$role = Role::create([
			'nama_role' => $this->roles['nama_role'],
			'deskripsi_role' => $this->roles['deskripsi_role'],
			'prodi_id' => $this->roles['prodi']
		]);
		$this->emitUp('refreshRole');
	}
}