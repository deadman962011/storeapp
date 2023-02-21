<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';
    protected $namespace = 'App\Http\Controllers';
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api/{lang}/{breakpoint}')
                ->namespace($this->namespace)
                ->group(function(){
                    // base_path('routes/api.php')
                    Route::prefix('category')
                        ->namespace($this->namespace)
                        ->group(base_path('routes/api/categoryRoutes.php'));
                    Route::prefix('brand')
                        ->namespace($this->namespace)
                        ->group(base_path('routes/api/brandRoutes.php'));
                    Route::prefix('user')
                        ->namespace($this->namespace)
                        ->group(base_path('routes/api/userRoutes.php'));
                    Route::prefix('layout')
                        ->namespace($this->namespace)
                        ->group(base_path('routes/api/layoutRoutes.php'));
                });


            Route::middleware('web')
                ->prefix('cpanel/admin')
                ->namespace($this->namespace)
                ->group(base_path('routes/cpanel/adminRoutes.php'));
            Route::middleware('web')
                ->prefix('cpanel/vendor')
                ->namespace($this->namespace)
                ->group(function(){
                    Route::prefix('/')
                        ->namespace($this->namespace)
                        ->group(base_path('routes/cpanel/vendorRoutes.php'));
                    Route::middleware(['web','auth:storeVendor'])->group(function () {
                        Route::prefix('/layouts')
                            ->namespace($this->namespace)
                            ->group(base_path('routes/cpanel/vendor/layoutRoutes.php'));
                        Route::prefix('/categories')
                            ->namespace($this->namespace)
                            ->group(base_path('routes/cpanel/vendor/categoryRoutes.php'));
                        Route::prefix('/brands')
                            ->namespace($this->namespace)
                            ->group(base_path('routes/cpanel/vendor/brandRoutes.php'));         
                        Route::prefix('/properties')
                            ->namespace($this->namespace)
                            ->group(base_path('routes/cpanel/vendor/propertyRoutes.php')); 
                        Route::prefix('/products')
                            ->namespace($this->namespace)
                            ->group(base_path('routes/cpanel/vendor/productRoutes.php'));
                        Route::prefix('/sliders')
                            ->namespace($this->namespace)
                            ->group(base_path('routes/cpanel/vendor/sliderRoutes.php'));
                        Route::prefix('/configs')
                            ->namespace($this->namespace)
                            ->group(base_path('routes/cpanel/vendor/configRoutes.php'));
                        
                    });

                });
                



            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            // return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
