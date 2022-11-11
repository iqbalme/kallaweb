<?php

namespace App\Http\Livewire\Galeri;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Galeri;

class GaleriCreate extends Component
{
	use WithFileUploads;
	
	public $gambar = null;
	public $judul = null;
	
    public function render()
    {
        return view('livewire.galeri.galeri-create');
    }
	
	public function hapusGambar(){
		$this->gambar->delete();
		$this->gambar = null;
	}
	
	public function simpan(){
		$gambar = '';
		if(isset($this->gambar)){
			$gambar = $this->gambar->getFilename();
			$this->gambar->storeAs('public/images', $gambar);
			$this->gambar = null;
		}
		$data = [
			'judul' => $this->judul,
			'gambar' => $gambar
		];
		Galeri::create($data);
		$this->emit('refreshGaleri');
		$this->reset();
		$this->closeFormGaleri();
	}
	
	public function closeFormGaleri(){
		$this->dispatchBrowserEvent('closeModalGaleri');
	}
	
}
