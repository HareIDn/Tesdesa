<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Layanan - Surat Izin Usaha</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="p-4 text-white bg-custom-green">
        <div class="container flex items-center mx-auto">
            <a href="#" onclick="window.history.back()" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="ml-2 text-xl">E-Layanan</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container px-4 py-8 mx-auto">
        <div class="max-w-4xl p-6 mx-auto bg-white rounded-lg shadow">
            <h2 class="mb-2 text-2xl font-semibold text-center">SURAT IZIN USAHA</h2>
            <p class="mb-8 text-center text-gray-600">Silahkan Lengkapi data berikut dengan benar</p>

            <form class="space-y-6">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Usaha</label>
                        <input type="text" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Bentuk Usaha</label>
                        <input type="text" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Bidang Usaha</label>
                        <input type="text" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Modal Usaha (Rp)</label>
                        <input type="number" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jumlah Karyawan</label>
                        <input type="number" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Alamat Usaha</label>
                        <textarea rows="4" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500"></textarea>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-8">
                    <button type="button" class="px-6 py-2 text-white rounded-md bg-custom-green hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Sebelumnya
                    </button>
                    <button type="submit" class="px-6 py-2 text-white rounded-md bg-custom-green hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
