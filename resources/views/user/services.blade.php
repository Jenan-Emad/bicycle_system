@extends('user.parent')

@section('styles')
<link href="{{ asset('user/services.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="services-page">

    <h1>Our Services</h1>
    <p class="subtitle">Professional services to keep your bike in perfect condition</p>

    <div class="services-grid">

        @foreach ($services as $service )
        <div class="service-card">
            <h2>{{ $service->name }}</h2>
            <p class="description">{{ $service->description }}</p>
            <p class="price">${{ $service->price }}</p>
            <a href="/services/order/maintenance" class="btn-order">Order</a>
        </div>

        @endforeach

    </div>

</section>

@endsection

