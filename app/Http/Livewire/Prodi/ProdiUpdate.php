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
    public $first_visimisi = null;
    public $visi_misi = null;
    public $first_logoprodi = null;
    public $logo_prodi = null;

    protected $rules = [
        'nama_prodi' => 'required',
        'thumbnail' => 'required',
        'subdomain' => 'required'
    ];

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
        if(isset($prodi['visi_misi'])){
			$this->visi_misi = $prodi['visi_misi'];
			$this->first_visimisi = true;
		}
        if(isset($prodi['logo_prodi'])){
			$this->logo_prodi = $prodi['logo_prodi'];
			$this->first_logoprodi = true;
		}
		$this->subdomain = $prodi['slug'];
	}

	public function update(){
        $this->validate();
		$thumbnail = null;
        $visi_misi = null;
        $logo_prodi = null;
		$data = [];
		if(isset($this->thumbnail)){
			if(!$this->first_thumbnail){
				$thumbnail = $this->thumbnail->getFilename();
				$this->thumbnail->storeAs('public/images', $thumbnail);
			} else {
				$thumbnail = $this->thumbnail;
			}
		}
        if(isset($this->visi_misi)){
			if(!$this->first_visimisi){
				$visi_misi = $this->visi_misi->getFilename();
				$this->visi_misi->storeAs('public/images', $visi_misi);
			} else {
				$visi_misi = $this->visi_misi;
			}
		}
        if(isset($this->logo_prodi)){
			if(!$this->first_logoprodi){
				$logo_prodi = $this->logo_prodi->getFilename();
				$this->logo_prodi->storeAs('public/images', $logo_prodi);
			} else {
				$logo_prodi = $this->logo_prodi;
			}
		}
		$data['thumbnail'] = $thumbnail;
		$data['nama_prodi'] = $this->nama_prodi;
		$data['deskripsi_prodi'] = $this->deskripsi_prodi;
		$data['slug'] = $this->subdomain;
        $data['visi_misi'] = $visi_misi;
        $data['logo_prodi'] = $logo_prodi;
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

    public function removeVisimisi(){
		if(!$this->first_visimisi){
			$this->visi_misi->delete();
		}
		$this->first_visimisi = false;
		$this->visi_misi = null;
	}

    public function removeLogoprodi(){
		if(!$this->first_logoprodi){
			$this->logo_prodi->delete();
		}
		$this->first_logoprodi = false;
		$this->logo_prodi = null;
	}
}
