<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <p class="mt-2 text-2xl font-bold" id="totalPengajuan">Loading...</p>
                    </div>
                    <div class="p-4 bg-green-50 rounded-xl">
                        <h3 class="text-sm font-medium text-gray-600">RATA-RATA WAKTU</h3>
                        <p class="mt-2 text-2xl font-bold" id="avgWaktu">Loading...</p>
                    </div>
                    <div class="p-4 bg-green-50 rounded-xl">
                        <h3 class="text-sm font-medium text-gray-600">PALING BANYAK DIAJUKAN</h3>
                        <p class="mt-2 text-2xl font-bold" id="mostPengajuan">Loading...</p>
                    </div>
                    <div class="p-4 bg-green-50 rounded-xl">
                        <h3 class="text-sm font-medium text-gray-600">KINERJA TERBAIK</h3>
                        <p class="mt-2 text-2xl font-bold" id="bestPerformance">Loading...</p>
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
        });

        // Fungsi untuk mengambil data statistik bulanan dari API
        async function fetchMonthlyStatistics() {
            try {
                const response = await fetch('http://tesdesa.test/api/submission', {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer {{ auth()->user()->api_token }}`
                    }
                });
                const data = await response.json();

                if (data) {
                    // Menampilkan data ke dalam chart bulanan
                    renderChart('statisticsChart', data.labels, data.datasets, 'bar');

                    // Update kartu statistik
                    document.getElementById('totalPengajuan').innerText = data.totalPengajuan || 0;
                    document.getElementById('avgWaktu').innerText = `${data.avgWaktu || 0} Hari`;
                    document.getElementById('mostPengajuan').innerText = data.mostPengajuan || 'Tidak Ada';
                }
            } catch (error) {
                console.error('Error fetching monthly statistics:', error);
            }
        }

        // Fungsi untuk mengambil data kinerja staff dari API
        async function fetchStaffPerformance() {
            try {
                const response = await fetch('http://tesdesa.test/api/submission', {
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer {{ auth()->user()->api_token }}`
                    }
                });
                const data = await response.json();

                if (data) {
                    // Menampilkan data ke dalam chart kinerja staff
                    renderChart('performanceChart', data.labels, data.datasets, 'bar');

                    // Update kartu kinerja terbaik
                    document.getElementById('bestPerformance').innerText = `${data.bestPerformance || 0}%`;
                }
            } catch (error) {
                console.error('Error fetching staff performance:', error);
            }
        }

        // Fungsi untuk membuat chart
        function renderChart(canvasId, labels, datasets, type) {
            const ctx = document.getElementById(canvasId).getContext('2d');
            new Chart(ctx, {
                type: type,
                data: {
                    labels: labels,
                    datasets: datasets
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
        }

        // Tab switching
        const statistikBtn = document.getElementById('statistikBtn');
        const kinerjaBtn = document.getElementById('kinerjaBtn');
        const statistikContent = document.getElementById('statistikContent');
        const kinerjaContent = document.getElementById('kinerjaContent');

        statistikBtn.addEventListener('click', () => {
            statistikBtn.classList.add('bg-green-800', 'text-white');
            statistikBtn.classList.remove('bg-white', 'text-gray-700');
            kinerjaBtn.classList.add('bg-white', 'text-gray-700');
            kinerjaBtn.classList.remove('bg-green-800', 'text-white');
            statistikContent.classList.remove('hidden');
            kinerjaContent.classList.add('hidden');

            // Fetch statistik bulanan
            fetchMonthlyStatistics();
        });

        kinerjaBtn.addEventListener('click', () => {
            kinerjaBtn.classList.add('bg-green-800', 'text-white');
            kinerjaBtn.classList.remove('bg-white', 'text-gray-700');
            statistikBtn.classList.add('bg-white', 'text-gray-700');
            statistikBtn.classList.remove('bg-green-800', 'text-white');
            kinerjaContent.classList.remove('hidden');
            statistikContent.classList.add('hidden');

            // Fetch kinerja staff
            fetchStaffPerformance();
        });

        // Fetch statistik bulanan dan kinerja staff saat halaman dimuat
        document.addEventListener('DOMContentLoaded', () => {
            fetchMonthlyStatistics();
            fetchStaffPerformance();
        });
    </script>

</body>
</html>
