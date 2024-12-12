<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-Layanan SKCK</title>
    @vite('resources/css/app.css')
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
                <h1 class="ml-4 text-xl font-semibold">E-Layanan SKCK</h1>
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

    <!-- Main Content -->
    <main class="container px-4 py-6 mx-auto">
        <div class="max-w-4xl mx-auto">
            <div class="p-6 bg-white shadow-sm rounded-xl">
                <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">SURAT KETERANGAN CATATAN KEPOLISIAN</h2>
                <p class="mb-8 text-center text-gray-600">Isi formulir dibawah ini dengan lengkap</p>

                <form method="POST" id="form-skck" class="space-y-6">
                    @csrf
                    <input type="hidden" id="skck" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <!-- Nama Lengkap -->
                        <div>
                            <label for="nama" class="block mb-2 font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" id="nama" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>

                        <!-- NIK -->
                        <div>
                            <label for="nik" class="block mb-2 font-medium text-gray-700">NIK (Nomor Induk Kependudukan)</label>
                            <input type="text" id="nik" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>

                        <!-- Jenis Kelamin -->
                        <div>
                            <label for="jenis_kelamin" class="block mb-2 font-medium text-gray-700">Jenis Kelamin</label>
                            <input type="text" id="jenis_kelamin" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>

                        <!-- Tempat & Tanggal Lahir -->
                        <div>
                            <label for="ttl" class="block mb-2 font-medium text-gray-700">Tempat & Tanggal Lahir</label>
                            <input type="text" id="ttl" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>

                        <!-- Agama -->
                        <div>
                            <label for="agama" class="block mb-2 font-medium text-gray-700">Agama</label>
                            <input type="text" id="agama" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>

                        <!-- Pekerjaan -->
                        <div>
                            <label for="pekerjaan" class="block mb-2 font-medium text-gray-700">Pekerjaan</label>
                            <input type="text" id="pekerjaan" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="mt-6">
                        <label for="alamat" class="block mb-2 font-medium text-gray-700">Alamat</label>
                        <textarea id="alamat" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center mt-8">
                        <button type="submit" class="px-8 py-3 font-medium text-white transition-all rounded-lg shadow-sm bg-custom-green hover:bg-green-700 hover:shadow-md">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script>
        // Tangkap elemen form
        document.getElementById('form-skck').addEventListener('submit', function (e) {
            e.preventDefault(); // Mencegah pengiriman form secara default

            // Ambil data dari form
            const formData = {
                user_id: document.getElementById('skck').value,
                pilih_tujuan: 'SKCK', // Sesuaikan tujuan
                jenis_pengajuan: 'Surat Keterangan Catatan Kepolisian',
                status: 'Diproses',
                deskripsi:'Pengajuan SKCK',
                keterangan:'Pengajuan SKCK',
                tanggal_pengajuan: new Date().toISOString().slice(0, 10),
                nama: document.getElementById('nama').value.trim(),
                nik: document.getElementById('nik').value.trim(),
                jenis_kelamin: document.getElementById('jenis_kelamin').value.trim(),
                ttl: document.getElementById('ttl').value.trim(),
                agama: document.getElementById('agama').value.trim(),
                pekerjaan: document.getElementById('pekerjaan').value.trim(),
                alamat: document.getElementById('alamat').value.trim()
            };

            // Validasi: Pastikan semua field tidak kosong
            let isValid = true;
            for (const [key, value] of Object.entries(formData)) {
                if (!value) {
                    isValid = false;
                    document.getElementById(key).classList.add('border-red-500'); // Tambahkan border merah
                }
            }

            // Jika ada field yang kosong, tampilkan pesan peringatan
            if (!isValid) {
                alert('Mohon isi semua field yang wajib diisi.');
                return;
            }

            // Kirim data menggunakan Fetch API jika validasi berhasil
            fetch('http://tesdesa.test/api/user/submission/post', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(formData) // Konversi data ke JSON
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => { throw err; });
                }
                return response.json(); // Parsing JSON dari respons jika berhasil
            })
            .then(data => {
                // Tampilkan pesan sukses
                alert('Pengajuan berhasil dikirim: ' + data.message);
                window.location.href = '/civil'; // Reset form setelah submit
            })
            .catch(error => {
                // Tangani error
                console.error('Terjadi kesalahan:', error);
                alert('Gagal mengirim pengajuan. Mohon periksa kembali data Anda.');
            });
        });
    </script>
</body>
</html>
