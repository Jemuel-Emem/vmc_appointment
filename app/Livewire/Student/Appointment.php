<?php

namespace App\Livewire\Student;
use App\Models\appointment as app;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\Component;

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

        App::create([
            'user_id' => Auth::id(),
            'name' => $this->name,
            'address' => $this->address,
            'date_of_appointment' => $this->date_of_appointment,
            'time' => $this->time,
            'request_type' => $this->request_type,
            'status' => 'pending',
        ]);
        flash()->success('Your appointment request has been submitted.');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.student.appointment');
    }
}
