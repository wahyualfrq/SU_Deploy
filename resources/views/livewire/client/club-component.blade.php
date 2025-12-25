<div> {{-- INI ADALAH SATU-SATUNYA ROOT ELEMENT --}}

    {{-- 1. SEMUA CSS/LINK MASUK KE DALAM DIV --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        .font-sans {
            font-family: 'Inter', sans-serif;
        }

        @keyframes pulse-slow {

            0%,
            100% {
                transform: scale(1.05);
            }

            50% {
                transform: scale(1.1);
            }
        }

        .animate-pulse-slow {
            animation: pulse-slow 15s ease-in-out infinite;
        }
    </style>

    {{-- 2. KONTEN UTAMA --}}
    <div class="font-sans text-slate-900 bg-white overflow-x-hidden">

        {{-- HERO --}}
        <section class="relative h-screen flex items-center justify-center overflow-hidden bg-slate-900">
            <div class="absolute inset-0 z-0">
                <img src="https://images.pexels.com/photos/274506/pexels-photo-274506.jpeg"
                    class="w-full h-full object-cover scale-105 animate-pulse-slow opacity-60" alt="Stadium Palembang">
                <div class="absolute inset-0 bg-gradient-to-b from-slate-900/40 via-slate-900/80 to-slate-900"></div>
            </div>

            <div class="relative z-10 text-center text-white max-w-5xl px-6" data-aos="zoom-out">
                <span
                    class="inline-block px-4 py-1.5 mb-6 text-xs font-bold tracking-[0.3em] uppercase bg-rose-600 rounded-sm">
                    EST. 2025
                </span>
                <h1 class="text-6xl md:text-8xl font-black mb-6 uppercase tracking-tighter leading-none">
                    Sumsel <span class="text-rose-600">United</span><br> Kebanggaan Bumi Sriwijaya
                </h1>
                <p class="text-lg md:text-xl text-slate-300 max-w-2xl mx-auto mb-10 font-light">
                    Sumatra Selatan United FC lahir untuk membangkitkan kejayaan sepak bola Sumatera Selatan di kancah
                    nasional.
                </p>
                <a href="#sejarah"
                    class="px-10 py-4 bg-rose-600 font-bold uppercase tracking-widest hover:bg-rose-700 transition-all">
                    Jelajahi Sejarah
                </a>
            </div>
        </section>

        {{-- SEJARAH (ZIG-ZAG IMPROVED) --}}
        <section id="sejarah" class="py-32 bg-slate-50 overflow-hidden">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-24" data-aos="fade-up">
                    <h2 class="text-5xl font-black uppercase tracking-tighter">Garis Waktu Sumsel United</h2>
                    <div class="w-20 h-1.5 bg-rose-600 mx-auto mt-4"></div>
                </div>

                {{-- Container Timeline --}}
                <div class="relative">
                    {{-- Garis Tengah (Hanya muncul di Desktop) --}}
                    <div class="absolute hidden md:block left-1/2 transform -translate-x-1/2 w-0.5 h-full bg-slate-200">
                    </div>

                    @php
                        $timeline = [
                            ['year' => '2025', 'title' => 'Kelahiran Sumsel United', 'desc' => 'Resmi berdiri melalui akuisisi lisensi Persikas Subang sebagai klub profesional baru berbasis Palembang.'],
                            ['year' => '2025', 'title' => 'Markas di Palembang', 'desc' => 'Klub menetapkan Palembang sebagai rumah baru dan simbol kebangkitan sepak bola Sumatera Selatan.'],
                            ['year' => '2025', 'title' => 'Pegadaian Championship', 'desc' => 'Sumsel United resmi berlaga di kasta kedua sepak bola Indonesia (Liga 2).'],
                            ['year' => '2025', 'title' => 'Penunjukan Nil Maizar', 'desc' => 'Pelatih nasional berpengalaman Nil Maizar dipercaya memimpin skuad utama.'],
                            ['year' => '2026 →', 'title' => 'Visi Jangka Panjang', 'desc' => 'Fokus pada pembinaan talenta lokal dan target promosi ke kasta tertinggi.']
                        ];
                    @endphp

                    @foreach($timeline as $index => $item)
                        <div
                            class="mb-20 flex flex-col md:flex-row items-center w-full {{ $index % 2 != 0 ? 'md:flex-row-reverse' : '' }}">

                            {{-- Sisi Konten --}}
                            <div class="w-full md:w-1/2 {{ $index % 2 == 0 ? 'md:pr-16 text-left md:text-right' : 'md:pl-16 text-left' }}"
                                data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}">
                                <span class="text-rose-600 font-black text-2xl tracking-tighter">{{ $item['year'] }}</span>
                                <h3 class="text-2xl font-black text-slate-900 mt-1 mb-3 uppercase tracking-tight">
                                    {{ $item['title'] }}</h3>
                                <p class="text-slate-500 leading-relaxed">{{ $item['desc'] }}</p>
                            </div>

                            {{-- Dot Tengah --}}
                            <div
                                class="absolute left-0 md:left-1/2 transform md:-translate-x-1/2 flex items-center justify-center">
                                <div class="w-4 h-4 rounded-full bg-rose-600 border-4 border-white shadow-md z-10"></div>
                            </div>

                            {{-- Sisi Kosong (Untuk Menjaga Grid) --}}
                            <div class="hidden md:block md:w-1/2"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- FILOSOFI --}}
        <section class="py-32 bg-slate-900 text-white">
            <div class="max-w-7xl mx-auto px-6">
                <h2 class="text-5xl font-black text-center mb-20 uppercase tracking-tighter" data-aos="fade-up">Filosofi
                    & Nilai</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach([
                            'Keunggulan' => 'Menjadi klub yang kompetitif dan profesional di setiap level.',
                            'Komunitas' => 'Mewakili suara dan kebanggaan masyarakat Sumatera Selatan.',
                            'Integritas' => 'Menjunjung sportivitas dan transparansi.',
                            'Inovasi' => 'Mengadopsi pendekatan modern dalam manajemen dan pelatihan.',
                            'Passion' => 'Semangat juang sebagai identitas klub.',
                            'Pengembangan' => 'Fokus pada talenta lokal dan pembinaan berkelanjutan.'
                        ] as $title => $desc)
                            <div class="p-10 bg-white/5 border border-white/10 rounded-2xl hover:bg-rose-600 transition-all duration-500" data-aos="zoom-in">
                                <h3 class="text-2xl font-bold mb-4">{{ $title }}</h3>
                                <p class="text-slate-300 leading-relaxed">{{ $desc }}</p>
                            </div>
                    @endforeach
                </div>

                               </div>
        </section>

        {{-- STADION --}}
        <section class="py-32 bg-white">
            <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-20 items-center">

                                        <img src="https://images.unsplash.com/photo-1574629810360-7efbbe195018" data-aos="fade-right" class="rounded-3xl shadow-2xl" alt="Stadion Sumsel United">
                <div data-aos="fade-left">
                    <h2 class="text-5xl font-black text-slate-900 mb-8 uppercase tracking-tighter">Rumah Perjuangan</h2>
                    <ul class="space-y-4 text-slate-600 text-lg">
                        <li><span class="text-rose-600 font-bold">✓</span> Berbasis di Palembang, Sumatera Selatan</li>
                        <li><span class="text-rose-600 font-bold">✓</span> Atmosfer kuat khas Bumi Sriwijaya</li>
                        <li><span class="text-rose-600 font-bold">✓</span> Menjadi pusat kebangkitan sepak bola daerah</li>
                    </ul>
                </div>
            </div>
        </section>

    </div>

    {{-- 3. SCRIPT --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        function initAOS() {
            AOS.init({
                duration: 1000,
                once: true,
            });
        }
        initAOS();
        document.addEventListener('livewire:load', function () {
            initAOS();
        });
    </script>

</div>