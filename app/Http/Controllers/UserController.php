<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin.user.view', compact('users'));
    }

    public function create() {
        return view('admin.user.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        User::create($validated);
        return redirect()->route('admin.viewUsers')
                ->with('success', 'Admin User created successfully.');
        
    }

    public function edit(string $id){
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
        
    }

    public function update(Request $request , string $id) {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->route('admin.viewUsers')
                ->with('success', 'Admin User updated successfully.');
    }

    public function destroy(string $id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.viewUsers')
                ->with('success', 'Admin User deleted successfully.');
        
    }
}