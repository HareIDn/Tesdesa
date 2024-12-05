<!-- resources/views/admin.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                {{-- <!-- Table Sections -->
                <div id="table-pengajuan" class="table-section">
                    <!-- Table content for Pengajuan -->
                    @foreach(\$pengajuan as \$item)
                        <tr>
                            <td>{{ \$item->id }}</td>
                            <td>{{ \$item->nama }}</td>
                            <td>{{ \$item->status }}</td>
                        </tr>
                    @endforeach
                </div>

                <div id="table-proses" class="hidden table-section">
                    <!-- Table content for Proses -->
                    @foreach(\$sedangDiproses as \$item)
                        <tr>
                            <td>{{ \$item->id }}</td>
                            <td>{{ \$item->nama }}</td>
                            <td>{{ \$item->status }}</td>
                        </tr>
                    @endforeach
                </div>

                <div id="table-selesai" class="hidden table-section">
                    <!-- Table content for Selesai -->
                    @foreach(\$selesaiDiproses as \$item)
                        <tr>
                            <td>{{ \$item->id }}</td>
                            <td>{{ \$item->nama }}</td>
                            <td>{{ \$item->status }}</td>
                        </tr>
                    @endforeach
                </div> --}}

                <!-- Table Sections -->
                <!-- Bagian tabel untuk Surat Pengajuan -->
                <div id="table-pengajuan" class="table-section">
                    @include('admin.asset.table', ['title' => 'Daftar Surat Pengajuan'])
                </div>

                <!-- Bagian tabel untuk Surat Sedang Diproses -->
                <div id="table-proses" class="hidden table-section">
                    @include('admin.asset.table', ['title' => 'Daftar Surat Sedang Diproses'])
                </div>

                <!-- Bagian tabel untuk Surat Selesai Diproses -->
                <div id="table-selesai" class="hidden table-section">
                    @include('admin.asset.table', ['title' => 'Daftar Surat Selesai Diproses'])
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle: Toggle menu untuk perangkat mobile
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const sidebar = document.querySelector('.min-h-screen > div:first-child');

        mobileMenuButton.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('absolute');
            sidebar.classList.toggle('z-50');
            sidebar.classList.toggle('bg-white');
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('h-screen');
        });

        // Table switching functionality: Fungsi untuk berpindah antara tabel
        const cards = {
            'card-pengajuan': 'table-pengajuan',
            'card-proses': 'table-proses',
            'card-selesai': 'table-selesai'
        };

        // Fungsi untuk menampilkan tabel yang dipilih dan menyembunyikan yang lain
        function showTable(tableId) {
            document.querySelectorAll('.table-section').forEach(table => {
                table.classList.add('hidden');
            });
            document.getElementById(tableId).classList.remove('hidden');
        }

        // Fungsi untuk memperbarui gaya kartu yang dipilih
        function updateCardStyles(selectedCardId) {
            Object.keys(cards).forEach(cardId => {
                document.getElementById(cardId).classList.remove('bg-green-50');
                document.getElementById(cardId).classList.add('bg-white');
            });
            document.getElementById(selectedCardId).classList.remove('bg-white');
            document.getElementById(selectedCardId).classList.add('bg-green-50');
        }

        // Menambahkan event listener ke kartu
        Object.entries(cards).forEach(([cardId, tableId]) => {
            document.getElementById(cardId).addEventListener('click', () => {
                showTable(tableId);
                updateCardStyles(cardId);
            });
        });
    </script>
</body>
</html>
