<?php

namespace App\Http\Controllers;

use App\Models\ContactLead;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:30',
            'subject' => 'required|string|max:150',
            'message' => 'required|string|max:5000',
        ]);

        ContactLead::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'phone'   => $validated['phone'] ?? null,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'status'  => 'new',
        ]);

        return redirect()
            ->route('contact')
            ->with(
                'success',
                'Thank you! Your enquiry has been submitted successfully.'
            );
    }
}