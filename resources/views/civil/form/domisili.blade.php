<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Domisili</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-custom-green text-white">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center">
                <a href="#" onclick="window.history.back()" class="text-white hover:text-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h1 class="text-xl font-semibold ml-4">E-Layanan Domisili</h1>
            </div>
        </div>
    </header>

    <!-- Form Container -->
    <div class="max-w-4xl mx-auto bg-white mt-10 p-6 rounded-md shadow-md">
        <h2 class="text-center text-2xl font-bold mb-4">SURAT KETERANGAN DOMISILI</h2>
        <p class="text-center text-gray-600 mb-6">Isi formulir di bawah ini dengan lengkap</p>

        <!-- Form -->
        <form action="#" method="POST">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="nama" class="block font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="nik" class="block font-medium text-gray-700">NIK (Nomor Induk Kependudukan)</label>
                    <input type="text" id="nik" name="nik" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="tempat" class="block font-medium text-gray-700">Tempat</label>
                    <input type="text" id="tempat" name="tempat" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="tanggal_lahir" class="block font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="jenis_kelamin" class="block font-medium text-gray-700">Jenis Kelamin</label>
                    <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="agama" class="block font-medium text-gray-700">Agama</label>
                    <input type="text" id="agama" name="agama" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="pekerjaan" class="block font-medium text-gray-700">Pekerjaan</label>
                    <input type="text" id="pekerjaan" name="pekerjaan" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="telepon" class="block font-medium text-gray-700">Telepon</label>
                    <input type="text" id="telepon" name="telepon" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
            </div>
            <div class="mt-4">
                <label for="alamat" class="block font-medium text-gray-700">Alamat Lengkap</label>
                <textarea id="alamat" name="alamat" rows="3" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500"></textarea>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label for="rt_rw" class="block font-medium text-gray-700">RT/RW</label>
                    <input type="text" id="rt_rw" name="rt_rw" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="kelurahan" class="block font-medium text-gray-700">Kelurahan</label>
                    <input type="text" id="kelurahan" name="kelurahan" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="kecamatan" class="block font-medium text-gray-700">Kecamatan</label>
                    <input type="text" id="kecamatan" name="kecamatan" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="kabupaten" class="block font-medium text-gray-700">Kabupaten</label>
                    <input type="text" id="kabupaten" name="kabupaten" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
            </div>
            <div class="mt-6 text-center">
                <button type="submit" class="px-6 py-2 bg-custom-green text-white font-medium rounded-md hover:bg-green-800">Kirim</button>
            </div>
        </form>
    </div>
</body>
</html>
