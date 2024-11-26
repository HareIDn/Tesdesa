<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Pengajuan Online Kelurahan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'custom-green': '#4A7251',
                        'custom-green-light': '#558459', // Slightly lighter for hover states
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-custom-green text-white">
            <div class="p-4">
                <h1 class="text-xl font-semibold mb-8">Beranda Warga</h1>
                
                <!-- Menu -->
                <div class="space-y-2">
                    <div class="bg-custom-green-light rounded p-2">
                        <span>Beranda</span>
                    </div>
                    
                    <div class="mb-4">
                        <h1 class="text-xl font-semibold mb-2">E-Layanan</h1>
                    </div>
                    
                    <div class="space-y-2 ml-2">
                        <div class="hover:bg-custom-green-light p-2 rounded cursor-pointer transition-colors duration-200">
                            Surat Keterangan Catatan Kepolisian
                        </div>
                        <div class="hover:bg-custom-green-light p-2 rounded cursor-pointer transition-colors duration-200">
                            Surat Keterangan Domisili
                        </div>
                        <div class="hover:bg-custom-green-light p-2 rounded cursor-pointer transition-colors duration-200">
                            Surat Keterangan Tidak Mampu
                        </div>
                        <div class="hover:bg-custom-green-light p-2 rounded cursor-pointer transition-colors duration-200">
                            Surat Izin Usaha
                        </div>
                    </div>
                </div>
                
                <!-- Logout Button -->
                <div class="absolute bottom-4 w-56">
                    <button class="w-full bg-custom-green-light hover:bg-opacity-80 text-white py-2 px-4 rounded transition-colors duration-200">
                        Keluar
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Welcome Card -->
            <div class="bg-white rounded-lg shadow p-6 mb-8">
                <div class="flex justify-between">
                    <div class="w-2/3">
                        <h2 class="text-xl font-semibold mb-4">Selamat datang di Portal Pengajuan Online Kelurahan</h2>
                        <p class="text-gray-600">
                            Layanan ini dirancang untuk memudahkan warga dalam mengajukan berbagai jenis surat keterangan secara online tanpa perlu datang langsung ke kantor Kelurahan. Proses pengajuan dapat dilakukan 24 jam dan statu pengajuan dapat dipantau secara real-time. Semua pengajuan akan diproses sesuai dengan prosedur yang berlaku.
                        </p>
                    </div>
                    <div class="w-1/3">
                    @if (file_exists(public_path('images/home1.png')))
                        <img src="{{ asset('images/home1.png') }}" alt="Portal illustration" class="w-full h-full"/>
                    @endif
                    </div>
                </div>
            </div>

            <!-- Service History Table -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Riwayat E-Layanan</h3>
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-custom-green bg-opacity-10">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">LAYANAN</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">STATUS</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">TANGGAL</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">JAM</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">Surat Izin Usaha</td>
                                <td class="px-6 py-4">Selesai</td>
                                <td class="px-6 py-4">2024-01-08</td>
                                <td class="px-6 py-4">13:00</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">Surat Izin Usaha</td>
                                <td class="px-6 py-4">Selesai</td>
                                <td class="px-6 py-4">2024-01-08</td>
                                <td class="px-6 py-4">13:00</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">Surat Izin Usaha</td>
                                <td class="px-6 py-4">Selesai</td>
                                <td class="px-6 py-4">2024-01-08</td>
                                <td class="px-6 py-4">13:00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>