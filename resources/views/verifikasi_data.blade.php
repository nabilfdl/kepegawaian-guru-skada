<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Verifikasi') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Your content goes here -->
                <main class="flex justify-center mt-10">
                    <div class="max-w-4xl w-full bg-white text-black p-6 rounded-lg shadow-lg">
                      <!-- Navigasi -->
                      <div class="flex justify-center space-x-3 mb-6">
                        <a href="/Ganti-Data" class="bg-blue-500 text-white font-semibold py-2 px-6 rounded-md hover:bg-blue-600 text-sm">Edit</a>
                        <a href="/dalam-proses" class="bg-yellow-500 text-black font-semibold py-2 px-6 rounded-md hover:bg-yellow-600 text-sm">Dalam Proses</a>
                        <a href="/tanggapan" class="bg-green-500 text-white font-semibold py-2 px-6 rounded-md hover:bg-green-600 text-sm">Tanggapan</a>
                      </div>
                  
                      <!-- Form -->
                      <form action="/update-data" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                          <!-- Nama -->
                          <div>
                            <label for="nama" class="font-semibold text-sm">Nama</label>
                            <input type="text" id="nama" name="nama" class="w-full border bg-gray-200 text-black p-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                          </div>
                          <!-- Tempat/Tanggal Lahir -->
                          <div>
                            <label for="tanggal_lahir" class="font-semibold text-sm">Tempat/Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="w-full border bg-gray-200 text-black p-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                          </div>
                          <!-- Jenis Kelamin -->
                          <div>
                            <label for="jenis_kelamin" class="font-semibold text-sm">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="w-full border bg-gray-200 text-black p-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                              <option value="Laki-laki">Laki-laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
                          </div>
                          <!-- Agama -->
                          <div>
                            <label for="agama" class="font-semibold text-sm">Agama</label>
                            <input type="text" id="agama" name="agama" class="w-full border bg-gray-200 text-black p-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                          </div>
                          <!-- Alamat -->
                          <div class="sm:col-span-2">
                            <label for="alamat" class="font-semibold text-sm">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="w-full border bg-gray-200 text-black p-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                          </div>
                          <!-- Golongan -->
                          <div>
                            <label for="golongan" class="font-semibold text-sm">Golongan</label>
                            <input type="text" id="golongan" name="golongan" class="w-full border bg-gray-200 text-black p-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                          </div>
                          <!-- Status Perkawinan -->
                          <div>
                            <label for="status_perkawinan" class="font-semibold text-sm">Status Perkawinan</label>
                            <input type="text" id="status_perkawinan" name="status_perkawinan" class="w-full border bg-gray-200 text-black p-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                          </div>
                          <!-- Mata Pelajaran -->
                          <div>
                            <label for="mata_pelajaran" class="font-semibold text-sm">Mata Pelajaran</label>
                            <input type="text" id="mata_pelajaran" name="mata_pelajaran" class="w-full border bg-gray-200 text-black p-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                          </div>
                          <!-- Status -->
                          <div>
                            <label for="status" class="font-semibold text-sm">Status</label>
                            <input type="text" id="status" name="status" class="w-full border bg-gray-200 text-black p-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                          </div>
                        </div>
                  
                        <!-- Submit Button -->
                        <div class="flex justify-end mt-4">
                          <button type="submit" class="bg-purple-500 text-white font-semibold py-2 px-6 rounded-md hover:bg-purple-600 transition-colors duration-300 text-sm">
                            Simpan Perubahan
                          </button>
                        </div>
                      </form>
                    </div>
                  </main>
                  
            </div>
        </div>
    </div>
</x-app-layout>