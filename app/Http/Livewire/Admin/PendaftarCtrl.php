<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Pendaftar;
use App\Http\Traits\CommonTrait;
use Rap2hpoutre\FastExcel\FastExcel;

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
        $pendaftar = Pendaftar::where('aktif', 1)->orderBy('created_at', 'asc')->get();
        dd($pendaftar);
        (new FastExcel($pendaftar))->export('calon-mahasiswa-kalla-institute.xlsx', function ($camaba) {
            return [
                'Nama Lengkap' => strtoupper($camaba->nama),
                'Email' => $camaba->email,
                'No. KTP' => $camaba->no_ktp,
                'No. HP' => $camaba->hp,
                'Asal Sekolah' => $camaba->asal_sekolah,
                'Program Studi' => strtoupper($camaba->nama_prodi),
                'Waktu Pendaftaran' => $camaba->created_at->format('d-m-Y H:i')
            ];
        });
    }
}
