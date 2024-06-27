@extends('layouts.nofooter')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">All Orders</h1>

        @if ($orders->isEmpty())
            <div class="alert alert-info mt-3" role="alert">
                No orders found.
            </div>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Motorcycle Name</th>
                        <th>Motorcycle ID</th>
                        <th>Ordered Time</th>
                        <th>Ordered By</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->motorcycle->name }}</td>
                            <td>{{ $order->motorcycle_id }}</td>
                            <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                            <td>{{ $order->user->email }}</td>
                            <td>${{ $order->price }}</td>
                            <td>
                                @if ($order->status == 'Pending')
                                    <form action="{{ route('admin.orders.ship', $order->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Ship</button>
                                    </form>
                                @else
                                    <button class="btn btn-secondary" disabled>Shipped</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
@endsection
