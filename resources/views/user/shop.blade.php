@extends('user.parent')

@section('styles')
<link href="{{ asset('user/shop.css') }}" rel="stylesheet">
@endsection

@section('content')

    <!-- TOP BAR -->
    <header class="shop-header">
        <h1>Shop Bikes</h1>

        <!-- CATEGORIES DROPDOWN -->
        <div class="dropdown">
            <button class="dropbtn">Categories ▾</button>
            <div class="dropdown-content">
                @foreach ($categories as $category)
                <a href="{{ route('category.products', $category->id) }}">
                    {{ $category->name }}
                </a>
                    
                @endforeach
            </div>
        </div>

    </header>

    <!-- PRODUCTS GRID -->
    <section class="products-section">

        <div class="products-grid">

            <!-- PRODUCT CARD -->
            @foreach ($products as $product)
            <div class="product-card">
                <a href="{{ route('user.product', $product->id) }}">
                <img src={{ $product->img_url }} alt="Bike">
                </a>
                <div class="product-info">
                    <h3>{{ $product->name }}</h3>
                    <p>Category: {{ $category->name }}</p>
                    <p class="price">${{ $product->price }}</p>
                    <p class="description">
                        {{ $product->description }}
                    </p>
                </div>

                <div class="product-actions">
                    <form method="POST" action="{{ route('user.addToCart', $product->id) }}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="btn cart">Add to Cart</button>

                    </form>
                    <button class="btn favorite">♥</button>
                    <button class="btn compare">⇄</button>
                </div>

            </div>
                
            @endforeach

        </div>  

    </section>

@endsection

