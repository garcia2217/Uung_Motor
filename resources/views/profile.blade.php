@extends('layouts.nofooter')

@section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    </head>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold mt-3" id="username">{{ $authUser->name }}</span>
                    <span class="text-black-50" id="email">{{ $authUser->email }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="mt-3">
                        @csrf
                        <button type="submit" class="btn btn-primary profile-button">Log Out</button>
                    </form>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter name"
                                    value="{{ $authUser->name }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Mobile Number</label>
                                <input type="text" name="phone_number" class="form-control"
                                    placeholder="Enter mobile number" value="{{ $user->phone_number }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Enter address"
                                    value="{{ $user->address }}">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email"
                                    value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">

                </div>
            </div>
        </div>
    </div>
@endsection
