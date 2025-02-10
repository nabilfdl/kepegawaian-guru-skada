<x-app-layout>
    <x-slot name="header">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Guru') }}
        </h2>
    </x-slot>
    
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <form action="{{ route('data_guru.index') }}" method="GET">
                        <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}" class="border rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                        <button type="submit" class="bg-blue-500 p-2 text-white">Search</button>
                    </form>
                    <a href="{{ route('data_guru.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg transition-colors duration-200">
                        <i class="fas fa-user-plus mr-2"></i>
                        Tambah Guru
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="border p-2">NIP</th>
                                <th class="border p-2">Nama</th>
                                <th class="border p-2">Golongan</th>
                                <th class="border p-2">Mata Pelajaran</th>
                                <th class="border p-2">Status</th>
                                <th class="border p-2">Peran</th>
                                <th class="border p-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($employees as $employee)
                                <tr class="odd:bg-gray-100">
                                    <td class="border p-2">{{ $employee->nip }}</td>
                                    <td class="border p-2">{{ $employee->nama }}</td>
                                    <td class="border p-2">{{ $employee->golongan }}</td>
                                    <td class="border p-2">{{ $employee->mata_pelajaran }}</td>
                                    <td class="border p-2">{{ $employee->status }}</td>
                                    <td class="border p-2">{{ $employee->tanggal_lahir }}</td>
                                    <td class="border p-2">{{ $employee->masa_kerja }}</td>
                                    <td class="border p-2 text-blue-600 hover:underline cursor-pointer">User</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tbody> --}}
                            @foreach ($teachers as $teacher)
                                <tr class="odd:bg-gray-100">
                                    <td class="border p-2">{{ $teacher->nip }}</td>
                                    <td class="border p-2">{{ $teacher->name }}</td>
                                    <td class="border p-2">{{ $teacher->position }}</td>
                                    <td class="border p-2">{{ $teacher->subject->subject_name }}</td>
                                    <td class="border p-2">{{ $teacher->status }}</td>
                                    <td class="border p-2">{{ $teacher->role }}</td>
                                    <td class="border p-2">
                                        <div class="flex space-x-2 justify-center">
                                            <a href="/view_data" class="px-2 py-1 bg-teal-500 text-white rounded-md hover:bg-teal-600 transition-colors duration-200">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" class="px-2 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition-colors duration-200">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors duration-200">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div class="flex justify-center mt-4">
                    {{ $employees->links() }}
                </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>
