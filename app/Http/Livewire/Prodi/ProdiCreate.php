<?php

namespace App\Http\Livewire\Prodi;

use Livewire\Component;
use App\Models\Prodi;
use App\Http\Traits\CommonTrait;

class ProdiCreate extends Component
{
	use CommonTrait;
	
	public $nama_prodi;
	public $deskripsi_prodi;
	public $slug;
	
    public function render()
    {
        return view('livewire.prodi.prodi-create');
    }
	
	public function create(){
		$prodi = Prodi::create([
			'nama_prodi' => $this->nama_prodi,
			'deskripsi_prodi' => $this->deskripsi_prodi,
			'slug' => $this->setSlug($this->nama_prodi)
		]);
		$this->resetInput();
		$this->emit('refreshProdi', $prodi);
	}
	
	public function resetInput(){
		$this->nama_prodi = null;
		$this->deskripsi_prodi = null;
	}
}
