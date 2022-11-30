<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Http\Traits\CommonTrait;
use App\Mail\ContactMail;

class Contact extends Component
{
	use CommonTrait;
	
	public $data;
	
	public function mount(){
		$this->data['entitas'] = "Siswa";
		$this->data['angkatan'] = "Angkatan 2022";
		$this->data['is_wni'] = "WNI";
		$this->data['sumber_info'] = "Billboard";
	}
	
    public function render()
    {
        return view('livewire.frontend.contact')
			->extends('layouts.app', ['title' => 'Kontak'])
			->section('content');
    }
	
	public function kirimPesan(){
		if($this->kirimEmail('m.fachrul@kallabs.ac.id', new ContactMail($this->data))){
			return redirect()->route('kontak');
		}
	}
}
