<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        return view('user.contactUs');
    }

    public function send(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'department' => 'required|in:personal_dep,support_dep,business_dep',
            'message' => 'required',
        ]);

        // Here you can handle the form submission, e.g., send an email or save to the database
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'department' => $request->department,
            'status' => 'waiting'
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}