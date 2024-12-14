<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Jadwal Pengambilan Surat</title>
    @vite('resources/css/app.css')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Pilih semua card
            const cards = document.querySelectorAll(".card");

            // Tambahkan event listener untuk klik
            cards.forEach(card => {
                card.addEventListener("click", () => {
                    // Reset warna card lainnya
                    cards.forEach(c => c.classList.remove("bg-green-100", "border-green-500"));

                    // Tambahkan warna pada card yang diklik
                    card.classList.add("bg-green-100", "border-green-500");
                });
            });
        });
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <!-- Floating Box -->
        <div class="w-full max-w-lg p-6 bg-white rounded-lg shadow-lg">
            <!-- Header -->
            <div class="flex items-center mb-6">
                <button class="mr-4 text-gray-600 hover:text-gray-800" onclick="window.history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <h1 class="text-xl font-bold text-gray-800">Jadwal Pengambilan Surat</h1>
            </div>

            <!-- Title -->
            <h2 class="mb-4 text-lg font-semibold text-center text-gray-800">
                Pilih Waktu Pengambilan Surat
            </h2>

            <!-- Schedule Options -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <!-- Hari Senin -->
                <div class="p-4 text-center transition border border-gray-300 rounded-lg cursor-pointer card hover:shadow-lg">
                    <p class="text-sm font-semibold text-gray-800">Senin</p>
                    <p class="text-sm text-gray-600">Jam Operasional 08:00 - 16:00 WIB</p>
                </div>
                <!-- Hari Selasa -->
                <div class="p-4 text-center transition border border-gray-300 rounded-lg cursor-pointer card hover:shadow-lg">
                    <p class="text-sm font-semibold text-gray-800">Selasa</p>
                    <p class="text-sm text-gray-600">Jam Operasional 08:00 - 16:00 WIB</p>
                </div>
                <!-- Hari Rabu -->
                <div class="p-4 text-center transition border border-gray-300 rounded-lg cursor-pointer card hover:shadow-lg">
                    <p class="text-sm font-semibold text-gray-800">Rabu</p>
                    <p class="text-sm text-gray-600">Jam Operasional 08:00 - 16:00 WIB</p>
                </div>
                <!-- Hari Kamis -->
                <div class="p-4 text-center transition border border-gray-300 rounded-lg cursor-pointer card hover:shadow-lg">
                    <p class="text-sm font-semibold text-gray-800">Kamis</p>
                    <p class="text-sm text-gray-600">Jam Operasional 08:00 - 16:00 WIB</p>
                </div>
                <!-- Hari Jumat -->
                <div class="p-4 text-center transition border border-gray-300 rounded-lg cursor-pointer card hover:shadow-lg">
                    <p class="text-sm font-semibold text-gray-800">Jumat</p>
                    <p class="text-sm text-gray-600">Jam Operasional 08:00 - 16:00 WIB</p>
                </div>
                
            </div>

            <!-- Confirm Button -->
            <div>
                <button class="w-full py-3 font-semibold text-white transition rounded-lg shadow bg-custom-green hover:bg-green-800">
                    Konfirmasi Jadwal
                </button>
            </div>
        </div>
    </div>
</body>
</html>
