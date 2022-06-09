<?php

namespace App\Http\Controllers\Auth;

use App\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Services\Location\ProvinceService;
use App\Http\Services\UserService;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    private ProvinceService $provinceService;
    private UserService $userService;

    /**
     * RegisteredUserController constructor.
     * @param ProvinceService $provinceService
     * @param UserService $userService
     */
    public function __construct(
        ProvinceService $provinceService,
        UserService $userService
    )
    {
        $this->provinceService = $provinceService;
        $this->userService = $userService;
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $provinces = $this->provinceService->all()->pluck('name', 'id');

        return view('auth.register.school', compact('provinces'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request)
    {

        $userData = array_merge(
            $request->input('user'),
            ['password' => bcrypt($request->input('user.password'))]
        );
        DB::beginTransaction();
        $user = $this->userService->create($userData);
        $schoolData = [
                'name' => $request->input('name'),
                'principal_name' => $request->input('principal_name'),
                'principal_email' => $request->input('principal_email'),
                'phone' => $request->input('phone'),
                'province_id' => $request->input('province_id'),
                'district_id' => $request->input('district_id'),
                'municipality_id' => $request->input('municipality_id'),
                'ward_number' => $request->input('ward_number'),
                'website_link' => $request->input('website_link'),
        ];

        $user->school()->create($schoolData);
        DB::commit();

        event(new Registered($user));

        $this->guard()->login($user);

        return redirect(RouteServiceProvider::SCHOOL);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('front');
    }
}
