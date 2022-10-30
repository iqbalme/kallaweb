<?php

namespace App\Http\Livewire\Prodi;

use Livewire\Component;
use App\Models\Prodi;
use App\Http\Traits\CommonTrait;
use Livewire\WithFileUploads;

class ProdiCreate extends Component
{
	use CommonTrait;
	use WithFileUploads;
	
	public $nama_prodi;
	public $deskripsi_prodi;
	public $slug;
	public $thumbnail = null;
	
    public function render()
    {
        return view('livewire.prodi.prodi-create');
    }
	
	public function create(){
		$thumbnail = null;
		if(isset($this->thumbnail)){
			$thumbnail = $this->thumbnail->getFilename();
			$this->thumbnail->storeAs('public/images', $thumbnail);
		}
		$prodi = Prodi::create([
			'nama_prodi' => $this->nama_prodi,
			'deskripsi_prodi' => $this->deskripsi_prodi,
			'slug' => $this->setSlug($this->nama_prodi),
			'thumbnail' => $thumbnail
		]);
		$this->resetInput();
		$this->emit('refreshProdi', $prodi);
		$this->removeThumbnail();
	}
	
	public function resetInput(){
		$this->nama_prodi = null;
		$this->deskripsi_prodi = null;
	}
	
	public function removeThumbnail(){
		$this->thumbnail->delete();
		$this->thumbnail = null;
	}
}
