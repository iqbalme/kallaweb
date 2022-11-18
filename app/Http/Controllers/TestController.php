<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\PostCategory;
use App\Models\Post;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\CommonTrait;

class TestController extends Controller
{
	use CommonTrait;
    // public function index(){
		// $string = 'https://checkout-staging.xendit.co/';
		// if(str_contains($string, 'xendit.co')){
			// return 'benar';
		// };
		// return 'salah';
	// }
	
	public function index(){
		$user = User::find(3);
		$post = Post::find(12);
		$post_roles = [];
        $roles = $user->role_users;
		foreach($roles as $role){
			$post_roles[] = $role->role_id;
		}
		$prodi_id = $post->post_prodi_data->prodi_id;
		$is_true = Role::whereIn('id', $post_roles)->where('prodi_id', $prodi_id)->exists();
		return $is_true;
	}
	
	public function subdomain($param){
		print_r($param);
	}
	
	public function tesredirect(){
		//return redirect()->route('tes2', $headers = ['keyq' => 'halo']);
		//return substr(strip_tags($this->getParagraphTag($this->konten)),0,140);
		dd($this->getParagraphTag($this->removeContentTag('<p>saya adalah orang yang suka ke sekolah</p><img src="tes.jpg"><p>ini adalah sekolah saya</p>')));
	}
	
	public function getredirect(Request $request){
		dd(request()->headers->get('keyq'));
	}
}
