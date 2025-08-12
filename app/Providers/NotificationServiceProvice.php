<?php

namespace App\Providers;

use App\Models\Bendahara\TransactionModel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvice extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['admin.dashboard-admin', 'components.sidebar-admin'], function ($view) {
            $notifications = TransactionModel::with('user.divisi')
                ->where('status', 'pending')
                ->latest()
                ->get();

            $view->with('notifications', $notifications);
        });
    }
}
