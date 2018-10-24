<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\ResetsPasswords;
//Auth Facade
use Illuminate\Support\Facades\Auth;

//Password Broker Facade
use Illuminate\Support\Facades\Password;
class ResetPasswordController extends Controller
{
    use ResetsPasswords;
    protected $redirectTo = '/';

    //Show form to seller where they can reset password
    public function showResetForm(Request $request, $token = null)
    {
        return view('passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function broker()
    {
        return Password::broker('users');
    }

    //returns authentication guard of seller
    protected function guard()
    {
        return Auth::guard('user');
    }
}
