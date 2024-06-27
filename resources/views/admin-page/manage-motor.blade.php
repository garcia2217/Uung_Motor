@extends('layouts.nofooter')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h2 class="mb-4">All Motorcycles</h2>
                <a href="{{ route('admin.motorcycles.create') }}" class="btn btn-primary mb-3">Add New Motorcycle</a>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Condition</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($motorcycles as $motorcycle)
                            <tr>
                                <td>{{ $motorcycle->name }}</td>
                                <td>{{ $motorcycle->price }}</td>
                                <td>
                                    <button class="btn btn-sm btn-info fw-bold" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseExample{{ $motorcycle->id }}" aria-expanded="false"
                                        aria-controls="collapseExample">
                                        Toggle Condition
                                    </button>
                                    <div class="collapse mt-2" id="collapseExample{{ $motorcycle->id }}">
                                        {{ $motorcycle->condition }}
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.motorcycles.edit', $motorcycle) }}"
                                        class="btn btn-sm btn-primary fw-bold">Edit</a>
                                    <form action="{{ route('admin.motorcycles.destroy', $motorcycle) }}" method="POST"
                                        class="d-inline">
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
            </div>
        </div>
    </div>
@endsection
