<!-- resources/views/edit-profile.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="bg-white w-64 shadow-lg hidden md:block">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-gray-800">Beranda Admin</h1>
            </div>
            <nav class="mt-6">
                <div class="px-4">
                    <div class="p-4">
                        <a href="/admin" class="text-gray-600">Beranda</a>
                    </div>
                    <div class="p-4">
                        <a href="/statistic" class="text-gray-700 ">Statistik Layanan</a>
                    </div>
                    <div class="bg-green-100 rounded-lg p-4 mb-4">
                        <a href="/edit" class="text-gray-600 font-medium">Edit Profil</a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-6">Edit Profil Desa</h1>
            <form class="bg-white p-6 rounded-xl shadow-sm">
                <!-- Ubah Profil -->
                <div class="mb-6 text-center">
                    <div class="inline-block relative">
                        <label for="profileImage" class="cursor-pointer">
                            <div class="w-28 h-28 rounded-full border-2 border-gray-300 flex items-center justify-center">
                                <svg class="w-10 h-10 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                            <span class="text-sm text-gray-500 mt-2 block">Ubah Profil</span>
                        </label>
                        <input type="file" id="profileImage" class="hidden">
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="mb-6">
                    <label for="description" class="block text-gray-700 font-medium">Deskripsi</label>
                    <textarea id="description" class="w-full border border-gray-400 rounded-lg shadow-sm mt-2 p-2 focus:ring focus:ring-green-300 focus:border-green-500" rows="4"></textarea>
                </div>


                <!-- Simpan Button -->
                <div class="text-center">
                    <button type="button" class="bg-green-800 text-white px-6 py-2 rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
