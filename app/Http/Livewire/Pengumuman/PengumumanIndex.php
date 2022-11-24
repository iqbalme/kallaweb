<?php

namespace App\Http\Livewire\Pengumuman;

use Livewire\Component;
use App\Models\Pengumuman;

class PengumumanIndex extends Component
{
	public $data;
	public $perhalaman = 5;
	public $cari_pengumuman = '';
	public $pengumuman_id = null;
	
	public $listeners = ['refreshPengumuman'];
	
    public function render()
    {
		$this->data['pengumuman'] = Pengumuman::orderBy('created_at', 'desc')->where('judul', 'LIKE', '%'.$this->cari_pengumuman.'%')->paginate($this->perhalaman);
        return view('livewire.pengumuman.pengumuman-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Pengumuman']);
    }
	
	public function refreshPengumuman(){}
	
	public function hapusPengumuman($id){
		$this->pengumuman_id = $id;
	}
	
	public function hapusPengumumanItem(){
		$pengumuman = Pengumuman::find($this->pengumuman_id);
		$pengumuman->delete();
		$this->reset();
		$this->dispatchBrowserEvent('closeHapusPengumuman');
	}
}
