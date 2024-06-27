@extends('layouts.nofooter')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 m-auto">
                <div class="card card-body">
                    <h1 class="text-center mb-3">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </h1>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ url('auth/login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="mb-3" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control mb-3"
                                placeholder="Enter Email" />
                        </div>
                        <div class="form-group">
                            <label class="mb-3" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control mb-4"
                                placeholder="Enter Password" />
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <p class="lead mt-4">No Account? <a href="{{ route('register') }}">Register</a></p>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        document.getElementById('login-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            fetch('{{ url('auth/login') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify({
                        email: email,
                        password: password
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.token) {
                        // console.log(data.token)
                        localStorage.setItem('token', data.token);
                        window.location.href = '/profile';
                    } else {
                        // console.log("login failed")
                        alert('Login failed!');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script> --}}
@endsection
