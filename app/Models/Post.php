<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\PostCategory;
use App\Http\Traits\CommonTrait;

class Post extends Model
{
	use CommonTrait;
    use HasFactory;
	
	protected $guarded = [];
	
	protected $appends = array('post_excerpt'); //menambahkan field baru pada respon
	
	public function user(){
		return $this->belongsTo(User::class);
	}
	
	public function getPostExcerptAttribute()
    {
        return strip_tags($this->removeContentTag($this->konten));
    } 
	
}
