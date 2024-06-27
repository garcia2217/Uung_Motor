@extends('layouts.nofooter')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">All Products</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#newProductForm"
            aria-expanded="false" aria-controls="newProductForm">
            Add New Product
        </button>

        <div class="collapse mb-4" id="newProductForm">
            <div class="card card-body">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="brand_id" class="form-label">Brand</label>
                        <select class="form-select" id="brand_id" name="brand_id" required>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image_path" class="form-label">Image</label>
                        <input type="text" class="form-control" id="image_path" name="image_path">
                        @error('image_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create Product</button>
                </form>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Brand</th>
                    <th>Name</th>
                    <th>Motor Available</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->brand->name }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->motorcycles->count() }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning" type="button" data-bs-toggle="collapse"
                                data-bs-target="#editProductForm-{{ $product->id }}" aria-expanded="false"
                                aria-controls="editProductForm-{{ $product->id }}">Edit</button>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <tr class="collapse" id="editProductForm-{{ $product->id }}">
                        <td colspan="5">
                            <div class="card card-body">
                                <form action="{{ route('admin.products.update', $product) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="name-{{ $product->id }}" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name-{{ $product->id }}"
                                            name="name" value="{{ $product->name }}" required>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="brand_id-{{ $product->id }}" class="form-label">Brand</label>
                                        <select class="form-select" id="brand_id-{{ $product->id }}" name="brand_id"
                                            required>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="image_path-{{ $product->id }}" class="form-label">Image</label>
                                        <input type="text" class="form-control" id="image_path-{{ $product->id }}"
                                            name="image_path" value="{{ $product->image_path }}">
                                        @error('image_path')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Product</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
