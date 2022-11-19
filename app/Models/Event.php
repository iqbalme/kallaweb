<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\CommonTrait;

class Event extends Model
{
    use HasFactory;
	use CommonTrait;
	
	protected $guarded = [];
	protected $dates = ['waktu_mulai', 'waktu_berakhir'];
	
	protected $appends = array('event_excerpt'); //menambahkan field baru pada respon
	
	public function getEventExcerptAttribute()
    {
        return strip_tags($this->removeContentTag($this->deskripsi_event));
    }
	
}
