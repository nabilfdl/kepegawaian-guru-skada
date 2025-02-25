<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah akun') }}
        </h2>
    </x-slot>

    <style>
        /* Menghapus spinner untuk input type="number" */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield; /* Untuk Firefox */
        }
    </style>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Tambah Guru</h3>
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
                <form id="updateForm" action="{{ route('data_pegawai.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-6">
                            <div class="mb-6">
                                
                                <label for="imageInput" class="block text-gray-700 mb-2">Upload Photo:</label>
                                <input type="file" id="imageInput" accept="image/*"
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                                >
                                
                                <div class="mt-4">
                                    <input id="croppedInput" type="hidden" name="pfp">
                                    <img id="preview" alt="Image Preview" class="w-32 h-32 object-cover border" style="display:none;">
                                    <br><br>
                                    <button type="button" id="cropButton" style="display:none;">Crop Image</button>
                                </div>

                                <div id="croppedDiv" class="mt-4 result hidden">
                                    <h3>Cropped Image:</h3>
                                    <img id="croppedImage" alt="Image Preview" class="w-36 h-48 object-cover border">
                                </div>
                            </div>
                        <div>
                            <label class="block text-gray-700">NIP</label>
                            <input type="number" name="nip" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Nama Lengkap</label>
                            <input type="text" name="name" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Nomor Telepon</label>
                            <input type="number" name="phone" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Email</label>
                            <input type="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Agama</label>
                            <select name="religion" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Protestan">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Buddha">Konghucu</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Tempat Lahir</label>
                            <input type="text" name="birth_place" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Tanggal Lahir</label>
                            <input type="date" name="birth_date" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Posisi</label>
                            <select name="role" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih Posisi</option>
                                <option value="Admin">Admin</option>
                                <option value="Operator">Operator</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Jenis Kelamin</label>
                            <select name="sex" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Status Perkawinan</label>
                            <select name="marital_status" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih Status</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Kawin">Kawin</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Alamat</label>
                            <input type="text" name="address" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Mata Pelajaran</label>
                            <select name="subject_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Status</label>
                            <select name="status" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Purna Tugas">Purna Tugas</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Password</label>
                            <input type="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-between">
                        <a href="{{ route('data_pegawai.index') }}" class="bg-red-800 text-white px-6 py-2 rounded-lg hover:bg-red-900 transition">
                            Cancel
                        </a>
                        <button type="submit" class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
</x-app-layout>
