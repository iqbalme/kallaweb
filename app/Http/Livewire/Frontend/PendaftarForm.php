<?php

namespace App\Http\Livewire\Frontend;

use Xendit\Xendit;
use Livewire\Component;

class PendaftarForm extends Component
{
	public $current_step = 1;
	public $payment_channels = [];
	
	public function mount(){
		Xendit::setApiKey('xnd_development_0GDGBB2KvbCsppN8aZu0Mj2HaZk8m21pFFvbKh5Mx9FFRHkOqmfVpDCek51eqquy');
		$this->payment_channels = \Xendit\PaymentChannels::list();
	}
	
    public function render()
    {
        return view('livewire.frontend.pendaftar-form')
			->extends('layouts.app', ['title' => 'Pendaftaran'])
			->section('content');
    }
	
	public function previous(){
		if($this->current_step > 0){
			$this->current_step--;
		}
	}
	
	public function next(){
		if($this->current_step < 3){
			$this->current_step++;
		}
	}
	
	public function registrasiBaru(){
		
	}
	
	public function payment(){
		Xendit::setApiKey('xnd_development_0GDGBB2KvbCsppN8aZu0Mj2HaZk8m21pFFvbKh5Mx9FFRHkOqmfVpDCek51eqquy');
		$params = ["external_id" => "VA_fixed-12341234",
		   "bank_code" => "MANDIRI",
		   "name" => "Steve Wozniak"
		];

		// $createVA = \Xendit\VirtualAccounts::create($params);
		// dd($createVA);
		// $getVABanks = \Xendit\VirtualAccounts::getVABanks();
		// dd($getVABanks);
		// $getVA = \Xendit\VirtualAccounts::retrieve('635aa8b3261ab178bef09287');
		// dd($getVA);
		$updateParams = ["suggested_amount" => 1000];

		$updateVA = \Xendit\VirtualAccounts::update('635aa8b3261ab178bef09287', $updateParams);
		dd($updateVA);
	}
}
