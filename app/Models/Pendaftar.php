<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

	protected $guarded = [];

    protected $appends = array('pendaftar_prodi');

	public function invoice(){
		return $this->belongsTo(Invoice::class);
	}

	public function prodi(){
		return $this->belongsTo(Prodi::class);
	}

    public function getPendaftarProdiAttribute()
    {
        return $this->prodi->nama_prodi;
    }
}
