@extends('layouts.nofooter')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Schedule an Appointment</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('appointment.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="appointment_date" class="form-label">Appointment Date</label>
                <input type="date" class="form-control" id="appointment_date" name="appointment_date"
                    min="{{ $minDate }}" max="{{ $maxDate }}" value="{{ old('appointment_date') }}" required>
            </div>

            <div class="mb-3">
                <label for="appointment_time" class="form-label">Appointment Time</label>
                <select class="form-select" id="appointment_time" name="appointment_time" required>
                    <option value="">Select Time</option>
                    @foreach ($timeSlots as $timeSlot)
                        <option value="{{ $timeSlot }}" {{ old('appointment_time') == $timeSlot ? 'selected' : '' }}>
                            {{ $timeSlot }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit Request</button>
        </form>

        <div class="mt-5">
            <h2>Your Appointments</h2>
            @if ($appointments->isEmpty())
                <p>You have no scheduled appointments.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $appointment->appointment_date }}</td>
                                <td>{{ $appointment->appointment_time }}</td>
                                <td>{{ ucfirst($appointment->status) }}</td>
                                <td>
                                    <form action="{{ route('appointment.delete', $appointment->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this appointment?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            {{ $appointment->status !== 'rejected' ? 'disabled' : '' }}>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
