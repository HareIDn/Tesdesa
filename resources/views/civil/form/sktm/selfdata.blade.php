<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Domisili</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <header class="text-white bg-custom-green">
        <div class="container px-4 py-4 mx-auto">
            <div class="flex items-center">
                <a href="#" onclick="window.history.back()" class="text-white hover:text-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h1 class="ml-4 text-xl font-semibold">E-Layanan SKTM</h1>
            </div>
        </div>
    </header>

    <!-- Form Container -->
    <div class="max-w-4xl p-6 mx-auto mt-10 bg-white rounded-md shadow-md">
        <!-- Title -->
        <h2 class="mb-1 text-2xl font-bold text-center">SURAT KETERANGAN TIDAK MAMPU</h2>
        <p class="mb-6 text-center text-gray-600">Silahkan lengkapi data berikut dengan benar</p>

        <!-- Navigation Tabs -->
        <div class="flex justify-center mb-8">
            <div class="flex items-center">
                <div class="flex flex-col items-center mx-4">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-custom-green">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <span class="mt-2 text-sm font-medium text-green-700">Data Diri</span>
                </div>
                <div class="flex flex-col items-center mx-4">
                    <div class="flex items-center justify-center w-12 h-12 bg-gray-200 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <span class="mt-2 text-sm text-gray-500">Data Keluarga</span>
                </div>
                <div class="flex flex-col items-center mx-4">
                    <div class="flex items-center justify-center w-12 h-12 bg-gray-200 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <span class="mt-2 text-sm text-gray-500">Keperluan</span>
                </div>
            </div>
        </div>

        <!-- Form -->
        <form action="{{ url('/sktm1') }}">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <label for="nama" class="block font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="nik" class="block font-medium text-gray-700">NIK (Nomor Induk Kependudukan)</label>
                    <input type="text" id="nik" name="nik" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="tempat" class="block font-medium text-gray-700">Tempat</label>
                    <input type="text" id="tempat" name="tempat" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="tanggal_lahir" class="block font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="jenis_kelamin" class="block font-medium text-gray-700">Jenis Kelamin</label>
                    <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="agama" class="block font-medium text-gray-700">Agama</label>
                    <input type="text" id="agama" name="agama" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="pekerjaan" class="block font-medium text-gray-700">Pekerjaan</label>
                    <input type="text" id="pekerjaan" name="pekerjaan" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="telepon" class="block font-medium text-gray-700">Telepon</label>
                    <input type="text" id="telepon" name="telepon" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
            </div>
            <div class="mt-4">
                <label for="alamat" class="block font-medium text-gray-700">Alamat Lengkap</label>
                <textarea id="alamat" name="alamat" rows="3" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500"></textarea>
            </div>
            <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2">
                <div>
                    <label for="rt_rw" class="block font-medium text-gray-700">RT/RW</label>
                    <input type="text" id="rt_rw" name="rt_rw" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="kelurahan" class="block font-medium text-gray-700">Kelurahan</label>
                    <input type="text" id="kelurahan" name="kelurahan" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="kecamatan" class="block font-medium text-gray-700">Kecamatan</label>
                    <input type="text" id="kecamatan" name="kecamatan" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <label for="kabupaten" class="block font-medium text-gray-700">Kabupaten</label>
                    <input type="text" id="kabupaten" name="kabupaten" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
            </div>
            <div class="mt-6 text-center">
                <button type="submit" class="px-6 py-2 font-medium text-white rounded-md bg-custom-green hover:bg-green-800">Selanjutnya</button>
            </div>
        </form>
    </div>
</body>
</html>
