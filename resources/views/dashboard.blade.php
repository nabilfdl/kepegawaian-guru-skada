<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Profil Guru -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md flex gap-6">
                <div class="w-1/4 bg-gray-200 flex items-center justify-center rounded-lg">
                    <span class="text-gray-500">NIP</span>
                </div>
                <div class="w-3/4">
                    <h3 class="text-xl font-semibold mb-2">Beranda</h3>
                    @if(Auth::check())
                        <p><strong>Nama:</strong> {{ Auth::user()->name }} </p>
                        <p><strong>Tempat/Tanggal Lahir:</strong> 
                            {{ Auth::user()->birth_place }} / 
                            {{ Auth::user()->birth_date ? \Carbon\Carbon::parse(Auth::user()->birth_date)->format('d-m-Y') : '-' }}
                        </p>
                        <p><strong>Jenis Kelamin:</strong> {{ Auth::user()->sex ?? '-' }}</p>
                        <p><strong>Alamat:</strong> {{ Auth::user()->address ?? '-' }}</p>
                        <p><strong>Agama:</strong> {{ Auth::user()->religion ?? '-' }}</p>
                        <p><strong>Golongan:</strong> {{ Auth::user()->position ?? '-' }}</p>
                        <p><strong>Status Perkawinan:</strong> {{ Auth::user()->marital_status ?? '-' }}</p>
                        <p><strong>Mata Pelajaran:</strong> {{ optional(Auth::user()->subject)->subject_name ?? 'Tidak Ada' }}</p>
                        <p><strong>Status:</strong> {{ Auth::user()->status ?? '-' }}</p>
                    @else
                        <p class="text-red-500">Data pengguna tidak tersedia.</p>
                    @endif
                </div>
            </div>

            <!-- Notifikasi Ulang Tahun -->
            @if (!empty($birthdayUsers) && $birthdayUsers->isNotEmpty())
                <div class="bg-yellow-100 p-4 mt-4 rounded-lg shadow-md">
                    <p class="text-yellow-800 font-semibold">🎉 Guru yang berulang tahun hari ini:</p>
                    @foreach ($birthdayUsers as $user)
                        <p>Selamat ulang tahun kepada <strong>{{ $user->name }}</strong> yang ke-{{ \Carbon\Carbon::parse($user->birth_date)->age }} tahun!</p>
                    @endforeach
                    <button class="mt-2 px-4 py-2 bg-yellow-500 text-white rounded-lg">Klik untuk menyayangi</button>
                </div>
            @endif

            <!-- Tabel Data Guru (Guru yang Berulang Tahun Hari Ini) -->
            <div class="mt-6 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-2">Guru yang Berulang Tahun Hari Ini</h3>

                @if (!empty($birthdayUsers) && $birthdayUsers->isNotEmpty())
                    <table class="w-full border-collapse border border-gray-300 mt-4">
                        <thead>
                            <tr class="bg-gray-200 text-left">
                                <th class="border p-2">Nama</th>
                                <th class="border p-2">Usia</th>
                                <th class="border p-2">Golongan</th>
                                <th class="border p-2">Mata Pelajaran</th>
                                <th class="border p-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($birthdayUsers as $user)
                                <tr class="border">
                                    <td class="border p-2 font-semibold">{{ $user->name }}</td>
                                    <td class="border p-2">
                                        {{ $user->birth_date ? \Carbon\Carbon::parse($user->birth_date)->age . ' Tahun' : '-' }}
                                    </td>
                                    <td class="border p-2">{{ $user->position ?? '-' }}</td>
                                    <td class="border p-2">{{ optional($user->subject)->subject_name ?? '-' }}</td>
                                    <td class="border p-2">{{ $user->status ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500">Tidak ada guru yang berulang tahun hari ini.</p>
                @endif
            </div>

            <!-- Statistik Guru -->
            <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md text-center">
                    <p class="text-lg font-semibold">Jumlah Guru</p>
                    <p class="text-2xl font-bold">{{ $totalTeachers ?? 0 }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md text-center">
                    <p class="text-lg font-semibold">Aktif</p>
                    <p class="text-2xl font-bold">{{ $activeTeachers ?? 0 }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md text-center">
                    <p class="text-lg font-semibold">Nonaktif</p>
                    <p class="text-2xl font-bold">{{ $inactiveTeachers ?? 0 }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md text-center">
                    <p class="text-lg font-semibold">Total Golongan</p>
                    <p class="text-2xl font-bold">
                        {{ !empty($groupByPosition) ? count($groupByPosition) : 0 }}
                    </p>                    
                </div>
            </div>

            <!-- Statistik Jenis Kelamin -->
            <div class="mt-6 grid grid-cols-2 md:grid-cols-2 gap-4">
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md text-center">
                    <p class="text-lg font-semibold">Laki-Laki</p>
                    <p class="text-2xl font-bold">{{ $genderStats['Laki-laki'] ?? 0 }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md text-center">
                    <p class="text-lg font-semibold">Perempuan</p>
                    <p class="text-2xl font-bold">{{ $genderStats['Perempuan'] ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
