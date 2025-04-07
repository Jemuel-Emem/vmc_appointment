<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4 text-gray-700">Approved Appointments</h2>

    @if($approvedAppointments->isEmpty())
        <p class="text-gray-500">No approved appointments found.</p>
    @else
        <table class="w-full table-auto border border-gray-300 text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border-b">#</th>
                    <th class="p-2 border-b">Name</th>
                    <th class="p-2 border-b">Address</th>
                    <th class="p-2 border-b">Date</th>
                    <th class="p-2 border-b">Time</th>
                    <th class="p-2 border-b">Request Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach($approvedAppointments as $index => $appointment)
                    <tr class="hover:bg-gray-50">
                        <td class="p-2 border-b">{{ $index + 1 }}</td>
                        <td class="p-2 border-b">{{ $appointment->name }}</td>
                        <td class="p-2 border-b">{{ $appointment->address }}</td>
                        <td class="p-2 border-b">{{ $appointment->date_of_appointment }}</td>
                        <td class="p-2 border-b">{{ $appointment->time }}</td>
                        <td class="p-2 border-b">{{ $appointment->request_type }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
