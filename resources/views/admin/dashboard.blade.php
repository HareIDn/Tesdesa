<!-- resources/views/admin.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="hidden w-64 bg-white shadow-lg md:block">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-gray-800">Beranda Admin</h1>
            </div>
            <nav class="mt-6">
                <div class="px-4">
                    <div class="p-4 mb-4 bg-green-100 rounded-lg">
                        <a href="#" class="font-medium text-gray-700">Beranda</a>
                    </div>
                    <div class="p-4">
                        <a href="/statistic" class="text-gray-600">Statistik Layanan</a>
                    </div>
                    <div class="p-4">
                        <a href="/profile" class="text-gray-600">Edit Profil</a>
                    </div>
                </div>
            </nav>

            <div class="p-4 border-t">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center justify-center w-full p-4 text-red-600 transition-colors rounded-lg bg-red-50 hover:bg-red-100">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-x-hidden">
            <!-- Mobile Header -->
            <div class="p-4 bg-white shadow md:hidden">
                <button class="text-gray-600" id="mobile-menu-button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Welcome Section -->
            <div class="p-6">
                <h2 class="mb-6 text-2xl font-bold">Welcome Back, Admin!</h2>

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
                <div id="table-pengajuan" class="table-section">
                    <!-- Table content for Pengajuan -->
                    @include('admin.asset.table', ['title' => 'Daftar Surat Pengajuan'])
                </div>

                <div id="table-proses" class="hidden table-section">
                    <!-- Table content for Proses -->
                    @include('admin.asset.table', ['title' => 'Daftar Surat Sedang Diproses'])
                </div>

                <div id="table-selesai" class="hidden table-section">
                    <!-- Table content for Selesai -->
                    @include('admin.asset.table', ['title' => 'Daftar Surat Selesai Diproses'])
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
