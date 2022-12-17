<?php

namespace App\Http\Livewire\Frontend\Home;

use Livewire\Component;
use App\Models\Post;
use App\Models\PostProdis;
use App\Models\Setting;
use Illuminate\Http\Request;

class LatestNews extends Component
{
	public $posts;
	public $headlined_post;
	public $is_seo;
    public $initial_data_req = null;

    public function mount(Request $request){
        $this->initial_data_req = $request->request->all();
    }

    public function render()
    {
		$is_seo = (int) Setting::where('nama_setting','post_slug')->first()->isi_setting;
		$this->is_seo = $is_seo;
        if($this->initial_data_req->is_main_domain){

        } else {

        }


        return view('livewire.frontend.home.latest-news');
    }

    public function getPostList($is_main_domain){
        $is_headline_exist;
        if($is_main_domain){
            $is_headline_exist = Post::where('is_headline', 1);
        } else {
            $post_ids = PostProdis::where('prodi_id', $this->initial_data_req->subdomain->id)->get();
            $ids_post = [];
            foreach($post_ids as $ids){
                $ids_post[] = $ids->post_id;
            }
            $is_headline_exist = Post::where('is_headline', 1)->whereIn('id', $id_post)->get();
        }

		if($is_headline_exist->count()){
			$this->posts = Post::where('is_headline', 0)->where('status_post', 'published')->orderByDesc('created_at')->limit(3)->get();
			$this->headlined_post = $is_headline_exist->first();
		} else {
			$this->posts = Post::where('is_headline', 0)->where('status_post', 'published')->orderByDesc('created_at')->skip(1)->limit(3)->get();
			$this->headlined_post = Post::latest()->where('status_post', 'published')->first();
		}
    }
}
