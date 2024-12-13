<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <main class="container px-4 py-8 mx-auto">
        <div class="max-w-4xl p-6 mx-auto bg-white rounded-lg shadow">
            <h2 class="mb-2 text-2xl font-semibold text-center">SURAT IZIN USAHA</h2>
            <p class="mb-8 text-center text-gray-600">Silahkan Lengkapi data berikut dengan benar</p>

            <form id="usahaForm" class="space-y-6">
                @csrf
                <input type="hidden" id="usaha_businessdata" name="user_id" value="{{ auth()->user()->id }}">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Usaha</label>
                        <input type="text" id="nama_usaha" placeholder="Nama Usaha" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Bentuk Usaha</label>
                        <input type="text" id="bentuk_usaha" placeholder="Bentuk Usaha" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Bidang Usaha</label>
                        <input type="text" id="bidang_usaha" placeholder="Bidang Usaha" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Modal Usaha (Rp)</label>
                        <input type="number" id="modal_usaha" placeholder="Modal Usaha (Rp)" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jumlah Karyawan</label>
                        <input type="number" id="jumlah_karyawan" placeholder="Jumlah Karyawan" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Alamat Usaha</label>
                        <textarea id="alamat_usaha" placeholder="Alamat Usaha" rows="4" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500"></textarea>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-8">
                    <button type="button" class="px-6 py-2 text-white bg-gray-500 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        Sebelumnya
                    </button>
                    <button type="submit" class="px-6 py-2 text-white rounded-md bg-custom-green hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('usahaForm');
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                const submissionId = sessionStorage.getItem('submission_id');
                if (!submissionId) {
                    if (confirm('ID pengajuan tidak ditemukan. Apakah Anda ingin kembali ke halaman sebelumnya?')) {
                        window.history.back();
                    }
                    return;
                }

                // Ambil data dari form
                const formData = {
                    submission_id: submissionId,
                    nama_usaha: document.getElementById('nama_usaha').value.trim(),
                    bentuk_usaha: document.getElementById('bentuk_usaha').value.trim(),
                    bidang_usaha: document.getElementById('bidang_usaha').value.trim(),
                    modal_usaha: parseFloat(document.getElementById('modal_usaha').value.trim()),
                    jumlah_karyawan: parseInt(document.getElementById('jumlah_karyawan').value.trim(), 10),
                    alamat_usaha: document.getElementById('alamat_usaha').value.trim(),
                };

                // Tambahkan data wajib dari halaman sebelumnya
                const mandatoryData = {
                    user_id: document.getElementById('usaha_businessdata').value.trim(),
                    pilih_tujuan: 'Surat Izin Usaha',
                    jenis_pengajuan: 'Surat Izin Usaha',
                    status: 'Diproses',
                    keterangan: 'Pembuatan Surat Izin Usaha',
                    deskripsi: 'Pembuatan Surat Izin Usaha',
                    tanggal_pengajuan: new Date().toISOString().slice(0, 10),
                };
                Object.assign(formData, mandatoryData);

                // Validasi semua data wajib diisi
                for (let key in formData) {
                    if (formData[key] === null || formData[key] === undefined || formData[key] === '') {
                        alert(`Field ${key.replace('_', ' ')} tidak boleh kosong.`);
                        return;
                    }
                }

                // Validasi angka positif
                if (formData.modal_usaha <= 0 || formData.jumlah_karyawan <= 0) {
                    alert('Modal Usaha dan Jumlah Karyawan harus lebih besar dari 0.');
                    return;
                }

                // Kirim data ke server
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
                        alert('Data berhasil diperbarui: ' + data.message);
                        form.reset(); // Reset form
                        window.location.href = '/civil'; // Ganti dengan rute halaman berikutnya
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert(`Gagal mengupdate data. Pesan kesalahan: ${error.message || 'Tidak diketahui'}`);
                    });
            });
        });
    </script>
</body>
</html>
