<?php

namespace App\Http\Livewire\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Prodi;
use App\Models\PostCategory;
use App\Models\PostProdis;
use App\Models\PostTags;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use App\Http\Traits\CommonTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostCreate extends Component
{
	use CommonTrait;
	use WithFileUploads;
	
	public $data;
	public $isUpdate;
	public $category_id = null;
	public $thumbnail;
	public $judul;
	public $konten;
	public $categories = []; 
	public $tags;
	public $prodis = [];
	public $post_id;
	
    public function render()
    {
		$this->data['categories'] = Category::all();
		$this->data['prodis'] = Prodi::all();
        return view('livewire.post.post-create')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Publikasi / Buat Baru']);
    }
	
	public function removeThumbnail(){
		$this->thumbnail->delete();
		$this->thumbnail = null;
	}
	
	public function publishPost($isPublished=true){
		$post_tags = [];
		$post_tags_insert = null;
		$thumbnail = null;
		if(isset($this->tags)){
			foreach(explode(',',$this->tags) as $tag){
				$post_tag = Tag::updateOrCreate(
				['nama_tag' => trim($tag)],
				['nama_tag' => trim($tag), 'slug' => $this->setSlug($tag)]);
				$post_tags[] = $post_tag->id;
			}
		}
		$post_tags_insert = implode(',',array_unique($post_tags));
		if(isset($this->thumbnail)){
			$thumbnail = $this->thumbnail->getFilename();
			$this->thumbnail->storeAs('public/images', $thumbnail);
		}
		$submittedData = [
			'judul' => $this->judul,
			'konten' => $this->konten,
			'thumbnail' => $thumbnail,
			'category_id' => count($this->categories) ? implode(",",array_filter(array_unique($this->categories))) : 0,
			'tag_id' => isset($this->tags) ? $post_tags_insert : 0,
			'prodi_id' => count($this->prodis) ? implode(",",array_filter(array_unique($this->prodis))) : 0,
			'status_post' => ($isPublished) ? 'published' : 'draft',
			'user_id' => Auth::user()->id,
			'slug' => $this->setSlug($this->judul)
		];
		$createdPost = Post::create($submittedData);
		if(isset($this->categories)){
			foreach($this->categories as $post_category){
				PostCategory::create([
					'post_id' => $createdPost->id,
					'category_id' => $post_category
				]);
			}
		}
		if(isset($this->prodis)){
			foreach($this->prodis as $post_prodi){
				PostProdis::create([
					'post_id' => $createdPost->id,
					'prodi_id' => $post_prodi
				]);
			}
		}		
		if(isset($post_tags)){
			foreach($post_tags as $post_tag){
				PostTags::create([
					'post_id' => $createdPost->id,
					'tag_id' => $post_tag
				]);
			}
		}
		return redirect()->route('post.index');
	}
	
}