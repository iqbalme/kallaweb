<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Pendaftar;
use App\Http\Traits\CommonTrait;

class PendaftarCtrl extends Component
{
	use CommonTrait;
	public $data;
	public $perhalaman = 5;
	public $cari_pendaftar;
	
	public function mount(){
		//$this->data['pendaftars'] = Pendaftar::orderBy('id', 'DESC')->where('nama', 'LIKE', '%'.$this->cari_pendaftar.'%')->orWhere('email', 'LIKE', '%'.$this->cari_pendaftar.'%')->orWhere('no_ktp', 'LIKE', '%'.$this->cari_pendaftar.'%')->orWhere('hp', 'LIKE', '%'.$this->cari_pendaftar.'%')->paginate($this->perhalaman);
		$this->data['pendaftars'] = Pendaftar::where('nama', 'LIKE', '%'.$this->cari_pendaftar.'%')->get();
	}
	
    public function render()
    {
        return view('livewire.admin.pendaftar')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Pendaftar']);
    }
}
