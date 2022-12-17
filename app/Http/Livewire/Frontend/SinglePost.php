<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use App\Models\Prodi;
use App\Models\Setting;

class SinglePost extends Component
{

	public $post;
	public $tags;
	public $prodi;
	public $categories;
	public $author;
	public $data;

	public function mount($post_val){
		$post = null;
		$setting_slug = Setting::where('nama_setting', 'post_slug')->first();
		if($setting_slug){
			if($setting_slug->isi_setting){
				$post = Post::where('slug', $post_val)->first();
			} else {
				$post = Post::find($post_val);
			}
		} else {
			$post = Post::find($post_val);
		}
		$tags = [];
		$categories = [];
		if(count($post->post_tags_data)){
			foreach($post->post_tags_data as $tag){
				$tags[] = Tag::find($tag->tag_id);
			}
		}
		if(count($post->post_categories_data)){
			foreach($post->post_categories_data as $category){
				$categories[] = Category::find($category->category_id);
			}
		}
		$this->post = $post;
		$this->tags = $tags;
		$this->categories = $categories;
		// $this->prodi = Prodi::find($post->post_prodi_data);
		$this->data['setting_slug'] = $setting_slug;
		$this->data['prodis'] = Prodi::all();
		$this->data['categories'] = Category::all();
		$this->data['post_lain'] = Post::whereNot('id', $post->id)->orderByDesc('created_at')->limit(3)->get();
	}

    public function render()
    {
        return view('livewire.frontend.single-post')
			->extends('layouts.app', ['title' => $this->post->judul ])
			->section('content');
    }
}
