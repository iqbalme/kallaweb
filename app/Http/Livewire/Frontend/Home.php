<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Post;
use App\Models\Testimoni;

class Home extends Component
{
	public $data;
	
	public function mount(){
		
	}
	
    public function render()
    {
		//$this->data['posts'] = Post::where('status_post', 'published')->orderBy('id', 'DESC')->take(5)->get();
		//dd(date('H:m:s'));
		//dd($this->data['events']);
		$this->data['testimonis'] = Testimoni::all();
        return view('livewire.frontend.home')
			->extends('layouts.app', ['title' => 'Beranda'])
			->section('content');
    }
}
