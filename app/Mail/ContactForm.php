<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    protected $formData;

    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this->subject('Контактная форма')
            ->view('emails.contact_form')
            ->with([
                'formData' => $this->formData,
            ]);
    }
}