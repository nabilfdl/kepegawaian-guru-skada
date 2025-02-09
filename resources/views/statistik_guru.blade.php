<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Statistik') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="p-6">
                    <!-- Statistik Jenis Kelamin -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-gray-800">Jenis Kelamin</h4>
                        <div class="flex items-start gap-6">
                            <canvas id="sexChart" class="w-24 h-24"></canvas>
                            <ul class="text-sm">
                                @foreach ($sex as $s)
                                    <li class="flex items-center gap-2">
                                        <span class="w-4 h-4 {{ $s->sex == 'Laki-Laki' ? 'bg-blue-400' : 'bg-yellow-300' }} inline-block"></span> 
                                        {{ $s->sex == 'Laki-Laki' ? 'Laki-Laki' : 'Perempuan' }}: {{ $s->jumlah }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Statistik Status -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-gray-800">Status</h4>
                        <div class="flex items-start gap-6">
                            <canvas id="statusChart" class="w-24 h-24"></canvas>
                            <ul class="text-sm">
                                @foreach ($status as $s)
                                    <li class="flex items-center gap-2">
                                        <span class="w-4 h-4 {{ $s->status == 'aktif' ? 'bg-blue-400' : 'bg-yellow-300' }} inline-block"></span> 
                                        {{ ucfirst($s->status) }}: {{ $s->jumlah }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Statistik Golongan -->
                    <div>
                        <h4 class="font-semibold text-gray-800">Golongan</h4>
                        <div class="flex items-start gap-6">
                            <canvas id="positionChart" class="w-24 h-24"></canvas>
                            <ul class="text-sm">
                                @foreach ($position as $p)
                                    <li class="flex items-center gap-2">
                                        <span class="w-4 h-4 
                                            {{ $p->position == 'PNS' ? 'bg-blue-400' : ($p->position == 'P3K' ? 'bg-green-500' : 'bg-yellow-300') }} inline-block"></span> 
                                        {{ $p->position }}: {{ $p->jumlah }}
                                    </li>
                                @endforeach
                            </ul>
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
