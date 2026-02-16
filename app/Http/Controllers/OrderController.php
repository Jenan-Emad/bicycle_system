<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function addToCart(Request $request, $productId)
    {
        // 0. تأكد أن المستخدم مسجل دخول
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $user = Auth::user();

        // 1. المنتج
        $product = Product::findOrFail($productId);

        // 2. الحصول على الطلب المعلّق (Cart)
        $order = Order::where('user_id', $user->id)->first();

        if (!$order) {
            $order = Order::create([
                'user_id' => $user->id,
                'total_price' => 0,
            ]);
        }

        // 3. هل المنتج موجود في الطلب؟
        $orderProduct = $order->products()
            ->where('products.id', $productId)
            ->first();

        if ($orderProduct) {
            $newQuantity = $orderProduct->pivot->quantity + 1;

            $order->products()->updateExistingPivot($productId, [
                'quantity' => $newQuantity,
                'price' => $product->price * $newQuantity,
            ]);
        } else {
            $order->products()->attach($productId, [
                'quantity' => 1,
                'price' => $product->price,
            ]);
        }

        // 4. تحديث السعر الإجمالي للطلب (الصحيح)
        $order->total_price = $order->products()
            ->sum(DB::raw('orders_products.price'));

        $order->save();

        return response()->json([
            'message' => 'Product added to cart',
            'order_id' => $order->id,
            'total_price' => $order->total_price
        ]);
    }


    public function removeFromCart(Request $request)
    {
        // 0. تحقق من تسجيل الدخول
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $user = Auth::user();

        // 1. الطلب الحالي (الكرت)
        $order = Order::where('user_id', $user->id)->first();

        if (!$order) {
            return response()->json(['message' => 'Cart is empty'], 404);
        }

            $productId = $request->input('product_id');
        
            if (!$productId) {
                return response()->json(['message' => 'Product ID is required'], 400);
            }

        // 2. المنتج داخل الطلب
        $orderProduct = $order->products()
            ->where('products.id', $productId)
            ->first();

        if (!$orderProduct) {
            return response()->json(['message' => 'Product not found in cart'], 404);
        }

        $currentQuantity = $orderProduct->pivot->quantity;

        // 3. إنقاص الكمية أو الحذف
        if ($currentQuantity > 1) {
            $newQuantity = $currentQuantity - 1;

            $order->products()->updateExistingPivot($productId, [
                'quantity' => $newQuantity,
                'price' => $orderProduct->price * $newQuantity,
            ]);
        } else {
            $order->products()->detach($productId);
        }

        // 4. إعادة حساب السعر الإجمالي (الصحيح)
        $order->total_price = $order->products()
            ->sum(DB::raw('orders_products.price'));

        // 5. إن أصبح الكرت فارغًا
        if ($order->total_price == 0) {
            // اختياري: احذف الطلب أو اتركه
            $order->delete();
        } else {
            $order->save();
        }

        return response()->json([
            'message' => 'Product removed from cart',
            'order_id' => $order->id,
            'total_price' => $order->total_price
        ]);
    }


    public function viewCarts()
    {
        $user = Auth::user();

        // Get the user's cart with products
        $cart = Order::with('products')->firstOrCreate(['user_id' => $user->id],['total_price' => 0]);
        return view('user.cart', compact('cart'));
    }
}