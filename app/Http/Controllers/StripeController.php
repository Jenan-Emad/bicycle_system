<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\StripeClient;
use App\Models\Product;

class StripeController extends Controller
{

    public $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(
            config('stripe.api_key.secret')
        );
    }


    public function payProduct(string $id)
    {
        $product = Product::findOrFail($id);
        $session = $this->stripe->checkout->sessions->create([
            'mode' => 'payment',

            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product->name,
                    ],
                    'unit_amount' => $product->price * 100,
                ],
                'quantity' => 1,
            ]],

            'success_url' => 'https://example.com/success',
            // 'cancel_url'  => route('stripe.cancel'),

            'metadata' => [
                'order_id' => $product->id,
                'user_id' => Auth::user()->id,
            ],
        ]);

        return redirect()->away($session->url);
    }
}