<aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-full bg-gradient-to-b from-rose-800 via-red-700 to-rose-900 text-white 
           transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">

    <div class="flex items-center justify-center h-16 border-b border-white/10">
        <h2 class="text-xl font-bold tracking-wide">⚽ Admin Panel</h2>
    </div>

    <nav class="mt-4 px-3 space-y-1">

        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded-lg transition-all
                {{ request()->routeIs('admin.dashboard') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
            Dashboard
        </a>

        {{-- Manajemen Klub --}}
        <a href="{{ route('admin.clubs.index') }}" class="block px-4 py-2 rounded-lg transition-all
   {{ request()->routeIs('admin.clubs.*') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
            Manajemen Klub
        </a>

        {{-- 🔴 LIVE MATCH --}}
        <a href="{{ route('admin.matches.live.active') }}" class="block px-4 py-2 rounded-lg transition-all
   {{ request()->routeIs('admin.matches.live*') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
            🔴 Live Match
        </a>


        {{-- 🔥 JADWAL PERTANDINGAN (BARU) --}}
        <a href="{{ route('admin.matches.index') }}" class="block px-4 py-2 rounded-lg transition-all
           {{ request()->routeIs('admin.matches.*') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
            Jadwal Pertandingan
        </a>

        <a href="{{ route('admin.tickets.index') }}"
            class="block px-4 py-3 rounded-lg hover:bg-white/10 {{ request()->routeIs('admin.tickets.*') ? 'bg-white/10' : '' }}">
            Manajemen Tiket
        </a>

        {{-- Manajemen Tim --}}
        <a href="{{ route('admin.team') }}" class="block px-4 py-2 rounded-lg transition-all
                {{ request()->routeIs('admin.team') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
            Manajemen Tim
        </a>

        {{-- Galeri --}}
        <a href="{{ route('admin.gallery.index') }}" class="block px-4 py-2 rounded-lg transition-all
   {{ request()->routeIs('admin.gallery.*') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
            Manajemen Galeri
        </a>

        {{-- Berita --}}
        <a href="{{ route('admin.news.index') }}" class="block px-4 py-2 rounded-lg transition-all
                {{ request()->routeIs('admin.news.index') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
            Berita
        </a>
        <a href="{{ route('admin.videos.sync') }}" class="block px-4 py-2 rounded-lg transition-all
   {{ request()->routeIs('admin.videos.*') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
            YouTube Sync
        </a>


        {{-- Pengaturan --}}
        <a href="{{ route('admin.settings') }}" class="block px-4 py-2 rounded-lg transition-all
                {{ request()->routeIs('admin.settings') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
            Pengaturan
        </a>

    </nav>

    <div class="absolute bottom-0 w-full border-t border-white/10 p-4">
        <p class="text-xs text-white/70 text-center">
            © {{ date('Y') }} Sumsel United
        </p>
    </div>
</aside>

<!-- Overlay (mobile only) -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden"
    onclick="document.getElementById('sidebar').classList.add('-translate-x-full'); this.classList.add('hidden');">
</div>