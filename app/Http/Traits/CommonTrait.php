<?php
namespace App\Http\Traits;

trait CommonTrait
{
	
	public function setSlug($string) {
	   $string = substr(str_replace(' ', '-', $string),0,100); // Replaces all spaces with hyphens with max 100 characters
	   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}
}