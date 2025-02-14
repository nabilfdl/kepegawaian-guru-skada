<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Teacher Details') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg overflow-hidden">
                <!-- Header Section dengan Background -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6">
                    <div class="flex items-center justify-center">
                        <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-lg">
                            <svg class="w-12 h-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-white text-center mt-4">{{ $user->name }}</h3>
                    <p class="text-blue-100 text-center">Guru {{ $user->subject->subject_name }}</p>
                </div>

                <!-- Info Cards -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Personal Information -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-lg font-semibold text-blue-600 mb-4">Informasi Pribadi</h4>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <span class="text-gray-600 w-32">NIP</span>
                                    <span class="font-medium">{{ $user->nip }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-gray-600 w-32">Email</span>
                                    <span class="font-medium">{{ $user->email }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-gray-600 w-32">Nomor Telepon</span>
                                    <span class="font-medium">{{ $user->phone }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-gray-600 w-32">Tanggal Lahir</span>
                                    <span class="font-medium">{{ $user->birth_date }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-lg font-semibold text-blue-600 mb-4">Detail Informasi</h4>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <span class="text-gray-600 w-32">Jenis Kelamin</span>
                                    <span class="font-medium">{{ $user->sex }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-gray-600 w-32">Status Kawin</span>
                                    <span class="font-medium">{{ $user->marital_status }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-gray-600 w-32">Status</span>
                                    <span class="font-medium">{{ $user->status }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="text-gray-600 w-32">Level User</span>
                                    <span class="font-medium">{{ $user->role }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Address Card -->
                        <div class="bg-gray-50 p-4 rounded-lg md:col-span-2">
                            <h4 class="text-lg font-semibold text-blue-600 mb-4">Alamat</h4>
                            <p class="text-gray-700">{{ $user->address }}</p>
                        </div>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="border-t bg-gray-50 px-6 py-3">
                    <div class="flex justify-between items-center">
                        <a href="{{ route('data_pegawai.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>