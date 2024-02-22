<?php

namespace App\Action;

use App\Mail\ContactForm;
use App\Mail\ForgotForm;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class TelegramMessagAction
{
    public function send($data)
    {
        Mail::to('borisovnikita15@yandex.com')->send( new ContactForm($data) );
        return redirect(route('contacts'));

    }
}