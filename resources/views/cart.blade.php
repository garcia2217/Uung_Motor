@extends('layouts.nofooter')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Your Cart</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (!$items||$items->isEmpty())
            <div class="alert alert-info mt-3" role="alert">
                Your shopping cart is empty.
            </div>
        @else
            @foreach ($items as $item)
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $item->motorcycle->image_path }}" class="img-fluid rounded-start"
                                alt="{{ $item->motorcycle->name }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Brand Name:
                                    {{ $item->motorcycle->product->brand->name ?? 'Brand XYZ' }}
                                </h5>
                                <p class="card-text">Product Name: {{ $item->motorcycle->name ?? 'Motorcycle ABC' }}</p>
                                <p class="card-text"><strong>Price:</strong> ${{ $item->motorcycle->price ?? '1000' }}</p>
                                <div class="d-flex">
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="me-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger fw-bold">Remove</button>
                                    </form>

                                    <a href="{{ route('payment', $item->motorcycle_id) }}"><button type="submit"
                                            class="btn btn-primary fw-bold">Checkout</button></a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
