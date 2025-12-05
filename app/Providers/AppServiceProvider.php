<?php

namespace App\Providers;

use App\Models\KasPembayaran;
use App\Observers\KasPembayaranObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        KasPembayaran::observe(KasPembayaranObserver::class);
    }
}
