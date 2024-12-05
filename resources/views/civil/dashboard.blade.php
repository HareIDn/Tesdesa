<!-- resources/views/dashboard/warga.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Pengajuan Online Kelurahan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 text-white bg-custom-green">
            <div class="p-4">
                <h1 class="mb-8 text-xl font-semibold">Beranda Warga</h1>

                <!-- Menu -->
                <div class="space-y-2">
                    <div class="p-2 rounded bg-custom-green-light">
                        <span>Beranda</span>
                    </div>

                    <div class="mb-4">
                        <h1 class="mb-2 text-xl font-semibold">E-Layanan</h1>
                    </div>

                    <div class="ml-2 space-y-2">
                        <div onclick="window.location.href='{{ route('skck.store') }}'" class="p-2 transition-colors duration-200 rounded cursor-pointer hover:bg-custom-green-light">
                            Surat Keterangan Catatan Kepolisian
                        </div>
                        <div onclick="window.location.href='{{ route('domisili.store') }}'" class="p-2 transition-colors duration-200 rounded cursor-pointer hover:bg-custom-green-light">
                            Surat Keterangan Domisili
                        </div>
                        <div onclick="window.location.href='{{ route('sktm.selfdata') }}'" class="p-2 transition-colors duration-200 rounded cursor-pointer hover:bg-custom-green-light">
                            Surat Keterangan Tidak Mampu
                        </div>
                        <div onclick="window.location.href='{{ route('usaha.selfdata') }}'" class="p-2 transition-colors duration-200 rounded cursor-pointer hover:bg-custom-green-light">
                            Surat Izin Usaha
                        </div>
                    </div>
                </div>

                <!-- Logout Button -->
                <div class="absolute w-56 bottom-4">
                    <button class="w-full px-4 py-2 text-white transition-colors duration-200 rounded bg-custom-green-light hover:bg-opacity-80">
                        Keluar
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Welcome Card -->
            <div class="p-6 mb-8 bg-white rounded-lg shadow">
                <div class="flex justify-between">
                    <div class="w-2/3">
                        <h2 class="mb-4 text-xl font-semibold">Selamat datang di Portal Pengajuan Online Kelurahan</h2>
                        <p class="text-gray-600">
                            Layanan ini dirancang untuk memudahkan warga dalam mengajukan berbagai jenis surat keterangan secara online tanpa perlu datang langsung ke kantor Kelurahan. Proses pengajuan dapat dilakukan 24 jam dan status pengajuan dapat dipantau secara real-time. Semua pengajuan akan diproses sesuai dengan prosedur yang berlaku.
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
                <h3 class="mb-4 text-lg font-semibold">Riwayat E-Layanan</h3>
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <table class="min-w-full">
                        <thead class="bg-custom-green bg-opacity-10">
                            <tr>
                                <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">LAYANAN</th>
                                <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">STATUS</th>
                                <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">TANGGAL</th>
                                <th class="px-6 py-3 text-sm font-semibold text-left text-gray-700">JAM</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($serviceHistory as $history)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $history['service'] }}</td>
                                <td class="px-6 py-4">{{ $history['status'] }}</td>
                                <td class="px-6 py-4">{{ $history['date'] }}</td>
                                <td class="px-6 py-4">{{ $history['time'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
