@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 m-auto">
                <div class="card card-body">
                    <h1 class="text-center mb-3">
                        <i class="fas fa-user-plus"></i> Edit Account
                    </h1>
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="mb-3" for="name">Name</label>
                            <input type="name" id="name" name="name" class="form-control mb-3"
                                placeholder="Enter Name" value="{{ $user->name }}" />
                        </div>
                        <div class="form-group">
                            <label class="mb-3" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control mb-3"
                                placeholder="Enter Email" value="{{ $user->email }}" />
                        </div>
                        <div class="form-group">
                            <label class="mb-3" for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control mb-3"
                                placeholder="Enter Address" value="{{ $user->address }}" />
                        </div>
                        <div class="form-group">
                            <label class="mb-3" for="phone_number">Phone Number</label>
                            <input type="text" id="phone_number" name="phone_number" class="form-control mb-3"
                                placeholder="Enter Phone Number" value="{{ $user->phone_number }}" />
                        </div>
                        <div class="form-group">
                            <label class="mb-3" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control mb-3"
                                placeholder="New Password" />
                        </div>
                        <div class="form-group">
                            <label class="mb-3" for="password2">Confirm Password</label>
                            <input type="password" id="password2" name="password_confirmation" class="form-control mb-4"
                                placeholder="Confirm New Password" />
                        </div>

                        <button type="submit" class="btn btn-primary fw-bold">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
