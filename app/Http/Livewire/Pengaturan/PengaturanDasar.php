<?php

namespace App\Http\Livewire\Pengaturan;

use Livewire\Component;
use App\Models\Setting;
use Livewire\WithFileUploads;

class PengaturanDasar extends Component
{
	use WithFileUploads;
	public $settings;
	public $messageSave = false;
	public $isLogoInitialized = false; //is web logo showed for the first time from database
	public $isIconInitialized = false; //is web icon showed for the first time from database
	
	protected $listeners = [
		'setMessageSaveFalse'
	];
	
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
        return view('livewire.pengaturan.pengaturan-dasar')
			->layout(\App\View\Components\AdminLayout::class, ['breadcrumb' => 'Pengaturan / Dasar']);
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
	
	public function setMessageSaveFalse(){
		$this->messageSave = false;
	}
	
	public function saveSettings(){
		$datas = [];
		$web_logo = null;
		$web_icon = null;
		
		if(isset($this->settings['web_logo'])){
			if(!$this->isLogoInitialized){
				$logo_name = $this->settings['web_logo']->getFilename();
				$this->settings['web_logo']->storeAs('public/images', $logo_name);
				$this->settings['web_logo']->delete();
				$datas[] = ['web_logo', $logo_name];
			}
		} else {
			$datas[] = ['web_logo', null];
		}
		if(isset($this->settings['web_icon'])){
			if(!$this->isIconInitialized){
				$icon_name = $this->settings['web_icon']->getFilename();
				$this->settings['web_icon']->storeAs('public/images', $icon_name);
				$this->settings['web_icon']->delete();
				$datas[] = ['web_icon', $icon_name];
			}
		} else {
			$datas[] = ['web_icon', null];
		}
		foreach($this->settings as $key => $val){
			if(($key != 'web_logo') && ($key != 'web_icon')){
				$datas[] = [$key, $val];
			}
		}
		//dd($datas);
		foreach($datas as $data){
			Setting::updateOrCreate(
				['nama_setting' => $data[0]], ['isi_setting' => $data[1]]
			);			
		}
		$this->messageSave = true;
		return redirect()->route('pengaturan.dasar');
	}
}