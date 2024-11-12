<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            "App\Repositories\Interfaces\IUserRepository",
            "App\Repositories\UserRepository"
        );
        $this->app->bind(
            "App\Repositories\Interfaces\IAppointmentRepository",
            "App\Repositories\AppointmentRepository"
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
