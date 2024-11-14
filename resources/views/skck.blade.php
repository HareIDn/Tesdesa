<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Layanan SKCK</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-green-600 text-white">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center">
                <a href="#" onclick="window.history.back()" class="text-white hover:text-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h1 class="text-xl font-semibold ml-4">E-Layanan</h1>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-6">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">SURAT KETERANGAN CATATAN KEPOLISIAN</h2>
                <p class="text-center text-gray-600 mb-8">Isi formulir dibawah ini dengan lengkap</p>

                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Lengkap -->
                        <div>
                            <label for="nama" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                            <input type="text" id="nama" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>

                        <!-- NIK -->
                        <div>
                            <label for="nik" class="block text-gray-700 font-medium mb-2">NIK (Nomor Induk Kependudukan)</label>
                            <input type="text" id="nik" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>

                        <!-- Jenis Kelamin -->
                        <div>
                            <label for="jenis_kelamin" class="block text-gray-700 font-medium mb-2">Jenis Kelamin</label>
                            <input type="text" id="jenis_kelamin" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>

                        <!-- Tempat & Tanggal Lahir -->
                        <div>
                            <label for="ttl" class="block text-gray-700 font-medium mb-2">Tempat & Tanggal Lahir</label>
                            <input type="text" id="ttl" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>

                        <!-- Agama -->
                        <div>
                            <label for="agama" class="block text-gray-700 font-medium mb-2">Agama</label>
                            <input type="text" id="agama" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>

                        <!-- Pekerjaan -->
                        <div>
                            <label for="pekerjaan" class="block text-gray-700 font-medium mb-2">Pekerjaan</label>
                            <input type="text" id="pekerjaan" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="mt-6">
                        <label for="alamat" class="block text-gray-700 font-medium mb-2">Alamat</label>
                        <textarea id="alamat" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-8 flex justify-center">
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg font-medium shadow-sm hover:shadow-md transition-all">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>