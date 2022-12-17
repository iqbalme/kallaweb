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
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostIndex extends Component
{
	use WithPagination;
    use AuthorizesRequests;

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
        //$this->authorize('view', $posts);
		$posts_categories = [];
		$posts_prodis = [];
		$posts_user = [];
		// $posts_tags = [];
		foreach($posts as $post){
			$categories = [];
            $prodis = [];
			if($post->post_categories->count()){
				foreach($post->post_categories_data as $post_category){
					$categories[] = ucwords(Category::find($post_category->category_id)->nama_kategori);
				}
			}
			$posts_categories[] = $categories;
            if($post->post_prodi->count()){
				foreach($post->post_prodi_data as $post_prodis){
                    $prodis[] = ucwords(Prodi::find($post_prodis->prodi_id)->nama_prodi);
				}
			}
			$posts_prodis[] = $prodis;
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
