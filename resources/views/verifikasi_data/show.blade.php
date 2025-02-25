<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Data Details') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg overflow-hidden">
                <!-- Header Section dengan Background -->
                <div class="bg-gradient-to-r {{ 
                    $user->acceptance_status == 'Diverifikasi' 
                        ? 'from-green-500 to-green-600' 
                        : ($user->acceptance_status == 'Dalam Proses' 
                            ? 'from-yellow-500 to-yellow-600' 
                            : 'from-red-500 to-red-600')
                }}
                p-6">
                    <div class="flex items-center justify-center">
                        <div class="w-24 h-full bg-white rounded-full flex items-center justify-center shadow-lg">
                            <img src="{{ asset('storage/' . $user->pfp) }}" alt="Foto Profil" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-white text-center mt-4">{{ $user->name ?? 'N/A' }}</h3>
                    <p class="text-blue-100 text-center">
                        {{ isset($user->subject->subject_name) ? 'Guru ' . $user->subject->subject_name : 'Belum Terdaftar' }}
                    </p>
                </div>

                <!-- Info Cards -->
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Personal Information -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-lg font-semibold
                            {{ 
                                $user->acceptance_status == 'Diverifikasi' 
                                    ? 'text-green-600' 
                                    : ($user->acceptance_status == 'Dalam Proses' 
                                        ? 'text-yellow-600' 
                                        : 'text-red-600')
                            }}
                            text-blue-600 mb-4">Informasi Pribadi</h4>
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
                            <h4 class="text-lg font-semibold {{ 
                                $user->acceptance_status == 'Diverifikasi' 
                                    ? 'text-green-600' 
                                    : ($user->acceptance_status == 'Dalam Proses' 
                                        ? 'text-yellow-600' 
                                        : 'text-red-600')
                            }} mb-4">Detail Informasi</h4>
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
                            <h4 class="text-lg font-semibold {{ 
                                $user->acceptance_status == 'Diverifikasi' 
                                    ? 'text-green-600' 
                                    : ($user->acceptance_status == 'Dalam Proses' 
                                        ? 'text-yellow-600' 
                                        : 'text-red-600')
                            }} mb-4">Alamat</h4>
                            <p class="text-gray-700">{{ $user->address ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="border-t bg-gray-50 px-6 py-3">
                    <div class="flex justify-between items-center">
                        <a href="{{ route('verifikasi_data') }}" class="inline-flex items-center px-4 py-2 {{ 
                                $user->acceptance_status == 'Diverifikasi' 
                                    ? 'bg-green-500 hover:bg-green-600' 
                                    : ($user->acceptance_status == 'Dalam Proses' 
                                        ? 'bg-yellow-500 hover:bg-yellow-600' 
                                        : 'bg-red-500 hover:bg-red-600')
                            }}  text-white rounded-lg transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali
                        </a>
                        <div class="">
                            @if ($user->acceptance_status == 'Dalam Proses')
                                <form method="POST" action="{{ route('verifikasi_data.store_denied', $user->id ) }}" class="inline-flex">
                                    @csrf
                                    <button onclick="return confirm('Apakah Anda yakin ingin menolak ajuan data ini?')" class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition duration-150 ease-in-out">
                                        <!-- X Icon for Tolak -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                        Tolak
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('verifikasi_data.store_accepted', $user->id) }}" class="inline-flex">
                                    @csrf
                                    @method('PUT')
                                    <button onclick="return confirm('Apakah Anda yakin ingin menerima ajuan data ini?')" class="inline-flex items-center px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition duration-150 ease-in-out">
                                        <!-- Check Icon for Terima -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        Terima
                                    </button> 
                                </form>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
