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

    loadingIndicator.style.display = 'block'; // Tampilkan loading

    // Menggunakan fetch untuk mengambil data
    fetch('http://tesdesa.test/api/super/submission', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer {{ auth()->user()->api_token }}` // Token autentikasi, sesuaikan dengan kebutuhan
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json(); // Parsing response menjadi JSON
    })
    .then(data => {
        loadingIndicator.style.display = 'none'; // Sembunyikan loading setelah data diambil

        const activities = Array.isArray(data.data) ? data.data : []; // Pastikan `activities` adalah array

        tableBody.innerHTML = ''; // Hapus konten tabel sebelumnya

        if (activities.length === 0) {
            // Jika tidak ada data
            const emptyRow = document.createElement('tr');
            emptyRow.innerHTML = `
                <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada data aktivitas.</td>
            `;
            tableBody.appendChild(emptyRow);
            return;
        }

        // Iterasi data aktivitas
        activities.forEach(activity => {
            const row = document.createElement('tr');
            row.classList.add('hover:bg-gray-50');

            // Kolom User
            const userCell = document.createElement('td');
            userCell.classList.add('px-6', 'py-4', 'text-sm', 'text-gray-900');
            userCell.textContent = activity.user?.nama_lengkap || 'Tidak tersedia'; // Handle jika user atau nama_lengkap tidak tersedia
            row.appendChild(userCell);

            // Kolom Document
            const documentCell = document.createElement('td');
            documentCell.classList.add('px-6', 'py-4', 'text-sm', 'text-gray-500');
            documentCell.textContent = activity.document || 'Tidak tersedia'; // Handle jika document tidak tersedia
            row.appendChild(documentCell);

            // Kolom Status
            const statusCell = document.createElement('td');
            statusCell.classList.add('px-6', 'py-4');
            const statusSpan = document.createElement('span');

            const statusClasses = activity.status === 'Selesai'
                ? ['bg-green-100', 'text-green-800']
                : ['bg-blue-100', 'text-blue-800'];

            statusSpan.classList.add(
                'px-3', 'py-1', 'inline-flex', 'text-xs', 'leading-5', 'font-semibold', 'rounded-full',
                ...statusClasses // Tambahkan kelas menggunakan spread operator
            );
            statusSpan.textContent = activity.status || 'Tidak tersedia'; // Handle jika status tidak tersedia
            statusCell.appendChild(statusSpan);
            row.appendChild(statusCell);

            // Kolom Date
            const dateCell = document.createElement('td');
            dateCell.classList.add('px-6', 'py-4', 'text-sm', 'text-gray-500');
            dateCell.textContent = activity.date || 'Tidak tersedia'; // Handle jika date tidak tersedia
            row.appendChild(dateCell);

            // Kolom Time
            const timeCell = document.createElement('td');
            timeCell.classList.add('px-6', 'py-4', 'text-sm', 'text-gray-500');
            timeCell.textContent = activity.time || 'Tidak tersedia'; // Handle jika time tidak tersedia
            row.appendChild(timeCell);

            // Tambahkan baris ke tabel
            tableBody.appendChild(row);
        });
    })
    .catch(error => {
        // Tangani error saat pengambilan data
        loadingIndicator.style.display = 'none';
        alert('Terjadi kesalahan saat mengambil data aktivitas.');
        console.error('Error:', error);
        tableBody.innerHTML = `
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-red-500">Terjadi kesalahan dalam memuat data aktivitas.</td>
            </tr>
        `;
    });
});

    </script>


</body>
</html>
