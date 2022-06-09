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
    public const HOME = '/dashboard';

    public const SCHOOL = 'school/dashboard';

    protected $nameSpace = 'App\Http\Controllers';

    protected $adminNameSpace = 'App\Http\Controllers\Admin';

    protected $schoolNameSpace = 'App\Http\Controllers\School';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->nameSpace)
                ->group(base_path('routes/web.php'));

            Route::prefix('admin')
                ->name('admin.')
                ->middleware(['web', 'auth:admin'])
                ->namespace($this->adminNameSpace)
                ->group(base_path('routes/admin/admin.php'));

            Route::prefix('school')
                ->name('school.')
                ->middleware(['web', 'auth:front', 'school', 'is_verified'])
                ->namespace($this->schoolNameSpace)
                ->group(base_path('routes/school/school.php'));

//            Route::name('auth.')
//                ->middleware('web')
//                ->namespace($this->namespace)
//                ->group(function ($route) {
//                    require base_path('routes/auth.php');
//                });
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
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
