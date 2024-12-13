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

            <form id="usahaForm" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" id="usaha_selfdata" name="user_id" value="{{ auth()->user()->id }}">
                <!-- Grid for two columns -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" placeholder="Nama Lengkap" name="nama_lengkap" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tempat</label>
                            <input type="text" id="tempat" placeholder="Tempat" name="tempat" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kedudukan Dalam Perusahaan (Usaha)</label>
                            <input type="text" id="kedudukan_dalam_usaha" placeholder="Kedudukan Dalam Perusahaan (Usaha)" name="kedudukan_dalam_usaha" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">NPWP</label>
                            <input type="text" id="npwp" placeholder="NPWP" name="npwp" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">NIK (Nomor Induk Kependudukan)</label>
                            <input type="text" id="nik" placeholder="NIK" name="nik" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                            <input type="text" id="pekerjaan" placeholder="Pekerjaan" name="pekerjaan" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">No Telepon</label>
                            <input type="tel" id="no_telepon" placeholder="No Telepon" name="no_telepon" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>
                    </div>
                </div>

                <!-- Full Width Fields -->
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Alamat Lengkap</label>
                        <textarea id="alamat" placeholder="Alamat Lengkap" name="alamat" rows="3" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500"></textarea>
                    </div>

                    <!-- Address Details Grid -->
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">RT/RW</label>
                            <input type="text" id="rt_rw" placeholder="RT/RW" name="rt_rw" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kelurahan</label>
                            <input type="text" id="kelurahan" placeholder="Kelurahan" name="kelurahan" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kecamatan</label>
                            <input type="text" id="kecamatan" placeholder="Kecamatan" name="kecamatan" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kabupaten</label>
                            <input type="text" id="kabupaten" placeholder="Kabupaten" name="kabupaten" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="button" id="submitBtn" class="px-6 py-2 text-white rounded-md bg-custom-green hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Selanjutnya
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const submitBtn = document.getElementById('submitBtn');
            const form = document.getElementById('usahaForm');

            submitBtn.addEventListener('click', function (e) {
                e.preventDefault();

                const formData = {
                    user_id: document.getElementById('usaha_selfdata').value.trim(),
                    pilih_tujuan: 'Surat Ijin Usaha',
                    jenis_pengajuan: 'Surat Ijin Usaha',
                    status: 'Diproses',
                    keterangan: 'Pembuatan Surat Ijin Usaha',
                    deskripsi: 'Pembuatan Surat Ijin Usaha',
                    tanggal_pengajuan: new Date().toISOString().slice(0, 10),
                    nama_lengkap: document.getElementById('nama_lengkap').value.trim(),
                    nik: document.getElementById('nik').value.trim(),
                    tempat: document.getElementById('tempat').value.trim(),
                    tanggal_lahir: document.getElementById('tanggal_lahir').value.trim(),
                    pekerjaan: document.getElementById('pekerjaan').value.trim(),
                    no_telepon: document.getElementById('no_telepon').value.trim(),
                    npwp: document.getElementById('npwp').value.trim(),
                    kedudukan_dalam_usaha: document.getElementById('kedudukan_dalam_usaha').value.trim(),
                    alamat: document.getElementById('alamat').value.trim(),
                    rt_rw: document.getElementById('rt_rw').value.trim(),
                    kelurahan: document.getElementById('kelurahan').value.trim(),
                    kecamatan: document.getElementById('kecamatan').value.trim(),
                    kabupaten: document.getElementById('kabupaten').value.trim(),
                };

                for (let key in formData) {
                    if (!formData[key]) {
                        alert(`Field ${key.replace('_', ' ')} tidak boleh kosong.`);
                        return;
                    }
                }

                submitBtn.disabled = true;
                submitBtn.textContent = 'Mengirim...';

                fetch('http://tesdesa.test/api/user/submission/post', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(formData),
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Gagal mengirim data');
                        }
                        return response.json();
                    })
                    .then(data => {
                        sessionStorage.setItem('submission_id', data.data.id);
                        window.location.href = '/civil/usaha1';
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Gagal mengirim data.');
                        submitBtn.disabled = false;
                        submitBtn.textContent = 'Selanjutnya';
                    });
            });
        });
    </script>
</body>
</html>
