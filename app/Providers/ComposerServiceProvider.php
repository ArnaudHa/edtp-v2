<?php

namespace App\Providers;

use App\Services\SettingsService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {


    public function register()
    {
        //
    }

    public function boot()
    {

        View::composer('public.template', function ($view) {

            //$theme = resolve(\App\Services\SettingsService::class).get('theme');
            $cookies = new SettingsService();
            $theme = $cookies->get('theme');


            $view->with([ 'theme' => $theme ]);
        });

    }

}
