<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Profil Guru -->
            <div class="bg-white white:bg-gray-800 p-6 rounded-lg shadow-md flex gap-6">
                <div class="w-1/4 bg-gray-200 flex items-center justify-center rounded-lg">
                    <span class="text-gray-500">NIP</span>
                </div>
                <div class="w-3/4">
                    <h3 class="text-xl font-semibold mb-2">Beranda</h3>
                    <p><strong>Nama:</strong> {{ Auth::user()->name }} </p>
                    <p><strong>Tempat/Tanggal Lahir:</strong> {{ Auth::user()->birth_place }} / {{ Auth::user()->birth_date }}</p>
                    <p><strong>Jenis Kelamin:</strong> {{ Auth::user()->sex }}</p>
                    <p><strong>Alamat:</strong> {{ Auth::user()->address }}</p>
                    <p><strong>Agama:</strong> {{ Auth::user()->religion }}</p>
                    <p><strong>Golongan:</strong> {{ Auth::user()->position }}</p>
                    <p><strong>Status Perkawinan:</strong> {{ Auth::user()->marital_status }}</p>
                    <p><strong>Mata Pelajaran:</strong> {{ Auth::user()->subject->subject_name }}</p>
                    <p><strong>Status:</strong> {{ Auth::user()->status }}</p>
                </div>
            </div>

            <!-- Notifikasi Ulang Tahun -->
            <div class="bg-yellow-100 p-4 mt-4 rounded-lg shadow-md">
                <p class="text-yellow-800 font-semibold">🎉 Nama dari yang berulang tahun</p>
                <p>Selamat ulang tahun kepada Pak Jono yang ke-77 tahun!</p>
                <button class="mt-2 px-4 py-2 bg-yellow-500 text-white rounded-lg">Klik untuk menyayangi</button>
            </div>

            <!-- Tabel Data Guru -->
            <div class="mt-6 bg-white white:bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-2">Silahkan Buka tab Employee Data untuk melihat semua data</h3>
                <table class="w-full border-collapse border border-gray-300 mt-4">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">Nama</th>
                            <th class="border p-2">Golongan</th>
                            <th class="border p-2">Mata Pelajaran</th>
                            <th class="border p-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border">
                            <td class="border p-2">Pak Jono</td>
                            <td class="border p-2">PNS</td>
                            <td class="border p-2">MATEMATIKA</td>
                            <td class="border p-2">AKTIF</td>
                        </tr>
                        <tr class="border">
                            <td class="border p-2">Bu Bukit</td>
                            <td class="border p-2">HONORER</td>
                            <td class="border p-2">IPA</td>
                            <td class="border p-2">AKTIF</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Statistik Guru -->
            <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-white white:bg-gray-800 p-4 rounded-lg shadow-md text-center">
                    <p class="text-lg font-semibold">Jumlah Guru</p>
                    <p class="text-2xl font-bold">75</p>
                    <button class="mt-2 px-4 py-2 bg-gray-700 text-white rounded-lg">View</button>
                </div>
                <div class="bg-white white:bg-gray-800 p-4 rounded-lg shadow-md text-center">
                    <p class="text-lg font-semibold">Aktif/Nonaktif</p>
                    <p class="text-2xl font-bold">75</p>
                    <button class="mt-2 px-4 py-2 bg-gray-700 text-white rounded-lg">View</button>
                </div>
                <div class="bg-white white:bg-gray-800 p-4 rounded-lg shadow-md text-center">
                    <p class="text-lg font-semibold">Golongan</p>
                    <p class="text-2xl font-bold">75</p>
                    <button class="mt-2 px-4 py-2 bg-gray-700 text-white rounded-lg">View</button>
                </div>
                <div class="bg-white white:bg-gray-800 p-4 rounded-lg shadow-md text-center">
                    <p class="text-lg font-semibold">Jenis Kelamin</p>
                    <p class="text-2xl font-bold">75</p>
                    <button class="mt-2 px-4 py-2 bg-gray-700 text-white rounded-lg">View</button>
                </div>
            </div>
        </div>
    </div>

     
</x-app-layout>
