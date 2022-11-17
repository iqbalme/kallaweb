<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Post;

class PostArchive extends Component
{
	public $data;
	
    public function render()
    {
		$this->data['posts'] = Post::orderByDesc('created_at')->where('status_post', 'published')->paginate(10);
		//dd($this->data['posts']);
        return view('livewire.frontend.post-archive')
			->extends('layouts.app', ['title' => 'List Berita'])
			->section('content');
    }
}
