<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Status Surat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <!-- Floating Box -->
        <div class="relative w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
            <!-- Header -->
            <div class="flex items-center mb-6">
                <button class="mr-4 text-gray-600 hover:text-gray-800" onclick="window.history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <h1 class="text-xl font-bold text-gray-800">Tracking Status Surat</h1>
            </div>

            <!-- Status List -->
            <div class="space-y-6">
                <!-- Status: Surat Diterima -->
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-10 h-10 text-white rounded-full bg-custom-green">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-base font-semibold text-gray-800">Surat Diterima</p>
                        <p class="text-sm text-gray-600">Nov 14, 13:20</p>
                    </div>
                </div>

                <!-- Status: Sedang Diproses -->
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-10 h-10 text-white rounded-full bg-custom-green">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-base font-semibold text-gray-800">Sedang Diproses</p>
                        <p class="text-sm text-gray-600">Nov 15, 14:00</p>
                    </div>
                </div>

                <!-- Status: Selesai Diproses -->
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-10 h-10 text-gray-600 bg-gray-300 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 16l-4-4m0 0l4-4m-4 4h16" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-base font-semibold text-gray-800">Selesai Diproses</p>
                        <p class="text-sm text-gray-600">Est. Nov 16</p>
                    </div>
                </div>
            </div>

            <!-- Button -->
            <div class="mt-8">
                <button class="w-full py-3 font-semibold text-white transition rounded-lg shadow bg-custom-green hover:bg-green-800">
                    Pilih Jadwal Pengambilan
                </button>
            </div>
        </div>
    </div>
</body>
</html>
