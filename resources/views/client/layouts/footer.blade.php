<footer class="relative bg-neutral-950 text-neutral-400 overflow-hidden font-sans border-t border-neutral-900">
    <div
        class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-rose-600 to-transparent opacity-70">
    </div>
    <div class="absolute -top-40 -right-40 w-96 h-96 bg-rose-900/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-16 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8">

            <div class="space-y-6">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-neutral-900 rounded-xl border border-neutral-800 shadow-lg shadow-black/50">
                        <img src="{{ setting('favicon') }}" alt="Sumsel United Logo"
                            class="h-10 w-10 object-contain">
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white tracking-wide uppercase leading-none">Sumsel United</h3>
                        <span class="text-xs text-rose-500 font-semibold tracking-wider uppercase">Official Club
                            Site</span>
                    </div>
                </div>

                <p class="text-sm leading-relaxed text-neutral-500 max-w-xs">
                    Membangun kejayaan sepak bola Indonesia dengan dedikasi, integritas, dan semangat juara yang tak
                    tergoyahkan.
                </p>

                <div class="flex items-center space-x-3 pt-2">

                                            {{-- INSTAGRAM --}}
                        <a href="https://www.instagram.com/sumselutdofficial"
                        target="_blank"
                        rel="noopener"
                        aria-label="Instagram"
                        class="group flex items-center justify-center w-10 h-10 rounded-lg bg-neutral-900 border border-neutral-800 hover:border-rose-600 hover:bg-rose-600 transition-all duration-300">
                            
                            <svg class="w-5 h-5 text-neutral-400 group-hover:text-white transition-colors"
                                fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M7 2C4.243 2 2 4.243 2 7v10c0 2.757 2.243 5 5 5h10c2.757 0 5-2.243 5-5V7c0-2.757-2.243-5-5-5H7zm10 2c1.654 0 3 1.346 3 3v10c0 1.654-1.346 3-3 3H7c-1.654 0-3-1.346-3-3V7c0-1.654 1.346-3 3-3h10zm-5 3.5A5.5 5.5 0 1 0 17.5 13 5.506 5.506 0 0 0 12 7.5zm0 2A3.5 3.5 0 1 1 8.5 13 3.504 3.504 0 0 1 12 9.5zm5.25-.75a1.25 1.25 0 1 1-1.25-1.25 1.25 1.25 0 0 1 1.25 1.25z"/>
                            </svg>
                        </a>


                    {{-- FACEBOOK --}}
                    <a href="https://www.facebook.com/SumselUnited"
                    target="_blank"
                    rel="noopener"
                    aria-label="Facebook"
                    class="group flex items-center justify-center w-10 h-10 rounded-lg bg-neutral-900 border border-neutral-800 hover:border-rose-600 hover:bg-rose-600 transition-all duration-300">
                        <svg class="w-4 h-4 text-neutral-400 group-hover:text-white transition-colors"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12a10 10 0 1 0-11.5 9.87v-6.99h-2.4V12h2.4V9.79c0-2.37 1.42-3.68 3.6-3.68 1.04 0 2.12.18 2.12.18v2.33h-1.2c-1.18 0-1.54.74-1.54 1.5V12h2.63l-.42 2.88h-2.21v6.99A10 10 0 0 0 22 12z"/>
                        </svg>
                    </a>

                    {{-- YOUTUBE --}}
                    <a href="https://www.youtube.com/@sumselunited"
                    target="_blank"
                    rel="noopener"
                    aria-label="YouTube"
                    class="group flex items-center justify-center w-10 h-10 rounded-lg bg-neutral-900 border border-neutral-800 hover:border-rose-600 hover:bg-rose-600 transition-all duration-300">
                        <svg class="w-4 h-4 text-neutral-400 group-hover:text-white transition-colors"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.5 6.5s-.2-1.7-.8-2.4c-.8-.8-1.7-.8-2.1-.9C17.7 3 12 3 12 3h-.1s-5.7 0-8.6.2c-.4.1-1.3.1-2.1.9-.6.7-.8 2.4-.8 2.4S0 8.3 0 10.1v1.8c0 1.8.4 3.6.4 3.6s.2 1.7.8 2.4c.8.8 1.9.8 2.4.9 1.7.2 7.1.2 7.1.2s5.7 0 8.6-.2c.4-.1 1.3-.1 2.1-.9.6-.7.8-2.4.8-2.4s.4-1.8.4-3.6v-1.8c0-1.8-.4-3.6-.4-3.6zM9.5 14.6V7.8l6.2 3.4-6.2 3.4z"/>
                        </svg>
                    </a>

                </div>

            </div>

            <div>
                <div class="flex items-center mb-6">
                    <span class="w-3 h-0.5 bg-rose-600 mr-3 rounded-full"></span>
                    <h4 class="text-sm font-bold text-white uppercase tracking-widest">Tautan Cepat</h4>
                </div>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('home') }}"
                        class="block text-sm hover:text-white hover:translate-x-1 transition-all duration-300">
                            Beranda
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('club') }}"
                        class="block text-sm hover:text-white hover:translate-x-1 transition-all duration-300">
                            Klub
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('team') }}"
                        class="block text-sm hover:text-white hover:translate-x-1 transition-all duration-300">
                            Tim
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('matches') }}"
                        class="block text-sm hover:text-white hover:translate-x-1 transition-all duration-300">
                            Pertandingan
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('media') }}"
                        class="block text-sm hover:text-white hover:translate-x-1 transition-all duration-300">
                            Media
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('tickets.purchase') }}"
                        class="block text-sm hover:text-white hover:translate-x-1 transition-all duration-300">
                            Tiket Saya
                        </a>
                    </li>
                </ul>

            </div>

            <div>
                <div class="flex items-center mb-6">
                    <span class="w-3 h-0.5 bg-rose-600 mr-3 rounded-full"></span>
                    <h4 class="text-sm font-bold text-white uppercase tracking-widest">Kontak</h4>
                </div>
                <div class="space-y-5 text-sm">
                    <div class="flex items-start group">
                        <svg class="w-5 h-5 mt-0.5 mr-4 text-rose-600 group-hover:text-white transition-colors"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                        </svg>
                        <span class="group-hover:text-neutral-300 transition-colors">Jl. Stadion Utama No.
                            1<br>Palembang, Sumatera Selatan</span>
                    </div>
                    <div class="flex items-center group">
                        <svg class="w-5 h-5 mr-4 text-rose-600 group-hover:text-white transition-colors" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498A1 1 0 0121 16.72V19a2 2 0 01-2 2H18C10.716 21 3 13.284 3 6V5z" />
                        </svg>
                        <span class="group-hover:text-neutral-300 transition-colors">+62 123 1234 5678</span>
                    </div>
                    <div class="flex items-center group">
                        <svg class="w-5 h-5 mr-4 text-rose-600 group-hover:text-white transition-colors" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="group-hover:text-neutral-300 transition-colors">info@sumselunited.id</span>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="border-t border-neutral-900 mt-16 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-neutral-600">
            <p>© 2025 Sumsel United Football Club. All Rights Reserved.</p>
            <div class="flex space-x-6 mt-4 md:mt-0">
                <a href="#" class="hover:text-rose-500 transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-rose-500 transition-colors">Terms of Service</a>
                <a href="#" class="hover:text-rose-500 transition-colors">Cookie Policy</a>
            </div>
        </div>
    </div>
</footer>