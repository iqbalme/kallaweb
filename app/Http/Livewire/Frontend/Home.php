<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Post;

class Home extends Component
{
	public $data;
	
	public function mount(){
		//$this->data['posts'] = Post::orderBy('id', 'DESC')->take(5)->get();
	}
	
    public function render()
    {
		//dd($this->data['posts']);
		$this->data['posts'] = Post::where('status_post', 'published')->orderBy('id', 'DESC')->take(5)->get();
		$this->data['carousels'] = null;
        return view('livewire.frontend.home')
			->extends('layouts.app', ['title' => 'Beranda'])
			->section('content');
    }
}
