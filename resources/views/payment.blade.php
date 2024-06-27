@extends('layouts.nofooter')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}" />
    <div class="container p-0">
        <div class="card px-4">
            <p class="h8 py-3">Payment Details</p>
            <div class="row gx-3">
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Person Name</p>
                        <input class="form-control mb-3" type="text" placeholder="Name">
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Card Number</p>
                        <input class="form-control mb-3" type="text" placeholder="1234 5678 435678">
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Expiry</p>
                        <input class="form-control mb-3" type="text" placeholder="MM/YYYY">
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">CVV/CVC</p>
                        <input class="form-control mb-3 pt-2 " type="password" placeholder="***">
                    </div>
                </div>
                <div class="col-12">
                    <form action="{{ route('checkout', $item->motorcycle_id) }}" method="POST" class="mb-3">
                        @csrf
                        <button class="btn btn-primary" type="submit"><span class="ps-3">Pay Rp. {{ $item->motorcycle->price }}</span>
                            <span class="fas fa-arrow-right"></span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
