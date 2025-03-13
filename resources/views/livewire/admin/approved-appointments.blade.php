<div class="w-10/12 mx-auto p-6 shadow-lg rounded-lg bg-white">

    <!-- Search Bar -->
    <div class="flex justify-start mb-4 gap-4">
        <input
            type="text"
            wire:model.debounce.300ms="search"
            placeholder="Search by name..."
            class="w-full md:w-1/3 px-4 py-2 border rounded-md focus:ring focus:ring-blue-300"
        >

        <button wire:click="searchh" class="bg-green-500 hover:bg-green-600 w-64 rounded text-white">Search</button>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="border border-gray-300 p-2">#</th>
                    <th class="border border-gray-300 p-2">Name</th>
                    <th class="border border-gray-300 p-2">Request Type</th>
                    <th class="border border-gray-300 p-2">Date</th>
                    <th class="border border-gray-300 p-2">Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $index => $appointment)
                    <tr class="text-center hover:bg-gray-100">
                        <td class="border border-gray-300 p-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 p-2">{{ $appointment->name }}</td>
                        <td class="border border-gray-300 p-2">{{ $appointment->request_type }}</td>
                        <td class="border border-gray-300 p-2">{{ $appointment->date_of_appointment }}</td>
                        <td class="border border-gray-300 p-2">{{ $appointment->time }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $appointments->links() }}
    </div>

    @if($appointments->isEmpty())
        <p class="text-center text-gray-500 mt-4">No approved appointments found.</p>
    @endif
</div>
