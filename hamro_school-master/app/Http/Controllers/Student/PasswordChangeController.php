<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordChangeController extends Controller
{
    public function index()
    {
        return view('student.password.change');

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
            return redirect()->route('student.dashboard');
        } else {
            return redirect()->route('student.password.change')
                ->with('incorrectOldPass', 'Current password is invalid');
        }
    }
}
