<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Capability;

class Role extends Model
{
    use HasFactory;
	
	protected $guarded = [];
	
	public function capability(){
		// $this->hasOne(Capability::class);
	}
}
