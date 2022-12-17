<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Post;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class Home extends Component
{
	public $data;
    public $request;

	public function mount(Request $request){
		$this->request = $request;
	}

    public function render()
    {
		//$this->data['posts'] = Post::where('status_post', 'published')->orderBy('id', 'DESC')->take(5)->get();
		//dd(date('H:m:s'));
		//dd($this->data['events']);
        if($this->request->request->all()['is_main_domain']){
            $this->data['testimonis'] = Testimoni::all();
        }
        return view('livewire.frontend.home')
			->extends('layouts.app', ['title' => 'Beranda'])
			->section('content');
    }
}
