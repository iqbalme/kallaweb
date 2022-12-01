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
		$this->data['sumber_info'] = "Guru Sekolah";
	}
	
    public function render()
    {
        return view('livewire.frontend.contact')
			->extends('layouts.app', ['title' => 'Kontak'])
			->section('content');
    }
	
	public function kirimPesan(){
		$mail_ct = new ContactMail($this->data);
		$mail_ct->replyTo($this->data['email'], $this->data['nama']);
		$mail_ct->cc('webcracking@gmail.com', 'Muhammad Iqbal');
		if($this->kirimEmail('m.fachrul@kallabs.ac.id', $mail_ct)){
			return redirect()->route('kontak');
		}
	}
}
