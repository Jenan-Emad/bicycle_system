<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::all();
        return view('admin.brand.view', compact('brands'));
    }

    public function create(){
        return view('admin.brand.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        if(!$validated){
            //redirect to some page
        }

        $brand = Brand::create($validated);
        
        return redirect()->route('admin.viewBrands')
                ->with('success', 'Admin Brand created successfully.');
    }

    public function edit(string $id) {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, string $id){
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        if(!$validated){
            //do some code
            
        }

        $brand = Brand::findOrFail($id);
        $brand->update($validated);
        $brand->save();
        return redirect()->route('admin.viewBrands')
                ->with('success', 'Admin Brand updated successfully.');
        
    }

    public function destroy($id){
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('admin.viewBrands')
                ->with('success', 'Admin Brand deleted successfully.');
        
    }
}