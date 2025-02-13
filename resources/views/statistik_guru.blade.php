<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Statistik') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Statistik Jenis Kelamin -->
                    <div class="flex flex-col items-center">
                        <div class="relative flex flex-col items-center">
                            <div class="w-32 h-32">
                                <canvas id="sexChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Statistik Status -->
                    <div class="flex flex-col items-center">
                        <div class="relative flex flex-col items-center">
                            <div class="w-32 h-32">
                                <canvas id="statusChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Statistik Golongan -->
                    <div class="flex flex-col items-center">
                        <div class="relative flex flex-col items-center">
                            <div class="w-32 h-32">
                                <canvas id="positionChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sexData = {
                labels: @json($sex->pluck('sex')->map(fn($s) => $s == 'Laki-Laki' ? 'Laki-Laki' : 'Perempuan')),
                datasets: [{
                    data: @json($sex->pluck('jumlah')),
                    backgroundColor: ['#60A5FA', '#FBBF24']
                }]
            };
            new Chart(document.getElementById('sexChart'), { type: 'pie', data: sexData, options: { responsive: true, maintainAspectRatio: false } });

            const statusData = {
                labels: @json($status->pluck('status')->map(fn($s) => ucfirst($s))),
                datasets: [{
                    data: @json($status->pluck('jumlah')),
                    backgroundColor: ['#60A5FA', '#FBBF24']
                }]
            };
            new Chart(document.getElementById('statusChart'), { type: 'pie', data: statusData, options: { responsive: true, maintainAspectRatio: false } });

            const positionData = {
                labels: @json($position->pluck('position')),
                datasets: [{
                    data: @json($position->pluck('jumlah')),
                    backgroundColor: ['#60A5FA', '#34D399', '#FBBF24']
                }]
            };
            new Chart(document.getElementById('positionChart'), { type: 'pie', data: positionData, options: { responsive: true, maintainAspectRatio: false } });
        });
    </script>
</x-app-layout>
