<style>
    /* Custom ease for that "premium" feel */
    .ease-premium {
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Navigation Link Underline Animation */
    .nav-link {
        position: relative;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -4px;
        left: 0;
        background-color: #E11D48;
        transition: width 0.3s ease-in-out;
    }

    .nav-link:hover::after,
    .nav-link.active::after {
        width: 100%;
    }
</style>

{{-- HEADER --}}
{{-- Note: Default state is solid white (bg-white) --}}
<header id="main-header"
    class="fixed top-0 left-0 w-full z-50 bg-white border-b border-gray-100 transition-all duration-300 ease-premium h-20">

    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
        <div class="flex justify-between items-center h-full">

            {{-- 1. LOGO AREA --}}
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="flex items-center group transition-opacity hover:opacity-80">
                    <img src="{{ setting('favicon') }}"
                        class="h-10 w-10 transition-transform duration-300 group-hover:scale-105">
                    <span class="ml-3 text-xl font-bold tracking-tight text-gray-900">
                        Sumsel<span class="text-[#E11D48]">United</span>
                    </span>
                </a>
            </div>

            {{-- 2. CENTER MENU (Desktop) --}}
        <div class="hidden md:flex items-center space-x-8">
            @foreach ($menu['client'] as $item)

                {{-- MENU: TIKET SAYA (KHUSUS LOGIN + ROLE USER) --}}
                @if ($item['label'] === 'Tiket Saya')
                    @if (auth()->check() && auth()->user()->role === 'user')
                        <a href="{{ route($item['url']) }}"
                        class="nav-link text-sm font-medium tracking-wide transition-colors duration-200
                        {{ request()->routeIs($item['url'])
                                ? 'text-[#E11D48] active'
                                : 'text-gray-600 hover:text-[#E11D48]' }}">
                            {{ $item['label'] }}
                        </a>
                    @endif

                {{-- MENU LAIN (SELALU TAMPIL) --}}
                @else
                    <a href="{{ route($item['url']) }}"
                    class="nav-link text-sm font-medium tracking-wide transition-colors duration-200
                    {{ request()->routeIs($item['url'])
                            ? 'text-[#E11D48] active'
                            : 'text-gray-600 hover:text-[#E11D48]' }}">
                        {{ $item['label'] }}
                    </a>
                @endif

            @endforeach
        </div>


            {{-- 3. RIGHT ACTION AREA --}}
            <div class="hidden md:flex items-center gap-5">
                @auth
                    {{-- Profile Dropdown --}}
                    <div class="relative" x-data="{ open: false }">
                        <button onclick="toggleProfile(event)"
                            class="flex items-center gap-3 pl-2 pr-1 py-1 rounded-full border border-transparent hover:bg-gray-50 transition-colors">
                            <span class="text-sm font-semibold text-gray-700">{{ auth()->user()->name }}</span>
                            <div
                                class="w-9 h-9 rounded-full bg-gradient-to-br from-[#E11D48] to-[#9F1239] text-white flex items-center justify-center font-bold text-sm shadow-sm ring-2 ring-white">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                        </button>

                        {{-- Dropdown Menu --}}
                        <div id="profile-menu"
                            class="absolute right-0 mt-3 w-56 bg-white rounded-xl shadow-xl border border-gray-100 py-2 hidden origin-top-right transform transition-all duration-200">
                            {{-- ... (Isi dropdown sama seperti sebelumnya) ... --}}
                            <div class="px-4 py-2 border-b border-gray-50 mb-1">
                                <p class="text-xs text-gray-400 font-medium uppercase tracking-wider">Signed in as</p>
                                <p class="text-sm font-bold text-gray-800 truncate">{{ auth()->user()->email }}</p>
                            </div>
                           @if(auth()->check() && auth()->user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#E11D48] flex items-center gap-2">
                                    Dashboard
                                </a>
                            @endif


                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button
                                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors">
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    {{-- Primary CTA Button --}}
                    <a href="{{ route('login.page') }}"
                        class="group relative inline-flex items-center justify-center px-6 py-2.5 text-sm font-semibold text-white transition-all duration-200 bg-[#E11D48] rounded-lg hover:bg-[#BE123C] hover:shadow-lg hover:shadow-rose-500/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-600">
                        <span>Masuk</span>
                        <svg class="w-4 h-4 ml-1 -mr-1 transition-transform group-hover:translate-x-1" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                @endauth
            </div>

            {{-- MOBILE MENU BUTTON --}}
            <button onclick="toggleMobileMenu()"
                class="md:hidden p-2 rounded-md text-gray-600 hover:text-[#E11D48] hover:bg-gray-50 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        {{-- MOBILE MENU DROPDOWN --}}
        <div id="mobile-menu"
            class="md:hidden hidden bg-white border-t border-gray-100 absolute left-0 right-0 shadow-xl px-4 py-4 space-y-2 top-20">
            {{-- ... (Isi mobile menu sama seperti sebelumnya) ... --}}
            @foreach ($menu['client'] as $item)
                <a href="{{ route($item['url']) }}"
                    class="block px-4 py-3 rounded-lg text-base font-medium transition-colors
                       {{ request()->routeIs($item['url']) ? 'bg-red-50 text-[#E11D48]' : 'text-gray-600 hover:bg-gray-50 hover:text-[#E11D48]' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>
    </nav>
</header>

{{-- ADMIN POPUP (Sama seperti sebelumnya) --}}
<div id="admin-popup"
    class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm z-[100] hidden items-center justify-center transition-all duration-300">
    <div class="bg-white rounded-2xl p-8 max-w-sm w-full text-center shadow-2xl transform transition-all scale-100">
        {{-- ... Content Popup ... --}}
        <h3 class="text-lg font-bold text-gray-900 mb-2">Access Admin Dashboard</h3>
        <div class="grid grid-cols-2 gap-3 mt-6">
            <button onclick="closeAdminPopup()"
                class="py-2.5 px-4 rounded-xl border border-gray-200 text-gray-700 font-medium hover:bg-gray-50 transition-colors">Cancel</button>
            <a href="{{ route('admin.dashboard') }}"
                class="py-2.5 px-4 rounded-xl bg-[#E11D48] text-white font-bold hover:bg-[#BE123C] shadow-lg shadow-rose-500/30 transition-all">Continue</a>
        </div>
    </div>
</div>

<script>
    const header = document.querySelector("#main-header");
    const profileMenu = document.getElementById("profile-menu");
    const profileBtn = document.querySelector("button[onclick='toggleProfile(event)']");

    // Scroll Logic: Blur Effect & Compact Height
    window.addEventListener("scroll", () => {
        if (window.scrollY > 10) {
            // STATE: SCROLLED (Blurry & Compact)
            header.classList.remove("h-20", "bg-white", "border-b");
            header.classList.add(
                "h-16",
                "bg-white/90",      // Transparan 90%
                "backdrop-blur-md", // Efek Blur
                "shadow-lg",
                "shadow-gray-900/5"
            );
        } else {
            // STATE: TOP (Solid White & Tall)
            header.classList.add("h-20", "bg-white", "border-b");
            header.classList.remove(
                "h-16",
                "bg-white/90",
                "backdrop-blur-md",
                "shadow-lg",
                "shadow-gray-900/5"
            );
        }
    });

    function toggleProfile(event) {
        if (event) event.stopPropagation();
        profileMenu.classList.toggle("hidden");
    }

    function toggleMobileMenu() {
        document.getElementById("mobile-menu").classList.toggle("hidden");
    }

    function openAdminPopup() {
        const popup = document.getElementById("admin-popup");
        popup.classList.remove("hidden");
        popup.classList.add("flex");
    }

    function closeAdminPopup() {
        const popup = document.getElementById("admin-popup");
        popup.classList.add("hidden");
        popup.classList.remove("flex");
    }

    window.addEventListener('click', function (e) {
        if (profileMenu && !profileMenu.classList.contains('hidden') &&
            !profileMenu.contains(e.target) &&
            (!profileBtn || !profileBtn.contains(e.target))) {
            profileMenu.classList.add('hidden');
        }
        const popup = document.getElementById("admin-popup");
        if (popup.classList.contains('flex') && e.target === popup) {
            closeAdminPopup();
        }
    });
</script>