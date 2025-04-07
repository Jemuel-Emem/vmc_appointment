<?php

namespace App\Livewire\Student;

use App\Models\appointment as App;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Flasher\Laravel\Facade\Flasher;


class Appointment extends Component
{
    public $name, $address, $date_of_appointment, $time, $request_type;

    public function submit()
    {
        $this->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'date_of_appointment' => 'required|date',
            'time' => 'required',
            'request_type' => 'required|in:Form137,Form138,TOR',
        ]);

        $appointment = App::create([
            'user_id' => Auth::id(),
            'name' => $this->name,
            'address' => $this->address,
            'date_of_appointment' => $this->date_of_appointment,
            'time' => $this->time,
            'request_type' => $this->request_type,
            'status' => 'pending',
        ]);


        Flasher::addSuccess("
            <strong>📄 Appointment Slip</strong><br>
            Name: {$appointment->name}<br>
            Appointment ID: {$appointment->id}<br>
            Request Type: {$appointment->request_type}<br>
            📸 <strong>Please take a screenshot before closing.</strong>
        ", ['timeout' => 0]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.student.appointment');
    }
}
