<!DOCTYPE html >
<html lang="en" class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <title>User</title>
</head>
<body>
<div class="min-h-full">
<x-Navbar></x-Navbar>

<x-header> Form Edit Data </x-header>
  <main>
    <!--  -->
    <div class="max-w-4xl mx-auto mt-5">
      <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
      <!-- Wrapper -->
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
        <form action="/update-data" method="POST" class="space-y-4">
          @csrf
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Nama -->
            <div class="flex flex-col">
              <label for="nama" class="font-semibold mb-1 text-sm">Nama</label>
              <input type="text" id="nama" name="nama" value="Nokia" class="border p-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Tempat/Tanggal Lahir -->
            <div class="flex flex-col">
              <label for="tanggal_lahir" class="font-semibold mb-1 text-sm">Tempat/Tanggal Lahir</label>
              <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="1945-08-16" class="border p-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Jenis Kelamin -->
            <div class="flex flex-col">
              <label for="jenis_kelamin" class="font-semibold mb-1 text-sm">Jenis Kelamin</label>
              <select id="jenis_kelamin" name="jenis_kelamin" class="border p-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="Laki-laki" selected>Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>

            <!-- Agama -->
            <div class="flex flex-col">
              <label for="agama" class="font-semibold mb-1 text-sm">Agama</label>
              <input type="text" id="agama" name="agama" value="Smartphone" class="border p-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Alamat -->
            <div class="flex flex-col sm:col-span-2">
              <label for="alamat" class="font-semibold mb-1 text-sm">Alamat</label>
              <input type="text" id="alamat" name="alamat" value="Jl. Di. Panjaitan, Strat 1, Kelurahan. Gunung Samarinda, Kecamatan Kalimantan Utara, Kabupaten Balikpapan Utara" class="border p-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Golongan -->
            <div class="flex flex-col">
              <label for="golongan" class="font-semibold mb-1 text-sm">Golongan</label>
              <input type="text" id="golongan" name="golongan" value="PNS" class="border p-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Status Perkawinan -->
            <div class="flex flex-col">
              <label for="status_perkawinan" class="font-semibold mb-1 text-sm">Status Perkawinan</label>
              <input type="text" id="status_perkawinan" name="status_perkawinan" value="Belum Menikah" class="border p-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Mata Pelajaran -->
            <div class="flex flex-col">
              <label for="mata_pelajaran" class="font-semibold mb-1 text-sm">Mata Pelajaran</label>
              <input type="text" id="mata_pelajaran" name="mata_pelajaran" value="Rekayasa Perangkat Lunak" class="border p-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Status -->
            <div class="flex flex-col">
              <label for="status" class="font-semibold mb-1 text-sm">Status</label>
              <input type="text" id="status" name="status" value="Aktif" class="border p-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
          </div>

          <!-- Submit Button -->
          <div class="flex justify-end mt-4">
            <button type="submit" class="border border-gray-400 text-black font-semibold py-2 px-6 rounded-md hover:bg-purple-400 hover:text-black hover:border-gray-900 transition-colors duration-500 text-sm">
              Simpan Perubahan
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- ✨ Konten Dalam Proses -->
    <div x-show="tab === 'dalam-proses'" class="p-4 bg-gray-100 rounded-lg">

      <!-- Card Contoh Data -->
      <div class="space-y-4">
        <!-- Card 1 -->
        <div class="bg-white p-4 rounded-lg shadow-md">
          <p class="font-semibold text-gray-900">Nomor: 001</p>
          <p class="text-sm text-gray-700">Nama: <span class="font-semibold">Nokia</span></p>
          <p class="text-sm text-gray-700">Data yang ingin diganti: Alamat</p>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-4 rounded-lg shadow-md">
          <p class="font-semibold text-gray-900">Nomor: 002</p>
          <p class="text-sm text-gray-700">Nama: <span class="font-semibold">John Doe</span></p>
          <p class="text-sm text-gray-700">Data yang ingin diganti: Mata Pelajaran</p>
        </div>
      </div>
    </div>

    <!-- END DALAM PROSES -->

    <!-- ✨ Konten Tanggapan -->
    <div x-show="tab === 'tanggapan'" class="p-4 bg-gray-100 rounded-lg">

      <!-- Card Contoh Data -->
      <div class="space-y-4">
        <!-- Card 1 -->
        <div class="bg-white p-4 rounded-lg shadow-md">
          <p class="font-semibold text-gray-900">Nomor: 001</p>
          <p class="text-sm text-gray-700">Nama: <span class="font-semibold">Nokia</span></p>
          <p class="text-sm text-gray-700">Data yang ingin diganti: Alamat</p>
          <p class="text-sm text-gray-700">Keterangan: <span class="text-green-600 font-semibold">DI VERIFIKASI</span></p>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-4 rounded-lg shadow-md">
          <p class="font-semibold text-gray-900">Nomor: 002</p>
          <p class="text-sm text-gray-700">Nama: <span class="font-semibold">John Doe</span></p>
          <p class="text-sm text-gray-700">Data yang ingin diganti: Mata Pelajaran</p>
          <p class="text-sm text-gray-700">Keterangan: <span class="text-red-600 font-semibold">DI TOLAK</span></p>
        </div>

        <!-- Card 3 -->
        <div class="bg-white p-4 rounded-lg shadow-md">
          <p class="font-semibold text-gray-900">Nomor: 003</p>
          <p class="text-sm text-gray-700">Nama: <span class="font-semibold">Jane Smith</span></p>
          <p class="text-sm text-gray-700">Data yang ingin diganti: Golongan</p>
          <p class="text-sm text-gray-700">Keterangan: <span class="text-green-600 font-semibold">DI VERIFIKASI</span></p>
        </div>
      </div>
    </div>

  </div>

</div>

</div>
</div>
</div>
<!-- END TANGGAPAN -->

<!-- footers -->
<footer class="bg-gray-800 text-white py-6 mt-10">
    <div class="container mx-auto px-4 text-center">
        <p class="text-sm">© 2025 SMKN 2 SIGMA SIGMA BOI.</p>
        <p class="text-sm mt-2">
            Dibuat dengan ❤️ oleh Nabmiao
        </p>
        
    </div>
</footer>

<!-- Footers -->

</body>

</html>