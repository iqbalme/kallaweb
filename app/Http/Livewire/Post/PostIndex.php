<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PostIndex extends Component
{
	public $data;
	public $isUpdate = false;
	public $isFormVisible = false;
	public $post_id = null;
	public $perhalaman = 5;
	
	protected $listeners = [
		'refreshPost'
	];
	
	public function mount(){
		
	}
	
    public function render()
    {
		$posts = Post::orderBy('id', 'DESC')->paginate($this->perhalaman);
		$posts_categories = [];
		$posts_prodis = [];
		$posts_user = [];
		// $posts_tags = [];
		foreach($posts as $post){
			$categories = [];
			$prodis = [];
			
			//dd($post->category_id);
			if($post->category_id == 0){ //msh error di sini
				$posts_categories[] = 0;
			} else {
				foreach(explode(',', $post->category_id) as $cat_id){
					$categories[] = Category::find($cat_id)->nama_kategori;
				}
				$posts_categories[] = implode(',',$categories);
			}
			if(!empty($post->prodi_id)){
				foreach(explode(',', $post->prodi_id) as $prodi_id){
					$prodis[] = Prodi::find($prodi_id)->nama_prodi;
				}
				$posts_prodis[] = implode(',',$prodis);
			} else {
				$posts_prodis[] = 0;
			}
			// foreach(explode(',', $post->tag_id) as $tag_id){
				// $tags[] = Tag::find($tag_id)->nama_tag;
			// }
			
			$posts_user[] = User::find($post->user_id)->nama;
			// $posts_tags[] = implode(',',$tags);
		}
		
		$this->data['posts'] = $posts;
		$this->data['nama_kategori'] = $posts_categories;
		$this->data['nama_prodi'] = $posts_prodis;
		$this->data['nama_user'] = $posts_user;
        return view('livewire.post.post-index');
    }
	
	public function setPostId($id){
		$this->post_id = $id;
	}
	
	public function hapusPost($id){
		Post::find($id)->delete();
	}
	
	public function getPost($id){
		$this->isUpdate = true; //jika ini edit, bukan tambah
		$this->isFormVisible = true;
		$post = Post::find($id);
		$this->emit('getPost', $post);
	}

}
