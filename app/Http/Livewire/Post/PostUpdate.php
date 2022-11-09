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
use Illuminate\Support\Facades\Auth;

class PostUpdate extends Component
{
	use WithFileUploads;
	
	public $data;
	public $isUpdate;
	public $category_id = null;
	public $thumbnail;
	public $first_thumbnail = true;
	public $judul;
	public $konten;
	public $categories = []; 
	public $tags;
	public $prodis = [];
	public $post_id;
	public $is_headline = false;
	
	public function mount($post){
		$this->post_id = $post;
		$updatingPost = Post::find($post);
		$this->judul = $updatingPost->judul;
		$this->konten = $updatingPost->konten;
		$this->is_headline = $updatingPost->is_headline;
		if(isset($updatingPost->thumbnail)){
			$this->thumbnail = $updatingPost->thumbnail;
		} else {
			$this->first_thumbnail = false;
		}
		if($updatingPost->category_id){
			$post_categories = explode(',',trim($updatingPost->category_id));
			foreach($post_categories as $post_category){
				$this->categories[] = $post_category;
			}
		}
		if($updatingPost->prodi_id){
			$post_prodis = explode(',',trim($updatingPost->prodi_id));
			foreach($post_prodis as $post_prodi){
				$this->prodis[] = $post_prodi;
			}
		}
		if($updatingPost->tag_id){
			$post_tags = explode(',',trim($updatingPost->tag_id));
			$tags = [];
			foreach($post_tags as $post_tag){
				$tags[] = Tag::find($post_tag)->nama_tag;
			}
			$this->tags = implode(',',$tags);
		}			
		
	}
	
    public function render()
    {
		$this->data['categories'] = Category::all();
		$this->data['prodis'] = Prodi::all();
        return view('livewire.post.post-update')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Publikasi / Update Post']);
    }
	
	public function removeThumbnail(){
		if(!$this->first_thumbnail){
			$this->thumbnail->delete();
		}
		$this->first_thumbnail = false;
		$this->thumbnail = null;
	}
	
	public function updatePost($isPublished=true){
		$post_tags = [];
		$post_tags_insert = null;
		$thumbnail = null;
		if(isset($this->tags)){
			foreach(explode(',',$this->tags) as $tag){
				$post_tag = Tag::updateOrCreate(
				['nama_tag' => trim($tag)],
				['nama_tag' => trim($tag)]);
				$post_tags[] = $post_tag->id;
			}
		}
		$post_tags_insert = implode(',',array_unique($post_tags));
		if(isset($this->thumbnail)){
			if(!$this->first_thumbnail){
				$this->thumbnail->storeAs('public/images', $this->thumbnail->getFilename());
				$thumbnail = $this->thumbnail->getFilename();
				$this->thumbnail->delete();
			} else {
				$thumbnail = $this->thumbnail;
			}
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
			'is_headline' => $this->is_headline
		];
		$post = Post::find($this->post_id);
		$post->judul = $submittedData['judul'];
		$post->konten = $submittedData['konten'];
		$post->thumbnail = $submittedData['thumbnail'];
		$post->category_id = $submittedData['category_id'];
		$post->tag_id = $submittedData['tag_id'];
		$post->prodi_id = $submittedData['prodi_id'];
		$post->status_post = $submittedData['status_post'];
		$post->user_id = $submittedData['user_id'];
		$post->save();
		
		if(isset($this->categories)){
			PostCategory::where('post_id', $this->post_id)->delete();
			foreach($this->categories as $post_category){
				PostCategory::create([
					'post_id' => $this->post_id,
					'category_id' => $post_category
				]);
			}
		}
		if(isset($this->prodis)){
			PostProdis::where('post_id', $this->post_id)->delete();
			foreach($this->prodis as $post_prodi){
				PostProdis::create([
					'post_id' => $this->post_id,
					'prodi_id' => $post_prodi
				]);
			}
		}
		if(isset($post_tags)){
			PostTags::where('post_id', $this->post_id)->delete();
			foreach($post_tags as $post_tag){
				PostTags::create([
					'post_id' => $this->post_id,
					'tag_id' => $post_tag
				]);
			}
		}		
		return redirect()->route('post.index');
	}
}
