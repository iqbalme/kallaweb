<?php

namespace App\Http\Livewire\Prodi;

use Livewire\Component;
use App\Models\Prodi;

class ProdiCreate extends Component
{
	public $nama_prodi;
	public $deskripsi_prodi;
	
    public function render()
    {
        return view('livewire.prodi.prodi-create');
    }
	
	public function create(){
		$prodi = Prodi::create([
			'nama_prodi' => $this->nama_prodi,
			'deskripsi_prodi' => $this->deskripsi_prodi
		]);
		$this->resetInput();
		$this->emit('refreshProdi', $prodi);
	}
	
	public function resetInput(){
		$this->nama_prodi = null;
		$this->deskripsi_prodi = null;
	}
}
