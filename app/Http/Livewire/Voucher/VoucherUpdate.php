<?php

namespace App\Http\Livewire\Voucher;

use Livewire\Component;
use App\Models\Voucher;
use App\Models\Katalog;

class VoucherUpdate extends Component
{
	public $voucher_id = null;
	public $kode_voucher = null;
	public $nominal_diskon;
	public $tipe_diskon;
	public $deskripsi_voucher;
	public $nama_voucher = null;
	public $awal_berlaku;
	public $akhir_berlaku;
	public $aktif;
	public $voucher = null;
	public $katalog_id = [];
	
	protected $listeners = [
		'getVoucher'
	];
	
	public function setData($voucher){
		$this->voucher_id = $voucher['id'];
		$this->kode_voucher = $voucher['kode_voucher'];
		$this->nominal_diskon  = $voucher['nominal_diskon'];
		$this->tipe_diskon = $voucher['tipe_diskon'];
		$this->deskripsi_voucher = $voucher['deskripsi_voucher'];
		$this->nama_voucher = $voucher['nama_voucher'];
		$this->awal_berlaku = $voucher['awal_berlaku'];
		$this->akhir_berlaku = $voucher['akhir_berlaku'];
		$this->aktif = $voucher['aktif'];
		$katalogs = Katalog::whereIn('id', explode(',',$voucher['katalog_id']))->get();
		foreach($katalogs as $katalog){
			$this->katalog_id[] = $katalog->id;
		}
	}
	
	public function mount(){
		$this->katalogs = Katalog::all();
	}
	
	public function render()
    {
        return view('livewire.voucher.voucher-update');
    }
	
	public function generateVoucher(){
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		$this->kode_voucher = strtoupper(substr(str_shuffle($permitted_chars), 0, 10));
	}
	
	public function resetInput(){
		$this->voucher_id = null;
		$this->kode_voucher = null;
		$this->nominal_diskon  = null;
		$this->tipe_diskon = 'persen';
		$this->deskripsi_voucher = null;
		$this->nama_voucher = null;
		$this->awal_berlaku = null;
		$this->akhir_berlaku = null;
		$this->aktif = false;
		$this->katalog_id = [];
	}
	
	public function update(){
		$katalog_id = 0;
		if(count($this->katalog_id)){
			$katalog_id = implode(',',$this->katalog_id);
		}
		$data = [
			'kode_voucher' => $this->kode_voucher,
			'nominal_diskon' => $this->nominal_diskon,
			'tipe_diskon' => $this->tipe_diskon,
			'deskripsi_voucher' => $this->deskripsi_voucher,
			'nama_voucher' => $this->nama_voucher,
			'awal_berlaku' => $this->awal_berlaku,
			'akhir_berlaku' => $this->akhir_berlaku,
			'aktif' => $this->aktif,
			'katalog_id' => $katalog_id
		];
		$voucher = Voucher::find($this->voucher_id);
		$voucher->update($data);
		$this->resetInput();
		$this->emit('refreshVoucher');
	}

	public function getVoucher($voucher){
		//dd(gettype($voucher));
		$this->setData($voucher);
	}
}
