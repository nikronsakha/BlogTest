<?php

namespace App\Http\Controllers\Main\Auth;

use App\Action\ForgotMessagAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotRequest;

class ForgotController extends Controller
{
    public function showForgotForm()
    {
        return view('main.auth.forgot');
    }


    public function Forgot(ForgotRequest $request, ForgotMessagAction $action)
    {
        $data = $request->validated();

        return $action($data);
    }

}
