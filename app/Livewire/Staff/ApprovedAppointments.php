<?php

namespace App\Livewire\Staff;

use App\Models\appointment;
use Livewire\Component;

class ApprovedAppointments extends Component
{
    public $approvedAppointments;

    public function mount()
    {
        $this->approvedAppointments = appointment::where('status', 'approved')->latest()->get();
    }

    public function render()
    {
        return view('livewire.staff.approved-appointments');
    }
}
