@extends('layouts.nofooter')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 m-auto">
                <div class="card card-body">
                    <h1 class="text-center mb-3">
                        <i class="fas fa-user-plus"></i> Register
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
                    <form action="{{ url('auth/register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="mb-3" for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control mb-3"
                                placeholder="Enter Name" value="{{ old('name') }}" />
                        </div>
                        <div class="form-group">
                            <label class="mb-3" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control mb-3"
                                placeholder="Enter Email" value="{{ old('email') }}" />
                        </div>
                        <div class="form-group">
                            <label class="mb-3" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control mb-3"
                                placeholder="Create Password" />
                        </div>
                        <div class="form-group">
                            <label class="mb-3" for="password_confirmation">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control mb-4" placeholder="Confirm Password" />
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </form>
                    <p class="lead mt-4">Have An Account? <a href="{{ route('login') }}">Login</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
