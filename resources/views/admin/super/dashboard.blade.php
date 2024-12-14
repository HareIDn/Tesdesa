<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Users Management</title>
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
                    <h2 class="text-2xl font-bold text-gray-800">Users Management</h2>
                    <button onclick="openModal()" class="flex items-center gap-2 px-4 py-2 text-white bg-green-700 rounded-lg hover:bg-green-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add New User
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
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Role</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Date</th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="user-table" class="bg-white divide-y divide-gray-200">
                            <!-- Data will be dynamically populated -->
                        </tbody>
                    </table>
                    <div id="loading" class="py-4 text-center">Loading...</div>
                </div>
            </div>
        </div>
    </div>

        <!-- Add User Modal -->
<div id="addUserModal" class="fixed inset-0 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50">
    <div class="relative p-6 mx-auto bg-white border rounded-lg shadow-lg top-20 w-[40rem]">
        <div class="mt-3">
            <h3 class="mb-6 text-xl font-bold leading-6 text-gray-800">Add New User</h3>
            <form id="addUserForm">
                <div class="grid grid-cols-2 gap-4">
                    <!-- Input fields -->
                    <div>
                        <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label for="nik" class="block mb-2 text-sm font-medium text-gray-700">NIK</label>
                        <input type="text" id="nik" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-700">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label for="agama" class="block mb-2 text-sm font-medium text-gray-700">Agama</label>
                        <input type="text" id="agama" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label for="pekerjaan" class="block mb-2 text-sm font-medium text-gray-700">Pekerjaan</label>
                        <input type="text" id="pekerjaan" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div class="col-span-2">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-700">Alamat Lengkap</label>
                        <textarea id="alamat" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" rows="3"></textarea>
                    </div>
                    <div>
                        <label for="rt" class="block mb-2 text-sm font-medium text-gray-700">RT</label>
                        <input type="text" id="rt" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label for="rw" class="block mb-2 text-sm font-medium text-gray-700">RW</label>
                        <input type="text" id="rw" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label for="kecamatan" class="block mb-2 text-sm font-medium text-gray-700">Kecamatan</label>
                        <input type="text" id="kecamatan" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label for="kelurahan" class="block mb-2 text-sm font-medium text-gray-700">Kelurahan</label>
                        <input type="text" id="kelurahan" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label for="kabupaten" class="block mb-2 text-sm font-medium text-gray-700">Kabupaten</label>
                        <input type="text" id="kabupaten" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                </div>
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 text-gray-800 bg-gray-200 rounded-md hover:bg-gray-300">Cancel</button>
                    <button type="submit" class="px-4 py-2 text-white bg-green-700 rounded-md hover:bg-green-800">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <!-- JavaScript -->
    <script>

        const userTable = document.getElementById('user-table');
        const loadingIndicator = document.getElementById('loading');

        // Fetch users
        function fetchUsers() {
            loadingIndicator.style.display = 'block';
            fetch(`http://tesdesa.test/api/super/users`, {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer {{ auth()->user()->api_token }}`,
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                loadingIndicator.style.display = 'none';
                userTable.innerHTML = '';

                if (!data.data || !Array.isArray(data.data)) {
                    userTable.innerHTML = `
                        <tr>
                            <td colspan="6" class="py-4 text-center text-gray-500">
                                No users found.
                            </td>
                        </tr>`;
                    return;
                }

                const users = data.data;

                users.forEach((user, index) => {
                    const role = user.role_id === 2 ? 'Admin' : 'User';
                    const row = `
    <tr class="hover:bg-gray-50">
        <td class="px-6 py-4 text-sm font-medium text-center text-gray-700">${index + 1}</td>
        <td class="px-6 py-4 text-sm font-medium text-gray-900 truncate">${user.nama_lengkap}</td>
        <td class="px-6 py-4 text-sm text-gray-700 truncate">${user.email}</td>
        <td class="px-6 py-4 text-sm text-center text-gray-700">${role}</td>
        <td class="px-6 py-4 text-sm text-center text-gray-700">${new Date(user.created_at).toLocaleDateString('id-ID')}</td>
        <td class="px-6 py-4 text-sm text-center">
            <button onclick="promoteUserToAdmin(${user.id})" class="px-3 py-1 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                Promote to Admin
            </button>
            <button onclick="deleteUser(${user.id})" class="px-3 py-1 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700">
                Delete
            </button>
        </td>
    </tr>`;

                    userTable.innerHTML += row;
                });
            })
            .catch(error => {
                loadingIndicator.style.display = 'none';
                console.error('Error fetching users:', error);
                alert('Failed to fetch user data.');
            });
        }

        document.getElementById('addUserForm').addEventListener('submit', function (e) {
    e.preventDefault();

    // Ambil data dari form
    const formData = {
        nama_lengkap: document.getElementById('nama_lengkap').value.trim(),
        nik: document.getElementById('nik').value.trim(),
        email: document.getElementById('email').value.trim(),
        password: document.getElementById('password').value.trim(),
        tanggal_lahir: document.getElementById('tanggal_lahir').value.trim(),
        tempat_lahir: document.getElementById('tempat_lahir').value.trim(),
        agama: document.getElementById('agama').value.trim(),
        pekerjaan: document.getElementById('pekerjaan').value.trim(),
        alamat_lengkap: document.getElementById('alamat').value.trim(),
        rt: document.getElementById('rt').value.trim(),
        rw: document.getElementById('rw').value.trim(),
        kecamatan: document.getElementById('kecamatan').value.trim(),
        kelurahan: document.getElementById('kelurahan').value.trim(),
        kabupaten: document.getElementById('kabupaten').value.trim(),
    };

    // Daftar agama yang valid
    const validAgama = ['Islam', 'Kristen', 'Hindu', 'Budha', 'Katholik', 'Konghucu'];

    // Validasi input sebelum mengirim
    for (let key in formData) {
        if (formData[key] === "" && key !== "pekerjaan") {
            alert(`Field ${key.replace('_', ' ')} tidak boleh kosong.`);
            return;
        }
    }

    // Validasi panjang password
    if (formData.password.length < 8) {
        alert('Password harus memiliki minimal 8 karakter.');
        return;
    }

    // Validasi agama
    if (!validAgama.includes(formData.agama)) {
        alert(`Field Agama harus salah satu dari: ${validAgama.join(', ')}`);
        return;
    }

    console.log('Form Data:', formData); // Debugging untuk memeriksa data sebelum dikirim

    // Kirim data ke server
    fetch('http://tesdesa.test/api/super/users/post', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer {{ auth()->user()->api_token }}`,
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify(formData),
    })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => {
                    console.error('Server Error:', err); // Debugging error server
                    throw new Error(err.message || 'Failed to add user');
                });
            }
            return response.json();
        })
        .then(data => {
            console.log('Response Data:', data); // Debugging respon sukses
            alert('User berhasil ditambahkan!');
            closeModal();
            fetchUsers(); // Memuat ulang data user
        })
        .catch(error => {
            console.error('Error:', error);
            alert(error.message || 'Gagal menambahkan user.');
        });
});

