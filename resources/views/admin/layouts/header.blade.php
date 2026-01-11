<header class="bg-white border-b border-gray-200 sticky top-0 z-50 h-16">
    <div class="flex items-center justify-between px-4 py-3 lg:px-6">

        <!-- LEFT : TOGGLE + BRAND -->
        <div class="flex items-center gap-4">
            <!-- Sidebar Toggle (Mobile) -->
            <button id="sidebarToggle"
                class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Brand -->
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-white-600 rounded-full flex items-center justify-center">
                    <img src="{{ setting('favicon') }}"
                        alt="Sumsel United"
                        class="h-8 w-auto">
                </div>
                <div class="hidden sm:block leading-tight">
                    <h1 class="text-gray-900 font-bold text-sm">
                        Sumsel United
                    </h1>
                    <p class="text-gray-400 text-xs">
                        Admin Dashboard
                    </p>
                </div>
            </div>
        </div>

        <!-- RIGHT : PROFILE -->
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open"
                class="flex items-center gap-2 px-2 py-1.5 rounded-lg hover:bg-gray-100 transition">
                <img
                    src="https://ui-avatars.com/api/?name=Admin&background=dc2626&color=ffffff"
                    class="w-8 h-8 rounded-full"
                    alt="Admin">
                <span class="hidden sm:block text-sm font-medium text-gray-700">
                    Admin
                </span>
                <svg class="w-4 h-4 text-gray-500 hidden sm:block"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- DROPDOWN -->
            <div x-show="open"
                @click.away="open = false"
                x-transition
                class="absolute right-0 mt-2 w-44 bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden">

                <!-- LOGOUT -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2.5 text-sm text-rose-600 hover:bg-rose-50 transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>

    </div>
</header>
