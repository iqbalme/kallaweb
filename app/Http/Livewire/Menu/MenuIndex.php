<?php

namespace App\Http\Livewire\Menu;

use Livewire\Component;
use App\Models\Menu;

class MenuIndex extends Component
{
	protected $listeners = ['addTempMenu', 'addListMenu'];
	
	public $tempMenu = [];
	public $menus = [];
	
	public function mount(){
		$this->menus = Menu::with('children')->where(['parent' => 'id'])->orderBy('sort','ASC')->get()->toArray();
	}
	
    public function render()
    {
        return view('livewire.menu.menu-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Dashboard']);
    }
	
	public function addTempMenu($tempMenu){
		$this->dispatchBrowserEvent('closeModal');
		$this->dispatchBrowserEvent('addDragMenu', ['menu' => $tempMenu]);
	}
	
	public function addListMenu($element_id){
		// foreach($this->tempMenu as $key => $menu){
			// if($menu['element_id'] == $element_id){
				// array_splice($this->tempMenu,$key,1);
			// }
		// }
	}
}
