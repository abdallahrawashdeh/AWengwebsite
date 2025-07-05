<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validate incoming form data
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        // Prepare data
        $data = [
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'content' => $validated['message'],
        ];

        // Send to Mailtrap (for testing)
        Mail::send('emails.contact', $data, function ($m) use ($validated) {
            $m->to(env('MAIL_FROM_ADDRESS')) // This goes to Mailtrap
              ->subject('New Contact Form Message from ' . $validated['name']);
        });

        // Send to your actual Gmail
        Mail::send('emails.contact', $data, function ($m) use ($validated) {
            $m->to('abdallahrawashdeh123@gmail.com')
              ->subject('New Contact Form Message from ' . $validated['name']);
        });

        return back()->with('success', 'Your message has been sent!');
    }
}
