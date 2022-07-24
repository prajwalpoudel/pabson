<?php

namespace App\Http\Controllers\Auth;

use App\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Services\UserService;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::SCHOOL;
    /**
     * @var UserService
     */
    private $userService;

    /**
     * Create a new controller instance.
     *
     * @param UserService $userService
     */
    public function __construct(
        UserService $userService
    )
    {
        $this->middleware('guest:front')->except('logout');
        $this->userService = $userService;
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        if ($this->guard()->attempt($this->credentials($request), $request->filled('remember'))) {
            RedirectIfAuthenticated::class;
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->route('auth.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('front');
    }

    /**
     * Login with username or email
     *
     * @return string
     */
    public function username()
    {
        $loginType = request()->input('username');
        $fieldType = filter_var($loginType, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldType => $loginType]);

        return $fieldType;
    }
}
