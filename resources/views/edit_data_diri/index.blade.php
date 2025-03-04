<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Form Edit Data') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Edit Data Diri</h3>
                
                <div class="max-w-4xl mx-auto mt-5">
                    <div class="bg-gray-800 p-5 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div x-data="{ tab: localStorage.getItem('activeTab') || 'edit', imageUrl: '' }"
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
                                <div x-init="init()" x-show="tab === 'edit'" class="p-4 bg-gray-100 rounded-lg">
                                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                                        
                                        @if ($pending_edit_data->isNotEmpty())
                                            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4" role="alert">
                                                <strong class="font-bold">Perubahan Data Anda Sedang Diproses!</strong>
                                                <span class="block sm:inline">Mohon tunggu hingga proses selesai.</span>
                                            </div>
                                        @else
                                            @if (session('success'))
                                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                                                    <strong class="font-bold">Berhasil!</strong>
                                                    <span class="block sm:inline">{{ session('success') }}</span>
                                                </div>                                            
                                            @endif
                                            @if ($errors->any())
                                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                                    <strong class="font-bold">Terjadi Kesalahan!</strong>
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <form id="updateForm" action="{{ route('edit_data_diri.store_edit') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="grid grid-cols-2 gap-6">
                                                    <div class="mb-6">
                                                        <label for="imageInput" class="block text-gray-700 mb-2">Upload Photo:</label>
                                                        <!-- File input is only for selecting a new image -->
                                                        <input type="file" id="imageInput" accept="image/*"
                                                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                                                        <!-- Hidden input to store the cropped image filename -->
                                                        <input id="croppedInput" type="hidden" name="pfp" value="{{ old('pfp', Auth::user()->pfp) }}">
                                                        
                                                        <div class="mt-4">
                                                            <!-- Preview image for cropping -->
                                                            <img id="preview" alt="Image Preview" class="w-32 h-32 object-cover border hidden">
                                                            <br><br>
                                                            <button type="button" id="cropButton" style="display:none;">Crop Image</button>
                                                        </div>
                                                        
                                                        <div id="croppedDiv" class="mt-4 result {{ Auth::user()->pfp ? '' : 'hidden' }}">
                                                            <h3>Cropped Image:</h3>
                                                            <img src="{{ asset('storage/'. Auth::user()->pfp) }}" id="croppedImage" alt="Cropped Image" class="w-36 h-48 object-cover border">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Nama Lengkap</label>
                                                        <input type="text" name="name" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('name', Auth::user()->name) }}" required>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Email</label>
                                                        <input type="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('email', Auth::user()->email) }}" required>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Nomor Telepon</label>
                                                        <input type="text" name="phone" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('phone', Auth::user()->phone) }}" required>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Jenis Kelamin</label>
                                                        <select name="sex" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                                            <option value="">Pilih Jenis Kelamin</option>
                                                            <option value="Laki-Laki" {{ old('sex') == "Laki-Laki" || Auth::user()->sex == "Laki-Laki" ? 'selected' : '' }}>Laki-Laki</option>
                                                            <option value="Perempuan" {{ old('sex') == "Perempuan" || Auth::user()->sex == "Perempuan" ? 'selected' : '' }}>Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Agama</label>
                                                        <select name="religion" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                                            <option value="">Pilih Agama</option>
                                                            <option value="Islam" {{ old('religion') == "Islam" || Auth::user()->religion == "Islam" ? 'selected' : '' }}>Islam</option>
                                                            <option value="Protestan" {{ old('religion') == "Protestan" || Auth::user()->religion == "Protestan" ? 'selected' : '' }}>Kristen Protestan</option>
                                                            <option value="Katolik" {{ old('religion') == "Katolik" || Auth::user()->religion == "Katolik" ? 'selected' : '' }}>Kristen Katolik</option>
                                                            <option value="Hindu" {{ old('religion') == "Hindu" || Auth::user()->religion == "Hindu" ? 'selected' : '' }}>Hindu</option>
                                                            <option value="Buddha" {{ old('religion') == "Buddha" || Auth::user()->religion == "Buddha" ? 'selected' : '' }}>Buddha</option>
                                                            <option value="Konghucu" {{ old('religion') == "Konghucu" || Auth::user()->religion == "Konghucu" ? 'selected' : '' }}>Konghucu</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Tempat Lahir</label>
                                                        <input type="text" name="birth_place" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('birth_place', Auth::user()->birth_place) }}" required>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Tanggal Lahir</label>
                                                        <input type="date" name="birth_date" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('birth_date', \Carbon\Carbon::parse(Auth::user()->birth_date)->format('Y-m-d')) }}" required>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Status Perkawinan</label>
                                                        <select name="marital_status" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                                            <option value="">Pilih Status</option>
                                                            <option value="Belum Kawin" {{ old('marital_status') == "Belum Kawin" || Auth::user()->marital_status == "Belum Kawin" ? 'selected' : '' }}>Belum Kawin</option>
                                                            <option value="Kawin" {{ old('marital_status') == "Kawin" || Auth::user()->marital_status == "Kawin" ? 'selected' : '' }}>Kawin</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Alamat</label>
                                                        <input type="text" name="address" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('address', Auth::user()->address) }}" required>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Mata Pelajaran</label>
                                                        <select name="subject_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                                            <option value="">Pilih Mata Pelajaran</option>
                                                            @foreach ($subjects as $subject)
                                                                <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id || Auth::user()->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->subject_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label class="block text-gray-700">Status</label>
                                                        <select name="status" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                                            <option value="">Pilih Status</option>
                                                            <option value="Aktif" {{ old('status') == "Aktif" || Auth::user()->status == "Aktif" ? 'selected' : '' }}>Aktif</option>
                                                            <option value="Purna Tugas" {{ old('status') == "Purna Tugas" || Auth::user()->status == "Purna Tugas" ? 'selected' : '' }}>Purna Tugas</option>
                                                        </select>
                                                    </div>
                                                    {{-- <div>
                                                        <label for="image-input" class="block text-gray-700 mb-2">Upload Photo:</label>
                                                        <input type="file" id="image-input" name="pfp" accept="image/*" 
                                                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" 
                                                                @change="previewImage($event)">

                                                        <!-- Preview Image Outside Modal -->
                                                        <div class="mt-4">
                                                            <img id="preview-image" :src="imageUrl" alt="Image Preview" class="w-32 h-32 object-cover rounded-lg border">
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                
                                                <div class="mt-6 flex justify-between">
                                                    <a href="{{ route('dashboard') }}" class="bg-red-800 text-white px-6 py-2 rounded-lg hover:bg-red-900 transition">
                                                        Cancel
                                                    </a>
                                                    <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
                                                        Ajukan Perubahan
                                                    </button>
                                                </div>
                                            </form>
                                        @endif
                                    </div>

                                    <!-- Modal for cropping -->
                                    {{-- <div x-show="open" class="fixed inset-0 flex items-center justify-center z-50" 
                                    style="background-color: rgba(0, 0, 0, 0.8)" x-cloak>
                                        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg w-full mx-4">
                                            <div class="bg-gray-800 p-4 flex justify-between items-center">
                                                <h2 class="text-lg font-medium text-white">Crop Image</h2>
                                                <button @click="open = false" class="text-white hover:text-gray-300">&times;</button>
                                            </div>
                                            <div class="p-4" style="min-height: 500px;">
                                                <div class="img-container">
                                                    <img id="modal-image" :src="imageUrl" alt="To Crop" 
                                                            class="w-full max-h-[70vh] object-contain">
                                                </div>
                                            </div>
                                            <div class="bg-gray-100 p-4 flex justify-end">
                                                <button @click="open = false" class="bg-gray-500 text-white px-4 py-2 rounded-lg mr-2">Cancel</button>
                                                <button @click="cropImage" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Crop</button>
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- <div x-show="open" class="fixed inset-0 flex items-center justify-center z-50" style="display: none;">
                                        <div class="fixed inset-0 modal-overlay"></div>
                                        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full z-50">
                                        <div class="bg-gray-800 p-4 flex justify-between items-center">
                                            <h2 class="text-lg font-medium text-white">Crop Image</h2>
                                            <button @click="open = false" class="text-white hover:text-gray-300">&times;</button>
                                        </div>
                                        <div class="p-4">
                                            <div class="img-container">
                                            <img id="modal-image" :src="imageUrl" alt="To Crop" class="w-full">
                                            </div>
                                        </div>
                                        <div class="bg-gray-100 p-4 flex justify-end">
                                            <button @click="open = false" class="bg-gray-500 text-white px-4 py-2 rounded-lg mr-2">Cancel</button>
                                            <button @click="cropImage" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Crop</button>
                                        </div>
                                        </div>
                                    </div> --}}

                                    {{-- <script>
                                        let cropper;
                                        let image = document.getElementById('preview');
                                
                                        // Image Preview and Cropper Initialization
                                        $("#imageInput").on("change", function(event) {
                                            let file = event.target.files[0];
                                            if (!file) return;
                                
                                            let reader = new FileReader();
                                            reader.onload = function(e) {
                                                $("#preview").attr("src", e.target.result).show();
                                
                                                // Destroy old cropper instance if exists
                                                if (cropper) {
                                                    cropper.destroy();
                                                }
                                
                                                // Initialize Cropper.js
                                                cropper = new Cropper(image, {
                                                    aspectRatio: 3/4,
                                                    viewMode: 2
                                                });
                                
                                                $("#cropButton").show(); // Show Crop button
                                            };
                                            reader.readAsDataURL(file);
                                        });
                                
                                        // Cropping the Image
                                        $("#cropButton").on("click", function() {
                                            let croppedCanvas = cropper.getCroppedCanvas();
                                            let croppedImage = croppedCanvas.toDataURL();
                                
                                            $("#croppedImage").attr("src", croppedImage);
                                            $("#cropped-result").show();
                                        });
                                    </script> --}}

                                <script>
                                    let cropper;
                                    let image = document.getElementById('preview');
                                    let uploadedImageName = null; // Store image name for deletion

                                    // Image Preview and Cropper Initialization
                                    $("#imageInput").on("change", function(event) {
                                        let file = event.target.files[0];
                                        if (!file) return;
                                        
                                        // If there is an already uploaded cropped image and it differs from the original,
                                        // delete the old file to avoid storage buildup.
                                        if (uploadedImageName) {
                                            $.ajax({
                                                url: "{{ route('delete.image') }}",
                                                type: "POST",
                                                data: { image_name: uploadedImageName },
                                                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                                                success: function(response) {
                                                    console.log("Old cropped image deleted.");
                                                    // Reset the hidden input and local variable
                                                    $("#croppedInput").val("");
                                                    uploadedImageName = "";
                                                },
                                                error: function(err) {
                                                    console.error("Error deleting old cropped image:", err);
                                                }
                                            });
                                        }
                                        
                                        let reader = new FileReader();
                                        reader.onload = function(e) {
                                            $("#preview").attr("src", e.target.result).show();

                                            // Destroy old cropper instance if exists
                                            if (cropper) {
                                                cropper.destroy();
                                            }
                                            
                                            // Initialize Cropper.js
                                            cropper = new Cropper(image, {
                                                aspectRatio: 3/4,
                                                viewMode: 2
                                            });
                                            
                                            $("#croppedDiv").show(); // Show Cropped Image div
                                            $("#cropButton").show(); // Show Crop button
                                        };
                                        
                                        reader.readAsDataURL(file);
                                    });

                                    $("#cropButton").on("click", function() {
                                        console.log('Cropping image...');
                                        if (!cropper) return;
                                        
                                        // If there is an already uploaded cropped image and it differs from the original,
                                        // delete the old file to avoid storage buildup.
                                        if (uploadedImageName) {
                                            $.ajax({
                                                url: "{{ route('delete.image') }}",
                                                type: "POST",
                                                data: { image_name: uploadedImageName },
                                                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                                                success: function(response) {
                                                    console.log("Old cropped image deleted.");
                                                    // Reset the hidden input and local variable
                                                    $("#croppedInput").val("");
                                                    uploadedImageName = "";
                                                },
                                                error: function(err) {
                                                    console.error("Error deleting old cropped image:", err);
                                                }
                                            });
                                        }

                                        cropper.getCroppedCanvas({
                                            width: 300,
                                            height: 400
                                        }).toBlob(function(blob) {
                                                let formData = new FormData();
                                                formData.append("pfp", blob, "cropped-image.png");
                                                console.log("File uploaded:", formData.get("pfp"));

                                                $.ajax({
                                                    url: "{{ route('upload.cropped.image') }}",  // <-- This should match the Laravel route
                                                    type: "POST",
                                                    data: formData,
                                                    processData: false,
                                                    contentType: false,
                                                    headers: {
                                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token
                                                    },
                                                    success: function(response) {
                                                        if (response.success) {
                                                            $("#croppedImage").attr("src", response.image);
                                                            uploadedImageName = response.image_name;
                                                            $("#croppedInput").val(uploadedImageName);
                                                            cropper.destroy();
                                                            $("#cropButton").hide();
                                                            $("#preview").hide();
                                                        }
                                                    },
                                                    error: function(err) {
                                                        console.error("Upload failed!", err);
                                                    }
                                                });
                                        }, "image/png");
                                    });

                                    $("#cancelButton").on("click", function() {
                                        if (!uploadedImageName) return;

                                        $.ajax({
                                            url: "{{ route('delete.image') }}",
                                            type: "POST",
                                            data: { image_name: uploadedImageName },
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            success: function(response) {
                                                if (response.success) {
                                                    console.log("Image deleted successfully");
                                                    $("#preview").hide();
                                                    uploadedImageName = null;
                                                }
                                            },
                                            error: function(err) {
                                                console.error("Failed to delete image", err);
                                            }
                                        });
                                    });


                                    $("#updateForm").on("submit", function() {
                                        window.formSubmitting = true;
                                    });


                                    // Delete Image When Page is Refreshed
                                    $(window).on("beforeunload", function() {
                                        if (uploadedImageName && !window.formSubmitting) {
                                            console.log("Deleting image on page unload:", uploadedImageName);
                                            fetch("{{ route('delete.image') }}", {
                                                method: "POST",
                                                headers: {
                                                    "Content-Type": "application/json",
                                                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                                                },
                                                body: JSON.stringify({ image_name: uploadedImageName })
                                            }).catch(err => console.error("Failed to delete image on unload:", err));
                                        }
                                    });
                                </script>
                                </div>

                                <!-- ✨ Konten Dalam Proses -->
                                <div x-show="tab === 'dalam-proses'" class="p-4 bg-gray-100 rounded-lg">
                                    <!-- Card Contoh Data -->

                                    <div class="space-y-4">
                                        @if ($pending_edit_data->isEmpty())
                                            <p class="text-center text-gray-700">Tidak ada perubahan data yang sedang diproses</p>
                                        @else
                                            @foreach ($pending_edit_data as $ped)
                                            <!-- Card 1 -->
                                            <div class="bg-white p-4 rounded-lg shadow-md">
                                                <p class="font-semibold text-gray-900">NIP: {{ $ped->nip }}</p>
                                                <p class="text-sm text-gray-700">Nama: <span class="font-semibold">{{ $ped->name }}</span></p>
                                                <p class="text-sm text-gray-700">Data yang ingin diganti: Alamat</p>
                                                <a href="{{ route('edit_data_diri.show', $ped->id) }}" class="text-sm text-gray-900">
                                                    Lihat Detail &#8658;
                                                </a>
                                            </div>    
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <!-- ✨ Konten Tanggapan -->
                                <div x-show="tab === 'tanggapan'" class="p-4 bg-gray-100 rounded-lg">
                                    <!-- Card Contoh Data -->
                                    <div class="space-y-4">
                                        @if ($acceptance_edit_data->isEmpty())
                                        <p class="text-center text-gray-700">Belum ada tanggapan</p>
                                        @else
                                            @foreach ($acceptance_edit_data as $aed)
                                            <!-- Card 1 -->
                                            <div class="bg-white p-4 rounded-lg shadow-md">
                                                <p class="font-semibold text-gray-900">NIP: {{ $aed->nip }}</p>
                                                <p class="text-sm text-gray-700">Nama: <span class="font-semibold">{{ $aed->name }}</span></p>
                                                <p class="text-sm text-gray-700">Data yang ingin diganti: Alamat</p>
                                                <p class="text-sm text-gray-700">Keterangan: <span class="{{ $aed->acceptance_status == 'Diverifikasi' ? 'text-green-600' : 'text-red-600' }} font-semibold">{{ $aed->acceptance_status }}</span></p>
                                                <a href="{{ route('edit_data_diri.show', $aed->id) }}" class="text-sm text-gray-900">
                                                    Lihat Detail &#8658;
                                                </a>
                                            </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>