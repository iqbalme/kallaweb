<?php

namespace App\Http\Livewire\Kategori;

use Livewire\Component;
use App\Models\Category;

class KategoriCreate extends Component
{
	public $nama_kategori;
	public $deskripsi_kategori;
	
    public function render()
    {
        return view('livewire.kategori.kategori-create');
    }
	
	public function create(){
		$prodi = Category::create([
			'nama_kategori' => $this->nama_kategori,
			'deskripsi_kategori' => $this->deskripsi_kategori
		]);
		$this->resetInput();
		$this->emit('refreshKategori', $prodi);
	}
	
	public function resetInput(){
		$this->nama_kategori = null;
		$this->deskripsi_kategori = null;
	}
}