<?php

namespace App\Http\Middleware;

use App\Constants\RoleConstant;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if($guard == 'admin')
            {
                return redirect(RouteServiceProvider::ADMIN);
            }
            elseif ($guard == 'front') {
                if(frontUser('role_id') == RoleConstant::SCHOOL_ID) {
                    return redirect(RouteServiceProvider::SCHOOL);
                }
                elseif(frontUser('role_id') == RoleConstant::PRINCIPAL_ID) {
                    return redirect(RouteServiceProvider::SCHOOL);
                }
                elseif(frontUser('role_id') == RoleConstant::TEACHER_ID) {
                    return redirect(RouteServiceProvider::TEACHER);
                }
                elseif(frontUser('role_id') == RoleConstant::STUDENT_ID) {
                    return redirect(RouteServiceProvider::STUDENT);
                }
                elseif(frontUser('role_id') == RoleConstant::MODERATOR_ID) {
                    return redirect(RouteServiceProvider::MODERATOR);
                }
            }
        }
        return $next($request);
    }
}
