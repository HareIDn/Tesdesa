<!-- resources/views/admin/activities.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Activities SuperAdmin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="hidden w-64 min-h-screen bg-custom-green md:block">
            @include('components.sidebar-super-admin')
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-x-hidden">
            <!-- Mobile Header -->
            <div class="p-4 bg-green-700 md:hidden">
                <button class="text-white" id="mobile-menu-button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Content Header -->
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Activities (Super Admin)</h2>
                </div>

                <!-- Search Bar -->
                <div class="mb-6">
                    <input type="text" placeholder="Search" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500">
                </div>

                <!-- Table -->
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">User</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Document Type</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Date</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Time</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="activities-table">
                            <!-- Data akan dimasukkan menggunakan JavaScript -->
                        </tbody>
                    </table>
                    <div id="loading" class="py-4 text-center">Loading...</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const loadingIndicator = document.getElementById('loading');
    const tableBody = document.getElementById('activities-table');

    // Tampilkan indikator loading saat data sedang diambil
    loadingIndicator.style.display = 'block';

    // Fetch data pengajuan
    fetch('http://tesdesa.test/api/super/submission/user', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer {{ auth()->user()->api_token }}`
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json(); // Parsing JSON
    })
    .then(data => {
        loadingIndicator.style.display = 'none'; // Sembunyikan loading
        const submissions = Array.isArray(data.data) ? data.data : [];

        // Jika data kosong, tampilkan pesan
        if (submissions.length === 0) {
            tableBody.innerHTML = `<tr>
                <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada data aktivitas.</td>
            </tr>`;
            return;
        }

        // Modifikasi data sebelum ditampilkan
        const rows = submissions.map((submission) => {
            const userName = submission.user?.nama_lengkap || 'Tidak tersedia';
            const documentType = submission.pilih_tujuan || 'Tidak tersedia';
            const status = submission.status || 'Tidak tersedia';
            const date = status === 'Diproses'
                ? new Date(submission.tanggal_diproses).toLocaleDateString()
                : new Date(submission.tanggal_pengajuan).toLocaleDateString();
            const time = status === 'Diproses'
                ? new Date(submission.tanggal_diproses).toLocaleTimeString()
                : new Date(submission.tanggal_pengajuan).toLocaleTimeString();

            return `
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-900">${userName}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">${documentType}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                            ${status === 'Selesai' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800'}">
                            ${status}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">${date}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">${time}</td>
                </tr>`;
        });

        // Tambahkan semua baris ke tabel
        tableBody.innerHTML = rows.join('');
    })
    .catch(error => {
        // Tangani error
        loadingIndicator.style.display = 'none';
        console.error('Error fetching submissions:', error);
        tableBody.innerHTML = `<tr>
            <td colspan="5" class="px-6 py-4 text-center text-red-500">Terjadi kesalahan saat memuat data aktivitas.</td>
        </tr>`;
    });
});

    </script>

</body>
</html>
