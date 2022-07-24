<?php

namespace App\Http\Controllers\Auth;

use App\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class FrontUserVerificationController extends Controller
{
    public function unverified() {
        $user = frontUser();
        if($user->is_verified) {
            switch ($user->role_id) {
                case RoleConstant::SCHOOL_ID :
                    return redirect(RouteServiceProvider::SCHOOL);
                    break;
                case RoleConstant::TEACHER_ID :
                    return redirect(RouteServiceProvider::TEACHER);
                    break;
                case RoleConstant::STUDENT_ID :
                    return redirect(RouteServiceProvider::STUDENT);
                    break;
                case RoleConstant::GUARDIAN_ID :
                    return redirect(RouteServiceProvider::PARENT);
                    break;
            }
        }
        return view('auth.unverified.unverified');
    }
}