// Fungsi untuk menghapus user
function deleteUser(userId) {
    if (!confirm('Apakah Anda yakin ingin menghapus user ini?')) return;

    // Kirim permintaan DELETE ke server
    fetch(`http://tesdesa.test/api/super/users/${userId}`, {
        method: 'DELETE',
        headers: {
            'Authorization': `Bearer {{ auth()->user()->api_token }}`,
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => {
                    console.error('Server Error:', err);
                    throw new Error(err.message || 'Gagal menghapus user');
                });
            }
            return response.json();
        })
        .then(data => {
            alert('User berhasil dihapus!');
            fetchUsers(); // Memuat ulang data user setelah penghapusan
        })
        .catch(error => {
            console.error('Error:', error);
            alert(error.message || 'Gagal menghapus user.');
        });
}
function promoteUserToAdmin(userId) {
    if (!confirm('Apakah Anda yakin ingin mempromosikan user ini menjadi admin?')) return;

    // Data yang akan dikirim
    const formData = { role_id: 2 }; // 2 untuk Admin

    // Kirim permintaan PUT ke server
    fetch(`http://tesdesa.test/api/super/users/${userId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer {{ auth()->user()->api_token }}`,
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify(formData),
    })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => {
                    console.error('Server Error:', err);
                    throw new Error(err.message || 'Gagal mempromosikan user');
                });
            }
            return response.json();
        })
        .then(data => {
            alert('User berhasil dipromosikan menjadi admin!');
            fetchUsers(); // Memuat ulang data user setelah update
        })
        .catch(error => {
            console.error('Error:', error);
            alert(error.message || 'Gagal mempromosikan user.');
        });
}
        // Modal Functions
        function openModal() { document.getElementById('addUserModal').classList.remove('hidden'); }
        function closeModal() { document.getElementById('addUserModal').classList.add('hidden'); }

        document.addEventListener('DOMContentLoaded', fetchUsers);
    </script>
</body>
</html>
