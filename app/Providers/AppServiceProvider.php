<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

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
        Route::middleware(['web', 'auth', 'role:admin'])
            ->group(base_path('routes/admin.php'));

        Route::middleware(['web', 'auth', 'role:bendahara'])
            ->group(base_path('routes/bendahara.php'));

        Route::middleware(['web', 'auth', 'role:user'])
            ->group(base_path('routes/user.php'));

        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        Route::middleware('web')
            ->group(base_path('routes/auth.php'));

    }

}
