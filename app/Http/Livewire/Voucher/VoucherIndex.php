<?php

namespace App\Http\Livewire\Voucher;

use Livewire\Component;
use App\Models\Voucher;

class VoucherIndex extends Component
{
	public $data;
	public $voucher_id = null;
	public $voucher = null;
	public $isVoucherUpdate = false;
	public $isVoucherForm = false;
	public $datavoucher = false;
	
	protected $listeners = [
		'refreshVoucher'
	];
	
	public function mount(){
		
	}
	
    public function render()
    {
		$this->data['vouchers'] = Voucher::all();
		$this->emit('getVoucher', $this->voucher);
        return view('livewire.voucher.voucher-index');
    }
	
	public function tambahVoucher(){
		$this->emit('addVoucher');
	}
	
	public function updateVoucher(){
		$this->emit('updateVoucher');
	}
	
	public function setVoucherId($id){
		$this->voucher_id = $id;
	}
	
	public function hapusVoucher($id){
		Voucher::find($id)->delete();
	}
	
	public function getVoucher($id){
		$this->isVoucherUpdate = true;
		$this->voucher = Voucher::find($id);
	}
	
	public function addFormVoucher(){
		$this->isVoucherUpdate = false;
	}
	
	public function refreshVoucher(){
		
	}
}