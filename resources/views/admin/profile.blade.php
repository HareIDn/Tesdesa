<!-- resources/views/profile.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Desa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="hidden w-64 bg-white shadow-lg md:block">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-gray-800">Beranda Admin</h1>
            </div>
            <nav class="mt-6">
                <div class="px-4">
                    <div class="p-4">
                        <a href="/admin" class="text-gray-600">Beranda</a>
                    </div>
                    <div class="p-4">
                        <a href="/statistic" class="text-gray-600">Statistik Layanan</a>
                    </div>
                    <div class="p-4 mb-4 bg-green-100 rounded-lg">
                        <a href="/profile" class="font-medium text-gray-700">Edit Profil</a>
                    </div>
                </div>
            </nav>
            <div class="p-4 border-t">
        <button onclick="window.location.href='/logout'" class="flex items-center justify-center w-full p-4 text-red-600 transition-colors rounded-lg bg-red-50 hover:bg-red-100">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            Keluar
        </button>
    </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-x-hidden">
            <!-- Mobile Header -->
            <div class="p-4 bg-white shadow md:hidden">
                <button class="text-gray-600" id="mobile-menu-button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <div class="p-6">
                <h2 class="mb-6 text-2xl font-bold">Edit Profil Desa</h2>

                <form class="max-w-3xl">
                    <!-- Profile Image Section -->
                    <div class="p-6 mb-6 bg-white rounded-lg shadow-sm">
                        <div class="flex flex-col items-center justify-center">
                            <div class="relative">
                                <div class="flex items-center justify-center w-32 h-32 bg-gray-200 rounded-full">
                                    <i class="text-4xl text-gray-400 fas fa-camera"></i>
                                </div>
                                <button type="button" class="absolute bottom-0 right-0 p-2 bg-white rounded-full shadow-lg">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </button>
                            </div>
                            <p class="mt-2 text-sm text-gray-600">Ubah Profil</p>
                        </div>
                    </div>

                    <!-- Description Section -->
                    <div class="p-6 mb-6 bg-white rounded-lg shadow-sm">
                        <label class="block mb-2 text-sm font-medium text-gray-700">
                            Deskripsi
                        </label>
                        <textarea
                            rows="6"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                            placeholder="Masukkan deskripsi desa..."></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center">
                        <button type="submit" class="px-8 py-2 text-white transition-colors bg-green-800 rounded-lg hover:bg-green-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu functionality
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const sidebar = document.querySelector('.min-h-screen > div:first-child');

        mobileMenuButton.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('absolute');
            sidebar.classList.toggle('z-50');
            sidebar.classList.toggle('bg-white');
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('h-screen');
        });
    </script>
</body>
</html>
