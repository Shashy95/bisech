<?php

namespace App\Http\Controllers;

use App\Mail\Contactus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;  

class ContactController extends Controller
{
    public function show()
    {
        return redirect()->route('contact');
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'comments' => 'required|string|max:10000',
        ]);

        try {
            Mail::raw(
                'Name: ' . $data['name'] . "\n" .
                'Email: ' . $data['email'] . "\n" .
                'Subject: ' . $data['subject'] . "\n" .
                'Message: ' . $data['comments'],
                function ($message) use ($data) {
                    $message->to(config('site.inbox_email') ?: config('mail.from.address'))
                        ->replyTo($data['email'], $data['name'])
                        ->subject($data['subject']);
                }
            );

            return redirect()->route('contact')->with('success', 'Thank you. Your enquiry has been sent. We will get back to you as soon as possible.');
        } catch (\Throwable $e) {
            Log::error('Bisech contact form failed: ' . $e->getMessage());

            return back()->withInput()->withErrors(['contact' => 'We could not send your message right now. Please try again or contact us through WhatsApp.']);
        }
    }
}
