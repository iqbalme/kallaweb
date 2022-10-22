<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use App\Models\Prodi;

class SinglePost extends Component
{
	//public $post_id;
	public $post;
	public $tags;
	public $prodis;
	public $categories;
	public $author;
	public $data;
	
	public function mount($post_id){
		$post = Post::find($post_id);
		$tags = [];
		$categories = [];
		$prodis = [];
		if($post->tag_id !== '0'){
			$tags_id = explode(',',trim($post->tag_id));
			foreach($tags_id as $tag_id){
				$tags[] = Tag::find($tag_id)->nama_tag;
			}
		}
		if($post->category_id !== '0'){
			$categories_id = explode(',',trim($post->category_id));
			foreach($categories_id as $category_id){
				$categories[] = Category::find($category_id)->nama_kategori;
			}
		}
		if($post->prodi_id !== '0'){
			$prodis_id = explode(',',trim($post->prodi_id));
			foreach($prodis_id as $prodi_id){
				$prodis[] = Prodi::find($prodi_id)->nama_prodi;
			}
		}
		$this->author = User::find($post->user_id)->nama;
		$this->post = $post;
		$this->tags = $tags;
		$this->categories = implode(',',$categories);
		$this->prodis = implode(',',$prodis);
		$this->data['prodis'] = Prodi::all();
		$this->data['categories'] = Category::all();
	}
    public function render()
    {
        return view('livewire.frontend.single-post')
			->extends('layouts.app', ['title' => 'judulnya'	])
			->section('content');
    }
}
