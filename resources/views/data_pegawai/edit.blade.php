<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Akun') }}
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
                <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Edit Guru</h3>
                
                @if ($errors->any())
                    <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="updateForm" action="{{ route('data_pegawai.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Image Upload & Crop Section -->
                        <div class="mb-6">
                            <label for="imageInput" class="block text-gray-700 mb-2">Upload Photo:</label>
                            <!-- File input is only for selecting a new image -->
                            <input type="file" id="imageInput" accept="image/*"
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                            <!-- Hidden input to store the cropped image filename -->
                            <input id="croppedInput" type="hidden" name="pfp" value="{{ old('pfp', $user->pfp) }}">
                            
                            <div class="mt-4">
                                <!-- Preview image for cropping -->
                                <img id="preview" alt="Image Preview" class="w-32 h-32 object-cover border hidden">
                                <br><br>
                                <button type="button" id="cropButton" style="display:none;">Crop Image</button>
                            </div>
                            
                            <div id="croppedDiv" class="mt-4 result {{ $user->pfp ? '' : 'hidden' }}">
                                <h3>Cropped Image:</h3>
                                <img src="{{ asset('storage/'.$user->pfp) }}" id="croppedImage" alt="Cropped Image" class="w-36 h-48 object-cover border">
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-700">NIP</label>
                            <input type="number" name="nip" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('nip', $user->nip) }}" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Nama Lengkap</label>
                            <input type="text" name="name" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('name', $user->name) }}" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Email</label>
                            <input type="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('email', $user->email) }}" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Nomor Telepon</label>
                            <input type="text" name="phone" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('phone', $user->phone) }}" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Jenis Kelamin</label>
                            <select name="sex" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki" {{ old('sex') == "Laki-Laki" || $user->sex == "Laki-Laki" ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ old('sex') == "Perempuan" || $user->sex == "Perempuan" ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Agama</label>
                            <select name="religion" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="" >Pilih Agama</option>
                                <option value="Islam" {{ old('religion') == "Islam" || $user->religion == "Islam" ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('religion') == "Protestan" || $user->religion == "Protestab" ? 'selected' : '' }}>Kristen</option>
                                <option value="Katolik" {{ old('religion') == "Katolik" || $user->religion == "Katolik" ? 'selected' : '' }}>Katolik</option>
                                <option value="Hindu" {{ old('religion') == "Hindu" || $user->religion == "Hindu" ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('religion') == "Buddha" || $user->religion == "Buddha" ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu" {{ old('religion') == "Konghucu" || $user->religion == "Konghucu" ? 'selected' : '' }}>Konghucu</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Tempat Lahir</label>
                            <input type="text" name="birth_place" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('birth_place', $user->birth_place) }}" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Tanggal Lahir</label>
                            <input type="date" name="birth_date" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('birth_date', $user->birth_date) }}" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Posisi</label>
                            <select name="role" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih Posisi</option>
                                <option value="Admin" {{ old('role') == "Admin" || $user->role == "Admin" ? 'selected' : '' }}>Admin</option>
                                <option value="Operator" {{ old('role') == "Operator" || $user->role == "Operator" ? 'selected' : '' }}>Operator</option>
                                <option value="User" {{ old('role') == "User" || $user->role == "User" ? 'selected' : '' }}>User</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Status Perkawinan</label>
                            <select name="marital_status" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih Status</option>
                                <option value="Belum Kawin" {{ old('marital_status') == "Belum Kawin" || $user->marital_status == "Belum Kawin" ? 'selected' : '' }}>Belum Kawin</option>
                                <option value="Kawin" {{ old('marital_status') == "Kawin" || $user->marital_status == "Kawin" ? 'selected' : '' }}>Kawin</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Alamat</label>
                            <input type="text" name="address" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ old('address', $user->address) }}" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Mata Pelajaran</label>
                            <select name="subject_id" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id || $user->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->subject_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Status</label>
                            <select name="status" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                                <option value="">Pilih Status</option>
                                <option value="Aktif" {{ old('status') == "Aktif" || $user->status == "Aktif" ? 'selected' : '' }}>Aktif</option>
                                <option value="Purna Tugas" {{ old('status') == "Purna Tugas" || $user->status == "Purna Tugas" ? 'selected' : '' }}>Purna Tugas</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700">Password</label>
                            <input type="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                            <small class="text-gray-500">Kosongkan jika tidak ingin mengubah password</small>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-between">
                        <a href="{{ route('data_pegawai.index') }}" class="bg-red-800 text-white px-6 py-2 rounded-lg hover:bg-red-900 transition">
                            Cancel
                        </a>
                        <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
                            Edit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        let cropper;
        let image = document.getElementById('preview');
        let uploadedImageName = $("#croppedInput").val(); // Initially set to current user's image
    
        // When a new file is selected
        $("#imageInput").on("change", function(event) {
            let file = event.target.files[0];
            if (!file) return;

            // If there is an already uploaded cropped image and it differs from the original,
            // delete the old file to avoid storage buildup.
            if (uploadedImageName && uploadedImageName !== "{{ $user->pfp }}") {
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
                if (cropper) {
                    cropper.destroy();
                }
                cropper = new Cropper(image, {
                    aspectRatio: 3 / 4,
                    viewMode: 2
                });
                $("#cropButton").show();
            };
            reader.readAsDataURL(file);
        });
    
        // Crop image when Crop button is clicked
        $("#cropButton").on("click", function() {
            if (!cropper) return;
            // If there is an already uploaded cropped image and it differs from the original,
            // delete the old file to avoid storage buildup.
            if (uploadedImageName && uploadedImageName !== "{{ $user->pfp }}") {
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
                width: 300,  // Desired width
                height: 400  // Desired height (to maintain 3:4 ratio)
            }).toBlob(function(blob) {
                let formData = new FormData();
                // Append the cropped image as a file to FormData
                formData.append("pfp", blob, "cropped-image.png");
                $.ajax({
                    url: "{{ route('upload.cropped.image') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            // Update the preview in the result section
                            $("#croppedImage").attr("src", response.image).show();
                            // Update the hidden input with the new file name
                            $("#croppedInput").val(response.image_name);
                            uploadedImageName = response.image_name;
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
