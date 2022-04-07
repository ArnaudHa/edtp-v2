<?php

namespace App\Providers;

use App\Services\GalaoService;
use App\Services\NotesService;
use App\Services\PlanningService;
use App\Services\SettingsService;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PlanningService::class, function() {
            return new PlanningService();
        });

        $this->app->singleton(NotesService::class, function() {
            return new NotesService();
        });

        $this->app->singleton(GalaoService::class, function () {
            return new GalaoService();
        });

        $this->app->singleton(SettingsService::class, function() {
            return new SettingsService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        (new SettingsService());
    }
}
