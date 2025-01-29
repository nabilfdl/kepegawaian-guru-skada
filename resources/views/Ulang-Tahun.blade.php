<!DOCTYPE html >
<html lang="en" class="h-full bg-gray-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <title>Ulang Tahun Pegawai</title>
  <script>
        document.addEventListener("DOMContentLoaded", function () {
            const dataPegawai = [
                { no: 1, nama: "Nabilul", tanggal: "10-01-2020" },
                { no: 2, nama: "Siti Aisyah", tanggal: "20-01-1985" },
                { no: 3, nama: "Budi Santoso", tanggal: "25-01-1990" },
                { no: 4, nama: "Dewi Lestari", tanggal: "10-01-1988" },
                { no: 5, nama: "Andi Prasetyo", tanggal: "15-01-1992" },
                { no: 6, nama: "Rina Sari", tanggal: "22-01-1980" },
                { no: 7, nama: "Joko Widodo", tanggal: "30-01-1975" },
                { no: 8, nama: "Siti Fatimah", tanggal: "28-01-1995" },
                { no: 9, nama: "Rudi Hartono", tanggal: "12-01-1983" },
                { no: 10, nama: "Lina Marlina", tanggal: "05-01-1991" },
                { no: 11, nama: "Rahmat Hidayat", tanggal: "02-01-1985" },
                { no: 12, nama: "Dian Permata", tanggal: "17-01-1993" },
                { no: 13, nama: "Hendra Saputra", tanggal: "19-01-1987" },
                { no: 14, nama: "Lisa Maharani", tanggal: "23-01-1990" },
                { no: 15, nama: "Bambang Susilo", tanggal: "27-01-1978" },
                { no: 16, nama: "Yuni Astuti", tanggal: "01-01-1994" },
                { no: 17, nama: "Fajar Prasetya", tanggal: "11-01-1982" },
                { no: 18, nama: "Sari Indah", tanggal: "13-01-1989" },
                { no: 19, nama: "Agus Widodo", tanggal: "21-01-1981" },
                { no: 20, nama: "Rizky Amelia", tanggal: "25-01-1996" }
            ];

            let currentPage = 1;
            const rowsPerPage = 10;
            const tableBody = document.getElementById("pegawai-body");
            const infoText = document.getElementById("info-pagination");

            function renderTable() {
                tableBody.innerHTML = "";
                const start = (currentPage - 1) * rowsPerPage;
                const end = start + rowsPerPage;
                const paginatedData = dataPegawai.slice(start, end);

                paginatedData.forEach((pegawai) => {
                    const row = `<tr>
                                    <td class="py-2 px-4 border-b">${pegawai.no}</td>
                                    <td class="py-2 px-4 border-b">${pegawai.nama}</td>
                                    <td class="py-2 px-4 border-b">${pegawai.tanggal}</td>
                                </tr>`;
                    tableBody.innerHTML += row;
                });

                infoText.textContent = `Menampilkan ${start + 1}-${Math.min(end, dataPegawai.length)} dari ${dataPegawai.length} pegawai`;
            }

            document.getElementById("prev-btn").addEventListener("click", function () {
                if (currentPage > 1) {
                    currentPage--;
                    renderTable();
                }
            });

            document.getElementById("next-btn").addEventListener("click", function () {
                if (currentPage < Math.ceil(dataPegawai.length / rowsPerPage)) {
                    currentPage++;
                    renderTable();
                }
            });

            renderTable();
        });
    </script>
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
<x-Navbar> </x-Navbar>

<x-header> Table Ulang Tahun </x-header>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 mb-4 text-center">Pegawai Yang Berulang Tahun Bulan Ini</h1>
        <br>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                    <th class="py-2 px-4 border-b text-left bg-yellow-400 text-semibold">No</th>
                    <th class="py-2 px-4 border-b text-left bg-yellow-400 text-semibold">Nama Pegawai</th>
                    <th class="py-2 px-4 border-b text-left bg-yellow-400 text-semibold">Tanggal Lahir</th>
                    </tr>
                </thead>
                <tbody id="pegawai-body"></tbody>
            </table>
        </div>

        <div class="mt-4 flex justify-between items-center">
            <span id="info-pagination" class="text-sm text-semibold"></span>
            <div>
                <button id="prev-btn" class="border border-gray-500 rounded-md px-3 py-2 text-gray-900 hover:bg-gray-200">Sebelumnya</button>
                <button id="next-btn" class="border border-gray-500 rounded-md px-3 py-2 text-gray-900 hover:bg-gray-200">Berikutnya</button>
            </div>
        </div>
    </div>

    <!-- footers -->
    <footer class="bg-gray-800 text-white py-6 mt-10">
    <div class="container mx-auto px-4 text-center">
        <p class="text-sm">© 2025 SMKN 2 SIGMA SIGMA BOI.</p>
        <p class="text-sm mt-2">
            Dibuat dengan ❤️ oleh Nabmiao
            <a href="https://yourwebsite.com" class="text-blue-400 hover:underline">Tim Developer</a>
        </p>
        <div class="flex justify-center space-x-4 mt-4">
            <a href="#" class="text-gray-400 hover:text-white">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </div>
    </div>
</footer>

<!-- Footers -->

</body>

</html>