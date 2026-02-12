<?php

namespace App\Http\Controllers;

use App\Models\FAQuestion;
use Illuminate\Http\Request;

class FAQuestionController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'question' => 'required|string',
            'department' => 'nullable|in:personal_dep,business_dep,support_dep',
        ]);
        
        $validatedData['is_answered'] = false;

        FAQuestion::create($validatedData);

        return redirect()->back()->with('success', 'Your question has been submitted successfully!');
    }

    
}