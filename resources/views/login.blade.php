<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Website Desa</title>
    <!-- Menyertakan file CSS dan JS yang diproses dengan Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<!-- Bagian untuk Background Image -->
<div class="fixed inset-0 z-0">
    <!-- Mengecek apakah gambar background ada, jika ada tampilkan gambar -->
    @if (file_exists(public_path('images/bgrnd.jpg')))
        <img src="{{ asset('images/bgrnd.jpg') }}" alt="Background" class="object-cover w-full h-full">
    @endif
</div>

<!-- Container untuk konten halaman -->
<div class="container mx-auto">
    <div class="relative z-10 flex items-center justify-center min-h-screen">
        <div class="w-full max-w-4xl">
            <div class="overflow-hidden shadow-lg rounded-2xl bg-white/90 backdrop-blur-lg">
                <div class="flex flex-col md:flex-row">
                    <!-- Left Side - Image dan Logo -->
                    <div class="relative w-full md:w-1/2 bg-gradient-to-br from-[#4A7251]/90 to-[#387ca3]/90 text-white p-8 md:p-20 overflow-hidden">
                        <div class="flex flex-col items-center justify-center h-full">
                            <!-- Logo Desa -->
                            <div class="max-w-[80px] mb-6 relative z-10">
                                <img src="/images/logo2.png" alt="Logo Desa" class="w-full h-auto drop-shadow-md">
                            </div>
                            <!-- Deskripsi Website Desa -->
                            <h3 class="mb-3 text-2xl text-center drop-shadow-md">Website Desa</h3>
                            <p class="text-center drop-shadow-md">Portal Informasi dan Layanan Masyarakat</p>
                        </div>
                    </div>

                    <!-- Right Side - Login Form -->
                    <div class="w-full md:w-1/2">
                        <div class="p-4 md:p-20">
                            <!-- Menampilkan pesan error jika ada -->
                            @if(session('error'))
                                <div class="mb-4 text-sm text-red-600">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <!-- Header form login -->
                            <div class="flex items-center gap-3 mb-6">
                                <img src="/images/logo2.png" alt="Login Logo" class="w-8 h-8">
                                <h4 class="text-xl font-medium">Masuk</h4>
                            </div>

                            <!-- Menampilkan status session -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Form Login -->
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <!-- Input Email -->
                                <div class="mb-4">
                                    <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" id="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#68a4c4]/25 focus:border-[#68a4c4] transition duration-300">
                                    <!-- Menampilkan error jika ada masalah dengan input email -->
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Input Password -->
                                <div class="mb-4">
                                    <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Kata Sandi</label>
                                    <input type="password" id="password" name="password" required autocomplete="current-password"
                                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#68a4c4]/25 focus:border-[#68a4c4] transition duration-300">
                                    <!-- Menampilkan error jika ada masalah dengan input password -->
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Checkbox "Ingat Saya" -->
                                <div class="mb-4">
                                    <label class="flex items-center">
                                        <input type="checkbox" id="remember_me" name="remember"
                                            class="rounded border-gray-300 text-[#68a4c4] focus:ring-[#68a4c4]">
                                        <span class="ml-2 text-sm text-gray-700">Ingat saya</span>
                                    </label>
                                </div>

                                <!-- Tombol untuk Submit form dan Link Lupa Kata Sandi -->
                                <div class="flex items-center justify-end mt-4">
                                    <!-- Link untuk reset kata sandi jika lupa -->
                                    @if (Route::has('password.request'))
                                        <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                            Lupa kata sandi?
                                        </a>
                                    @endif
                                    <!-- Tombol untuk Login -->
                                    <button type="submit"
                                        class="ms-3 w-full md:w-auto mt-4 md:mt-0 py-2 px-4 bg-gradient-to-r from-[#68a4c4] to-[#387ca3] hover:from-[#387ca3] hover:to-[#68a4c4] text-white rounded-lg transition duration-300 transform hover:-translate-y-0.5 hover:shadow-lg">
                                        Masuk
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
