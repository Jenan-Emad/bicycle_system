@extends('parent')

@section('nav_bar') 

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-envelope"></i>
        <p>
            Brand
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.viewBrands') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Index</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.createBrand') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>create</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-envelope"></i>
        <p>
            Category
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.viewCategories') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Index</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.createCategory') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>create</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-envelope"></i>
        <p>
            Discount
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.viewDiscounts') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Index</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.createDiscount') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>create</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-envelope"></i>
        <p>
            FAQ
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.viewFAQs') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Index</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.createFAQ') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>create</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-envelope"></i>
        <p>
            Product
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('admin.viewProducts')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Index</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.createProduct')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>create</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-envelope"></i>
        <p>
            Service
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.viewServices') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Index</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.createService')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>create</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-envelope"></i>
        <p>
            User
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{route('admin.viewUsers')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Index</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.createUser')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>create</p>
            </a>
        </li>
    </ul>
</li>

@endsection

