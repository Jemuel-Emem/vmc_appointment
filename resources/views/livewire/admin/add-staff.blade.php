<div>
<div class="flex justify-end">
        <!-- Button to trigger Add Staff Modal -->
        <button wire:click="showAddModal" class="bg-blue-500 text-white p-2 rounded w-32">Add Staff</button>
</div>

    <!-- Staff List Table -->
    <div class="mt-4">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 text-left">Name</th>
                    <th class="py-2 px-4 text-left">Email</th>
                    <th class="py-2 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffs as $staff)
                    <tr>
                        <td class="py-2 px-4">{{ $staff->name }}</td>
                        <td class="py-2 px-4">{{ $staff->email }}</td>
                        <td class="py-2 px-4">
                            <button wire:click="showEditModal({{ $staff->id }})" class="bg-yellow-500 text-white p-2 rounded">Edit</button>
                            <button wire:click="delete({{ $staff->id }})" class="bg-red-500 text-white p-2 rounded">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal for Adding/Editing Staff -->
    @if($showModal)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg w-1/3">
                <h2 class="text-xl mb-4">{{ $isEdit ? 'Edit Staff' : 'Add Staff' }}</h2>

                <form wire:submit.prevent="store">
                    <div>
                        <label for="name" class="block mb-2">Name</label>
                        <input type="text" wire:model="name" id="name" class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mt-4">
                        <label for="email" class="block mb-2">Email</label>
                        <input type="email" wire:model="email" id="email" class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="mt-4">
                        <label for="password" class="block mb-2">Password</label>
                        <input type="password" wire:model="password" id="password" class="w-full p-2 border border-gray-300 rounded" @if(!$isEdit) required @endif>
                    </div>
                    <div class="mt-4 flex justify-between">
                        <button type="button" wire:click="closeModal" class="bg-gray-500 text-white p-2 rounded">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded">{{ $isEdit ? 'Update' : 'Add' }} Staff</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
