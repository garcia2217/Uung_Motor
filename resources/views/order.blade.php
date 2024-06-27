@extends('layouts.nofooter')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">My Orders</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($orders->isEmpty())
            <div class="alert alert-info mt-3" role="alert">
                You haven't placed any orders yet.
            </div>
        @else
            @foreach ($orders as $order)
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-3">
                            <img src="{{ $order->motorcycle->image_path }}" class="img-fluid rounded-start"
                                alt="{{ $order->motorcycle->name }}">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">Product Name:
                                    {{ $order->motorcycle->name }}
                                </h5>
                                <p class="card-text"><strong>Price:</strong> ${{ $order->price }}</p>
                                <p class="card-text"><strong>Order Time:</strong>
                                    {{ $order->created_at->format('Y-m-d H:i:s') }}</p>
                                <p class="card-text"><strong>Status:</strong> {{ $order->status }}</p>
                                <div class="mb-3">
                                    @if ($order->status === 'Shipped')
                                        <form action="{{ route('orders.finish', $order) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Finish</button>
                                        </form>
                                    @else
                                        <button class="btn btn-success" disabled>Finish</button>
                                    @endif

                                    @if ($order->status === 'Finished')
                                        <form action="{{ route('orders.destroy', $order) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                                        </form>
                                    @else
                                        <button class="btn btn-danger" disabled>Delete</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
@endsection
