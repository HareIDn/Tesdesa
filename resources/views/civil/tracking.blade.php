<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <!-- Dynamic Statuses will be rendered here -->
            </div>

            <!-- Button -->
            <div class="mt-8">
                <button id="scheduleButton" class="w-full py-3 font-semibold text-white transition rounded-lg shadow bg-custom-green hover:bg-green-800 disabled:opacity-50" disabled>
                    Pilih Jadwal Pengambilan
                </button>
            </div>
        </div>
    </div>

    <script>
    // Function to fetch status tracking from API based on selected surat ID
    function fetchStatusTracking(suratId) {
        const apiUrl = `http://tesdesa.test/api/user/submission`;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const scheduleButton = document.getElementById('scheduleButton');

        // Display loading state
        const statusContainer = document.querySelector('.space-y-6');
        const loadingElement = document.createElement('p');
        loadingElement.className = 'text-gray-600';
        loadingElement.textContent = 'Loading status...';
        statusContainer.appendChild(loadingElement);

        fetch(`${apiUrl}/${suratId}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                // Clear loading state
                statusContainer.innerHTML = '';

                // Check if all statuses are completed
                let allCompleted = true;

                // Render status tracking
                if (data.statuses && Array.isArray(data.statuses) && data.statuses.length > 0) {
                    data.statuses.forEach(status => {
                        const statusElement = document.createElement('div');
                        statusElement.className = 'flex items-center';

                        const iconElement = document.createElement('div');
                        iconElement.className = `flex items-center justify-center w-10 h-10 ${status.completed ? 'text-white bg-custom-green' : 'text-gray-600 bg-gray-300'} rounded-full`;

                        const svgElement = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                        svgElement.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
                        svgElement.setAttribute('class', 'w-5 h-5');
                        svgElement.setAttribute('fill', 'none');
                        svgElement.setAttribute('viewBox', '0 0 24 24');
                        svgElement.setAttribute('stroke', 'currentColor');
                        svgElement.setAttribute('stroke-width', '2');

                        const pathElement = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                        pathElement.setAttribute('stroke-linecap', 'round');
                        pathElement.setAttribute('stroke-linejoin', 'round');
                        pathElement.setAttribute('d', status.completed ? 'M5 13l4 4L19 7' : 'M8 16l-4-4m0 0l4-4m-4 4h16');

                        svgElement.appendChild(pathElement);
                        iconElement.appendChild(svgElement);

                        const textContainer = document.createElement('div');
                        textContainer.className = 'ml-4';

                        const nameElement = document.createElement('p');
                        nameElement.className = 'text-base font-semibold text-gray-800';
                        nameElement.textContent = status.name;

                        const dateElement = document.createElement('p');
                        dateElement.className = 'text-sm text-gray-600';
                        dateElement.textContent = status.date ? new Date(status.date).toLocaleString('id-ID') : 'Estimasi';

                        textContainer.appendChild(nameElement);
                        textContainer.appendChild(dateElement);

                        statusElement.appendChild(iconElement);
                        statusElement.appendChild(textContainer);

                        statusContainer.appendChild(statusElement);

                        if (!status.completed) {
                            allCompleted = false;
                        }
                    });
                } else {
                    allCompleted = false;
                    const noStatusElement = document.createElement('p');
                    noStatusElement.className = 'text-gray-600';
                    noStatusElement.textContent = 'Tidak ada status yang ditemukan.';
                    statusContainer.appendChild(noStatusElement);
                }

                // Enable or disable schedule button based on status completion
                if (allCompleted) {
                    scheduleButton.disabled = false;
                } else {
                    scheduleButton.disabled = true;
                }
            })
            .catch(error => {
                console.error('Error fetching status tracking:', error);
                statusContainer.innerHTML = '';
                const errorElement = document.createElement('p');
                errorElement.className = 'text-red-600';
                errorElement.textContent = 'Gagal memuat status. Silakan coba lagi nanti.';
                statusContainer.appendChild(errorElement);

                const suggestionElement = document.createElement('p');
                suggestionElement.className = 'text-gray-600';
                suggestionElement.textContent = 'Jika masalah terus berlanjut, silakan hubungi dukungan teknis.';
                statusContainer.appendChild(suggestionElement);
            });
    }

    // Ambil surat ID dari URL dan panggil API
    document.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        let suratId = urlParams.get('surat_id');

        // Sanitize and validate surat_id
        suratId = suratId && /^[a-zA-Z0-9_-]+$/.test(suratId) ? suratId : null;

        if (suratId) {
            fetchStatusTracking(suratId); // Panggil API
        } else {
            const statusContainer = document.querySelector('.space-y-6');
            const errorElement = document.createElement('p');
            errorElement.className = 'text-red-600';
            errorElement.textContent = 'Error: Surat ID tidak valid atau tidak ditemukan di URL.';
            statusContainer.appendChild(errorElement);
        }
    });
</script>

</body>
</html>
