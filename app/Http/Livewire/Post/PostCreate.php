<?php

namespace App\Http\Livewire\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Prodi;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostCreate extends Component
{
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
        return view('livewire.post.post-create');
    }
	
	public function saveThumbnail()
    {
        $this->validate([
            'thumbnail' => 'image|max:2048', // 2MB Max
        ]);
 
        $this->thumbnail->store('images');
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
				['nama_tag' => trim($tag)]);
				$post_tags[] = $post_tag->id;
			}
		}
		$post_tags_insert = implode(',',array_unique($post_tags));
		if(isset($this->thumbnail)){
			$this->thumbnail->storeAs('public/images', $this->thumbnail->getFilename());
			$thumbnail = $this->thumbnail->getFilename();
			$this->thumbnail->delete();
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
		Post::create($submittedData);
		return redirect()->route('post.index');
	}
	
	public function setSlug($string) {
	   $string = substr(str_replace(' ', '-', $string),0,100); // Replaces all spaces with hyphens with max 100 characters
	   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}
	
}