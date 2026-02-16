<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;

class BlogController extends Controller
{
    public function userIndex() {
        $blogs = Blog::with('user')->get();
        
        return view('user.blogs', compact('blogs'));
    }

    public function authorIndex(){
        $user = Auth::user();

        $blogs = Blog::where('user_id', $user->id)->get();

        return view('author.viewBlogs', compact('blogs'));
        
    }

    public function create() {
        return view('author.createBlog');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required'
        ]);

        $validated['user_id'] = Auth::user()->id;
        
        $blog = Blog::create($validated);

        return redirect()->route('author.viewBlogs')
                ->with('success', 'Author Blog created successfully.');
    }

    public function edit(string $id){
        $blog = Blog::findOrFail($id);
        return view('author.editBlog', compact('blog'));
    }

    public function update(Request $request, string $id){
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required'
        ]);

        $blog = Blog::findOrFail($id);
        $blog->update($validated);

        return redirect()->route('author.viewBlogs')
                ->with('success', 'Author Blog updated successfully.');
    }

    public function destroy(string $id) {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('author.viewBlogs')
                ->with('success', 'Author Blog deleted successfully.');
    }

    public function viewDashboard() {
        return view('author.parent');
    }
}