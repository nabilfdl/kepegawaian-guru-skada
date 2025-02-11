<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ulang Tahun Pegawai') }}
        </h2>
    </x-slot>
    
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Card Header dengan Background -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4 text-white">
                    <div class="flex justify-between items-center">
                        <!-- Search Bar yang Lebih Menarik -->
                        <form action="{{ route('ulang-tahun') }}" method="GET" class="flex items-center">
                            <div class="relative">
                                <input type="text" name="search" placeholder="Cari pegawai..." value="{{ request('search') }}" 
                                    class="w-64 pl-10 pr-4 py-2 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <div class="absolute left-3 top-2.5 text-gray-400">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tabel dengan Desain yang Lebih Modern -->
                <div class="overflow-x-auto p-4">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-gray-700">
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-200">No</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-200">Nama Pegawai</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-200">Tanggal Lahir</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                    <td class="px-4 py-3 text-sm text-gray-600 dark:text-gray-200">{{ $user->nip }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-600 dark:text-gray-200">{{ $user->name }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-600 dark:text-gray-200">{{ $user->birth_date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4 flex justify-between items-center">
                    <span id="info-pagination" class="text-sm text-semibold"></span>
                    <div>
                        <button id="prev-btn" class="border border-gray-500 rounded-md px-3 py-2 text-gray-900 hover:bg-gray-200">Sebelumnya</button>
                        <button id="next-btn" class="border border-gray-500 rounded-md px-3 py-2 text-gray-900 hover:bg-gray-200">Berikutnya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan CSS untuk tooltip -->
    <style>
        .tooltip {
            position: relative;
        }
        .tooltip:hover::after {
            content: attr(title);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            padding: 4px 8px;
            background-color: rgba(0,0,0,0.8);
            color: white;
            font-size: 12px;
            border-radius: 4px;
            white-space: nowrap;
            z-index: 10;
        }
    </style>

    <!-- JavaScript for Pagination -->
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
</x-app-layout>