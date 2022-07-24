<?php

namespace App\Http\Middleware;

use App\Constants\RoleConstant;
use Closure;

class CheckifTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(frontUser('role_id') == RoleConstant::TEACHER_ID) {
            return $next($request);
        }

        return redirect()->back();
    }
}
