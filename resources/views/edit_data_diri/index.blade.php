<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Form Edit Data') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Edit Data Diri</h3>
                
                <div class="max-w-4xl mx-auto mt-5">
                    <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div x-data="{ tab: localStorage.getItem('activeTab') || 'edit' }"
                             x-init="$watch('tab', value => localStorage.setItem('activeTab', value))"
                             class="p-6 bg-white rounded-lg shadow-lg">

                            <!-- Navigasi -->
                            <div class="flex justify-center space-x-3 mb-4">
                                <button @click="tab = 'edit'" 
                                        :class="tab === 'edit' ? 'bg-blue-300 text-Black' : 'bg-gray-500 text-black'"
                                        class="font-semibold py-2 px-6 rounded-md text-sm">
                                    Edit
                                </button>

                                <button @click="tab = 'dalam-proses'" 
                                        :class="tab === 'dalam-proses' ? 'bg-yellow-300 text-black' : 'bg-gray-500 text-black'"
                                        class="font-semibold py-2 px-6 rounded-md text-sm">
                                    Dalam Proses
                                </button>

                                <button @click="tab = 'tanggapan'" 
                                        :class="tab === 'tanggapan' ? 'bg-green-700 text-black' : 'bg-gray-500 text-black'"
                                        class="font-semibold py-2 px-6 rounded-md text-sm">
                                    Tanggapan
                                </button>
                            </div>

                            <!-- Konten Berdasarkan Tab yang Dipilih -->
                            <div>

                                <!-- ✨ Form Edit Data -->
                                <div x-show="tab === 'edit'" class="p-4 bg-gray-100 rounded-lg">
                                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                                        
                                        @if ($pending_edit_data->isNotEmpty())
                                            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4" role="alert">
                                                <strong class="font-bold">Perubahan Data Anda Sedang Diproses!</strong>
                                                <span class="block sm:inline">Mohon tunggu hingga proses selesai.</span>
                                            </div>
                                        @else
                                            @if (session('success'))
                                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                                                    <strong class="font-bold">Berhasil!</strong>
                                                    <span class="block sm:inline">{{ session('success') }}</span>
                                                </div>                                            
                                            @endif
                                            @if ($errors->any())
                                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                                    <strong class="font-bold">Terjadi Kesalahan!</strong>
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <form action="{{ route('edit_data_diri.store_edit') }}" method="POST">
                                                @csrf
                                                <div class="grid grid-cols-2 gap-6">
                                                    <div>
                                                        <label class="block text-gray-700">Nama Lengkap</label>
                                                        <input type="text" name="name" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('name', Auth::user()->name) }}" required>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Email</label>
                                                        <input type="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('email', Auth::user()->email) }}" required>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Nomor Telepon</label>
                                                        <input type="text" name="phone" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('phone', Auth::user()->phone) }}" required>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Jenis Kelamin</label>
                                                        <select name="sex" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                                            <option value="">Pilih Jenis Kelamin</option>
                                                            <option value="Laki-Laki" {{ old('sex') == "Laki-Laki" || Auth::user()->sex == "Laki-Laki" ? 'selected' : '' }}>Laki-Laki</option>
                                                            <option value="Perempuan" {{ old('sex') == "Perempuan" || Auth::user()->sex == "Perempuan" ? 'selected' : '' }}>Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Agama</label>
                                                        <select name="religion" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                                            <option value="">Pilih Agama</option>
                                                            <option value="Islam" {{ old('religion') == "Islam" || Auth::user()->religion == "Islam" ? 'selected' : '' }}>Islam</option>
                                                            <option value="Protestan" {{ old('religion') == "Protestan" || Auth::user()->religion == "Protestan" ? 'selected' : '' }}>Kristen Protestan</option>
                                                            <option value="Katolik" {{ old('religion') == "Katolik" || Auth::user()->religion == "Katolik" ? 'selected' : '' }}>Kristen Katolik</option>
                                                            <option value="Hindu" {{ old('religion') == "Hindu" || Auth::user()->religion == "Hindu" ? 'selected' : '' }}>Hindu</option>
                                                            <option value="Buddha" {{ old('religion') == "Buddha" || Auth::user()->religion == "Buddha" ? 'selected' : '' }}>Buddha</option>
                                                            <option value="Konghucu" {{ old('religion') == "Konghucu" || Auth::user()->religion == "Konghucu" ? 'selected' : '' }}>Konghucu</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Tempat Lahir</label>
                                                        <input type="text" name="birth_place" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('birth_place', Auth::user()->birth_place) }}" required>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Tanggal Lahir</label>
                                                        <input type="date" name="birth_date" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('birth_date', Auth::user()->birth_date) }}" required>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Status Perkawinan</label>
                                                        <select name="marital_status" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                                            <option value="">Pilih Status</option>
                                                            <option value="Belum Kawin" {{ old('marital_status') == "Belum Kawin" || Auth::user()->marital_status == "Belum Kawin" ? 'selected' : '' }}>Belum Kawin</option>
                                                            <option value="Kawin" {{ old('marital_status') == "Kawin" || Auth::user()->marital_status == "Kawin" ? 'selected' : '' }}>Kawin</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Alamat</label>
                                                        <input type="text" name="address" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('address', Auth::user()->address) }}" required>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Mata Pelajaran</label>
                                                        <select name="subject_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                                            <option value="">Pilih Mata Pelajaran</option>
                                                            @foreach ($subjects as $subject)
                                                                <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id || Auth::user()->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->subject_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Status</label>
                                                        <select name="status" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                                            <option value="">Pilih Status</option>
                                                            <option value="Aktif" {{ old('status') == "Aktif" || Auth::user()->status == "Aktif" ? 'selected' : '' }}>Aktif</option>
                                                            <option value="Purna Tugas" {{ old('status') == "Purna Tugas" || Auth::user()->status == "Purna Tugas" ? 'selected' : '' }}>Purna Tugas</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="mt-6 flex justify-between">
                                                    <a href="{{ route('dashboard') }}" class="bg-red-800 text-white px-6 py-2 rounded-lg hover:bg-red-900 transition">
                                                        Cancel
                                                    </a>
                                                    <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
                                                        Ajukan Perubahan
                                                    </button>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>

                                <!-- ✨ Konten Dalam Proses -->
                                <div x-show="tab === 'dalam-proses'" class="p-4 bg-gray-100 rounded-lg">
                                    <!-- Card Contoh Data -->

                                    <div class="space-y-4">
                                        @if ($pending_edit_data->isEmpty())
                                            <p class="text-center text-gray-700">Tidak ada perubahan data yang sedang diproses</p>
                                        @else
                                            @foreach ($pending_edit_data as $ped)
                                            <!-- Card 1 -->
                                            <div class="bg-white p-4 rounded-lg shadow-md">
                                                <p class="font-semibold text-gray-900">NIP: {{ $ped->nip }}</p>
                                                <p class="text-sm text-gray-700">Nama: <span class="font-semibold">{{ $ped->name }}</span></p>
                                                <p class="text-sm text-gray-700">Data yang ingin diganti: Alamat</p>
                                                <a href="{{ route('edit_data_diri.show', $ped->id) }}" class="text-sm text-gray-900">
                                                    Lihat Detail &#8658;
                                                </a>
                                            </div>    
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <!-- ✨ Konten Tanggapan -->
                                <div x-show="tab === 'tanggapan'" class="p-4 bg-gray-100 rounded-lg">
                                    <!-- Card Contoh Data -->
                                    <div class="space-y-4">
                                        @if ($acceptance_edit_data->isEmpty())
                                        <p class="text-center text-gray-700">Belum ada tanggapan</p>
                                        @else
                                            @foreach ($acceptance_edit_data as $aed)
                                            <!-- Card 1 -->
                                            <div class="bg-white p-4 rounded-lg shadow-md">
                                                <p class="font-semibold text-gray-900">NIP: {{ $aed->nip }}</p>
                                                <p class="text-sm text-gray-700">Nama: <span class="font-semibold">{{ $aed->name }}</span></p>
                                                <p class="text-sm text-gray-700">Data yang ingin diganti: Alamat</p>
                                                <p class="text-sm text-gray-700">Keterangan: <span class="{{ $aed->acceptance_status == 'Diverifikasi' ? 'text-green-600' : 'text-red-600' }} font-semibold">{{ $aed->acceptance_status }}</span></p>
                                                <a href="{{ route('edit_data_diri.show', $aed->id) }}" class="text-sm text-gray-900">
                                                    Lihat Detail &#8658;
                                                </a>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>