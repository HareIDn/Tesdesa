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
    <header class="text-white bg-custom-green">
        <div class="container px-4 py-4 mx-auto">
            <div class="flex items-center">
                <a href="#" onclick="window.history.back()" class="text-white hover:text-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h1 class="ml-4 text-xl font-semibold">E-Layanan Domisili</h1>
            </div>
        </div>
    </header>
    <!-- Flash Message Notification -->
    @if (session('success'))
        <div class="fixed top-0 right-0 p-4 mt-4 mr-4 text-white bg-green-500 rounded-md">
            <p>{{ session('success') }}</p>
        </div>
    @elseif (session('error'))
        <div class="fixed top-0 right-0 p-4 mt-4 mr-4 text-white bg-red-500 rounded-md">
            <p>{{ session('error') }}</p>
        </div>
    @endif

    <!-- Form Container -->
    <div class="max-w-4xl p-6 mx-auto mt-10 bg-white rounded-md shadow-md">
        <h2 class="mb-4 text-2xl font-bold text-center">SURAT KETERANGAN DOMISILI</h2>
        <p class="mb-6 text-center text-gray-600">Isi formulir di bawah ini dengan lengkap</p>

        <!-- Form -->
        <form action="#" method="POST">
            @csrf
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
                <button type="submit" class="px-6 py-2 font-medium text-white rounded-md bg-custom-green hover:bg-green-800">Kirim</button>
            </div>
        </form>
    </div>
    <script>
        // Jika ada notifikasi sukses, maka akan menghilang setelah 5 detik
        setTimeout(function () {
            const notification = document.querySelector('.fixed');
            if (notification) {
                notification.style.display = 'none';
            }
        }, 5000);
    </script>

</body>
</html>
