<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index(){
        $categories = Category::all();
        return view('admin.category.view', compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        if(!$validated){
            //redirect to some page
        }

        $category = Category::create($validated);
        
        return redirect()->route('admin.viewCategories')
                ->with('success', 'Admin Category created successfully.');
    }

    public function edit(string $id) {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, string $id){
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        if(!$validated){
            //do some code
            
        }

        $category = Category::findOrFail($id);
        $category->update($validated);
        $category->save();
        return redirect()->route('admin.viewCategories')
                ->with('success', 'Admin Category updated successfully.');
        
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.viewCategories')
                ->with('success', 'Admin Category deleted successfully.');
        
    }  
}