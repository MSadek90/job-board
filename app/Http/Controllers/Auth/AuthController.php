<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Signuprequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Mime\Email;

class AuthController extends Controller
{


    public function showsignupForm()
    {
        return view('Auth.signup', ['page_title' => 'signup']);
    }

    public function signup(SignupRequest $request)
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        auth::login($user);

        return redirect('/posts');
    }

    public function login(LoginRequest $request)
    {


        $credentials = $request->only('email', 'password');

        if (auth::attempt($credentials)) {
            return Redirect('/posts');
        }
        return back()->withErrors([
            'login' => 'invalid credentials'
        ])->withInput();
    }

    public function showloginForm()
    {
        return view('Auth.login', ['page_title' => 'login']);
    }


    public function logout()
    {
        Auth::logout();
        return view('Auth.login', ['page_title' => 'login']);
    }
}
