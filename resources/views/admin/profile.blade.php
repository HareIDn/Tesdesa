<!-- resources/views/profile.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Profil Desa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="hidden w-64 bg-white shadow-lg md:block">
            @include('components.sidebar-admin')
        <div class="p-4 border-t">

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
