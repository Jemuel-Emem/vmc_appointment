<?php

namespace App\Livewire\Staff;

use App\Models\Appointment;
use Livewire\Component;

class Appointments extends Component
{
    public function approve($appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        $appointment->update(['status' => 'approved']);
        session()->flash('message', 'Appointment Approved.');
    }

    public function decline($appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        $appointment->update(['status' => 'rejected']);
        session()->flash('message', 'Appointment Declined.');
    }

    public function render()
    {
        $appointments = Appointment::where('status', 'pending')->get();
        return view('livewire.staff.appointments', compact('appointments'));
    }
}
