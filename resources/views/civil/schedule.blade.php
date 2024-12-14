<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pilih Jadwal Pengambilan Surat</title>
    @vite('resources/css/app.css')
    <script>
        const API_BASE_URL = 'http://tesdesa.test/api'; // Configurable base URL
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
                <div id="senin" class="p-4 text-center transition border border-gray-300 rounded-lg cursor-pointer card hover:shadow-lg">
                    <p class="text-sm font-semibold text-gray-800">Senin</p>
                    <p class="text-sm text-gray-600">Jam Operasional 08:00 - 16:00 WIB</p>
                </div>
                <!-- Hari Selasa -->
                <div id="selasa" class="p-4 text-center transition border border-gray-300 rounded-lg cursor-pointer card hover:shadow-lg">
                    <p class="text-sm font-semibold text-gray-800">Selasa</p>
                    <p class="text-sm text-gray-600">Jam Operasional 08:00 - 16:00 WIB</p>
                </div>
                <!-- Hari Rabu -->
                <div id="rabu" class="p-4 text-center transition border border-gray-300 rounded-lg cursor-pointer card hover:shadow-lg">
                    <p class="text-sm font-semibold text-gray-800">Rabu</p>
                    <p class="text-sm text-gray-600">Jam Operasional 08:00 - 16:00 WIB</p>
                </div>
                <!-- Hari Kamis -->
                <div id="kamis" class="p-4 text-center transition border border-gray-300 rounded-lg cursor-pointer card hover:shadow-lg">
                    <p class="text-sm font-semibold text-gray-800">Kamis</p>
                    <p class="text-sm text-gray-600">Jam Operasional 08:00 - 16:00 WIB</p>
                </div>
                <!-- Hari Jumat -->
                <div id="jumat" class="p-4 text-center transition border border-gray-300 rounded-lg cursor-pointer card hover:shadow-lg">
                    <p class="text-sm font-semibold text-gray-800">Jumat</p>
                    <p class="text-sm text-gray-600">Jam Operasional 08:00 - 16:00 WIB</p>
                </div>
            </div>

            <!-- Confirm Button -->
            <div>
                <button id="confirmSchedule" class="w-full py-3 font-semibold text-white transition rounded-lg shadow bg-custom-green hover:bg-green-800">
                    Konfirmasi Jadwal
                </button>
            </div>
        </div>
    </div>
    <div id="modal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-lg">
            <h2 class="mb-4 text-lg font-bold text-center text-gray-800">Konfirmasi Jadwal</h2>
            <p class="mb-6 text-center text-gray-600">Jadwal Anda telah berhasil dikonfirmasi!</p>
            <button onclick="closeModal()" class="w-full py-2 text-white rounded bg-custom-green hover:bg-green-700">Tutup</button>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cards = document.querySelectorAll(".card");
            const confirmButton = document.getElementById("confirmSchedule");
            let selectedSchedule = null;

            // Ambil ID Pengajuan dari URL
            const urlParams = new URLSearchParams(window.location.search);
            const submissionId = urlParams.get('surat_id');

            if (!submissionId) {
                console.error("ID Pengajuan tidak ditemukan di URL.");
                alert("ID Pengajuan tidak valid. Silakan kembali ke halaman sebelumnya.");
                return;
            }

            if (cards.length === 0) {
                console.error("No schedule cards found.");
                return;
            }

            cards.forEach(card => {
                card.addEventListener("click", () => {
                    // Hapus highlight dari kartu lainnya
                    cards.forEach(c => c.classList.remove("bg-green-100", "border-green-500"));

                    // Tambahkan highlight ke kartu yang dipilih
                    card.classList.add("bg-green-100", "border-green-500");

                    // Gunakan id dari card untuk menentukan jadwal yang dipilih
                    selectedSchedule = card.id.charAt(0).toUpperCase() + card.id.slice(1);
                });
            });

            confirmButton.addEventListener("click", () => {
                if (!selectedSchedule) {
                    alert("Silakan pilih jadwal terlebih dahulu.");
                    return;
                }

                // Validasi jadwal
                const validSchedules = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
                if (!validSchedules.includes(selectedSchedule)) {
                    alert("Jadwal tidak valid. Silakan pilih hari yang benar.");
                    return;
                }

                // Log data yang akan dikirim ke server untuk debugging
                console.log('Data yang akan dikirim:', {
                    jadwal: selectedSchedule,
                    pengajuan_id: submissionId,
                    keterangan: 'Pengajuan Jadwal',
                    status: 'dijadwalkan'
                });

                // Kirim data ke server
                fetch(`${API_BASE_URL}/user/schedules/post`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({
                        jadwal: selectedSchedule,
                        pengajuan_id: submissionId,
                        keterangan: 'Pengajuan Jadwal', // Data tambahan statis
                        status: 'dijadwalkan'         // Data tambahan statis
                    }),
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Jadwal berhasil disimpan:', data);
                        openModal();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Gagal mengkonfirmasi jadwal. Silakan coba lagi.');
                    });
            });
        });

        function openModal() {
            const modal = document.getElementById("modal");
            modal.classList.remove("hidden");
            modal.classList.add("flex");
        }

        function closeModal() {
            const modal = document.getElementById("modal");
            modal.classList.remove("flex");
            modal.classList.add("hidden");
        }
    </script>
</body>
</html>
