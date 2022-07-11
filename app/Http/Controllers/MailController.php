<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:2', 'max:256'],
            'email' => ['required', 'email', 'min:2', 'max:256'],
            'subject' => ['required', 'min:2', 'max:256'],
            'message' => ['required', 'min:3'],
        ]);
        Mail::send('emails.contact', array(
            'body' => $validated['message'],
            'footer' => 'JE KAN NIET REAGEREN OP DEZE EMAIL!!! Deze mail is verstuurd door ' . $validated['name'] . ' met het email adres ' . $validated['email'] . ' via' . ' www.debreimeisjes.nl.'
        ), function($message) use($validated) {
            $message->from($validated['email'], $validated['name']);
            $message->to('debreimeisjes@gmail.com', 'Akkelien')->subject($validated['subject']);
        });
        session()->flash('success', 'Uw mail is verstuurd!');
        return back();
    }
}
