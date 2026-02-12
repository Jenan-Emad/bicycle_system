<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Discount;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProductsWithSpecificCategory(string $name){
        $products = Product::whereHas('category', function($q, $name){
            $q->where('name', '==', $name);
        })->with('category')->get();
    }

    public function showProductForUser(string $id){
        $product = Product::findOrFail($id);

        //also return the related products
        $relatedProducts = Product::where('category_id', $product->category_id)
                              ->where('id', '!=', $product->id)
                              ->take(4)
                              ->get();

        //finally return the last reviewed product
         $lastViewedProduct = null;
            if (session()->has('last_viewed_product')) {
                $lastId = session('last_viewed_product');
                if ($lastId != $product->id) {
                    $lastViewedProduct = Product::find($lastId);
                }
            }
            session(['last_viewed_product' => $product->id]);

        return view('user.product', compact('product', 'relatedProducts', 'lastViewedProduct'));
    }

    public function index() {
        //get the product category name, brand name, and discount percentage
        $products = Product::with('category', 'brand')->get();
        return view('admin.product.view', compact('products'));
    }

    public function create() {
        $categories = Category::all();
        $brands = Brand::all();
        $discounts = Discount::all(); // I want to repair it to make the admin choose from the active discounts only
        return view('admin.product.create', compact('categories', 'brands', 'discounts'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'sold_stock' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'sku' => 'required',
            'tags' => 'required',
            'name' => 'required'
        ]);

        $product = Product::create($validated);
        
        return redirect()->route('admin.viewProduct')
                ->with('success', 'Admin Product created successfully.');
    }

    public function edit(string $id) {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        $discounts = Discount::all();
        return view('admin.product.edit', compact('product', 'categories', 'brands', 'discounts'));
    }

    public function update(Request $request, string $id){
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'sold_stock' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'sku' => 'required',
            'tags' => 'required',
            'name' => 'required'
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);
        $product->save();
        return redirect()->route('admin.viewProducts')
                ->with('success', 'Admin Product updated successfully.');
        
    }

    public function destroy($id){
        $product = Brand::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.viewProducts')
                ->with('success', 'Admin Product deleted successfully.');
        
    }


}