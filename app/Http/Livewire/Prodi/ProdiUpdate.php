<?php

namespace App\Http\Livewire\Prodi;

use Livewire\Component;
use App\Models\Prodi;

class ProdiUpdate extends Component
{
	public $nama_prodi;
	public $deskripsi_prodi;
	public $prodi_id;
	
	protected $listeners = [
		'getProdi' => 'showProdi'
	];
	
    public function render()
    {
        return view('livewire.prodi.prodi-update');
    }
	
	public function showProdi($prodi){
		$this->nama_prodi = $prodi['nama_prodi'];
		$this->prodi_id = $prodi['id'];
		$this->deskripsi_prodi = $prodi['deskripsi_prodi'];
	}
	
	public function update(){
		if($this->prodi_id){
			$prodi = Prodi::find($this->prodi_id);
			$prodi->update([
				'nama_prodi' => $this->nama_prodi,
				'deskripsi_prodi' => $this->deskripsi_prodi
			]);
		}
		$this->resetInput();
		$this->emit('refreshProdi', $prodi);
	}
	
	public function resetInput(){
		$this->prodi_id = null;
		$this->nama_prodi = null;
		$this->deskripsi_prodi = null;
	}
}
