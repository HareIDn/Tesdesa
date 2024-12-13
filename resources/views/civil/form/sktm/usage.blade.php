<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Surat Keterangan Domisili - SKTM</title>
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
    <div class="container px-4 py-8 mx-auto">
        <div class="max-w-4xl p-6 mx-auto bg-white rounded-lg shadow-md">
            <h2 class="mb-2 text-2xl font-bold text-center">SURAT KETERANGAN DOMISILI</h2>
            <p class="mb-8 text-center text-gray-600">Pastikan mengisi data berikut dengan benar</p>

            <!-- Progress Steps -->
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
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-custom-green">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <span class="mt-2 text-sm font-medium text-green-700">Data Keluarga</span>
                    </div>
                    <div class="flex flex-col items-center mx-4">
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-custom-green">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <span class="mt-2 text-sm font-medium text-green-700">Keperluan</span>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <form>
                @csrf
                <input type="hidden" id="sktm_usage" name="user_id" value="{{ auth()->user()->id }}">
                <div class="mb-6">
                    <label class="block mb-2 font-medium text-gray-700">Tujuan Pengajuan SKTM</label>
                    <select class="w-full border border-gray-300 rounded-md shadow-sm">
                        <option value="">Pilih Tujuan Pengajuan</option>
                        <option value="1">Pengajuan Bantuan Sosial</option>
                        <option value="2">Pengajuan Beasiswa</option>
                        <option value="3">Lainnya</option>
                    </select>
                </div>

                <!-- Upload Section -->
                <div class="p-8 text-center border-2 border-gray-300 border-dashed rounded-lg">
                    <div class="flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                        <h3 class="mb-2 text-lg font-medium text-gray-900">Upload Dokumen Pendukung</h3>
                        <p class="mb-4 text-sm text-gray-500">KTP, KK, Foto Rumah, dll</p>
                        <input type="file" id="file-upload" class="hidden" multiple>
                        <button type="button" onclick="document.getElementById('file-upload').click()" class="px-4 py-2 text-white rounded-md bg-custom-green hover:bg-green-700">
                            Pilih File
                        </button>
                        <div id="selected-files" class="mt-4 text-sm text-gray-600"></div>

                        <script>
                            document.getElementById('file-upload').addEventListener('change', function(e) {
                                const fileList = Array.from(e.target.files).map(file => file.name);
                                const selectedFilesDiv = document.getElementById('selected-files');
                                if (fileList.length > 0) {
                                    selectedFilesDiv.innerHTML = '<p class="font-medium">File yang dipilih:</p>' +
                                        fileList.map(name => `<p class="mt-1">• ${name}</p>`).join('');
                                } else {
                                    selectedFilesDiv.innerHTML = '';
                                }
                            });
                        </script>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-8">
                    <button onclick="window.history.back()" type="button" class="px-6 py-2 text-white bg-gray-500 rounded-md hover:bg-gray-600">
                        Sebelumnya
                    </button>
                    <button type="submit" class="px-6 py-2 text-white rounded-md bg-custom-green hover:bg-green-700">
                        Kirim Pengajuan
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const fileInput = document.getElementById('file-upload');

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                // Ambil ID pengajuan dari sessionStorage
                const submissionId = sessionStorage.getItem('submission_id');
                if (!submissionId) {
                    alert('ID pengajuan tidak ditemukan. Silakan kembali ke halaman sebelumnya.');
                    return;
                }

                // Ambil data dari form
                const tujuanPengajuan = document.querySelector('select').value.trim();
                const uploadedFiles = fileInput.files;

                // Validasi data form
                if (!tujuanPengajuan) {
                    alert('Tujuan pengajuan harus dipilih.');
                    return;
                }
                if (uploadedFiles.length === 0) {
                    alert('Minimal satu dokumen pendukung harus diunggah.');
                    return;
                }

                // Buat FormData untuk mengirim data
                const formData = new FormData();
                formData.append('submission_id', submissionId); // Tambahkan ID pengajuan
                formData.append('user_id', document.getElementById('sktm_usage').value);
                formData.append('pilih_tujuan', 'SKTM'); // Pilihan tujuan tetap 'SKTM'
                formData.append('jenis_pengajuan', 'Surat Keterangan Tidak Mampu');
                formData.append('status', 'Diproses');
                formData.append('keterangan', 'Pembuatan Surat Keterangan Tidak Mampu');
                formData.append('deskripsi', 'Pembuatan Surat Keterangan Tidak Mampu');
                formData.append('tanggal_pengajuan', new Date().toISOString().slice(0, 10));
                formData.append('tujuan_pengajuan', tujuanPengajuan);

                // Tambahkan file ke FormData
                for (let i = 0; i < uploadedFiles.length; i++) {
                    formData.append('dokumen_pendukung[]', uploadedFiles[i]);
                }

                // Kirim data ke API menggunakan metode POST
                fetch('http://tesdesa.test/api/user/submission/post', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json' // Tidak perlu 'Content-Type' karena FormData akan otomatis diatur
                    },
                    body: formData
                })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(err => {
                                throw err;
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        alert('Pengajuan berhasil diperbarui: ' + data.message);
                        window.location.href = '/dashboard'; // Redirect ke halaman berikutnya
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Gagal memperbarui pengajuan.');
                    });
            });

            // Menampilkan nama file yang dipilih
            fileInput.addEventListener('change', function (e) {
                const fileList = Array.from(e.target.files).map(file => file.name);
                const selectedFilesDiv = document.getElementById('selected-files');
                if (fileList.length > 0) {
                    selectedFilesDiv.innerHTML = '<p class="font-medium">File yang dipilih:</p>' +
                        fileList.map(name => `<p class="mt-1">• ${name}</p>`).join('');
                } else {
                    selectedFilesDiv.innerHTML = '';
                }
            });
        });
    </script>

</body>
</html>
