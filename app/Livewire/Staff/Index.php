<?php

namespace App\Livewire\Staff;

use App\Models\appointment;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $appointmentCount;
    public $userCount;
    public $approvedScheduleCount;

    public function mount()
    {
        $this->appointmentCount = appointment::count();
        $this->userCount = User::count();
        $this->approvedScheduleCount = appointment::where('status', 'approved')->count();
    }

    public function render()
    {
        return view('livewire.staff.index');
    }
}
