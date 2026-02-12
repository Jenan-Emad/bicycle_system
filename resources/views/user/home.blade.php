@extends('user.parent')

@section('content')

<!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-content">
            <h1>Ride Your Way</h1>
            <p>Discover high-quality bikes for every journey</p>
            <a href="{{ route('user.shop') }}" class="btn-primary">Shop Now</a>
        </div>
    </section>

    <!-- BEST SELLERS -->
    <section class="best-sellers">
        <h2>Best Sellers</h2>
        <div class="products">
        @foreach($bestSellingProducts as $product)
            <div class="product-card">
                <img src={{ $product->img_url }} alt="Bike">
                <h3>{{ $product->name }}</h3>
                <p>${{ $product->price }}</p>
            </div>
        @endforeach
        </div>
    </section>

    <!-- CATEGORIES -->
    <section class="categories">
        <div class="category electric">
            <h3>Electric Bikes</h3>
            <a href="/category/electric">Explore</a>
        </div>

        <div class="category children">
            <h3>Children Bikes</h3>
            <a href="/category/children">Explore</a>
        </div>
    </section>

        <!-- PRO SAYS -->
    <section class="pro-says">
        <h2>What Pros Say</h2>

        <div class="pro-says-container">
            @foreach($proPeopleSay as $say)
                <div class="pro-say-card">
                    <p class="message">“{{ $say->content }}”</p>
                    <div class="pro-info">
                        <strong>{{ $say->name }}</strong>
                        <span>{{ $say->title }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>


@endsection

