<!-- resources/views/admin/activities.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activities SuperAdmin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="bg-green-700 w-64 min-h-screen hidden md:block">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-white">SuperAdmin</h1>
            </div>
            <nav class="mt-6">
                <div class="px-4">
                    <div class="p-4">
                        <a href="/super" class="text-white flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Users
                        </a>
                    </div>
                    <div class="bg-green-600 rounded-lg p-4 mb-4">
                        <a href="#" class="text-white flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Activities
                        </a>
                    </div>
                </div>
            </nav>
            <div class="absolute bottom-4 left-4">
                <button class="text-white flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-green-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Keluar
                </button>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-x-hidden">
            <!-- Mobile Header -->
            <div class="md:hidden bg-green-700 p-4">
                <button class="text-white" id="mobile-menu-button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Content Header -->
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Activities (Super Admin)</h2>
                </div>

                <!-- Search Bar -->
                <div class="mb-6">
                    <input type="text" placeholder="Search" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-green-500">
                </div>

                <!-- Table -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Document Type</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @php
                                $activities = [
                                    ['user' => 'Mia Amelia', 'document' => 'Surat Keterangan Domisili', 'status' => 'Dalam Proses', 'date' => '2024-11-22', 'time' => '09:30'],
                                    ['user' => 'Biru Abadi', 'document' => 'Surat Izin Usaha', 'status' => 'Selesai', 'date' => '2024-11-22', 'time' => '09:30'],
                                    ['user' => 'Mia Amelia', 'document' => 'Surat Keterangan Domisili', 'status' => 'Dalam Proses', 'date' => '2024-11-22', 'time' => '09:30'],
                                    ['user' => 'Mia Amelia', 'document' => 'Surat Keterangan Domisili', 'status' => 'Dalam Proses', 'date' => '2024-11-22', 'time' => '09:30'],
                                    ['user' => 'Mia Amelia', 'document' => 'Surat Keterangan Domisili', 'status' => 'Dalam Proses', 'date' => '2024-11-22', 'time' => '09:30'],
                                    ['user' => 'Mia Amelia', 'document' => 'Surat Keterangan Domisili', 'status' => 'Dalam Proses', 'date' => '2024-11-22', 'time' => '09:30'],
                                    ['user' => 'Mia Amelia', 'document' => 'Surat Keterangan Domisili', 'status' => 'Dalam Proses', 'date' => '2024-11-22', 'time' => '09:30'],
                                    ['user' => 'Mia Amelia', 'document' => 'Surat Keterangan Domisili', 'status' => 'Dalam Proses', 'date' => '2024-11-22', 'time' => '09:30'],
                                    ['user' => 'Mia Amelia', 'document' => 'Surat Keterangan Domisili', 'status' => 'Dalam Proses', 'date' => '2024-11-22', 'time' => '09:30'],
                                    ['user' => 'Mia Amelia', 'document' => 'Surat Keterangan Domisili', 'status' => 'Dalam Proses', 'date' => '2024-11-22', 'time' => '09:30']
                                ];
                            @endphp

                            @foreach($activities as $activity)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $activity['user'] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $activity['document'] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $activity['status'] === 'Selesai' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                        {{ $activity['status'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $activity['date'] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $activity['time'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('h-screen');
        });
    </script>
</body>
</html>