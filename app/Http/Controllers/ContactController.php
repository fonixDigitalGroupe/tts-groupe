<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'service' => 'required|string',
            'message' => 'required|string',
        ]);

        try {
            Mail::to('contact@tts-groupe.com')->send(new ContactMail($validated));
            
            return back()->with('success', 'Votre message a été envoyé avec succès !');
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer plus tard.')->withInput();
        }
    }
}
