<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Setting;
use Livewire\WithFileUploads;

class PengaturanIndex extends Component
{
	use WithFileUploads;
	public $settings;
	public $messageSave = false;
	public $isLogoInitialized = false; //is web logo showed for the first time from database
	public $isIconInitialized = false; //is web icon showed for the first time from database
	
	protected $rules = [
        //"settings['web_title']" => "required"
    ];
	
	public function mount(){
		$this->settings['post_slug'] = (int) Setting::firstOrCreate(['nama_setting' => 'post_slug'], ['isi_setting' => 0])->isi_setting;
		$this->settings['web_logo'] = Setting::firstOrCreate(['nama_setting' => 'web_logo'], ['isi_setting' => null])->isi_setting;
		if(isset($this->settings['web_logo'])){
			$this->isLogoInitialized = true;
		}
		$this->settings['web_icon'] = Setting::firstOrCreate(['nama_setting' => 'web_icon'], ['isi_setting' => null])->isi_setting;
		if(isset($this->settings['web_icon'])){
			$this->isIconInitialized = true;
		}
		$this->settings['web_title'] = Setting::firstOrCreate(['nama_setting' => 'web_title'], ['isi_setting' => 'Kalla Institute'])->isi_setting;
		$this->settings['web_description'] = Setting::firstOrCreate(['nama_setting' => 'web_description'], ['isi_setting' => 'Smartpreneur Campus'])->isi_setting;
		$this->settings['web_tag'] = Setting::firstOrCreate(['nama_setting' => 'web_tag'], ['isi_setting' => null])->isi_setting;
		$this->settings['web_keywords'] = Setting::firstOrCreate(['nama_setting' => 'web_keywords'], ['isi_setting' => null])->isi_setting;
		$this->settings['status_pendaftaran'] = (int) Setting::firstOrCreate(['nama_setting' => 'status_pendaftaran'], ['isi_setting' => 0])->isi_setting;
		$this->settings['payment_test'] = Setting::firstOrCreate(['nama_setting' => 'payment_test'], ['isi_setting' => 'test'])->isi_setting; //test or live
		$this->settings['fb_pixel'] = Setting::firstOrCreate(['nama_setting' => 'fb_pixel'], ['isi_setting' => null])->isi_setting;
		$this->settings['google_analytics'] = Setting::firstOrCreate(['nama_setting' => 'google_analytics'], ['isi_setting' => null])->isi_setting;
		$this->settings['xendit_key_public'] = Setting::firstOrCreate(['nama_setting' => 'xendit_key_public'], ['isi_setting' => null])->isi_setting;
		$this->settings['xendit_key_secret'] = Setting::firstOrCreate(['nama_setting' => 'xendit_key_secret'], ['isi_setting' => null])->isi_setting;
	}
	
    public function render()
    {
        return view('livewire.admin.pengaturan-index')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Pengaturan']);
    }
	
	public function removeIcon(){
		if(!$this->isIconInitialized){
			$this->settings['web_icon']->delete();
		}
		$this->isIconInitialized = false;
		$this->settings['web_icon'] = null;
	}
	
	public function removeLogo(){
		if(!$this->isLogoInitialized){
			$this->settings['web_logo']->delete();
		}
		$this->isLogoInitialized = false;
		$this->settings['web_logo'] = null;
	}
	
	public function saveSettings(){
		$datas = [];
		foreach($this->settings as $key => $val){
			if(!$this->isLogoInitialized){
				if($key == 'web_logo'){
					$datas[] = [$key, $val];
				}
			}
			if(!$this->isIconInitialized){
				if($key == 'web_icon'){
					$datas[] = [$key, $val];
				}
			}
			if(($key != 'web_logo') && ($key != 'web_icon')){
				$datas[] = [$key, $val];
			}
		}
		foreach($datas as $data){
			Setting::updateOrCreate(
				['nama_setting' => $data[0]], ['isi_setting' => $data[1]]
			);			
		}
		$this->messageSave = true;
	}
}