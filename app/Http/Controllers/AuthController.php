<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    // Get Register Page
    public function getRegister()
    {
        return view('auth.register');
    }

    // Post for Registering User
    public function postRegister(Request $request)
    {

        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'alpha_num'],
            'password_confirmation' => ['required', 'same:password']
        ]);

        $user = new Student();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('login');
    }

    // Get Login Page
    public function getLogin()
    {
        return view('auth.login');
    }

    // Post for Login to Web
    public function postLogin(Request $request)
    {

        $credential = $request->only('email', 'password');
        $remember_me = ($request->remember_me == "on");
        $remember_me_token_expire_time = 720;

        if (Auth::attempt($credential, $remember_me)) {
            if ($remember_me) {
                $remember_me_tokenName = Auth::getRecallerName();
                $cookieJar = Auth::guard()->getCookieJar();
                $cookieVal = $cookieJar->queued($remember_me_tokenName)->getValue();
                $cookieJar->queue($remember_me_tokenName, $cookieVal, $remember_me_token_expire_time);
            }
            return redirect()->route('home');
        } else {
            return redirect()->back()->withErrors(['error' => 'Authentication Error. Please check your e-mail and password again.']);
        }
    }

    // Post for Logging Out
    public function postLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
