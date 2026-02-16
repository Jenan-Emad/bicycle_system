<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicycle Market</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="{{ asset('user/style.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <!-- NAVIGATION BAR -->
    <nav class="navbar">
        <div class="container">
            <a href="/" class="logo">Bicycle Market</a>
            <ul class="nav-links">
                <li><a href="{{ route('user.home') }}">Home</a></li>
                <li><a href="{{ route('user.contact') }}">Contact</a></li>
                <li><a href="{{ route('user.services') }}">Services</a></li>
                <li><a href="{{ route('user.shop') }}">Shop</a></li>
                <li><a href="{{ route('user.blogs') }}">Blogs</a></li>
                <li><a href="{{ route('user.faq') }}">FAQs</a></li>
                    @auth
                        <li><a href="{{ route('user.cart') }}">Cart</a></li>
                        <li>
                            <form method = "POST" action = "{{route('logout')}}">
                                @csrf
                                <button type = "submit">Logout</button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
            </ul>
        </div>
    </nav>

    @yield('content')

    <!-- FOOTER -->
    <footer>
        <p>© 2026 Bicycle Market. All rights reserved.</p>
    </footer>