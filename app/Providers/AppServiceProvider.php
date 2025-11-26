<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Report;                // <--- Tambah ini
use App\Observers\ReportObserver;     // <--- Tambah ini

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
        // KITA SAMBUNGKAN KABELNYA DI SINI
        Report::observe(ReportObserver::class);
    }
}