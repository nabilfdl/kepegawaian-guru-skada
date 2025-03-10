<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Profil Guru -->
            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg flex flex-col lg:flex-row gap-8 transition-all duration-300 hover:shadow-xl">
                <div class="w-full lg:w-1/4 flex flex-col items-center lg:items-start justify-center p-4">
                   
                <!-- Foto Profil 3x4 -->
                    <div class="w-32 h-40 mx-auto overflow-hidden mb-3">
                        @if(Auth::user()->pfp)
                            <img src="{{ asset('storage/' . Auth::user()->pfp) }}" alt="Foto Profil" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-200 dark:bg-gray-600">
                                <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        @endif
                    </div>
                    
                    <!-- NIP di bawah foto -->
                    <div class="text-center mx-auto">
                        <div class="flex items-center justify-center lg:justify-start space-x-2">
                            <span class="text-gray-600 dark:text-gray-300 font-medium">NIP:</span>
                            <span class="text-gray-800 dark:text-gray-200 font-semibold">{{ Auth::user()->nip ?? '-' }}</span>
                        </div>
                    </div>
                </div>

                <!-- profil biodata -->
                <div class="w-full lg:w-3/4">
                    <h3 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200 border-b border-gray-300 dark:border-gray-600 pb-2">Profil Saya</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        <div class="space-y-3">
                            <p class="flex items-center">
                                <span class="text-gray-600 dark:text-gray-400 w-40">Nama</span>
                                <span class="text-gray-600 dark:text-gray-400">:</span>
                                <span class="font-medium text-gray-800 dark:text-gray-200 ml-2">{{ Auth::user()->name }}</span>
                            </p>
                            <p class="flex items-center">
                                <span class="text-gray-600 dark:text-gray-400 w-40">Tempat/Tanggal Lahir</span>
                                <span class="text-gray-600 dark:text-gray-400">:</span>
                                <span class="font-medium text-gray-800 dark:text-gray-200 ml-2">{{ Auth::user()->birth_place }} / {{ \Carbon\Carbon::parse(Auth::user()->birth_date)->format('Y-m-d') }}</span>
                            </p>
                            <p class="flex items-center">
                                <span class="text-gray-600 dark:text-gray-400 w-40">Jenis Kelamin</span>
                                <span class="text-gray-600 dark:text-gray-400">:</span>
                                <span class="font-medium text-gray-800 dark:text-gray-200 ml-2">{{ Auth::user()->sex }}</span>
                            </p>
                            <p class="flex items-center">
                                <span class="text-gray-600 dark:text-gray-400 w-40">Alamat</span>
                                <span class="text-gray-600 dark:text-gray-400">:</span>
                                <span class="font-medium text-gray-800 dark:text-gray-200 ml-2 break-word">{{ Auth::user()->address }}</span>
                            </p>
                        </div>
                        <div class="space-y-3">
                            <p class="flex items-center">
                                <span class="text-gray-600 dark:text-gray-400 w-40">Agama</span>
                                <span class="text-gray-600 dark:text-gray-400">:</span>
                                <span class="font-medium text-gray-800 dark:text-gray-200 ml-2">{{ Auth::user()->religion }}</span>
                            </p>
                            <p class="flex items-center">
                                <span class="text-gray-600 dark:text-gray-400 w-40">Golongan</span>
                                <span class="text-gray-600 dark:text-gray-400">:</span>
                                <span class="font-medium text-gray-800 dark:text-gray-200 ml-2">{{ Auth::user()->position }}</span>
                            </p>
                            <p class="flex items-center">
                                <span class="text-gray-600 dark:text-gray-400 w-40">Status Perkawinan</span>
                                <span class="text-gray-600 dark:text-gray-400">:</span>
                                <span class="font-medium text-gray-800 dark:text-gray-200 ml-2">{{ Auth::user()->marital_status }}</span>
                            </p>
                            <p class="flex items-center">
                                <span class="text-gray-600 dark:text-gray-400 w-40">Mata Pelajaran</span>
                                <span class="text-gray-600 dark:text-gray-400">:</span>
                                <span class="font-medium text-gray-800 dark:text-gray-200 ml-2">{{ Auth::user()->subject->subject_name }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end profil biodata -->

            <!-- Statistik Guru -->
            <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-gradient-to-br from-blue-600 to-blue-900 p-6 rounded-xl shadow-lg text-white transition-transform duration-300 hover:scale-105">
                    <div class="flex flex-col items-center">
                        <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <p class="text-lg font-semibold">Jumlah Guru</p>
                        <p class="text-3xl font-bold mt-1">{{ $totalTeachers ?? 0 }}</p>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-green-600 to-green-900 p-6 rounded-xl shadow-lg text-white transition-transform duration-300 hover:scale-105">
                    <div class="flex flex-col items-center">
                        <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-lg font-semibold">Aktif/Nonaktif</p>
                        <p class="text-3xl font-bold mt-1">{{ $activeTeachers ?? 0 }} / {{ $inactiveTeachers ?? 0 }}</p>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-purple-600 to-purple-900 p-6 rounded-xl shadow-lg text-white transition-transform duration-300 hover:scale-105">
                    <div class="flex flex-col items-center">
                        <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        <p class="text-lg font-semibold">Golongan</p>
                        <p class="text-3xl font-bold mt-1">{{ !empty($groupByPosition) ? count($groupByPosition) : 0 }}</p>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-red-600 to-red-900 p-6 rounded-xl shadow-lg text-white transition-transform duration-300 hover:scale-105">
                    <div class="flex flex-col items-center">
                        <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <p class="text-lg font-semibold">Jenis Kelamin</p>
                        <p class="text-3xl font-bold mt-1">L {{ $genderStats['Laki-Laki'] ?? 0 }} / P  {{ $genderStats['Perempuan'] ?? 0 }}</p>
                    </div>
                </div>
            </div>
            <!-- end Statistik Guru -->

            {{-- Ubah agar popup bisa berfungsi dengan baik dan mengeluarkan confetti saat ditekan --}}
            <!-- Notifikasi Ulang Tahun -->
            <div x-data="{ showPopup: localStorage.getItem('lastGreeted') !== '{{ session('last_greeted') }}' }">
                <template x-if="showPopup">
                    <div class="bg-gradient-to-r from-yellow-600 to-yellow-700 p-6 mt-6 rounded-xl shadow-lg">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0 animate-bounce">
                                <span class="text-4xl">🎉</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-xl font-bold text-white mb-1">Selamat Ulang Tahun!</h4>
                                @foreach($birthdayUsers as $user)
                                    <p class="text-white">Selamat ulang tahun kepada {{ $user->name }} yang ke-{{ \Carbon\Carbon::parse($user->birth_date)->age }} tahun!</p>
                                @endforeach
                            </div>
                            <button @click="showPopup = false; localStorage.setItem('lastGreeted', '{{ session('last_greeted') }}'); triggerConfetti();"
                                class="px-6 py-2 bg-white text-yellow-500 rounded-lg font-semibold hover:bg-yellow-50 transition-colors duration-300">
                                Kirim Ucapan
                            </button>
                        </div>
                    </div>
                </template>
            </div>            
        <!-- end Notifikasi Ulang Tahun -->

        <!-- Tabel Data Guru -->
        <div class="mt-6 bg-gray-900 dark:bg-gray-800 p-6 rounded-xl shadow-lg overflow-hidden">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-100 dark:text-gray-200">Guru yang Berulang Tahun Hari Ini</h3>
                {{-- Menyembunyikan lihat semua --}}
                <a href="data_guru" class="hidden text-blue-400 hover:text-blue-300 font-semibold">Lihat Semua</a>
            </div>
            <div class="overflow-x-auto">
                @if(isset($birthdayUsers) && $birthdayUsers->isNotEmpty())
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-800 dark:bg-gray-700">
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 dark:text-gray-300 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 dark:text-gray-300 uppercase tracking-wider">Golongan</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 dark:text-gray-300 uppercase tracking-wider">Mata Pelajaran</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 dark:text-gray-300 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>

                        {{-- Ubah dekorasi tabel menjadi lebih bagus --}}
                        <tbody>
                            @foreach($birthdayUsers as $user)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                    <td class="px-4 py-3 text-sm text-gray-600 dark:text-gray-200">{{ $user->name }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-600 dark:text-gray-200">{{ $user->position ?? '-' }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-600 dark:text-gray-200">{{ optional($user->subject)->subject_name ?? '-' }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-600 dark:text-gray-200">{{ $user->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500 text-center py-4">Tidak ada guru yang berulang tahun hari ini.</p>
                @endif
            </div>
        </div>
        <!-- end table data guru -->
    </div>

    {{-- Confetti --}}
    <!-- Confetti Script -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <script>
        function triggerConfetti() {
            var duration = 2 * 1000; // 2 seconds
            var end = Date.now() + duration;

            (function frame() {
                confetti({
                    particleCount: 5,
                    angle: 60,
                    spread: 55,
                    origin: { x: 0 }
                });

                confetti({
                    particleCount: 5,
                    angle: 120,
                    spread: 55,
                    origin: { x: 1 }
                });

                if (Date.now() < end) {
                    requestAnimationFrame(frame);
                }
            })();
        }
    </script>
</x-app-layout>
