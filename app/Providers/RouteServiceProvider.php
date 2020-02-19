<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapWennecRoutes();
        $this->mapSuperAdminRoutes();
        
        
        
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('web')
             ->namespace('App\Container\Wennec\Src\Controllers')
             ->group(base_path('routes/api.php'));
    }

    /**
     * Rutas de Administrador
     *
     * @return void
     */
    

    /*protected function mapCalisoftRoutes()
    {
        Route::middleware('web')
            ->namespace('App\Container\Calisoft\Src\Controllers')
            ->group(base_path('routes/calisoft.php'));
    }*/
    protected function mapWennecRoutes(){
        Route::middleware('web')
             ->namespace('App\Container\Wennec\Src\Controllers')
             ->group(base_path('routes/Wennec.php'));
    }

    protected function mapSuperAdminRoutes(){
        Route::middleware('web')
             ->namespace('App\Container\Wennec\Src\Controllers')
             ->group(base_path('routes/super-admin.php'));
    }

}
