<!-- resources/views/admin/super/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users SuperAdmin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('components.sidebar-super-admin')

        <!-- Main Content -->
        <div class="flex-1 overflow-x-hidden">
            <!-- Mobile Header -->
            <div class="p-4 bg-green-700 md:hidden">
                <button class="text-white" id="mobile-menu-button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Content Header -->
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Users SuperAdmin</h2>
                    <button onclick="openModal()" class="flex items-center gap-2 px-4 py-2 text-white bg-green-700 rounded-lg hover:bg-green-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add new admin
                    </button>
                </div>

                <!-- Search Bar -->
                <div class="flex gap-4 mb-6">
                    <input type="text" placeholder="Search" class="w-full max-w-md px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500">
                    <button class="px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>

                <!-- Table -->
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">No</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Username</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Email</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Password</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Date</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($admins as $index => $admin)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">{{ $admin->nama_lengkap }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $admin->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $admin->password }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $admin->created_at->format('d, M Y') }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $admin->status }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    <button class="text-red-600 hover:text-red-900">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Add Admin Modal -->
    <div id="addAdminModal" class="fixed inset-0 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50">
        <div class="relative p-5 mx-auto bg-white border rounded-md shadow-lg top-20 w-96">
            <div class="mt-3">
                <h3 class="mb-4 text-lg font-medium leading-6 text-gray-900">Add New Admin</h3>
                @if(session('success'))
                    <div class="p-4 mb-4 text-white bg-green-500 rounded">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="p-4 mb-4 text-white bg-red-500 rounded">
                        {{ session('error') }}
                    </div>
                @endif
                <form id="addAdminForm" action="{{ route('superadmin.store') }}" method="POST">
                    @csrf <!-- Token CSRF untuk mengamankan form submission -->
                    <div class="mb-4">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-700">Username</label>
                        <input type="text" id="username" name="username" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-green-500">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-green-500">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-green-500">
                    </div>
                    <div class="mb-4">
                        <label for="confirmPassword" class="block mb-2 text-sm font-medium text-gray-700">Confirm Password</label>
                        <input type="password" id="confirmPassword" name="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-green-500">
                    </div>

                    <div class="flex justify-end gap-4">
                        <button type="button" onclick="closeModal()" class="px-4 py-2 text-base font-medium text-gray-800 bg-gray-200 rounded-md shadow-sm hover:bg-gray-300 focus:outline-none">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 text-base font-medium text-white bg-green-700 rounded-md shadow-sm hover:bg-green-800 focus:outline-none">
                            Add Admin
                        </button>
                    </div>
                </form>
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

        // Modal functions
        function openModal() {
            document.getElementById('addAdminModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('addAdminModal').classList.add('hidden');
        }

        // Form submission
        document.getElementById('addAdminForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }
            // Jika password cocok, kirimkan form
            this.submit();
            closeModal(); // Menutup modal setelah submit
            this.reset(); // Reset form setelah submit
        });
        // Close modal when clicking outside
        document.getElementById('addAdminModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
</body>
</html>
