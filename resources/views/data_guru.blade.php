<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Guru') }}
        </h2>
    </x-slot>
    
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <input type="text" placeholder="Search..." class="border rounded-md px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                </div>
                <div class="overflow-x-auto">
                    {{-- <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="border p-2">NIP</th>
                                <th class="border p-2">Nama</th>
                                <th class="border p-2">Golongan</th>
                                <th class="border p-2">Mata Pelajaran</th>
                                <th class="border p-2">Status</th>
                                <th class="border p-2">Tanggal Lahir</th>
                                <th class="border p-2">Masa Kerja</th>
                                <th class="border p-2">Posisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
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
                    </table> --}}
                </div>
                {{-- <div class="flex justify-center mt-4">
                    {{ $employees->links() }}
                </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>
