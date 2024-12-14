<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Beranda Admin</title>
    <!-- Menyertakan file CSS dan JS yang diproses dengan Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="hidden w-64 bg-white shadow-lg md:block">
            @include('components.sidebar-admin')
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-x-hidden">
            <!-- Mobile Header (Tombol Menu untuk perangkat mobile) -->
            <div class="p-4 bg-white shadow md:hidden">
                <button class="text-gray-600" id="mobile-menu-button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Welcome Section -->
            <div class="p-6">
                <h2 class="mb-6 text-2xl font-bold">Selamat Datang Kembali</h2>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3">
                    <!-- Surat Pengajuan Card -->
                    <div id="card-pengajuan" class="p-6 transition-shadow shadow-sm cursor-pointer bg-green-50 rounded-xl hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700">SURAT PENGAJUAN</h3>
                                <p class="mt-2 text-3xl font-bold text-gray-900">200</p>
                            </div>
                            <div class="p-3 bg-green-100 rounded-lg">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Sedang Diproses Card -->
                    <div id="card-proses" class="p-6 transition-shadow bg-white shadow-sm cursor-pointer rounded-xl hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700">SEDANG DIPROSES</h3>
                                <p class="mt-2 text-3xl font-bold text-gray-900">60</p>
                            </div>
                            <div class="p-3 rounded-lg bg-blue-50">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Selesai Diproses Card -->
                    <div id="card-selesai" class="p-6 transition-shadow bg-white shadow-sm cursor-pointer rounded-xl hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700">SELESAI DIPROSES</h3>
                                <p class="mt-2 text-3xl font-bold text-gray-900">500</p>
                            </div>
                            <div class="p-3 rounded-lg bg-green-50">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table Sections -->
                <div id="loading" class="hidden py-4 text-center">Loading...</div>

                <div id="table-pengajuan" class="table-section">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-gray-500">ID</th>
                                <th class="px-6 py-3 text-left text-gray-500">Nama</th>
                                <th class="px-6 py-3 text-left text-gray-500">Status</th>
                            </tr>
                        </thead>
                        <tbody id="content-pengajuan"></tbody>
                    </table>
                </div>

                <div id="table-proses" class="hidden table-section">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-gray-500">ID</th>
                                <th class="px-6 py-3 text-left text-gray-500">Nama</th>
                                <th class="px-6 py-3 text-left text-gray-500">Status</th>
                            </tr>
                        </thead>
                        <tbody id="content-proses"></tbody>
                    </table>
                </div>

                <div id="table-selesai" class="hidden table-section">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-gray-500">ID</th>
                                <th class="px-6 py-3 text-left text-gray-500">Nama</th>
                                <th class="px-6 py-3 text-left text-gray-500">Status</th>
                            </tr>
                        </thead>
                        <tbody id="content-selesai"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        const sections = {
            'card-pengajuan': { tableId: 'content-pengajuan', status: 'pengajuan' },
            'card-proses': { tableId: 'content-proses', status: 'diproses' },
            'card-selesai': { tableId: 'content-selesai', status: 'selesai' }
        };

        function fetchData(status, tableId) {
            document.getElementById('loading').classList.remove('hidden');
            fetch(`http://tesdesa.test/api/super/submissions?status=${status}`, {
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer {{ auth()->user()->api_token }}`
                }
            })
            .then(response => response.json())
            .then(data => {
                const tbody = document.getElementById(tableId);
                tbody.innerHTML = '';

                if (!data.data || data.data.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="3" class="py-4 text-center text-gray-500">Tidak ada data ditemukan.</td></tr>';
                } else {
                    data.data.forEach(item => {
                        tbody.innerHTML += `
                            <tr>
                                <td class="px-6 py-3">${item.id}</td>
                                <td class="px-6 py-3">${item.nama || 'Tidak tersedia'}</td>
                                <td class="px-6 py-3">${item.status || 'Tidak tersedia'}</td>
                            </tr>`;
                    });
                }
                document.getElementById('loading').classList.add('hidden');
            })
            .catch(err => {
                console.error(err);
                document.getElementById('loading').classList.add('hidden');
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            Object.keys(sections).forEach(cardId => {
                document.getElementById(cardId).addEventListener('click', () => {
                    Object.values(sections).forEach(section => {
                        document.getElementById(section.tableId).parentElement.parentElement.classList.add('hidden');
                    });
                    const { tableId, status } = sections[cardId];
                    fetchData(status, tableId);
                    document.getElementById(tableId).parentElement.parentElement.classList.remove('hidden');
                });
            });

            // Load default table
            fetchData(sections['card-pengajuan'].status, sections['card-pengajuan'].tableId);
        });
    </script>
</body>
</html>
