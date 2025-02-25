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
                @if ($pending_edit_data->isEmpty())
                    <p class="text-center text-gray-700">Belum ada data yang akan diproses</p>
                @else
                    @foreach ($pending_edit_data as $ped)
                        
                    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $ped->name }}</h5>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Deskripsi perubahan (update selanjutnya) 😂</p>
                      <a href="{{ route('verifikasi_data.show', $ped->id) }}" class="text-sm text-white">
                        Lihat Detail &#8658;
                      </a>
                    </div>
                    @endforeach
                @endif
              </div>
  
              <!-- Konten Notifikasi -->
              <div id="notif" class="tab-content hidden">
                @if ($acceptance_edit_data->isEmpty())
                    <p class="text-center text-gray-700">Belum ada hasil yang diverifikasi</p>
                @else
                  @foreach ($acceptance_edit_data as $aed)
                  <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $aed->acceptance_status }}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $aed->name }}</p>
                    <a href="{{ route('verifikasi_data.show', $aed->id) }}" class="text-sm text-white">
                      Lihat Detail &#8658;
                    </a>
                  </div>
                  @endforeach
                @endif
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
  