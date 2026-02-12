<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function mostFrequentlyAsked() {
        $faqs = FAQ::orderBy('count', 'desc')->limit(10)->get();
        return view('user.faqs', compact('faqs'));
    }

    public function storeUserQuestion (Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'department' => 'required|in:personal_dep,support_dep,business_dep',
            'message' => 'required',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'message' => $request->message,
            'status' => 'waiting'
        ]);

        return redirect()->back()->with('success', 'FAQ added successfully!');
    }

    public function index() {
        $faqs = FAQ::all();
        return view('admin.faq.view', compact('faqs'));
    }

    public function create() {
        return view('admin.faq.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'category' => 'required',
            'count' => 'required'
        ]);

        FAQ::create($validated);
        return redirect()->back()->with('success', 'Your data has been created successfully!');
        
    }
    
    public function edit(string $id) {
        $faq = FAQ::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, string $id){
        $validated = $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'department' => 'required',
            'count' => 'required'
        ]);
        
        $faq = FAQ::findOrFail($id);
        $faq->update($validated);
        return redirect()->back()->with('success', 'Your data has been updated successfully!');
    }

    public function destroy(string $id) {
         $faq = FAQ::findOrFail($id);
         $faq->delete();
         return redirect()->back()->with('success', 'Your data has been deleted successfully!');
    }
    
}