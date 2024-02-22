<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotForm extends Mailable
{
    use Queueable, SerializesModels;

    protected $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this->subject('Востановление пароля')
            ->view('emails.forgot_form')
            ->with([
                'password' => $this->password,
            ]);
    }
}