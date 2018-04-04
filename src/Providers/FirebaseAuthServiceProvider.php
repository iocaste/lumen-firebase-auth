<?php

namespace Iocaste\FirebaseAuth\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class FirebaseAuthServiceProvider
 *
 * @package Kkcodes\FirebaseAuth
 */
class FirebaseAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        // include __DIR__ . '/../routes/web.php';
        // $this->loadViewsFrom(__DIR__ . '/../resources/views', 'fireview');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->publishes([
            __DIR__ . '/config/firebase.php' => config_path('firebase.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations'),
        ], 'migrations');
    }
}
