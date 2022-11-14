<?php

namespace App\Http\Livewire\Pengaturan;

use Livewire\Component;
use App\Models\Setting;
use App\Models\Katalog;
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
		$settings = Setting::all();
		foreach($settings as $setting){
			if($setting->nama_setting == 'post_slug'){
				$this->settings['post_slug'] = (int) $setting->isi_setting;
			} else {
				$this->settings[$setting->nama_setting] = $setting->isi_setting;
			}
		}
		if(isset($this->settings['web_logo'])){
			$this->isLogoInitialized = true;
		}
		if(isset($this->settings['web_icon'])){
			$this->isIconInitialized = true;
		}
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