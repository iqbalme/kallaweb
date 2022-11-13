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
	public $thumbnail;
	public $judul;
	public $konten;
	public $categories = []; 
	public $tags;
	public $post_prodi = null;
	public $is_headline = false;
	
    public function render()
    {
		$this->data['categories'] = Category::all();
		$prodis = Prodi::all();
		$this->data['prodis'] = $prodis;
		if($prodis->count()){
			$this->post_prodi = $prodis[0]->id;
		}
        return view('livewire.post.post-create')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Publikasi / Buat Baru']);
    }
	
	public function removeThumbnail(){
		$this->thumbnail->delete();
		$this->thumbnail = null;
	}
	
	public function publishPost($isPublished=true){
		$post_tags = [];
		$post_categories = [];
		$thumbnail = null;
		if(isset($this->tags)){
			foreach(explode(',',$this->tags) as $tag){
				$post_tag = Tag::updateOrCreate(
				['nama_tag' => trim($tag)],
				['nama_tag' => trim($tag), 'slug' => $this->setSlug($tag)]);
				$post_tags[] = ['tag_id' => $post_tag->id];
			}
		}
		//$post_tags_insert = implode(',',array_unique($post_tags));
		if(isset($this->thumbnail)){
			$thumbnail = $this->thumbnail->getFilename();
			$this->thumbnail->storeAs('public/images', $thumbnail);
		}
		$submittedData = [
			'judul' => $this->judul,
			'konten' => $this->konten,
			'thumbnail' => $thumbnail,
			'status_post' => ($isPublished) ? 'published' : 'draft',
			'user_id' => Auth::user()->id,
			'slug' => $this->setSlug($this->judul),
			'is_headline' => $this->is_headline
		];
		$createdPost = Post::create($submittedData);
		if($this->is_headline) {
			Post::where('id', '!=', $createdPost->id)->update(['is_headline' => false]);
		};
		if(isset($this->categories)){
			foreach($this->categories as $post_category){
				$post_categories[] = ['category_id' => $post_category];
			}
		}
		$createdPost->post_prodi()->create(['prodi_id' => $this->post_prodi]);
		$createdPost->post_categories()->createMany($post_categories);
		$createdPost->post_tags()->createMany($post_tags);
		return redirect()->route('post.index');
	}
	
}