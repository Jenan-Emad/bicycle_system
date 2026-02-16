{{-- @extends('user.parent')

@section('styles')
<link href="{{asset('user.cart')}}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <h1 class="mb-4">Shopping Cart</h1>

    @if($cart->products->isEmpty())
    <p>Your cart is empty.</p>
    @else
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th width="120">Quantity</th>
                <th>Total</th>
                <th width="80">Remove</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp

            @foreach($cart->products as $product)
            @php
            $total = $product->price * $product->pivot->quantity;
            $grandTotal += $total;
            @endphp

            <tr>
                <td>
                    <img src="{{ $product->image }}" width="60" class="me-2">
                    {{ $product->name }}
                </td>

                <td>${{ number_format($product->price, 2) }}</td>

                <td>
                    <form method="POST" action="{{ route('user.addToCart', $product->id) }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="number" name="quantity" value="{{ $product->pivot->quantity }}" min="1"
                            class="form-control" onchange="this.form.submit()">
                    </form>
                </td>

                <td>${{ number_format($total, 2) }}</td>

                <td>
                    <form method="POST" action="{{ route('user.removeFromCart', $product->id) }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="btn btn-danger btn-sm">✕</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-end">
        <h4>Grand Total: ${{ number_format($grandTotal, 2) }}</h4>
        <a href="" class="btn btn-primary mt-2">
            Proceed to Checkout
        </a>
    </div>
    @endif
</div>

@endsection --}}
@extends('user.parent')

@section('styles')
<link href="{{ asset('user/cart.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <h1 class="mb-4">Shopping Cart</h1>

    @if(!$cart || $cart->products->isEmpty())
    <p>Your cart is empty.</p>
    @else
    @php $grandTotal = 0; @endphp

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th width="120">Quantity</th>
                <th>Total</th>
                <th width="80">Remove</th>
            </tr>
        </thead>

        <tbody>
            @foreach($cart->products as $product)
            @php
            $itemTotal = $product->price * $product->pivot->quantity;
            $grandTotal += $itemTotal;
            @endphp

            <tr>
                <td>
                    <img src="{{ asset($product->image) }}" width="60" class="me-2">
                    {{ $product->name }}
                </td>

                <td>${{ number_format($product->price, 2) }}</td>

                <td>
                    <form method="POST" action="">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <input type="number" name="quantity" value="{{ $product->pivot->quantity }}" min="1"
                            class="form-control" onchange="this.form.submit()">
                    </form>
                </td>

                <td>${{ number_format($itemTotal, 2) }}</td>

                <td>
                    <form method="POST" action="{{ route('user.removeFromCart') }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="btn btn-danger btn-sm">✕</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-end">
        <h4>Grand Total: ${{ number_format($grandTotal, 2) }}</h4>

        <form action="{{route('product.pay', $cart)}}" method="POST">
            @csrf
            <button type="submit">Proceed to Checkout</button>

        </form>

        {{--  <a href="{{route('product.pay')}}" class="btn btn-primary mt-2">
            Proceed to Checkout
        </a>  --}}
    </div>
    @endif
</div>
@endsection
