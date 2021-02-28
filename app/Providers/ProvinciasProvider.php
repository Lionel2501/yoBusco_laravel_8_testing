<?php

namespace App\Providers;

use View;
use App\Models\Provincia;
use Illuminate\Support\ServiceProvider;

class ProvinciasProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('*', function($view){
            $provincias = provincia::all();

            $view->with('provincias', $provincias);
        });
    }
}
