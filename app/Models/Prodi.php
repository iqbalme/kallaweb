<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Capability;

class Prodi extends Model
{
    use HasFactory;
	
	public function capability()
    {
        //return $this->belongsTo(Capability::class);
    }
}
