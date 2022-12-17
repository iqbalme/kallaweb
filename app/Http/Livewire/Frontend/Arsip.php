<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Prodi;
use App\Models\PostCategory;
use App\Models\PostProdis;
use App\Models\PostTags;
use App\Models\Post;
use App\Models\Setting;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class Arsip extends Component
{
	use WithPagination;
	public $meta;
	public $data;
	public $perhalaman = 9;
    public $initial_data_req = null;

	public function mount($meta_type, $meta_val, Request $request){
        $this->initial_data_req = $request->request->all();
		//$meta = kategori atau prodi atau tag
		$post_ids = [];
		$posts = [];
		if((strtolower($meta_type) == 'kategori') || (strtolower($meta_type) == 'prodi') || (strtolower($meta_type) == 'tag')){
			$this->meta['type'] = $meta_type;
			if(strtolower($meta_type) == 'kategori'){
				$category = Category::where('slug', strtolower($meta_val));
				if($category->count()){
					$this->meta['value'] = 'Kategori: '.ucfirst($category->first()->nama_kategori);
					$post_categories = $category->first()->post_category;
					foreach($post_categories as $post_category){
						$post_ids[] = $post_category->post_id;
					}
				}

			// } elseif(strtolower($meta_type) == 'prodi'){
			// 	$prodi = Prodi::where('slug', strtolower($meta_val));
			// 	if($prodi->count()){
			// 		$this->meta['value'] = 'Program Studi: '.ucfirst($prodi->first()->nama_prodi);
			// 		$post_prodis = $prodi->first()->post_prodi;
			// 		foreach($post_prodis as $post_prodi){
			// 			$post_ids[] = $post_prodi->post_id;
			// 		}
			// 	}
			} elseif(strtolower($meta_type) == 'tag'){
				$tag = Tag::where('slug', strtolower($meta_val));
				if($tag->count()){
					$this->meta['value'] = 'Tag: '.ucfirst($tag->first()->nama_tag);
					$post_tags = $tag->first()->post_tag;
					foreach($post_tags as $post_tag){
						$post_ids[] = $post_tag->post_id;
					}
				}
			}
            $ids_post = [];
            $new_ids_post = [];
            if($this->initial_data_req['is_main_domain']){
                if(count($post_ids)){
                    $posts = Post::whereIn('id', $post_ids)->paginate($this->perhalaman);
                }
            } else {
                $post_identity = PostProdis::where('prodi_id', $this->initial_data_req['subdomain']['id'])->get();
                foreach($post_identity as $ids){
                    $ids_post[] = $ids->post_id;
                }
                foreach($post_ids as $filtered_ids){
                    $pp = 0;
                    foreach($ids_post as $filter_target_id){
                        if($filtered_ids == $filter_target_id){
                            $pp++;
                        }
                    }
                    if($pp > 0){
                        $new_ids_post[] = $filtered_ids;
                    }
                }
                dd($new_ids_post);
                if(count($new_ids_post)){
                    $posts = Post::whereIn('id', $new_ids_post)->paginate($this->perhalaman);
                }
            }
			$this->data['posts'] = $posts;
			$this->data['is_seo_post'] = (int) Setting::where('nama_setting', 'post_slug')->first()->isi_setting;
		} else {
			return redirect()->route('home');
		}
	}

    public function render()
    {
        return view('livewire.frontend.arsip')
			->extends('layouts.app', ['title' => ucfirst($this->meta['type'])])
			->section('content');
    }
}
