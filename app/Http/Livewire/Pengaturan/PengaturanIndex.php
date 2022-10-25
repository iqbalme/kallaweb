<?php

namespace App\Http\Livewire\Pengaturan;

use Livewire\Component;
use App\Models\Setting;

class PengaturanIndex extends Component
{
	public $settings;
	// $settings['post_slug']
	// $settings['web_logo']
	// $settings['web_title']
	// $settings['web_description']
	// $settings['status_pendaftaran']
	// $settings['payment_test']
	
    public function render()
    {
		$settings = Setting::all();
		foreach($settings as $key => $setting){
			$this->settings[$key] = $setting;
		}
        return view('livewire.pengaturan.pengaturan-index')
			->layout(\App\View\Components\AdminLayout::class);
    }
}
