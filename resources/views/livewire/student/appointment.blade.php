
<div class="w-9/12 mx-auto p-6 shadow-lg rounded-lg h-2/12">
   <div class="bg-white p-4">
    <h2 class="text-lg font-semibold text-gray-700 mb-4 text-center">Request Appointment</h2>
    <form wire:submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-gray-600">Name</label>
            <input type="text" wire:model="name" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div>
            <label class="block text-gray-600">Address</label>
            <input type="text" wire:model="address" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div>
            <label class="block text-gray-600">Date of Appointment</label>
            <input type="date" wire:model="date_of_appointment" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div>
            <label class="block text-gray-600">Time</label>
            <input type="time" wire:model="time" class="w-full p-2 border border-gray-300 rounded" required>
        </div>
        <div class="md:col-span-2">
            <label class="block text-gray-600">Request Type</label>
            <select wire:model="request_type" class="w-full p-2 border border-gray-300 rounded" required>
                <option value="">Select Request Type</option>
                <option value="Form137">Form 137</option>
                <option value="Form138">Form 138</option>
                <option value="TOR">TOR</option>
            </select>
        </div>
        <div class="md:col-span-2">
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Submit Request</button>
        </div>
    </form>
   </div>
</div>
