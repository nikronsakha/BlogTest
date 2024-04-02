<?php

namespace App\Http\Controllers\Main;

use App\Action\ContactMessagAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\ContactRequest;

class ContactController extends Controller
{
    public function contacts()
    {
        return view('main.contact');
    }

    public function contactsForm(ContactRequest $request, ContactMessagAction $action)
    {
        $data = $request->validated();
        return $action ->send($data);
    }

}
