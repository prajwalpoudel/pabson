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
        return view('auth.unverified.unverified');
    }
}
