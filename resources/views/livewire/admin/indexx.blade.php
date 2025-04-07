<div class="mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-6 shadow-lg rounded-lg text-center">
            <h2 class="text-lg font-semibold text-gray-700">Appointments</h2>
            <p class="text-2xl font-bold text-blue-600">{{ $appointmentsCount }}</p>
        </div>
        <div class="bg-white p-6 shadow-lg rounded-lg text-center">
            <h2 class="text-lg font-semibold text-gray-700">Staffs</h2>
            <p class="text-2xl font-bold text-green-600">{{ $staffCount }}</p>
        </div>
        <div class="bg-white p-6 shadow-lg rounded-lg text-center">
            <h2 class="text-lg font-semibold text-gray-700">Approved Schedules</h2>
            <p class="text-2xl font-bold text-yellow-600">{{ $approvedSchedulesCount }}</p>
        </div>
    </div>

    <div class="bg-white p-6 shadow-lg rounded-lg">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Statistical Overview</h2>
        <canvas id="statsChart"></canvas>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById('statsChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Appointments', 'Staff', 'Approved Schedules'],
                    datasets: [{
                        label: 'Counts',
                        data: [{{ $appointmentsCount }}, {{ $staffCount }}, {{ $approvedSchedulesCount }}],
                        backgroundColor: ['#4F46E5', '#22C55E', '#F59E0B']
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        });
    </script>
</div>
