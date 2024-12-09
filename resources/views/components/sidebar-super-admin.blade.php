<div class="hidden w-64 min-h-screen bg-custom-green md:block">
    <div class="p-6">
        <!-- Judul di Sidebar -->
        <h1 class="text-2xl font-bold text-white">SuperAdmin</h1>
    </div>
    <nav class="mt-6">
        <div class="px-4">
            <!-- Menu Sidebar: Users -->
            <div class="p-4 mb-4 rounded-lg {{ request()->routeIs('superadmindashboard') ? 'bg-green-800' : '' }}">
                <a href="{{ route('superadmindashboard') }}" class="flex items-center gap-2 text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Users
                </a>
            </div>

            <!-- Menu Sidebar: Activities -->
            <div class="p-4 rounded-lg {{ request()->routeIs('activity.index') ? 'bg-green-800' : '' }}">
                <a href="{{ route('activity.index') }}" class="flex items-center gap-2 text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    Activities
                </a>
            </div>
        </div>
    </nav>

    <div class="absolute bottom-4 left-4">
        <!-- Tombol Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center gap-2 px-4 py-2 text-white rounded-lg hover:bg-green-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Keluar
            </button>
        </form>
    </div>
</div>
