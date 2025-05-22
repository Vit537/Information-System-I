<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Paquete_Usuarios\Auth\Persona;
use App\Observers\bitacoraObserver;
use Illuminate\Support\Facades\URL;

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
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
        //
        persona::observe(BitacoraObserver::class);
        //Product::observe(BitacoraObserver::class);
        // Registra el observer para cada modelo que quieras trackear
        //  User::observe(BitacoraObserver::class);
        //  Product::observe(BitacoraObserver::class);
        //  Category::observe(BitacoraObserver::class);
        // Añade aquí otros modelos que necesites monitorizar
    }
}
