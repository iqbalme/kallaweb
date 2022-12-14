<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
	
	public function children()
	{
	    return $this->hasMany(Menu::class, 'parent', 'id')->with('children')->orderBy('urutan', 'ASC');
	}
}
