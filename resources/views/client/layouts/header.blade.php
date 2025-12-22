<style>
    header {
        transition: backdrop-filter .4s, background-color .4s, box-shadow .4s;
    }

    header.scrolled {
        backdrop-filter: blur(10px);
        background-color: rgba(255,255,255,.85);
        box-shadow: 0 8px 24px rgba(0,0,0,.06);
    }

    header.not-scrolled {
        background-color: rgba(255,255,255,.95);
    }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-6px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-slideDown {
        animation: slideDown .25s ease forwards;
    }
</style>

<header class="fixed top-0 left-0 w-full z-50 not-scrolled border-b border-gray-200/60">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            {{-- LOGO --}}
            <a href="{{ route('home') }}" class="flex items-center group">
                <img src="{{ asset('images/favicon.png') }}" class="h-9 w-9 group-hover:rotate-6 transition">
                <span class="ml-3 text-xl font-extrabold text-gray-800 group-hover:text-rose-600">
                    Sumsel United
                </span>
            </a>

            {{-- DESKTOP MENU --}}
            <div class="hidden md:flex items-center space-x-6">
                @foreach ($menu['client'] as $item)
                    <a href="{{ route($item['url']) }}"
                       class="{{ request()->routeIs($item['url'])
                            ? 'text-rose-600 font-semibold border-b-2 border-rose-600 pb-1'
                            : 'text-gray-600 hover:text-rose-600 transition' }}">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </div>

            {{-- RIGHT ACTION --}}
            <div class="hidden md:flex items-center gap-4">
                @auth
                <div class="relative">
                    <button onclick="toggleProfile()"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-100">
                        <div class="w-8 h-8 rounded-full bg-rose-600 text-white flex items-center justify-center font-bold">
                            {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                        </div>
                        <span class="text-sm font-semibold">{{ auth()->user()->name }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    {{-- PROFILE MENU --}}
                    <div id="profile-menu"
                        class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border hidden animate-slideDown">

                        @if(auth()->user()->role === 'admin')
                            <button onclick="openAdminPopup()"
                                class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100">
                                🛠️ Admin Dashboard
                            </button>
                        @else
                            <a href="{{ route('tickets.purchase') }}"
                               class="block px-4 py-2 text-sm hover:bg-gray-100">
                                🎟️ Tiket Saya
                            </a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                @else
                    <a href="{{ route('login.page') }}"
                       class="px-5 py-2 bg-gradient-to-r from-rose-600 to-red-600 text-white rounded-lg font-semibold">
                        Masuk
                    </a>
                @endauth
            </div>

            {{-- MOBILE BUTTON --}}
            <button onclick="toggleMobileMenu()" class="md:hidden">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        {{-- MOBILE MENU --}}
        <div id="mobile-menu"
             class="md:hidden hidden mt-3 bg-white rounded-xl shadow border p-4 space-y-2 animate-slideDown">
            @foreach ($menu['client'] as $item)
                <a href="{{ route($item['url']) }}" class="block px-3 py-2 rounded hover:bg-gray-100">
                    {{ $item['label'] }}
                </a>
            @endforeach

            <hr>

            @auth
                @if(auth()->user()->role === 'admin')
                    <button onclick="openAdminPopup()"
                        class="block w-full text-left px-3 py-2 font-semibold">
                        Admin Dashboard
                    </button>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left px-3 py-2 text-red-600">
                        Logout
                    </button>
                </form>
            @endauth
        </div>
    </nav>
</header>

{{-- ===================== --}}
{{-- ADMIN POPUP --}}
{{-- ===================== --}}
<div id="admin-popup" class="fixed inset-0 bg-black/40 z-50 hidden items-center justify-center">
    <div class="bg-white rounded-2xl p-6 max-w-sm w-full text-center shadow-xl animate-slideDown">
        <h3 class="text-lg font-bold mb-2">Masuk Admin Dashboard?</h3>
        <p class="text-sm text-gray-500 mb-6">
            Anda akan berpindah ke halaman administrasi.
        </p>

        <div class="flex gap-3">
            <button onclick="closeAdminPopup()"
                class="flex-1 py-2 rounded-lg border hover:bg-gray-100">
                Batal
            </button>

            <a href="{{ route('admin.dashboard') }}"
                class="flex-1 py-2 rounded-lg bg-rose-600 text-white font-semibold text-center">
                Masuk
            </a>
        </div>
    </div>
</div>

<script>
    const header = document.querySelector("header");

    window.addEventListener("scroll", () => {
        header.classList.toggle("scrolled", window.scrollY > 20);
        header.classList.toggle("not-scrolled", window.scrollY <= 20);
    });

    function toggleProfile() {
        document.getElementById("profile-menu").classList.toggle("hidden");
    }

    function toggleMobileMenu() {
        document.getElementById("mobile-menu").classList.toggle("hidden");
    }

    function openAdminPopup() {
        document.getElementById("admin-popup").classList.remove("hidden");
        document.getElementById("admin-popup").classList.add("flex");
    }

    function closeAdminPopup() {
        document.getElementById("admin-popup").classList.add("hidden");
        document.getElementById("admin-popup").classList.remove("flex");
    }
</script>
