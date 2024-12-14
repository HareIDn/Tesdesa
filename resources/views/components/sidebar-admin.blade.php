<div class="hidden w-64 bg-white shadow-lg md:block">
    <div class="p-6">
        <!-- Judul di Sidebar -->
        <h1 class="text-2xl font-bold text-gray-800">Beranda Admin</h1>
        @auth
            <p class="mt-2 text-sm text-gray-600">Selamat datang, {{ Auth::user()->name }}!</p>
        @endauth
    </div>

    <nav class="mt-6">
        <div class="px-4">
            <!-- Menu Sidebar: Beranda -->
            <div class="p-4 mb-4 rounded-lg {{ request()->routeIs('admin.index') ? 'bg-green-200' : '' }}">
                <a href="{{ route('admindashboard') }}" class="font-medium text-gray-700">Beranda</a>
            </div>

            <!-- Menu Sidebar: Statistik Layanan -->
            <div class="p-4 mb-4 rounded-lg {{ request()->routeIs('statistic.index') ? 'bg-green-200' : '' }}">
                <a href="{{ route('statistic.index') }}" class="font-medium text-gray-700">Statistik Layanan</a>
            </div>

            <!-- Menu Sidebar: Edit Profil -->
            <div class="p-4 mb-4 rounded-lg {{ request()->routeIs('profile.create') ? 'bg-green-200' : '' }}">
                <a href="{{ route('profile.create') }}" class="font-medium text-gray-700">Edit Profil</a>
            </div>
        </div>
    </nav>

    <div class="p-4 border-t">
        <!-- Form Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <!-- Tombol Logout -->
            <button type="submit" class="flex items-center justify-center w-full p-4 text-red-600 transition-colors rounded-lg bg-red-50 hover:bg-red-100">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Keluar
            </button>
        </form>
    </div>
</div>
