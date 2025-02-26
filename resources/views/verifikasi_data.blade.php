<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Verifikasi') }}
    </h2>
  </x-slot>

  <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="overflow-hidden shadow-xl sm:rounded-lg">
        <main class="flex justify-center mt-10">
          <div class="max-w-4xl w-full bg-white text-black p-6 rounded-lg shadow-lg">
            
            <!-- Navigasi -->
            <div class="flex justify-start space-x-3 mb-6">
              <button class="tab-link bg-yellow-500 text-black font-semibold py-2 px-6 rounded-md text-sm focus:ring focus:ring-yellow-300 active:bg-yellow-600" data-tab="proses">
                Dalam Proses
              </button>
              <button class="tab-link bg-yellow-500 text-black font-semibold py-2 px-6 rounded-md text-sm focus:ring focus:ring-yellow-300 active:bg-yellow-600" data-tab="notif">
                Notif
              </button>
              
            </div>

            <!-- Konten Dalam Proses -->
            <div id="proses" class="tab-content">
              <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Muhammad Nabil</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Request untuk mengubah data lahir</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                  Setujui
                </a>
              </div>
            </div>

            <!-- Konten Notifikasi -->
            <div id="notif" class="tab-content hidden">
              <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Retrieved</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Muhammad Nabil telah terkonfirmasi perubahaan data terbaru</p>
              </div>

                <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 mt-4">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Rejected</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Penolakan perubahan data Deon </p>
              </div>
            </div>

          </div>
        </main>
      </div>
    </div>
  </div>

  <script>
  document.addEventListener("DOMContentLoaded", function () {
  const tabs = document.querySelectorAll(".tab-link");
  const contents = document.querySelectorAll(".tab-content");

  tabs.forEach(tab => {
    tab.addEventListener("click", function () {
      const tabName = this.getAttribute("data-tab");

      // Hapus semua class active dari tombol
      tabs.forEach(t => t.classList.remove("bg-yellow-600"));
      this.classList.add("bg-yellow-600");

      // Sembunyikan semua konten
      contents.forEach(content => content.classList.add("hidden"));

      // Tampilkan yang sesuai
      document.getElementById(tabName).classList.remove("hidden");
    });
  });
});

  </script>

</x-app-layout>
