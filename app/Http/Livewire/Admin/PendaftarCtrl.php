<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Pendaftar;
use App\Http\Traits\CommonTrait;
use App\Exports\PendaftarExport;
use Maatwebsite\Excel\Facades\Excel;

class PendaftarCtrl extends Component
{
	use CommonTrait;
	public $data;
	public $perhalaman = 5;
	public $cari_pendaftar;

    public function render()
    {
		$this->data['pendaftars'] = Pendaftar::orderBy('id', 'DESC')->where('nama', 'LIKE', '%'.$this->cari_pendaftar.'%')->orWhere('email', 'LIKE', '%'.$this->cari_pendaftar.'%')->orWhere('no_ktp', 'LIKE', '%'.$this->cari_pendaftar.'%')->orWhere('hp', 'LIKE', '%'.$this->cari_pendaftar.'%')->orWhere('asal_sekolah', 'LIKE', '%'.$this->cari_pendaftar.'%')->paginate($this->perhalaman);
        return view('livewire.admin.pendaftar')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Pendaftar']);
    }

    public function exportPendaftar(){
        try {
            return Excel::download(new PendaftarExport, 'pendaftar.xlsx');
        } catch(\Exception $e){
            dd($e->getMessage());
        }
    }
}
