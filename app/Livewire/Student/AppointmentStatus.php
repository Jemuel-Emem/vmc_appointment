<?php

namespace App\Livewire\Student;

use App\Models\Appointment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AppointmentStatus extends Component
{
    public $appointments;

    public function mount()
    {
        $this->appointments = Appointment::where('user_id', Auth::id())->latest()->get();
    }

    public function render()
    {
        return view('livewire.student.appointment-status', ['appointments' => $this->appointments]);
    }
}
