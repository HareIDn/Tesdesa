<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Website Desa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="fixed inset-0 z-0">
        @if (file_exists(public_path('images/bgrnd.jpg')))
            <img src="{{ asset('images/bgrnd.jpg') }}" alt="Background" class="w-full h-full object-cover">
        @endif
    </div>
    <div class="container mx-auto">
        <div class="min-h-screen relative z-10 flex items-center justify-center">
            <div class="w-full max-w-4xl">
                <div class="overflow-hidden rounded-2xl shadow-lg bg-white/90 backdrop-blur-lg">
                    <div class="flex flex-col md:flex-row">
                        <!-- Left Side - Image and Logo -->
                        <div class="relative w-full md:w-1/2 bg-gradient-to-br from-[#4A7251]/90 to-[#387ca3]/90 text-white p-8 md:p-20 overflow-hidden">
                            <div class="h-full flex flex-col items-center justify-center">
                                <div class="max-w-[120px] mb-6 relative z-10">
                                    <img src="/images/logo.png" alt="Logo Desa" class="w-full h-auto drop-shadow-md">
                                </div>
                                <h3 class="text-center text-2xl mb-3 drop-shadow-md">Website Desa</h3>
                                <p class="text-center drop-shadow-md">Portal Informasi dan Layanan Masyarakat</p>
                            </div>
                        </div>
                        
                        <!-- Right Side - Login Form -->
                        <div class="w-full md:w-1/2">
                            <div class="p-4 md:p-20">
                                <div class="flex items-center gap-3 mb-6">
                                    <img src="/images/logo.png" alt="Login Logo" class="w-8 h-8">
                                    <h4 class="text-xl font-medium">Masuk</h4>
                                </div>
                                <form>
                                    <div class="mb-4">
                                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Nama Pengguna</label>
                                        <input type="text" id="username" required 
                                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#68a4c4]/25 focus:border-[#68a4c4] transition duration-300">
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                                        <input type="password" id="password" required 
                                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#68a4c4]/25 focus:border-[#68a4c4] transition duration-300">
                                    </div>
                                    <div class="mb-4">
                                        <label class="flex items-center">
                                            <input type="checkbox" id="remember" 
                                                class="rounded border-gray-300 text-[#68a4c4] focus:ring-[#68a4c4]">
                                            <span class="ml-2 text-sm text-gray-700">Ingat saya</span>
                                        </label>
                                    </div>
                                    <button type="button" 
                                    onclick="window.location.href='{{ url('/admin') }}'"
                                    class="w-full py-2 px-4 bg-gradient-to-r from-[#68a4c4] to-[#387ca3] hover:from-[#387ca3] hover:to-[#68a4c4] text-white rounded-lg transition duration-300 transform hover:-translate-y-0.5 hover:shadow-lg">
                                    Masuk
                                </button>
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