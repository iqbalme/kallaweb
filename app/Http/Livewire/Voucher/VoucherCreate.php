<?php

namespace App\Http\Livewire\Voucher;

use Livewire\Component;
use App\Models\Voucher;
use App\Models\Katalog;
use Carbon\Carbon;

class VoucherCreate extends Component
{
	public $kode_voucher = null;
	public $nominal_diskon  = null;
	public $tipe_diskon = 'persen';
	public $deskripsi_voucher = null;
	public $nama_voucher = null;
	public $awal_berlaku = null;
	public $akhir_berlaku = null;
	public $aktif = false;
	//public $katalog_id = [];
	
	protected $listeners = [
		
	];
	
	public function mount(){
		$this->resetInput();
		//$this->katalogs = Katalog::all();
	}
	
    public function render()
    {	
        return view('livewire.voucher.voucher-create');
    }
	
	public function generateVoucher(){
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
		$this->kode_voucher = strtoupper(substr(str_shuffle($permitted_chars), 0, 10));
	}
	
	public function resetInput(){
		$this->kode_voucher = null;
		$this->nominal_diskon  = null;
		$this->tipe_diskon = 'persen';
		$this->deskripsi_voucher = null;
		$this->nama_voucher = null;
		$this->awal_berlaku = null;
		$this->akhir_berlaku = null;
		$this->aktif = false;
		//$this->katalog_id = [];
	}
	
	public function create(){
		$katalog_id = 0;
		$awal_berlaku = null;
		$akhir_berlaku = null;
		if(count($this->katalog_id)){
			$katalog_id = implode(',',$this->katalog_id);
		}
		if((!isset($this->awal_berlaku)) || ($this->awal_berlaku == '')){
			$awal_berlaku = null;
		} else {
			$awal_berlaku = $this->awal_berlaku;
		}
		if((!isset($this->akhir_berlaku)) || ($this->akhir_berlaku == '')){
			$akhir_berlaku = null;
		} else {
			$akhir_berlaku = $this->akhir_berlaku;
		}
		$data = [
			'kode_voucher' => $this->kode_voucher,
			//'katalog_id' => $katalog_id,
			'nominal_diskon' => $this->nominal_diskon,
			'tipe_diskon' => $this->tipe_diskon,
			'deskripsi_voucher' => $this->deskripsi_voucher,
			'nama_voucher' => $this->nama_voucher,
			'awal_berlaku' => $awal_berlaku,
			'akhir_berlaku' => $akhir_berlaku,
			'aktif' => $this->aktif
		];
		//dd($data);
		Voucher::create($data);
		$this->resetInput();
		$this->emit('refreshVoucher');
	}
}
