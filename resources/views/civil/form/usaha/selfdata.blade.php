<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-Layanan - Surat Keterangan Ijin Usaha</title>
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
            <h2 class="mb-2 text-2xl font-semibold text-center">Surat Keterangan Ijin Usaha</h2>
            <p class="mb-8 text-center text-gray-600">Silahkan Lengkapi data berikut dengan benar</p>

            <form action="{{ route('usaha.businesdata') }}" method="POST" class="space-y-6">
                <!-- Grid for two columns -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tempat</label>
                            <input type="text" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kedudukan Dalam Perusahaan (Usaha)</label>
                            <input type="text" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">NPWP</label>
                            <input type="text" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">NIK (Nomor Induk Kependudukan)</label>
                            <input type="text" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                            <input type="date" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                            <input type="text" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">No Telepon</label>
                            <input type="tel" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>
                    </div>
                </div>

                <!-- Full Width Fields -->
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                        <textarea rows="3" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500"></textarea>
                    </div>

                    <!-- Address Details Grid -->
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">RT/RW</label>
                            <input type="text" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kelurahan</label>
                            <input type="text" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kecamatan</label>
                            <input type="text" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kabupaten</label>
                            <input type="text" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2 text-white rounded-md bg-custom-green hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Selanjutnya
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
