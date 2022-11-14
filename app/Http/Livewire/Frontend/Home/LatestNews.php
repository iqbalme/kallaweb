<?php

namespace App\Http\Livewire\Frontend\Home;

use Livewire\Component;
use App\Models\Post;
use App\Models\Setting;

class LatestNews extends Component
{
	public $posts;
	public $headlined_post;
	public $is_seo;
	
    public function render()
    {
		$is_seo = (int) Setting::where('nama_setting','post_slug')->first()->isi_setting;
		$this->is_seo = $is_seo;
		$is_headline_exist = Post::where('is_headline', 1);
		if($is_headline_exist->count()){
			$this->posts = Post::where('is_headline', 0)->where('status_post', 'published')->orderByDesc('created_at')->limit(4)->get();
			$this->headlined_post = $is_headline_exist->first();
		} else {
			$this->posts = Post::where('is_headline', 0)->where('status_post', 'published')->orderByDesc('created_at')->skip(1)->limit(4)->get();
			$this->headlined_post = Post::latest()->where('status_post', 'published')->first();
		}
		
        return view('livewire.frontend.home.latest-news');
    }
}
