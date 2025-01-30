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
  <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
<div class="min-h-full">
  <x-Navbar></x-Navbar>

  <x-header> Beranda </x-header>
  <main>

      
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
          
          <!-- Beranda biodata -->
          
          <div class="w-full max-w-7xl px-4 py-6 sm:px-6 lg:px-8 space-y-6">
      <!-- Notifikasi Ulang Tahun -->
    <div class="bg-gray-900 text-white shadow rounded-lg p-5">
        <div class="flex items-center gap-3">
            <span class="text-2xl">🎉</span>
            <h2 class="text-lg font-semibold">Yang Sedang Berulang Tahun</h2>
        </div>
        <p class="mt-2">Selamat Ulang Tahun kepada <span class="font-bold">Nabilul</span> yang ke-18 Tahun! 🎂</p>
        <div class="flex justify-between items-center mt-4">
            <button class="bg-yellow-500 text-black px-4 py-2 rounded-lg hover:bg-yellow-600">
                🎊 Tekan untuk Merayakan 🎊
            </button>
            <a href="/UlangTahun" class="text-yellow-500 hover:underline ml-4">lihat selengkapnya →</a>
        </div>
    </div>
    <!-- End Notifikasi Ulang Tahun -->
    <!-- Biodata Guru -->
    <div class="bg-white shadow rounded-lg p-6">
      <div class="flex flex-col lg:flex-row lg:items-center gap-6">
        <!-- Foto dan NIP -->
        <div class="flex flex-col items-center">
    <img class="h-48 w-40 rounded border border-gray-300" src="https://via.placeholder.com/200x240" alt="Foto Guru" />
    <div class="mt-4 text-gray-500 text-sm font-semibold text-center">
        NIP: <span class="text-gray-800">123456789012345</span>
    </div>
</div>


        <div class="h-auto w-px bg-gray-500 mx-15"></div>

        <!-- Biodata Guru -->
        <div>
        <h2 class="text-2xl font-semibold text-gray-800 mb-4 lg:text-left border-b-2 border-gray-500 pb-2">Profil Saya </h2>
          <ul class="text-gray-900">
            <li class="flex flex-wrap"><span class="w-48 font-semibold">Nama</span><span class="mr-2">:</span><span>Nokia</span></li>
            <li class="flex flex-wrap"><span class="w-48 font-semibold">Tempat/ Tanggal Lahir</span><span class="mr-2">:</span><span>16-08-1945</span></li>
            <li class="flex flex-wrap"><span class="w-48 font-semibold">Jenis Kelamin</span><span class="mr-2">:</span><span>Laki-laki</span></li>
            <li class="flex flex-wrap grid grid-cols-[184px_3px_1fr] items-start gap-2">
              <span class="font-semibold">Alamat</span><span>:</span>
              <span class="break-words">Jl. Di. Panjaitan, Strat 1, Kelurahan. Gunung Samarinda, Kecamatan Balikpapan Utara, Kota Balikpapan, Kalimantan Timur 76125 </span></li>
            <li class="flex flex-wrap"><span class="w-48 font-semibold">Agama</span><span class="mr-2">:</span><span>Smartphone</span></li>
            <li class="flex flex-wrap"><span class="w-48 font-semibold">Golongan</span><span class="mr-2">:</span><span>PNS</span></li>
            <li class="flex flex-wrap"><span class="w-48 font-semibold">Status Perkawinan</span><span class="mr-2">:</span><span>Belum Menikah</span></li>
            <li class="flex flex-wrap"><span class="w-48 font-semibold">Mata Pelajaran</span><span class="mr-2">:</span><span>Rekayasa Perangkat Lunak</span></li>
            <li class="flex flex-wrap"><span class="w-48 font-semibold">Status</span><span class="mr-2">:</span><span>Aktif</span></li>
          </ul>
        </div>
      </div>
    </div>

    

    <!-- Kartu Statistik Guru -->
    <div class="bg-gray-200 shadow rounded-lg p-6">
    <!-- Judul & Link -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold text-gray-700 ">Statistik Guru</h2>
    </div>

    <!-- Grid Card -->
    <div class="grid grid-cols-1 sm:grid-cols-1 gap-9">
    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
        <h2 class="text-lg font-semibold text-gray-900">Jumlah Guru</h2>
        <p class="text-2xl font-bold text-gray-900 my-2">150</p>
    </div>

    <div class="grid grid-cols-3 sm:grid-cols-3 gap-9">
    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
        <h2 class="text-lg font-semibold text-gray-700">Golongan</h2>
        <div class="flex justify-between items-center my-2">
            <span class="text-gray-900">PNS</span>
            <div class="flex items-center">
                <span class="font-bold text-gray-900">50%</span>
                <div class="w-24 h-2 bg-green-500 ml-2" style="width: 50%;"></div>
            </div>
        </div>
        <div class="flex justify-between items-center my-2">
            <span class="text-gray-900">Honorer</span>
            <div class="flex items-center">
                <span class="font-bold text-gray-900">30%</span>
                <div class="w-24 h-2 bg-yellow-500 ml-2" style="width: 30%;"></div>
            </div>
        </div>
        <div class="flex justify-between items-center my-2">
            <span class="text-gray-900">P3K</span>
            <div class="flex items-center">
                <span class="font-bold text-gray-900">20%</span>
                <div class="w-24 h-2 bg-red-500 ml-2" style="width: 20%;"></div>
            </div>
        </div>
    </div>

<!-- END GRID CARD  -->
   
<!-- Jenis Kelamin -->
    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
        <h2 class="text-lg font-semibold text-gray-700">Jenis Kelamin</h2>
        <div class="flex justify-between items-center my-2">
            <span class="text-gray-900">Laki-laki</span>
            <div class="flex items-center">
                <span class="font-bold text-gray-900">60%</span>
                <div class="w-24 h-2 bg-blue-500 ml-2" style="width: 60%;"></div>
            </div>
        </div>
        <div class="flex justify-between items-center my-2">
            <span class="text-gray-900">Perempuan</span>
            <div class="flex items-center">
                <span class="font-bold text-gray-900">40%</span>
                <div class="w-24 h-2 bg-pink-500 ml-2" style="width: 40%;"></div>
            </div>
        </div>
    </div>

    <!-- Status -->
    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
        <h2 class="text-lg font-semibold text-gray-700">Status</h2>
        <div class="flex justify-between items-center my-2">
            <span class="text-gray-900">Aktif</span>
            <div class="flex items-center">
                <span class="font-bold text-gray-900">70%</span>
                <div class="w-24 h-2 bg-green-600 ml-2" style="width: 70%;"></div>
            </div>
        </div>
        <div class="flex justify-between items-center my-2">
            <span class="text-gray-900">Purna Tugas</span>
            <div class="flex items-center">
                <span class="font-bold text-gray-900">30%</span>
                <div class="w-24 h-2 bg-orange-500 ml-2" style="width: 30%;"></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

<!-- End Kartu guru -->
 <!-- footers -->
 <footer class="bg-gray-800 text-white py-6 mt-10">
    <div class="container mx-auto px-4 text-center">
        <p class="text-sm">© 2025 SMKN 2 SIGMA SIGMA BOI.</p>
        <p class="text-sm mt-2">
            Dibuat dengan ❤️ oleh Nabmiao
            <a href="https://yourwebsite.com" class="text-blue-400 hover:underline">Tim Developer</a>
        </p>
        </div>
    </div>
</footer>

<!-- End Footers -->
</body>

</html>