<!-- resources/views/dashboard/warga.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Portal Pengajuan Online Kelurahan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 text-white bg-custom-green">
            <div class="p-4">
                <h1 class="mb-8 text-xl font-semibold">Beranda Warga</h1>

                <!-- Menu -->
                <div class="space-y-4">
                    <!-- Bagian Beranda -->
                    <div class="p-3 text-white rounded-lg shadow-md bg-gradient-to-r from-green-700 to-green-800">
                        <span class="text-lg font-bold">Beranda</span>
                    </div>

                    <!-- Bagian E-Layanan -->
                    <div class="mb-4">
                        <h1 class="mb-2 text-2xl font-bold text-white">E-Layanan</h1>
                    </div>

                    <!-- Daftar Layanan -->
                    <div class="ml-2 space-y-3">
                        <div onclick="window.location.href='{{ route('skck.store') }}'"
                            class="p-3 text-gray-800 transition-all duration-300 bg-gray-100 rounded-lg shadow-md cursor-pointer dark:bg-gray-800 dark:text-gray-300 hover:bg-green-700 hover:text-white">
                            Surat Keterangan Catatan Kepolisian
                        </div>
                        <div onclick="window.location.href='{{ route('domisili.store') }}'"
                            class="p-3 text-gray-800 transition-all duration-300 bg-gray-100 rounded-lg shadow-md cursor-pointer dark:bg-gray-800 dark:text-gray-300 hover:bg-green-700 hover:text-white">
                            Surat Keterangan Domisili
                        </div>
                        <div onclick="window.location.href='{{ route('sktm.selfdata') }}'"
                            class="p-3 text-gray-800 transition-all duration-300 bg-gray-100 rounded-lg shadow-md cursor-pointer dark:bg-gray-800 dark:text-gray-300 hover:bg-green-700 hover:text-white">
                            Surat Keterangan Tidak Mampu
                        </div>
                        <div onclick="window.location.href='{{ route('usaha.selfdata') }}'"
                            class="p-3 text-gray-800 transition-all duration-300 bg-gray-100 rounded-lg shadow-md cursor-pointer dark:bg-gray-800 dark:text-gray-300 hover:bg-green-700 hover:text-white">
                            Surat Izin Usaha
                        </div>
                    </div>
                </div>

                <!-- Logout Button -->
                <div class="absolute w-56 bottom-4">
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit"
                            class="flex items-center justify-center w-full px-4 py-3 text-white transition-all duration-300 rounded-lg shadow-lg bg-gradient-to-r from-green-700 via-green-800 to-green-900 hover:shadow-xl hover:from-green-800 hover:to-green-950 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-green-700">
                            <iconify-icon class="mr-2 text-xl text-white" icon="carbon:logout">
                            </iconify-icon>
                            <span class="text-lg font-semibold">
                                @lang('Log Out')
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Welcome Card -->
            <div class="p-6 mb-8 bg-white rounded-lg shadow">
                <div class="flex justify-between">
                    <div class="w-2/3">
                        <h2 class="mb-4 text-xl font-semibold">Selamat datang di Portal Pengajuan Online Kelurahan</h2>
                        <p class="text-gray-600">
                            Layanan ini dirancang untuk memudahkan warga dalam mengajukan berbagai jenis surat keterangan secara online tanpa perlu datang langsung ke kantor Kelurahan. Proses pengajuan dapat dilakukan 24 jam dan status pengajuan dapat dipantau secara real-time. Semua pengajuan akan diproses sesuai dengan prosedur yang berlaku.
                        </p>
                    </div>
                    <div class="w-1/3">
                    @if (file_exists(public_path('images/home1.png')))
                        <img src="{{ asset('images/home1.png') }}" alt="Portal illustration" class="w-full h-full"/>
                    @endif
                    </div>
                </div>
            </div>

            <!-- Service History Table -->
            <div>
                <h3 class="mb-4 text-lg font-semibold">Riwayat E-Layanan</h3>
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <table class="min-w-full">
                        <thead class="bg-custom-green bg-opacity-10">
                            <tr>
                                <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">LAYANAN</th>
                                <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">STATUS</th>
                                <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">TANGGAL</th>
                                <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">JAM</th>
                            </tr>
                        </thead>
                        <tbody id="riwayatTableBody" class="divide-y divide-gray-200">
                            <!-- Data riwayat pengajuan akan diisi oleh JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
            <script>
                // Ambil data riwayat pengajuan saat halaman dimuat
                document.addEventListener("DOMContentLoaded", function() {
                    const tableBody = document.getElementById('riwayatTableBody');

                    // Menampilkan loading sementara data diambil
                    tableBody.innerHTML = '<tr><td colspan="4" class="text-center">Loading...</td></tr>';

                    // Gunakan fetch untuk mengambil data riwayat pengajuan
                    fetch('http://tesdesa.test/api/nr/submission', {
                        method: 'GET',
                        headers: {
                            'Authorization': `Bearer {{ auth()->user()->api_token }}`, // Token autentikasi, sesuaikan jika berbeda
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => {
                        // Periksa apakah respons berhasil
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json(); // Parsing JSON
                    })
                    .then(result => {
                        console.log('Response data:', result); // Debugging respons API

                        // Jika API mengembalikan objek dengan data di dalamnya, akses `result.data`
                        const data = Array.isArray(result) ? result : result.data;

                        if (!Array.isArray(data)) {
                            // Jika `data` bukan array, tampilkan pesan error di tabel
                            console.error('Error: Data is not an array');
                            tableBody.innerHTML = '<tr><td colspan="4" class="text-center text-red-500">Data tidak valid</td></tr>';
                            return;
                        }

                        // Hapus loading setelah data dimuat
                        tableBody.innerHTML = '';

                        if (data.length === 0) {
                            // Jika tidak ada data
                            tableBody.innerHTML = '<tr><td colspan="4" class="text-center">Tidak ada data pengajuan</td></tr>';
                            return;
                        }

                        // Iterasi data dan masukkan ke dalam tabel
                        data.forEach(item => {
                            const row = document.createElement('tr');
                            row.classList.add('hover:bg-gray-50');
                            row.innerHTML = `
                                <td class="px-6 py-4">${item.jenis_pengajuan || 'Tidak tersedia'}</td>
                                <td class="px-6 py-4">${item.status || 'Tidak tersedia'}</td>
                                <td class="px-6 py-4">${item.tanggal_pengajuan ? new Date(item.tanggal_pengajuan).toLocaleDateString() : '-'}</td>
                                <td class="px-6 py-4">${item.tanggal_pengajuan ? new Date(item.tanggal_pengajuan).toLocaleTimeString() : '-'}</td>
                            `;
                            tableBody.appendChild(row);
                        });
                    })
                    .catch(error => {
                        // Menangani error dan menampilkan pesan error di tabel
                        console.error('Error fetching data:', error);
                        tableBody.innerHTML = '<tr><td colspan="4" class="text-center text-red-500">Terjadi kesalahan dalam memuat data.</td></tr>';
                    });
                });
            </script>

        </div>
    </div>
</body>
</html>
