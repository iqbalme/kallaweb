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
		$settings = Setting::all();
		foreach($settings as $setting){
			$this->data[$setting->nama_setting] = $setting->isi_setting;
		}
		view()->composer('components.admin-layout', function($view){ $view->with('data', $this->data); });
		view()->composer('components.sidebar', function($view){ $view->with('data', $this->data); });
		view()->composer('components.header', function($view){ $view->with('data', $this->data); });
		view()->composer('layouts.app', function($view){ $view->with('data', $this->data); });
		view()->composer('layouts.nav', function($view){ $view->with('data', $this->data); });
		// $this->publishes([
			// __DIR__.'/../../public' => resource_path('vendor/mervick'),
		// ], 'material-design-icon');
    }
}
