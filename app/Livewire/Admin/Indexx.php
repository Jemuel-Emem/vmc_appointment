<?php

namespace App\Livewire\Admin;

use App\Models\appointment;
use App\Models\User;
use Livewire\Component;

class Indexx extends Component
{
    public $appointmentsCount;
    public $approvedSchedulesCount;
    public $staffCount;

    public function mount()
    {
        $this->appointmentsCount = appointment::count();
        $this->approvedSchedulesCount = appointment::where('status', 'approved')->count();
        $this->staffCount = User::where('is_admin', 2)->count();
    }

    public function render()
    {
        return view('livewire.admin.indexx');
    }
}
