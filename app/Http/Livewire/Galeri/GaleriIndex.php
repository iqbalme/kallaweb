<?php

namespace App\Http\Livewire\Galeri;

use Livewire\Component;
use App\Models\Galeri;

class GaleriIndex extends Component
{
	public $data;
	public $galeri_id = null;
	
	protected $listeners = [
		'refreshGaleri'
	];
	
	public function mount(){
		
	}
	
    public function render()
    {
		$this->data = Galeri::orderByDesc('id')->get();
        return view('livewire.galeri.galeri-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Galeri']);
    }
	
	public function refreshGaleri(){
		$this->reset();
	}
	
	public function tambahGaleri(){
		$this->dispatchBrowserEvent('bukaFormGaleri');
	}
	
	public function setGaleriId($id){
		$this->galeri_id = $id;
		$this->dispatchBrowserEvent('bukaModalHapus');
	}
	
	public function hapusGaleri(){
		$galeri = Galeri::find($this->galeri_id);
		$galeri->delete();
		$this->galeri_id = null;
		$this->closeFormHapus();
	}
	
	public function closeFormHapus(){
		$this->dispatchBrowserEvent('closeHapusGaleri');
	}

}
