<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Loai;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        view()->composer('trangchinh.layout.menu',function($view){
//
//        });

        $loai_sp = Loai::all();

        \View::share('loai_sp',$loai_sp);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
