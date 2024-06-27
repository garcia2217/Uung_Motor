@extends('layouts.nofooter')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">All Brands</h1>

        <form action="{{ route('admin.brands.create') }}" method="POST" class="mb-3">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control" name="name" placeholder="Enter new brand name" required>
                <button class="btn btn-primary" type="submit">Add Brand</button>
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </form>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($brands->isEmpty())
            <div class="alert alert-info mt-3" role="alert">
                No brands found.
            </div>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Brand Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>
                                <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger fw-bold"
                                        onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
