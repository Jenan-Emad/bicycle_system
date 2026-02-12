<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function userIndex() {
        $blogs = Blog::with('user')->get();
        
        return view('user.blogs', compact('blogs'));
    }
}