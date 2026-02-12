<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProSay;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //get best selling products
        $bestSellingProducts = $this->getBestSellingProducts();

        //get what pro people say
        $proPeopleSay = $this->getProPeopleSay();
        
        return view('user.home', compact('bestSellingProducts', 'proPeopleSay'));
    }

    public function goToShop()
    {
        return redirect()->route('user.shop');
    }

    public function getProPeopleSay()
    {
        //get pro people say
        return ProSay::limit(5)->get();
    }

    public function getBestSellingProducts()
    {
        //get best selling products
        return Product::withCount('orders')
            ->orderBy('orders_count', 'desc')
            ->take(5)
            ->get();
    }
    
    
}