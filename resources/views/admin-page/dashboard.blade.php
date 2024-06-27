@extends('layouts.nofooter')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Admin Dashboard</h2>
        <div class="row justify-content-center">
            <div class="col-md-6 mb-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Manage Users</h5>
                        <p class="card-text">View, edit, and delete user accounts.</p>
                        <a href="{{ route('admin.users') }}" class="btn btn-primary">Go to User Management</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Manage Motorcycle Listings</h5>
                        <p class="card-text">Add, edit, or remove motorcycle listings from the marketplace.</p>
                        <a href="{{ route('admin.motorcycles.index') }}" class="btn btn-primary">Go to Motorcycle
                            Listings</a>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6 mb-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Manage User Requests (Pending)</h5>
                        <p class="card-text">Review and process pending user requests or inquiries.</p>
                        <a href="" class="btn btn-primary">Go to User Requests</a>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Orders</h5>
                        <p class="card-text">View, update, and manage customer orders.</p>
                        <a href="{{ route('admin.orders') }}" class="btn btn-primary">Go to Order Management</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Brands</h5>
                        <p class="card-text">Add, edit, or remove motorcycle brands.</p>
                        <a href="{{ route('admin.brands') }}" class="btn btn-primary">Go to Brand Management</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Products</h5>
                        <p class="card-text">Add, edit, or remove motorcycle product models.</p>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Go to Product Management</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Appointments</h5>
                        <p class="card-text">View and manage customer appointments for motorcycle viewings.</p>
                        <a href="{{ route('admin.appointments.index') }}" class="btn btn-primary">Go to Appointment
                            Management</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
