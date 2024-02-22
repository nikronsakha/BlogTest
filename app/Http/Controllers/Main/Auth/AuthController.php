<?php

namespace App\Http\Controllers\Main\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('main.auth.login');
    }
    public function showRegisterForm()
    {
        return view('main.auth.register');
    }

    public function login(LoginRequest $request)
    {
        $user = $request->validated();

        if(auth('web')->attempt($user)){
            return redirect(route('home'));
        };

        return redirect(route('login'))->withErrors(['email' =>'Пользователь не найден, либо данные не верны ']);

    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        if($user){
            auth('web')->login($user);
        }

        return redirect(route('home'));
    }

    public function logout()
    {
        auth('web')->logout();
        return redirect(route('home'));
    }



}
