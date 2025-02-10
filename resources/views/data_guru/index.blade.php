<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Guru') }}
        </h2>
    </x-slot>
    
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Card Header dengan Background -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4 text-white">
                    <div class="flex justify-between items-center">
                        <!-- Search Bar yang Lebih Menarik -->
                        <form action="{{ route('data_guru.index') }}" method="GET" class="flex items-center">
                            <div class="relative">
                                <input type="text" name="search" placeholder="Cari guru..." value="{{ request('search') }}" 
                                    class="w-64 pl-10 pr-4 py-2 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <div class="absolute left-3 top-2.5 text-gray-400">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </form>
                        <!-- Tombol Tambah yang Lebih Menarik -->
                        <a href="{{ route('data_guru.create') }}" 
                            class="inline-flex items-center px-4 py-2 bg-white text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition-all duration-200 shadow-sm">
                            <i class="fas fa-user-plus mr-2"></i>
                            Tambah Guru
                        </a>
                    </div>
                </div>

                <!-- Tabel dengan Desain yang Lebih Modern -->
                <div class="overflow-x-auto p-4">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-200">NIP</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-200">Nama</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-200">Golongan</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-200">Mata Pelajaran</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-200">Status</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-200">Peran</th>
                                <th class="px-4 py-3 text-center text-sm font-semibold text-gray-600 dark:text-gray-200">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            @foreach ($teachers as $teacher)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                    <td class="px-4 py-3 text-sm text-gray-600 dark:text-gray-200">{{ $teacher->nip }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-600 dark:text-gray-200">{{ $teacher->name }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-600 dark:text-gray-200">{{ $teacher->position }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-600 dark:text-gray-200">{{ $teacher->subject->subject_name }}</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 text-xs rounded-full {{ $teacher->status === 'Aktif' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }}">
                                            {{ $teacher->status }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-600 dark:text-gray-200">{{ $teacher->role }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex justify-center space-x-2">
                                            <a href="{{ route('data_guru.show', $teacher->id) }}" 
                                                class="p-1.5 bg-teal-500 text-white rounded-lg hover:bg-teal-600 transition-colors duration-200 tooltip"
                                                title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('data_guru.edit', $teacher->id) }}" 
                                                class="p-1.5 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-colors duration-200 tooltip"
                                                title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form method="POST" action="{{ route('data_guru.destroy', $teacher->id) }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" 
                                                    class="p-1.5 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-200 tooltip"
                                                    title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan CSS untuk tooltip -->
    <style>
        .tooltip {
            position: relative;
        }
        .tooltip:hover::after {
            content: attr(title);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            padding: 4px 8px;
            background-color: rgba(0,0,0,0.8);
            color: white;
            font-size: 12px;
            border-radius: 4px;
            white-space: nowrap;
            z-index: 10;
        }
    </style>
</x-app-layout>
