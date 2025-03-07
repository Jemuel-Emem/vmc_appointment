<div class="w-full mx-auto p-6 shadow-lg rounded-lg bg-white">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Appointments</h2>

    @if(session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <table class="min-w-full border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Address</th>
                <th class="border px-4 py-2">Date</th>
                <th class="border px-4 py-2">Time</th>
                <th class="border px-4 py-2">Request Type</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                <tr class="border">
                    <td class="border px-4 py-2 text-center">{{ $appointment->name }}</td>
                    <td class="border px-4 py-2 text-center">{{ $appointment->address }}</td>
                    <td class="border px-4 py-2 text-center">{{ $appointment->date_of_appointment }}</td>
                    <td class="border px-4 py-2 text-center">{{ $appointment->time }}</td>
                    <td class="border px-4 py-2 text-center">{{ $appointment->request_type }}</td>
                    <td class="border px-4 py-2 text-center">
                        <span class="px-2 py-1 text-white text-sm rounded
                            {{ $appointment->status === 'approved' ? 'bg-green-500' : ($appointment->status === 'rejected' ? 'bg-red-500' : 'bg-yellow-500') }}">
                            {{ ucfirst($appointment->status) }}
                        </span>
                    </td>
                    <td class="border px-4 py-2 flex justify-center space-x-2">
                        <button
                            wire:click="approve({{ $appointment->id }})"
                            class="px-3 py-1 rounded text-white
                            {{ $appointment->status !== 'pending' ? 'bg-gray-400 cursor-not-allowed' : 'bg-green-600 hover:bg-green-700' }}"
                            {{ $appointment->status !== 'pending' ? 'disabled' : '' }}>
                            Approve
                        </button>

                        <button
                            wire:click="decline({{ $appointment->id }})"
                            class="px-3 py-1 rounded text-white
                            {{ $appointment->status !== 'pending' ? 'bg-gray-400 cursor-not-allowed' : 'bg-red-600 hover:bg-red-700' }}"
                            {{ $appointment->status !== 'pending' ? 'disabled' : '' }}>
                            Decline
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($appointments->isEmpty())
        <p class="text-center text-gray-600 mt-4">No pending appointments.</p>
    @endif
</div>
