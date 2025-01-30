<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah akun') }}
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
                <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Tambah Guru</h3>
                
                <form action="{{ route('data_guru.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700">NIP</label>
                            <input type="number" name="nip" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-gray-700">Nama Lengkap</label>
                            <input type="text" name="full_name" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-gray-700">Agama</label>
                            <select name="agama" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Katolik">Katolik</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-gray-700">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-gray-700">Posisi</label>
                            <select name="posisi" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="">Pilih Posisi</option>
                                <option value="admin">Admin</option>
                                <option value="operator">Operator</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Status Perkawinan</label>
                            <select name="status_perkawinan" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="">Pilih Status</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Cerai">Cerai</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Alamat</label>
                            <input type="text" name="alamat" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-gray-700">Mata Pelajaran</label>
                            <input type="text" name="mata_pelajaran" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-gray-700">Status</label>
                            <select name="status" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="">Pilih Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-between">
                        <a href="{{ route('data_guru.index') }}" class="bg-red-800 text-white px-6 py-2 rounded-lg hover:bg-red-900 transition">
                            Cancel
                        </a>
                        <button type="submit" class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
