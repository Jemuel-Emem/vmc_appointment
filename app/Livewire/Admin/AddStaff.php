<?php
namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class AddStaff extends Component
{
    public $name, $email, $password, $userId; // Added userId for edit
    public $showModal = false;
    public $isEdit = false; // Flag to distinguish between add and edit

    // Show modal for add
    public function showAddModal()
    {
        $this->resetInputFields();
        $this->isEdit = false;
        $this->showModal = true;
    }

    // Show modal for edit
    public function showEditModal($userId)
    {
        $user = User::findOrFail($userId);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->userId = $user->id;
        $this->isEdit = true;
        $this->showModal = true;
    }

    // Store or Update User
    public function store()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . ($this->isEdit ? $this->userId : ''),
            'password' => 'required|min:6',
        ]);

        if ($this->isEdit) {
            $user = User::findOrFail($this->userId);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password ? Hash::make($this->password) : $user->password,
            ]);
        } else {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'is_admin' => 2,
            ]);
        }

        session()->flash('message', $this->isEdit ? 'Staff updated successfully!' : 'Staff added successfully!');
        $this->resetInputFields();
        $this->showModal = false;
        $this->emit('staffUpdated'); // Emit event to refresh staff list (optional)
    }

    // Reset the input fields
    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->userId = null;
    }

    // Close the modal
    public function closeModal()
    {
        $this->showModal = false;
        $this->resetInputFields();
    }

    public function render()
    {
        $staffs = User::where('is_admin', 2)->get(); // Fetch all staff where is_admin = 2
        return view('livewire.admin.add-staff', compact('staffs'));
    }
}
