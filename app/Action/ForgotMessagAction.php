<?php

namespace App\Action;

use App\Mail\ForgotForm;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ForgotMessagAction
{
    public function __invoke($data)
    {

        $user = User::where(['email'=> $data['email']])->first();

        $password = uniqid();

        $user->password =bcrypt($password);
        $user->save();

        Mail::to($user)->send( new ForgotForm($password));

        return  redirect(route('home'));
    }
}