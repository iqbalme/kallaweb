<?php

namespace App\Http\Livewire\Carousel;

use Livewire\Component;
use App\Models\Post;

class CarouselCreate extends Component
{
	public $messageSave = false;
	public $carousel = null;
	public $isImageInitialized = false;
	public $posts;
	
    public function mount()
    {
        $this->posts = Post::all();
		$this->carousel['tipe'] = 'post';
    }
	
	public function render()
    {
        return view('livewire.carousel.carousel-create');
    }
	
	public function removeImage(){
		
	}
	
	
}