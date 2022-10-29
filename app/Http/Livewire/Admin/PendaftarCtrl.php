<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Pendaftar;

class PendaftarCtrl extends Component
{
	public $data;
	
	public function mount(){
		$data = [];
		$pendaftars = Pendaftar::all();
		foreach($pendaftars as $pendaftar){
			$data[] = [
						'nama' => $pendaftar->nama,
						'email' => $pendaftar->email,
						'hp' => $pendaftar->hp,
						'no_ktp' => $pendaftar->no_ktp,
						'aktif' => $pendaftar->aktif,
						'prodi' => $pendaftar->prodi,
						'invoice' => $pendaftar->invoice
					];
		}
		$this->data['pendaftars'] = $data;
	}
	
    public function render()
    {
        return view('livewire.admin.pendaftar')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Pendaftar']);
    }
}
