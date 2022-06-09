<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('admin.auth.passwords.change');

    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed|different:old_password'
        ]);

        $hashedPass = adminUser()->password;
        if (Hash::check($request->old_password, $hashedPass)) {
            adminUser()->update(['password' => bcrypt($request->password)]);
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.auth.password.index')
                ->with('incorrectOldPass', 'Current password is invalid');
        }
    }
}
