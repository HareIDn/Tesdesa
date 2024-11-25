<!-- resources/views/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="bg-white w-64 shadow-lg hidden md:block">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-gray-800">Beranda Admin</h1>
            </div>
            <nav class="mt-6">
                <div class="px-4">
                    <div class="bg-green-100 rounded-lg p-4 mb-4">
                        <a href="#" class="text-gray-700 font-medium">Beranda</a>
                    </div>
                    <div class="p-4">
                        <a href="/statistic" class="text-gray-600">Statistik Layanan</a>
                    </div>
                    <div class="p-4">
                        <a href="/edit" class="text-gray-600">Edit Profil</a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-x-hidden">
            <!-- Mobile Header -->
            <div class="md:hidden bg-white p-4 shadow">
                <button class="text-gray-600" id="mobile-menu-button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Welcome Section -->
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-6">Welcome Back, Admin!</h2>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Surat Pengajuan Card -->
                    <div id="card-pengajuan" class="bg-green-50 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow cursor-pointer">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700">SURAT PENGAJUAN</h3>
                                <p class="text-3xl font-bold text-gray-900 mt-2">200</p>
                            </div>
                            <div class="bg-green-100 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Sedang Diproses Card -->
                    <div id="card-proses" class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow cursor-pointer">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700">SEDANG DIPROSES</h3>
                                <p class="text-3xl font-bold text-gray-900 mt-2">60</p>
                            </div>
                            <div class="bg-blue-50 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Selesai Diproses Card -->
                    <div id="card-selesai" class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow cursor-pointer">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700">SELESAI DIPROSES</h3>
                                <p class="text-3xl font-bold text-gray-900 mt-2">500</p>
                            </div>
                            <div class="bg-green-50 p-3 rounded-lg">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table Sections -->
                <div id="table-pengajuan" class="table-section">
                    <!-- Table content for Pengajuan -->
                    @include('admin.asset.table', ['title' => 'Daftar Surat Pengajuan'])
                </div>

                <div id="table-proses" class="table-section hidden">
                    <!-- Table content for Proses -->
                    @include('admin.asset.table', ['title' => 'Daftar Surat Sedang Diproses'])
                </div>

                <div id="table-selesai" class="table-section hidden">
                    <!-- Table content for Selesai -->
                    @include('admin.asset.table', ['title' => 'Daftar Surat Selesai Diproses'])
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
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

        // Table switching functionality
        const cards = {
            'card-pengajuan': 'table-pengajuan',
            'card-proses': 'table-proses',
            'card-selesai': 'table-selesai'
        };

        // Function to show selected table and hide others
        function showTable(tableId) {
            // Hide all tables
            document.querySelectorAll('.table-section').forEach(table => {
                table.classList.add('hidden');
            });
            // Show selected table
            document.getElementById(tableId).classList.remove('hidden');
        }

        // Function to update card styles
        function updateCardStyles(selectedCardId) {
            // Reset all cards to default style
            Object.keys(cards).forEach(cardId => {
                document.getElementById(cardId).classList.remove('bg-green-50');
                document.getElementById(cardId).classList.add('bg-white');
            });
            // Highlight selected card
            document.getElementById(selectedCardId).classList.remove('bg-white');
            document.getElementById(selectedCardId).classList.add('bg-green-50');
        }

        // Add click listeners to cards
        Object.entries(cards).forEach(([cardId, tableId]) => {
            document.getElementById(cardId).addEventListener('click', () => {
                showTable(tableId);
                updateCardStyles(cardId);
            });
        });
    </script>
</body>
</html>