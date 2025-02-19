<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Statistik') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Statistik Jenis Kelamin -->
                    <div class="flex flex-col items-center">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-500 mb-2">Jenis Kelamin</h3>
                        <div class="relative flex flex-col items-center">
                            <div class="w-64 h-64">
                                <canvas id="sexChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Statistik Status -->
                    <div class="flex flex-col items-center">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-500 mb-2">Status</h3>
                        <div class="relative flex flex-col items-center">
                            <div class="w-64 h-64">
                                <canvas id="statusChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Statistik Golongan -->
                    <div class="flex flex-col items-center">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-500 mb-2">Golongan</h3>
                        <div class="relative flex flex-col items-center">
                            <div class="w-64 h-64">
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
                    backgroundColor: ['#6061E5', '#E68369']
                }]
            };
            new Chart(document.getElementById('sexChart'), { 
                type: 'pie', 
                data: sexData, 
                options: { responsive: true } 
            });

            const statusData = {
                labels: @json($status->pluck('status')->map(fn($s) => ucfirst($s))),
                datasets: [{
                    data: @json($status->pluck('jumlah')),
                    backgroundColor: ['#93E65A', '#FBBF24']
                }]
            };
            new Chart(document.getElementById('statusChart'), { 
                type: 'pie', 
                data: statusData, 
                options: { responsive: true } 
            });

            const positionData = {
                labels: @json($position->pluck('position')),
                datasets: [{
                    data: @json($position->pluck('jumlah')),
                    backgroundColor: ['#60A5FA', '#E5584D', '#66E64F']
                }]
            };
            new Chart(document.getElementById('positionChart'), { 
                type: 'pie', 
                data: positionData, 
                options: { responsive: true } 
            });
        });
    </script>
</x-app-layout>
