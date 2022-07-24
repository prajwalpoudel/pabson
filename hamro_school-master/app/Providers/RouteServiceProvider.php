<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

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
     * This namespace is applied to admin controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $adminNameSpace = 'App\Http\Controllers\Admin';

    /**
     * This namespace is applied to school controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $schoolNameSpace = 'App\Http\Controllers\School';

    /**
     * This namespace is applied to teacher controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $teacherNameSpace = 'App\Http\Controllers\Teacher';

    /**
     * This namespace is applied to student controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $studentNameSpace = 'App\Http\Controllers\Student';
    /**
     * This namespace is applied to moderator controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $moderatorNameSpace = 'App\Http\Controllers\Moderator';

    /**
     * This namespace is applied to guest controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $guestNameSpace = 'App\Http\Controllers\Guest';
    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The path to the "admin" route for your application.
     *
     * @var string
     */
    public const ADMIN = '/admin/dashboard';

    /**
     * The path to the "school" route for your application.
     *
     * @var string
     */
    public const SCHOOL = '/school/dashboard';

    /**
     * The path to the "student" route for your application.
     *
     * @var string
     */
    public const STUDENT = '/student/dashboard';

    /**
     * The path to the "teacher" route for your application.
     *
     * @var string
     */
    public const TEACHER = '/teacher/dashboard';
    /**
     * The path to the "moderator" route for your application.
     *
     * @var string
     */
    public const MODERATOR = '/moderator/discussion/pending';

    /**
     * The path to the "guest" route for your application.
     *
     * @var string
     */
    public const GUEST = '/guest/dashboard';

    /**
     * The path to the "unverified" route for your application.
     *
     * @var string
     */
    public const UNVERIFIED = '/unverified';


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

        $this->mapAdminRoutes();

        $this->mapAdminAuthRoutes();

        $this->mapSchoolRoutes();

        $this->mapTeacherRoutes();

        $this->mapStudentRoutes();

        $this->mapModeratorRoutes();

        $this->mapGuestRoutes();

        $this->mapAuthRoutes();


        //
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
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::prefix('admin')
            ->name('admin.')
            ->middleware(['web', 'auth:admin'])
            ->namespace($this->adminNameSpace)
            ->group(base_path('routes/admin/admin.php'));
    }

    /**
     * Admin Auth Routes
     */
    protected function mapAdminAuthRoutes()
    {
        Route::prefix('admin')
            ->name('admin.auth.')
            ->middleware('web')
            ->namespace($this->adminNameSpace)
            ->group(function ($route) {
                require base_path('routes/admin/auth.php');
            });
    }

    /**
     * Define the "school" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapSchoolRoutes()
    {
        Route::prefix('school')
            ->name('school.')
            ->middleware(['web', 'auth:front', 'school', 'is_verified'])
            ->namespace($this->schoolNameSpace)
            ->group(base_path('routes/school/school.php'));
    }

    /**
     * Define the "teacher" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapTeacherRoutes()
    {
        Route::prefix('teacher')
            ->name('teacher.')
            ->middleware(['web', 'auth:front', 'teacher', 'is_verified'])
            ->namespace($this->teacherNameSpace)
            ->group(base_path('routes/teacher/teacher.php'));
    }


    /**
     * Define the "student" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapStudentRoutes()
    {
        Route::prefix('student')
            ->name('student.')
            ->middleware(['web', 'auth:front', 'student', 'is_verified'])
            ->namespace($this->studentNameSpace)
            ->group(base_path('routes/student/student.php'));
    }

    /**
     * Define the "moderator" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapModeratorRoutes()
    {
        Route::prefix('moderator')
            ->name('moderator.')
            ->middleware(['web', 'auth:front', 'moderator', 'is_verified'])
            ->namespace($this->moderatorNameSpace)
            ->group(base_path('routes/moderator/moderator.php'));
    }

    /**
     * Define the "teacher" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapGuestRoutes()
    {
        Route::prefix('guest')
            ->name('guest.')
//            ->middleware(['web', 'auth:front', 'teacher', 'is_verified'])
            ->namespace($this->guestNameSpace)
            ->group(base_path('routes/guest/guest.php'));
    }
    /**
     * Auth Routes
     */
    protected function mapAuthRoutes()
    {
        Route::name('auth.')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(function ($route) {
                require base_path('routes/auth.php');
            });
    }
}
