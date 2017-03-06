<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{
    //
    //trait for handling reset Password
    use ResetsPasswords;

    //Show form to admin where they can reset password
    public function showResetForm(Request $request, $token = null)
    {
        return view('admin.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    //returns Password broker of seller
    public function broker()
    {
        return Password::broker('admins');
    }

    //returns authentication guard of seller
    protected function guard()
    {
        return Auth::guard('web_admin');
    }
}
