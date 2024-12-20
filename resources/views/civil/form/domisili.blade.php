<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <form action="" id="form-domisili" method="POST">
            @csrf
            <input type="hidden" id="domiisle" name="user_id" value="{{ auth()->user()->id }}">
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
        document.getElementById('form-domisili').addEventListener('submit', function (e) {
            e.preventDefault(); // Mencegah form dari submit biasa

            // Ambil elemen input yang wajib diisi
            const requiredFields = [
                'nama', 'nik', 'tempat', 'tanggal_lahir', 'jenis_kelamin',
                'agama', 'pekerjaan', 'telepon', 'alamat', 'rt_rw',
                'kelurahan', 'kecamatan', 'kabupaten'
            ];

            // Validasi input: pastikan semua input wajib diisi
            let isValid = true;
            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('border-red-500'); // Tambahkan border merah jika kosong
                } else {
                    field.classList.remove('border-red-500'); // Hapus border merah jika terisi
                }
            });

            // Jika ada input yang kosong, tampilkan pesan peringatan
            if (!isValid) {
                alert('Mohon isi semua field yang wajib diisi.');
                return;
            }

            // Ambil data dari form setelah validasi
            const formData = {
                user_id: document.getElementById('domiisle').value, // ID user
                pilih_tujuan: 'Domisili', // Sesuaikan tujuan
                jenis_pengajuan: 'Surat Keterangan Domisili',
                status: 'Diproses',
                keterangan:'Pindah Domisili',
                deskripsi: 'Pindah Domisili', // Deskripsi atau nama lengkap
                tanggal_pengajuan: new Date().toISOString().slice(0, 10), // Tanggal hari ini dalam format YYYY-MM-DD
                tempat: document.getElementById('tempat').value,
                tanggal_lahir: document.getElementById('tanggal_lahir').value,
                jenis_kelamin: document.getElementById('jenis_kelamin').value,
                agama: document.getElementById('agama').value,
                pekerjaan: document.getElementById('pekerjaan').value,
                telepon: document.getElementById('telepon').value,
                alamat: document.getElementById('alamat').value,
                rt_rw: document.getElementById('rt_rw').value,
                kelurahan: document.getElementById('kelurahan').value,
                kecamatan: document.getElementById('kecamatan').value,
                kabupaten: document.getElementById('kabupaten').value
            };

            // Kirim data menggunakan Fetch API setelah validasi berhasil
            fetch('http://tesdesa.test/api/user/submission/post', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // CSRF Token
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(formData) // Konversi data ke JSON
            })
            .then(response => {
                if (!response.ok) {
                    // Jika respons tidak berhasil
                    return response.json().then(err => { throw err; });
                }
                return response.json(); // Parsing JSON jika berhasil
            })
            .then(data => {
                // Ketika request berhasil
                alert('Pengajuan berhasil dikirim: ' + data.message);
                window.location.href = '/civil'; // Redirect ke halaman dashboard
            })
            .catch(error => {
                // Ketika request gagal
                if (error.message) {
                    alert('Gagal mengirim pengajuan: ' + error.message);
                } else {
                    console.error('Terjadi kesalahan:', error);
                    alert('Gagal mengirim pengajuan');
                }
            });
        });
    </script>
</body>
</html>
