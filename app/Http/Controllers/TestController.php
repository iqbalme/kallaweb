<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\PostCategory;
use App\Models\Post;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    // public function index(){
		// $string = 'https://checkout-staging.xendit.co/';
		// if(str_contains($string, 'xendit.co')){
			// return 'benar';
		// };
		// return 'salah';
	// }
	
	public function index(){
		$cat = Category::find(2)->with('post')->get();
		return $cat;
	}
}
