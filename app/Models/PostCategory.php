<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Category;

class PostCategory extends Model
{
    use HasFactory;
	
	protected $guarded = [];
	
	public function post(){
		return $this->belongsTo(Post::class);
	}
	
	public function kategori(){
		return $this->belongsTo(Category::class, 'category_id', 'id')->get();
	}
}
