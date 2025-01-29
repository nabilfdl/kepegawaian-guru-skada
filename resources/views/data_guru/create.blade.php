<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah akun') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Menambahkan akun untuk User ataupun Operator</h3>
                
                <form action="#" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700">Full Name</label>
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
                            <label class="block text-gray-700">Tempat dan Tanggal Lahir</label>
                            <input type="text" name="ttl" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label class="block text-gray-700">Posisi</label>
                            <select name="posisi" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="">Pilih Posisi</option>
                                <option value="Admin">Admin</option>
                                <option value="Operator">Operator</option>
                                <option value="User">User</option>
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
                    
                    <div class="mt-6 text-center">
                        <button type="submit" class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
