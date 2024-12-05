<!-- resources/views/statistics.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Layanan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="hidden w-64 bg-white shadow-lg md:block">
            @include('components.sidebar-admin')
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

            <div class="p-6">
                <!-- Metric Cards -->
                <div class="grid grid-cols-1 gap-4 mb-8 md:grid-cols-4">
                    <div class="p-4 bg-green-50 rounded-xl">
                        <h3 class="text-sm font-medium text-gray-600">TOTAL PENGAJUAN</h3>
                        <p class="mt-2 text-2xl font-bold">815</p>
                    </div>
                    <div class="p-4 bg-green-50 rounded-xl">
                        <h3 class="text-sm font-medium text-gray-600">RATA-RATA WAKTU</h3>
                        <p class="mt-2 text-2xl font-bold">2.5 Hari</p>
                    </div>
                    <div class="p-4 bg-green-50 rounded-xl">
                        <h3 class="text-sm font-medium text-gray-600">PALING BANYAK DIAJUKAN</h3>
                        <p class="mt-2 text-2xl font-bold">250</p>
                    </div>
                    <div class="p-4 bg-green-50 rounded-xl">
                        <h3 class="text-sm font-medium text-gray-600">KINERJA TERBAIK</h3>
                        <p class="mt-2 text-2xl font-bold">95%</p>
                    </div>
                </div>

                <!-- Tab Buttons -->
                <div class="flex gap-4 mb-6">
                    <button class="px-4 py-2 text-white bg-green-800 rounded-lg" id="statistikBtn">
                        Statistik Bulanan
                    </button>
                    <button class="px-4 py-2 text-gray-700 bg-white rounded-lg" id="kinerjaBtn">
                        Kinerja Staff
                    </button>
                </div>

                <!-- Chart Containers -->
                <div id="statistikContent" class="p-6 bg-white shadow-sm rounded-xl">
                    <h2 class="mb-4 text-xl font-semibold">Trend Pengajuan Bulanan</h2>
                    <canvas id="statisticsChart" height="300"></canvas>
                </div>

                <div id="kinerjaContent" class="hidden p-6 bg-white shadow-sm rounded-xl">
                    <h2 class="mb-4 text-xl font-semibold">Kinerja Staff</h2>
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

        // Grafik Statistik Bulanan menggunakan data dari controller
        const statsCtx = document.getElementById('statisticsChart').getContext('2d');
        new Chart(statsCtx, {
            type: 'bar',
            data: {
                labels: @json($monthlyData['labels']),
                datasets: @json($monthlyData['datasets'])
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

        // Grafik Kinerja Staff menggunakan data dari controller
        const perfCtx = document.getElementById('performanceChart').getContext('2d');
        new Chart(perfCtx, {
            type: 'bar',
            data: {
                labels: @json($staffPerformanceData['labels']),
                datasets: @json($staffPerformanceData['datasets'])
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
