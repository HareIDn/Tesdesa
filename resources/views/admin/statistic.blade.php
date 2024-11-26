<!-- resources/views/statistics.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Layanan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
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
                    <div class="p-4">
                        <a href="/admin" class="text-gray-600">Beranda</a>
                    </div>
                    <div class="bg-green-100 rounded-lg p-4 mb-4">
                        <a href="/statistics" class="text-gray-700 font-medium">Statistik Layanan</a>
                    </div>
                    <div class="p-4">
                        <a href="/profile" class="text-gray-600">Edit Profil</a>
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

            <div class="p-6">
                <!-- Metric Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                    <div class="bg-green-50 rounded-xl p-4">
                        <h3 class="text-sm font-medium text-gray-600">TOTAL PENGAJUAN</h3>
                        <p class="text-2xl font-bold mt-2">815</p>
                    </div>
                    <div class="bg-green-50 rounded-xl p-4">
                        <h3 class="text-sm font-medium text-gray-600">RATA-RATA WAKTU</h3>
                        <p class="text-2xl font-bold mt-2">2.5 Hari</p>
                    </div>
                    <div class="bg-green-50 rounded-xl p-4">
                        <h3 class="text-sm font-medium text-gray-600">PALING BANYAK DIAJUKAN</h3>
                        <p class="text-2xl font-bold mt-2">250</p>
                    </div>
                    <div class="bg-green-50 rounded-xl p-4">
                        <h3 class="text-sm font-medium text-gray-600">KINERJA TERBAIK</h3>
                        <p class="text-2xl font-bold mt-2">95%</p>
                    </div>
                </div>

                <!-- Tab Buttons -->
                <div class="flex gap-4 mb-6">
                    <button class="bg-green-800 text-white px-4 py-2 rounded-lg" id="statistikBtn">
                        Statistik Bulanan
                    </button>
                    <button class="bg-white text-gray-700 px-4 py-2 rounded-lg" id="kinerjaBtn">
                        Kinerja Staff
                    </button>
                </div>

                <!-- Chart Containers -->
                <div id="statistikContent" class="bg-white rounded-xl p-6 shadow-sm">
                    <h2 class="text-xl font-semibold mb-4">Trend Pengajuan Bulanan</h2>
                    <canvas id="statisticsChart" height="300"></canvas>
                </div>

                <div id="kinerjaContent" class="bg-white rounded-xl p-6 shadow-sm hidden">
                    <h2 class="text-xl font-semibold mb-4">Kinerja Staff</h2>
                    <canvas id="performanceChart" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu functionality
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

        // Monthly Statistics Chart
        const statsCtx = document.getElementById('statisticsChart').getContext('2d');
        new Chart(statsCtx, {
            type: 'bar',
            data: {
                labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN'],
                datasets: [{
                    label: 'Jumlah Pengajuan',
                    data: [50, 75, 100, 125, 150, 100],
                    backgroundColor: '#166534'
                },
                {
                    label: 'Rata-rata Waktu',
                    data: [30, 45, 60, 75, 90, 60],
                    backgroundColor: '#22c55e'
                },
                {
                    label: 'Paling Banyak Diajukan',
                    data: [20, 30, 40, 50, 60, 40],
                    backgroundColor: '#86efac'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Staff Performance Chart
        const perfCtx = document.getElementById('performanceChart').getContext('2d');
        new Chart(perfCtx, {
            type: 'bar',
            data: {
                labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'],
                datasets: [{
                    label: 'Staff A',
                    data: [95, 88, 92, 85, 90],
                    backgroundColor: '#166534'
                },
                {
                    label: 'Staff B',
                    data: [80, 85, 83, 88, 85],
                    backgroundColor: '#22c55e'
                },
                {
                    label: 'Staff C',
                    data: [75, 78, 82, 80, 85],
                    backgroundColor: '#86efac'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Tab switching
        const statistikBtn = document.getElementById('statistikBtn');
        const kinerjaBtn = document.getElementById('kinerjaBtn');
        const statistikContent = document.getElementById('statistikContent');
        const kinerjaContent = document.getElementById('kinerjaContent');

        statistikBtn.addEventListener('click', () => {
            statistikBtn.classList.remove('bg-white', 'text-gray-700');
            statistikBtn.classList.add('bg-green-800', 'text-white');
            kinerjaBtn.classList.remove('bg-green-800', 'text-white');
            kinerjaBtn.classList.add('bg-white', 'text-gray-700');
            statistikContent.classList.remove('hidden');
            kinerjaContent.classList.add('hidden');
        });

        kinerjaBtn.addEventListener('click', () => {
            kinerjaBtn.classList.remove('bg-white', 'text-gray-700');
            kinerjaBtn.classList.add('bg-green-800', 'text-white');
            statistikBtn.classList.remove('bg-green-800', 'text-white');
            statistikBtn.classList.add('bg-white', 'text-gray-700');
            kinerjaContent.classList.remove('hidden');
            statistikContent.classList.add('hidden');
        });
    </script>
</body>
</html>