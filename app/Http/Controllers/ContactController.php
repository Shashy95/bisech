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
        return view('emails.contact');
    }

    public function send(Request $request)
    {
        try {
            // Validation logic
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'subject' => 'required|string|max:255',
                'comments' => 'required|string',
            ]);

            // Prepare email data
            $data = $request->only(['name', 'email', 'subject', 'comments']);
            
            // Send email
            Mail::raw('Name: ' . $data['name'] . "\n" . 
                    'Email: ' . $data['email'] . "\n" . 
                    'Subject: ' . $data['subject'] . "\n" . 
                    'Message: ' . $data['comments'], 
                function ($message) use ($data) {
                    $message->to('your-email@gmail.com') // Replace with your email
                            ->subject($data['subject']);
                }
            );

            // Return raw HTML for success
            $successMessage = "
                <fieldset>
                    <div id='success_page'>
                        <h3>Email Sent Successfully.</h3>
                        <p>Thank you <strong>{$data['name']}</strong>, your message has been submitted to us.</p>
                    </div>
                </fieldset>
            ";

            return response()->json([
                'message' => $successMessage,
            ]);
            

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.',
            ], 500);
        }
    }
}