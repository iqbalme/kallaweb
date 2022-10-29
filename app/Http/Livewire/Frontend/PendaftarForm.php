<?php

namespace App\Http\Livewire\Frontend;

use Xendit\Xendit;
use App\Models\Setting;
use App\Models\Katalog;
use App\Models\Voucher;
use App\Models\Prodi;
use Livewire\Component;
use App\Http\Traits\CommonTrait;

class PendaftarForm extends Component
{
	use CommonTrait;
	
	public $currentStep = 1;
	public $total = 0; 
	public $voucher;
	public $settings;
	public $katalogAdmisi;
	public $kodeVoucher;
	public $discount = 0;
	public $data;
	public $isDataBenar = false;
	public $prodis;
	
	protected $rules = [
        'data.nama_lengkap' => 'required',
        'data.no_ktp' => 'required|max:16',
        'data.email' => 'required|email',
        'data.no_hp' => 'required|max:15'
    ];
	
	public function mount(){
		$this->data['nama_lengkap'] = null;
		$this->data['no_ktp'] = null;
		$this->data['email'] = null;
		$this->data['no_hp'] = null;
		
		$settings = Setting::all();
		foreach($settings as $setting){
			$this->settings[$setting->nama_setting] = $setting->isi_setting;
		}
		$katalogAdmisi = Katalog::find((int) $this->settings['katalog_admission_assigned']);
		if(isset($katalogAdmisi)){
			$this->katalogAdmisi = $katalogAdmisi;
			$this->total = $katalogAdmisi->harga;
		}
		if((!(int) $this->settings['status_pendaftaran']) || (!isset($katalogAdmisi))){
			return redirect()->route('home');
		}
		$this->prodis = Prodi::all();
		if($this->prodis->count()){
			$this->data['prodi'] = 1;
		}
	}
	
    public function render()
    {
        return view('livewire.frontend.pendaftar-form')
			->extends('layouts.app', ['title' => 'Pendaftaran'])
			->section('content');
    }
	
	public function previous(){
		if($this->currentStep > 0){
			$this->currentStep--;
		}
	}
	
	public function next(){
		$this->validate();
		if($this->currentStep < 3){
			$this->currentStep++;
		}
	}
	
	public function registrasiBaru(){
		$this->payment();
	}
	
	public function radeemVoucher(){
		$voucher = Voucher::where(['kode_voucher' => $this->kodeVoucher, 'aktif' => 1]);
		if($voucher->count()){
			if($voucher->first()->tipe_diskon == 'persen'){
				$this->discount = $this->katalogAdmisi->harga / 100 * $voucher->first()->nominal_diskon;
			} else {
				$this->discount = $voucher->first()->nominal_diskon;
			};
		} else {
			$this->kodeVoucher = null;
			$this->discount = 0;
		}
		$this->total = $this->katalogAdmisi->harga - $this->discount;
	}
	
	public function splitName($name){
		$splittedName = [];
		if(strrpos(trim($name), ' ')){
			$explodedName = explode(' ', trim(ucfirst($name)));
			if(count($explodedName) > 2){
				$splittedName = [trim(substr($name, 0, strpos($name, ' '))),trim(substr($name, strpos($name, ' '), strlen($name)))];
			} else {
				$splittedName = $explodedName;
			}
		} else {
			$splittedName = [ucfirst(trim($name))];
		}
		return $splittedName;
	}
	
	public function payment(){
		$nama = $this->splitName($this->data['nama_lengkap']);
		$external_id = $this->generateInvoiceNo();
		if(count($nama) > 1){
			$params['customer']['surname'] = $nama[1];
		}
		$params = [ 
			'external_id' => $external_id,
			'amount' => $this->total,
			'description' => 'Invoice '.$this->katalogAdmisi->nama_katalog,
			'invoice_duration' => 172800, //48 jam
			'customer' => [
				'given_names' => $nama[0],
				'email' => $this->data['email'],
				'mobile_number' => $this->data['no_hp']
			],
			'customer_notification_preference' => [
				'invoice_created' => [
					'whatsapp',
					'sms',
					'email'
				],
				// 'invoice_reminder' => [
					// 'whatsapp',
					// 'sms',
					// 'email'
				// ],
				'invoice_paid' => [
					'whatsapp',
					'sms',
					'email'
				],
				'invoice_expired' => [
					'whatsapp',
					'sms',
					'email'
				]
			],
			'success_redirect_url' => route('xendit.success.route'),
			//'success_redirect_url' => 'https://1a91-114-5-247-133.ngrok.io/api/success_payment_callback',
			'failure_redirect_url' => route('xendit.failed.route'),
			//'failure_redirect_url' => 'https://1a91-114-5-247-133.ngrok.io/api/failed_payment_callback',
			'currency' => 'IDR',
			'items' => [
				[
					'name' => $this->katalogAdmisi->nama_katalog,
					'quantity' => 1,
					'price' => $this->total
				]
			]
		  ];
		  $isVoucher = false;
		  if($this->kodeVoucher){
			  $isVoucher = true;
		  }
		$this->buatInvoice($params, $this->data, $isVoucher, [$this->katalogAdmisi]);
	}
}
