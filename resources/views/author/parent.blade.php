@extends('parent')

@section('nav_bar') 

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-envelope"></i>
        <p>
            Blog
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('author.viewBlogs') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Index</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('author.createBlog')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>create</p>
            </a>
        </li>
    </ul>
</li>


@endsection

@section('content')
<h1>Author Dashboard</h1>

@endsection

