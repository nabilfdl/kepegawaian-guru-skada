<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Ganti Password</title>
</head>
<body class="bg-gray-800 p-5">
<br><br><br>
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl text-center font-bold mb-4">Ganti Password</h2>
    
    {{-- Alert for custom session message --}}
    @if(session('alert'))
        <div class="mb-4 p-2 bg-yellow-200 text-yellow-700 rounded">
            {{ session('alert') }}
        </div>
    @endif

    {{-- Validation Error Messages --}}
    @if($errors->any())
        <div class="mb-4 p-2 bg-red-200 text-red-700 rounded">
            <ul>
                @foreach($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="changePasswordForm" method="POST" action="{{ route('password.change.post') }}">
        @csrf

        <!-- Password Lama -->
        <div class="mb-4 relative">
            <label for="oldPassword" class="block text-sm font-semibold mb-2">Password Lama</label>
            <input type="password" id="oldPassword" name="current_password" required 
                class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10" 
                placeholder="Masukkan password lama" autocomplete="new-password">
        </div>

        <!-- Password Baru -->
        <div class="mb-4 relative">
            <label for="newPassword" class="block text-sm font-semibold mb-2">Password Baru</label>
            <input type="password" id="newPassword" name="password" required 
                class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10" 
                placeholder="Masukkan password baru">
            <button type="button" class="absolute right-2 top-9 text-sm text-blue-500" 
                onclick="togglePassword('newPassword', this)">
                <i class="fas fa-eye"></i>
            </button>
        </div>

        <!-- Konfirmasi Password -->
        <div class="mb-4 relative">
            <label for="confirmPassword" class="block text-sm font-semibold mb-2">Konfirmasi Password Baru</label>
            <input type="password" id="confirmPassword" name="password_confirmation" required 
                class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 pr-10" 
                placeholder="Konfirmasi password baru">
            <button type="button" class="absolute right-2 top-9 text-sm text-blue-500" 
                onclick="togglePassword('confirmPassword', this)">
                <i class="fas fa-eye"></i>
            </button>
        </div>

        <p id="generalError" class="text-red-500 text-xs mt-1 hidden text-center">Password yang dimasukkan salah!</p>

        <!-- Tombol Konfirmasi -->
        <div class="flex justify-end mt-4">
            <button type="submit" class="border border-gray-400 text-black font-semibold py-2 px-6 rounded-md hover:bg-purple-400 hover:text-black hover:border-gray-900 transition-colors duration-500 text-sm">
                Konfirmasi
            </button>
        </div>
    </form>
</div>

<script>
    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);
        const icon = button.querySelector('i');
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = "password";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

</body>
</html>
