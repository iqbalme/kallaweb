<?php

namespace App\Http\Livewire\Prodi;

use Livewire\Component;
use App\Models\Prodi;
use Livewire\WithFileUploads;

class ProdiUpdate extends Component
{
	use WithFileUploads;
	
	public $nama_prodi = null;
	public $deskripsi_prodi = null;
	public $prodi_id = null;
	public $thumbnail = null;
	public $first_thumbnail = false;
	public $subdomain = null;
	
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
		if(isset($prodi['thumbnail'])){
			$this->thumbnail = $prodi['thumbnail'];
			$this->first_thumbnail = true;
		}
		$this->subdomain = $prodi['subdomain'];
	}
	
	public function update(){
		$thumbnail = null;
		$data = [];
		if(isset($this->thumbnail)){
			if(!$this->first_thumbnail){
				$thumbnail = $this->thumbnail->getFilename();
				$this->thumbnail->storeAs('public/images', $thumbnail);
			} else {
				$thumbnail = $this->thumbnail;
			}
		}
		$data['thumbnail'] = $thumbnail;
		$data['nama_prodi'] = $this->nama_prodi;
		$data['deskripsi_prodi'] = $this->deskripsi_prodi;
		$data['subdomain'] = $this->subdomain;
		if($this->prodi_id){
			$prodi = Prodi::find($this->prodi_id);
			$prodi->update($data);
		}
		$this->reset();
		$this->emit('refreshProdi', $prodi);
		if(isset($this->thumbnail) && (!$this->first_thumbnail)){
			$this->thumbnail->delete();
			$this->thumbnail = null;
		}
	}
	
	public function removeThumbnail(){
		if(!$this->first_thumbnail){
			$this->thumbnail->delete();
		}
		$this->first_thumbnail = false;
		$this->thumbnail = null;
	}
}
