<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class PostArchive extends Component
{
	use WithPagination;
	public $data;
	
    public function render()
    {
		$this->data['posts'] = Post::orderByDesc('created_at')->where('status_post', 'published')->paginate(9);
		//dd($this->data['posts']);
        return view('livewire.frontend.post-archive')
			->extends('layouts.app', ['title' => 'List Berita'])
			->section('content');
    }
}
