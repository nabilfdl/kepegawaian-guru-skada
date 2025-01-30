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
                        <div class="flex items-center gap-6">
                            <div class="w-24 h-24 border-4 border-blue-400 border-t-yellow-300 rounded-full"></div>
                            <ul class="text-sm">
                                <li class="flex items-center gap-2"><span class="w-4 h-4 bg-blue-400 inline-block"></span> Laki-Laki</li>
                                <li class="flex items-center gap-2"><span class="w-4 h-4 bg-yellow-300 inline-block"></span> Perempuan</li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Statistik Status -->
                    <div class="mb-6">
                        <h4 class="font-semibold text-gray-800">Status</h4>
                        <div class="flex items-center gap-6">
                            <div class="w-24 h-24 border-4 border-blue-400 border-t-yellow-300 rounded-full"></div>
                            <ul class="text-sm">
                                <li class="flex items-center gap-2"><span class="w-4 h-4 bg-blue-400 inline-block"></span> Aktif</li>
                                <li class="flex items-center gap-2"><span class="w-4 h-4 bg-yellow-300 inline-block"></span> Purna Tugas</li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Statistik Golongan -->
                    <div>
                        <h4 class="font-semibold text-gray-800">Golongan</h4>
                        <div class="flex items-center gap-6">
                            <div class="w-24 h-24 border-4 border-blue-400 border-t-green-500 border-r-yellow-300 rounded-full"></div>
                            <ul class="text-sm">
                                <li class="flex items-center gap-2"><span class="w-4 h-4 bg-blue-400 inline-block"></span> PNS</li>
                                <li class="flex items-center gap-2"><span class="w-4 h-4 bg-green-500 inline-block"></span> P3K</li>
                                <li class="flex items-center gap-2"><span class="w-4 h-4 bg-yellow-300 inline-block"></span> Honorer</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
