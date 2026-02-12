<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        $quantity = $request->quantity ?? 1;

        $user = Auth::user();

        // attach or increment
        if ($user->cartProducts()->where('product_id', $request->product_id)->exists()) {
            $user->cartProducts()->updateExistingPivot($request->product_id, [
                'quantity' => DB::raw('quantity + ' . $quantity)
            ]);
        } else {
            $user->cartProducts()->attach($request->product_id, ['quantity' => $quantity]);
        }

        return response()->json(['success' => true]);
    }

    public function toggleFavorite(Request $request)
    {
        $productId = $request->product_id;
        $user = Auth::user();

        if ($user->favoriteProducts()->where('product_id', $productId)->exists()) {
            $user->favoriteProducts()->detach($productId);
            $status = 'removed';
        } else {
            $user->favoriteProducts()->attach($productId);
            $status = 'added';
        }

        return response()->json(['success' => true, 'status' => $status]);
    }




}