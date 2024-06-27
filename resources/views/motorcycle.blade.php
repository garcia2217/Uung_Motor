<!-- resources/views/motorcycles.blade.php -->
@extends('layouts.template')

@section('content')
    <div class="pageheader__container" style="height: auto;">
        <div class="pageheader__wrapper">
            <div class="introduction">
                <div class="custom-headline">
                    <h1 class="custom-headline__main">
                        Available Motorcycles
                    </h1>
                    <div class="custom-headline__sub">
                        Choose your perfect ride from our wide selection of motorcycles.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="motorcycle-container">
        @if ($motorcycles->isEmpty())
            <div class="alert alert-info mt-3" role="alert">
                <p>No motorcycles available at the moment. Please check back later.</p>
            </div>
        @else
            @foreach ($motorcycles as $motorcycle)
                <div class="motorcycle-card">
                    <a href="{{ $motorcycle->link }}" target="_blank">
                        @if(filter_var($motorcycle->image_path, FILTER_VALIDATE_URL))
                            <img src="{{ $motorcycle->image_path }}" alt="{{ $motorcycle->name }}" class="motorcycle-image">
                        @else
                            <img src="{{ asset($motorcycle->image_path) }}" alt="{{ $motorcycle->name }}" class="motorcycle-image">
                        @endif
                    </a>
                    <div class="motorcycle-info">
                        <div class="motorcycle-title">{{ $motorcycle->name }}</div>
                        <div class="motorcycle-price">Rp {{ number_format($motorcycle->price, 0, ',', '.') }}</div>
                        <div class="motorcycle-condition">{{ $motorcycle->condition }}</div>
                        <form action="{{ route('cart.add', $motorcycle->id) }}" method="POST">
                            @csrf
                            <button class="btn" type="submit">Add to
                                Cart</button>
                        </form>
                        <a href="{{ $motorcycle->link }}" target="_blank" style="font-size: 14px">
                            Click here for more picture.
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
