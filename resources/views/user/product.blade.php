@extends('user.parent'

@section('styles')
<link href="{{ asset('user/product.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- PRODUCT DETAILS -->
<section class="product-details">

    <div class="product-wrapper">

        <!-- IMAGE -->
        <div class="product-image">
            <img src={{ $product->img_url }} alt="Bike">
        </div>

        <!-- INFO -->
        <div class="product-info">
            <h1>{{ $product->name }}</h1>

            <div class="rating">
                ★★★★☆ <span>(124 reviews)</span>
            </div>

            <p class="price">${{ $product->price }}</p>

            <p class="description">
                {{ $product->description }}    
            </p>

            <!-- ACTIONS -->
            <div class="actions">
                <button class="btn cart">Add to Cart</button>
                <button class="btn favorite">♥</button>
                <button class="btn compare">⇄</button>
            </div>

            <!-- META -->
            <ul class="meta">
                <li><strong>Brand:</strong> {{ $product->brand->name }}</li>
                <li><strong>SKU:</strong> {{ $product->sku }}</li>
                <li><strong>Status:</strong> In Stock</li>
                <li><strong>Category:</strong> Mountain Bikes</li>
                <li><strong>Tags:</strong> {{ is_array($product->tags) ? implode(', ', $product->tags) : $product->tags }}</li>
            </ul>
        </div>

    </div>
</section>

<!-- RELATED PRODUCTS -->
<section class="products-section">
    <h2>Related Products</h2>

    <div class="products-grid">
    @foreach ($relatedProducts as $product)
    
        <div class="product-card">
            <img src={{ $product->img_url }} alt="Bike">
            <h3>{{ $product->name }}</h3>
            <p>${{ $product->price }}</p>
        </div>
        
    @endforeach

    </div>
</section>

<!-- RECENTLY VIEWED -->
<section class="products-section recent">
    <h2>Recently Viewed</h2>


    <div class="products-grid">
        <div class="product-card">
            @if($lastViewedProduct)
                <img src="{{ $lastViewedProduct->img_url }}" alt="">
            <h3>{{ $lastViewedProduct->name }}</h3>
            <p>${{ $lastViewedProduct->price }}</p>
            @endif
        </div>
    </div>
</section>


@endsection

