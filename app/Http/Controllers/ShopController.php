<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        //get the categories
        $categories = $this->getCategories();

        //get products with the first category
        $products = $this->getProductsWithFirstCategory($categories[0]->id);

        return view('user.shop', compact('categories', 'products'));
    }

    public function getCategories() {
        return Category::all();
        
    }

    public function getProductsWithFirstCategory($id) {
        return Product::where('category_id', $id)->get();
    }

    public function getProductsWithSpecificCategory($id)
    {
        $categories = Category::all();

        if ($id) {
            $category = Category::findOrFail($id);
            $products = Product::where('category_id', $category->id)->get();
        } else {
            $products = Product::all();
        }

        return view('user.shop', compact('categories', 'products', 'category'));
    }

    //chat gpt code:
//     public function getProductsWithSpecificCategory($id)
// {
//     $categories = Category::all();
//     $category = null;
//     $products = collect();

//     if ($id) {
//         $products = Product::where('category_id', $id)->get();

//         if ($products->isNotEmpty()) {
//             $category = Category::find($id);
//         }
//     }

//     return view('user.shop', compact('categories', 'products', 'category'));
// }


}