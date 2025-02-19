<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Akun') }}
        </h2>
    </x-slot>

    <style>
        /* Menghapus spinner untuk input type="number" */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield; /* Untuk Firefox */
        }
    </style>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Edit Data Guru</h3>
                
                @if ($errors->any())
                    <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('data_guru.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-2 gap-6">
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <div>
                            <label class="block text-gray-700">NIP</label>
                            <input type="number" name="nip" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('nip', $user->nip) }}" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Nama Lengkap</label>
                            <input type="text" name="name" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('name', $user->name) }}" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Email</label>
                            <input type="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('email', $user->email) }}" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Nomor Telepon</label>
                            <input type="text" name="phone" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('phone', $user->phone) }}" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Jenis Kelamin</label>
                            <select name="sex" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki" {{ old('sex') == "Laki-Laki" || $user->sex == "Laki-Laki" ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ old('sex') == "Perempuan" || $user->sex == "Perempuan" ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Agama</label>
                            <select name="religion" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="" >Pilih Agama</option>
                                <option value="Islam" {{ old('religion') == "Islam" || $user->religion == "Islam" ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('religion') == "Kristen" || $user->religion == "Kristen" ? 'selected' : '' }}>Kristen</option>
                                <option value="Katolik" {{ old('religion') == "Katolik" || $user->religion == "Katolik" ? 'selected' : '' }}>Katolik</option>
                                <option value="Hindu" {{ old('religion') == "Hindu" || $user->religion == "Hindu" ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('religion') == "Buddha" || $user->religion == "Buddha" ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu" {{ old('religion') == "Konghucu" || $user->religion == "Konghucu" ? 'selected' : '' }}>Konghucu</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Tempat Lahir</label>
                            <input type="text" name="birth_place" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('birth_place', $user->birth_place) }}" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Tanggal Lahir</label>
                            <input type="date" name="birth_date" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('birth_date', $user->birth_date) }}" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Posisi</label>
                            <select name="role" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih Posisi</option>
                                <option value="Admin" {{ old('role') == "Admin" || $user->role == "Admin" ? 'selected' : '' }}>Admin</option>
                                <option value="Operator" {{ old('role') == "Operator" || $user->role == "Operator" ? 'selected' : '' }}>Operator</option>
                                <option value="User" {{ old('role') == "User" || $user->role == "User" ? 'selected' : '' }}>User</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Status Perkawinan</label>
                            <select name="marital_status" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih Status</option>
                                <option value="Belum Kawin" {{ old('marital_status') == "Belum Kawin" || $user->marital_status == "Belum Kawin" ? 'selected' : '' }}>Belum Kawin</option>
                                <option value="Kawin" {{ old('marital_status') == "Kawin" || $user->marital_status == "Kawin" ? 'selected' : '' }}>Kawin</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Alamat</label>
                            <input type="text" name="address" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('address', $user->address) }}" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Mata Pelajaran</label>
                            <select name="subject_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id || $user->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->subject_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Status</label>
                            <select name="status" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih Status</option>
                                <option value="Aktif" {{ old('status') == "Aktif" || $user->status == "Aktif" ? 'selected' : '' }}>Aktif</option>
                                <option value="Purna Tugas" {{ old('status') == "Purna Tugas" || $user->status == "Purna Tugas" ? 'selected' : '' }}>Purna Tugas</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Password</label>
                            <input type="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                            <small class="text-gray-500">Kosongkan jika tidak ingin mengubah password</small>
                        </div>
                    </div>
                </div>
                    
                    <div class="mt-6 flex justify-between">
                        <a href="{{ route('data_guru.index') }}" class="bg-red-800 text-white px-6 py-2 rounded-lg hover:bg-red-900 transition">
                            Cancel
                        </a>
                        <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
                            Edit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
