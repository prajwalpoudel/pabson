<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('auth.passwords.change');

    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed|different:old_password'
        ]);

        $hashedPass = frontUser('password');
        if (Hash::check($request->old_password, $hashedPass)) {
            frontUser()->update(['password' => bcrypt($request->password)]);
            return redirect()->route('school.dashboard');
        } else {
            return redirect()->route('auth.password.index')
                ->with('incorrectOldPass', 'Current password is invalid');
        }
    }
}
