<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Prodi;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class PostIndex extends Component
{
	use WithPagination;
	
	public $data;
	public $isUpdate = false;
	public $isFormVisible = false;
	public $post_id = null;
	public $perhalaman = 5;
	public $cari_post = '';
	public $isPostSlug = false;
	
	protected $listeners = [
		'refreshPost'
	];
	
	public function mount(){
		$setting_slug = Setting::where('nama_setting', 'post_slug')->first();
		if(!$setting_slug){
			$this->isPostSlug = false;
		} else {
			if((int) $setting_slug->isi_setting){
				$this->isPostSlug = true;
			} else {
				$this->isPostSlug = false;
			}
		}
	}
	
    public function render()
    {
		$posts = Post::orderBy('id', 'DESC')->where('judul', 'LIKE', '%'.$this->cari_post.'%')->paginate($this->perhalaman);
		$posts_categories = [];
		$posts_prodis = [];
		$posts_user = [];
		// $posts_tags = [];
		foreach($posts as $post){
			$categories = [];
			if($post->post_categories->count()){
				foreach($post->post_categories_data as $post_category){
					$categories[] = Category::find($post_category->category_id)->nama_kategori;
				}
			}
			$post_categories[] = $categories;
			$posts_prodis[] = Prodi::find($post->post_prodi->prodi_id)->nama_prodi;
		}
		
		$this->data['posts'] = $posts;
		$this->data['nama_kategori'] = $posts_categories;
		$this->data['nama_prodi'] = $posts_prodis;
        return view('livewire.post.post-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Publikasi / List']);
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
