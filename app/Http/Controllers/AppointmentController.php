<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Carbon\CarbonInterval;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('user_id', auth()->id())->get();

        return view("appointment", [
            'timeSlots' => $this->generateTimeSlots(),
            'minDate' => now()->format('Y-m-d'),
            'maxDate' => now()->addDays(7)->format('Y-m-d'),
            'appointments' => $appointments
        ]);
    }

    public function adminIndex()
    {
        $appointments = Appointment::with('user')->get();

        return view('admin-page.manage-appointment', compact('appointments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'appointment_date' => 'required|date|after_or_equal:today|before_or_equal:' . now()->addDays(7)->format('Y-m-d'),
            'appointment_time' => [
                'required',
                'date_format:H:i',
                Rule::in($this->generateTimeSlots($request->appointment_date))
            ],
        ]);

        $appointmentData = $request->all();
        $appointmentData['user_id'] = auth()->id();
        $appointmentData['status'] = 'pending';

        Appointment::create($appointmentData);

        return redirect()->route('appointment')->with('success', 'Appointment request submitted successfully!');
    }

    public function accept($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'accepted';
        $appointment->save();

        return redirect()->route('admin.appointments.index')->with('success', 'Appointment accepted successfully!');
    }

    public function reject($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'rejected';
        $appointment->save();

        return redirect()->route('admin.appointments.index')->with('success', 'Appointment rejected successfully!');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('admin.appointments.index')->with('success', 'Appointment deleted successfully!');
    }

    public function delete($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('appointment')->with('success', 'Appointment deleted successfully!');
    }

    protected function generateTimeSlots($date = null)
    {
        $date = $date ?? now()->format('Y-m-d');
        $startTime = Carbon::parse($date . ' 10:00');
        $endTime = Carbon::parse($date . ' 17:00'); // 5 PM
        $interval = CarbonInterval::hours(1); // 1-hour interval

        $timeSlots = [];
        foreach (CarbonPeriod::create($startTime, $interval, $endTime) as $time) {
            $timeSlots[] = $time->format('H:i');
        }
        return $timeSlots;
    }
}
