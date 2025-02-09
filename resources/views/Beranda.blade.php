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
    <div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white shadow-lg rounded-lg p-6 transform hover:scale-102 transition-transform duration-200">
        <div class="flex items-center gap-3">
            <span class="text-3xl animate-bounce">🎉</span>
            <h2 class="text-xl font-bold bg-gradient-to-r from-yellow-400 to-yellow-200 text-transparent bg-clip-text">Yang Sedang Berulang Tahun</h2>
        </div>
        <p class="mt-3 text-gray-200">Selamat Ulang Tahun kepada <span class="font-bold text-yellow-400">Nabilul</span> yang ke-18 Tahun! 🎂</p>
        <div class="flex justify-between items-center mt-4">
            <button class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-black px-6 py-2 rounded-full hover:from-yellow-500 hover:to-yellow-600 transform hover:scale-105 transition-all duration-200 font-semibold">
                🎊 Tekan untuk Merayakan 🎊
            </button>
            <a href="/UlangTahun" class="text-yellow-400 hover:text-yellow-300 transition-colors duration-200 flex items-center gap-2">
                lihat selengkapnya 
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
    <!-- End Notifikasi Ulang Tahun -->
    <!-- Biodata Guru -->
    <div class="bg-white shadow-xl rounded-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
        <div class="p-6">
            <div class="flex flex-col lg:flex-row lg:items-center gap-8">
                <!-- Foto dan NIP -->
                <div class="flex flex-col items-center">
                    <div class="relative group">
                        <img class="h-48 w-40 rounded-lg object-cover shadow-md group-hover:shadow-xl transition-all duration-300" 
                             src="https://via.placeholder.com/200x240" alt="Foto Guru" />
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 rounded-lg"></div>
                    </div>
                    <div class="mt-4 px-4 py-2 bg-gray-100 rounded-full shadow-inner">
                        <span class="text-gray-500 text-sm font-medium">NIP: </span>
                        <span class="text-gray-800 font-bold">123456789012345</span>
                    </div>
                </div>

                <div class="h-auto w-px bg-gradient-to-b from-gray-200 via-gray-400 to-gray-200"></div>

                <!-- Biodata Guru -->
                <div class="flex-1">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 pb-2 border-b-2 border-gray-500 inline-block">
                        Profil Saya
                    </h2>
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
    </div>

    

    <!-- Kartu Statistik Guru -->
    <div class="bg-gradient-to-br from-gray-100 to-gray-200 shadow-lg rounded-lg p-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Statistik Guru</h2>
        </div>

        <div class="grid grid-cols-1 gap-6">
            <div class="bg-white shadow-lg rounded-lg p-6 text-center transform hover:scale-102 transition-transform duration-200">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Jumlah Guru</h2>
                <p class="text-4xl font-bold text-blue-600">150</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white shadow-lg rounded-lg p-6 text-center transform hover:scale-102 transition-transform duration-200">
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

                <!-- Jenis Kelamin -->
                <div class="bg-white shadow-lg rounded-lg p-6 text-center transform hover:scale-102 transition-transform duration-200">
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
                <div class="bg-white shadow-lg rounded-lg p-6 text-center transform hover:scale-102 transition-transform duration-200">
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
</div>

<!-- End Kartu guru -->
 <!-- footers -->
 <footer class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-8 mt-10">
    <div class="container mx-auto px-4 text-center">
        <p class="text-lg font-semibold">© 2025 SMKN 2 SIGMA SIGMA BOI.</p>
        <p class="text-base mt-3">
            Dibuat dengan <span class="text-red-500 animate-pulse">❤️</span> oleh 
            <span class="font-bold text-blue-400">Nabmiao</span>
        </p>
        <div class="mt-4">
            <a href="https://yourwebsite.com" class="text-blue-400 hover:text-blue-300 transition-colors duration-200 underline">
                Tim Developer
            </a>
        </div>
    </div>
</footer>

<!-- End Footers -->
</body>

</html>