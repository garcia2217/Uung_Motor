@extends('layouts.template')

@section('content')
    <div class="pageheader__container" style="height: auto;">
        <div class="pageheader__wrapper">
            <div class="introduction">
                <div class="introduction__headline">
                    <h1 class="headline1 headline--pageMain active" data-active-switch=""
                        style="margin-top: -10px; translate: none; rotate: none; scale: none; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">
                        All Models.
                    </h1>
                    <div class="headline headline--pageSub active" data-active-switch=""
                        style="margin-top: 0px; translate: none; rotate: none; scale: none; opacity: 1; visibility: inherit; transform: translate(0px, 0px);">
                        Find your <span style="white-space: nowrap;">Uung Motorrad</span> bike.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg" style="background-color: #f8f9fa;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request('brand') == '' ? 'active' : '' }}" aria-current="page"
                            href="{{ route('product') }}">All</a>
                    </li>
                    @foreach ($brands as $brand)
                        <li class="nav-item">
                            <a class="nav-link {{ request('brand') == $brand->id ? 'active' : '' }}"
                                href="{{ route('product', ['brand' => $brand->id]) }}">{{ $brand->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <form class="d-flex" role="search" method="GET" action="{{ route('product') }}">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search"
                        value="{{ request('search') }}">
                    {{-- <select name="sort" class="form-select me-2">
                        <option value="">Sort by Price</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price Low to High
                        </option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price High to Low
                        </option>
                    </select> --}}
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="product-container mt-4">
        @if ($products->isEmpty())
            <div class="alert alert-info mt-3 mx-auto text-center" style="width: 80%;" role="alert">
                No products found.
            </div>
        @else
            @foreach ($products as $product)
                <div class="product-card">
                    <img src="{{ $product->image_path }}" alt="{{ $product->name }}">
                    <div class="product-info">
                        <div class="product-title">{{ $product->name }}</div>
                        <div class="product-description">{{ $product->brand->name }}</div>
                        <div class="product-price">Rp {{ number_format($product->price_min, 0, ',', '.') }} - Rp
                            {{ number_format($product->price_max, 0, ',', '.') }}</div>
                        <a href="{{ route('motorcycle', $product->id) }}"><button class="btn">See More</button></a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
