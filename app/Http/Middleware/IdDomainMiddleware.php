<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Prodi;

use App\Models\Setting;
use App\Models\Pendaftar;
use App\Models\PesertaEvent;
use App\Observers\PendaftarObserver;
use App\Observers\PesertaEventObserver;

class IdDomainMiddleware
{
    public $data;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $domainId = [];
        preg_match('/(?:https?:\/\/)?([a-zA-Z0-9_-]+)?.?('.config('app.url').')/i', $request->fullUrl(), $domainId, PREG_UNMATCHED_AS_NULL);
        if(isset($domainId[1])){
            //subdomain
            $prodi = Prodi::where('subdomain', $domainId[1]);
            if($prodi->count()){
                //tambah new value untuk identifikasi subdomain
                $request->request->add(['is_main_domain' => false, 'subdomain' => $prodi->get()]);
                $this->inisiasi_layout_data();
                return $next($request);
            } else {
                abort(404);
            }
        } else {
            //domain utama
            //tambah new value untuk identifikasi domain utama
            $request->request->add(['is_main_domain' => true, 'subdomain' => null]);
            $this->inisiasi_layout_data();
            return $next($request);
        };
    }

    protected function inisiasi_layout_data(){
        $settings = Setting::all();
        foreach($settings as $setting){
            $this->data[$setting->nama_setting] = $setting->isi_setting;
        }

        view()->composer('components.admin-layout', function($view){ $view->with('data', $this->data); });
        view()->composer('components.sidebar', function($view){ $view->with('data', $this->data); });
        view()->composer('components.header', function($view){ $view->with('data', $this->data); });
        //view()->composer('components.footer', function($view){ $view->with('data', $this->data); });
        view()->composer('layouts.app', function($view){ $view->with('data', $this->data); });
        view()->composer('layouts.nav', function($view){ $view->with('data', $this->data); });
        view()->composer('layouts.footer', function($view){ $view->with('data', $this->data); });

        Pendaftar::observe(PendaftarObserver::class);
        PesertaEvent::observe(PesertaEventObserver::class);
    }
}