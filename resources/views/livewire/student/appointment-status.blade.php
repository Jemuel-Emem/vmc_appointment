<div class="w-9/12 mx-auto p-6  rounded-lg">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Your Appointments</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($appointments as $appointment)
            <div class="border p-4 rounded-lg shadow-md bg-white">
                <h3 class="text-md font-semibold">{{ $appointment->request_type }}</h3>
                <p class="text-gray-600 text-sm">Date: {{ $appointment->date_of_appointment }}</p>
                <p class="text-gray-600 text-sm">Time: {{ $appointment->time }}</p>

                <span class="px-3 py-1 text-white text-sm rounded mt-2
                    {{ $appointment->status === 'approved' ? 'bg-green-500' : ($appointment->status === 'rejected' ? 'bg-red-500' : 'bg-yellow-500') }}">
                    {{ ucfirst($appointment->status) }}
                </span>
            </div>
        @endforeach
    </div>

    @if($appointments->isEmpty())
        <p class="text-center text-gray-500 mt-4">No appointments found.</p>
    @endif
</div>
