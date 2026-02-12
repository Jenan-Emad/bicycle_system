@extends('user.parent')

@section('styles')
<link href="{{ asset('user/blog.css') }}" rel="stylesheet">
@endsection

@section('content')

<!-- BLOG PAGE -->
<section class="blog-page">

    <h1>Our Blog</h1>
    <p class="subtitle">Latest news, tips, and cycling insights</p>

    <!-- BLOG LIST -->
    <div class="blog-grid">

        <!-- BLOG CARD -->
        @foreach ($blogs as $blog)
            <article class="blog-card">
            <h2>{{ $blog->title }}</h2>

            <div class="blog-meta">
                <span>{{ $blog->user->name }}</span>
                <span>•</span>
                <span>{{ $blog->category }}</span>
            </div>

            <p class="blog-desc">
                {{ $blog->description }}
                </p>

            <a href="/blog/1" class="read-more">Read More →</a>
        </article>
        @endforeach

    </div>

</section>

@endsection

