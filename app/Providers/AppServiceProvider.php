<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
	public $data;
	
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		$this->data['web_title'] = Setting::firstOrCreate(['nama_setting' => 'web_title'], ['isi_setting' => 'Kalla Institute'])->isi_setting;
		$this->data['web_logo'] = Setting::firstOrCreate(['nama_setting' => 'web_logo'], ['isi_setting' => 'https://i.postimg.cc/ZK5qzGVV/kalla-group.png'])->isi_setting;
		$this->data['web_icon'] = Setting::firstOrCreate(['nama_setting' => 'web_icon'], ['isi_setting' => null])->isi_setting;
		$this->data['web_description'] = Setting::firstOrCreate(['nama_setting' => 'web_description'], ['isi_setting' => null])->isi_setting;
		$this->data['web_keywords'] = Setting::firstOrCreate(['nama_setting' => 'web_keywords'], ['isi_setting' => null])->isi_setting;
        view()->composer('components.admin-layout', function($view)
		{
			$view->with(['web_title' => $this->data['web_title'], 'web_icon' => $this->data['web_icon'], 'web_description' => $this->data['web_description'], 'web_keywords' => $this->data['web_keywords']]);
		});
		
		view()->composer('components.sidebar', function($view)
		{
			$view->with('web_logo', $this->data['web_logo']);
		});
		
		view()->composer('components.header', function($view)
		{
			$view->with('web_logo', $this->data['web_logo']);
		});
		
		view()->composer('layouts.app', function($view)
		{
			$view->with(['web_title' => $this->data['web_title'], 'web_icon' => $this->data['web_icon'], 'web_description' => $this->data['web_description'], 'web_keywords' => $this->data['web_keywords']]);
		});
		
		view()->composer('layouts.nav', function($view)
		{
			$view->with('web_logo', $this->data['web_logo']);
		});
    }
}
