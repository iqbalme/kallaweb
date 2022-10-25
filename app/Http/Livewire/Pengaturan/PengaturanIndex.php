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
	
	public function mount(){
		$this->settings['post_slug'] = Setting::firstOrCreate(['nama_setting' => 'post_slug', 'isi_setting' => 0]);
		$this->settings['web_logo'] = Setting::firstOrCreate(['nama_setting' => 'web_logo', 'isi_setting' => null]);
		$this->settings['web_icon'] = Setting::firstOrCreate(['nama_setting' => 'web_icon', 'isi_setting' => null]);
		$this->settings['web_title'] = Setting::firstOrCreate(['nama_setting' => 'web_title', 'isi_setting' => 'Kalla Institute']);
		$this->settings['web_description'] = Setting::firstOrCreate(['nama_setting' => 'web_description', 'isi_setting' => 'Smartpreneur Campus']);
		$this->settings['status_pendaftaran'] = Setting::firstOrCreate(['nama_setting' => 'status_pendaftaran', 'isi_setting' => 0]);
		$this->settings['payment_test'] = Setting::firstOrCreate(['nama_setting' => 'payment_test', 'isi_setting' => 'test']); //test or live
	}
	
    public function render()
    {
		$settings = Setting::all();
		foreach($settings as $key => $setting){
			$this->settings[$key] = $setting;
		}
        return view('livewire.pengaturan.pengaturan-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Pengaturan']);
    }
}
