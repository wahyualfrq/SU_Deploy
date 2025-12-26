<div>

    {{-- ========================= --}}

    {{-- CSS UTILITIES --}}

    {{-- ========================= --}}

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');



        body {

            font-family: 'Inter', sans-serif;

        }



        @keyframes marquee {

            0% {

                transform: translateX(100%);

            }



            100% {

                transform: translateX(-100%);

            }

        }



        .animate-marquee {

            display: inline-flex;

            animation: marquee 40s linear infinite;

            /* Diperlambat agar lebih mudah dibaca */

            will-change: transform;

        }



        .animate-marquee:hover {

            animation-play-state: paused;

        }



        /* Hide Scrollbar but keep functionality */

        .no-scrollbar::-webkit-scrollbar {

            display: none;

        }



        .no-scrollbar {

            -ms-overflow-style: none;

            scrollbar-width: none;

        }
    </style>



    {{-- ========================= --}}

    {{-- HERO SECTION (Immersive) --}}

    {{-- ========================= --}}

    <section class="relative h-[500px] flex items-center justify-center overflow-hidden bg-gray-900">

        <div class="absolute inset-0">

            <img src="https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80"
                class="w-full h-full object-cover opacity-60" alt="Stadium Background">

            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent"></div>

        </div>



        <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">

            <div
                class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-rose-600/90 backdrop-blur-sm border border-rose-500/50 text-white text-xs font-bold uppercase tracking-wider mb-6 shadow-lg shadow-rose-900/20">

                <span class="animate-pulse w-2 h-2 bg-white rounded-full"></span>

                Official Media Center

            </div>



            <h1 class="text-5xl md:text-7xl font-black text-white tracking-tight mb-6 drop-shadow-sm">

                SUMSEL <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-rose-400 to-red-600">UNITED</span>

            </h1>



            <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto leading-relaxed font-light">

                Dapatkan akses eksklusif ke berita terbaru, cuplikan pertandingan, dan cerita di balik layar klub

                kebanggaan kita.

            </p>

        </div>

    </section>



    {{-- ========================= --}}

    {{-- BREAKING NEWS (Modern Ticker) --}}

    {{-- ========================= --}}

    @if($news->count())

        <div class="bg-white border-b border-gray-100 sticky top-0 z-40 shadow-sm">

            <div class="max-w-7xl mx-auto flex items-stretch h-12">

                <div
                    class="bg-rose-600 text-white px-6 flex items-center justify-center font-bold text-sm tracking-wide shrink-0 skew-x-[-10deg] -ml-4 pl-8 relative overflow-hidden">

                    <div class="skew-x-[10deg]">BREAKING</div>

                    <div class="absolute top-0 right-0 w-2 h-full bg-white/20 blur-sm"></div>

                </div>



                <div class="flex-1 flex items-center overflow-hidden bg-gray-50 pl-4 relative">

                    <div class="absolute left-0 top-0 bottom-0 w-4 bg-gradient-to-r from-gray-50 to-transparent z-10"></div>

                    <div class="absolute right-0 top-0 bottom-0 w-4 bg-gradient-to-l from-gray-50 to-transparent z-10">

                    </div>



                    <div class="animate-marquee whitespace-nowrap flex gap-16 text-sm font-medium text-gray-700">

                        @foreach($news->take(5) as $item)

                            <span class="flex items-center gap-3 hover:text-rose-600 transition-colors cursor-pointer">

                                <span class="text-rose-500 text-xs">●</span> {{ $item->title }}

                            </span>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    @endif



    {{-- ========================= --}}

    {{-- MAIN CONTENT --}}

    {{-- ========================= --}}



    {{-- ========================= --}}

    {{-- FILTER BAR (TIDAK IKUT HIDE) --}}

    {{-- ========================= --}}

    <div class="flex flex-wrap gap-2 mt-8 mb-10 justify-center md:justify-start">

        <button onclick="filterContent('all', this)"
            class="filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all duration-300 bg-gradient-to-r from-rose-700 to-red-700 text-white shadow-md shadow-rose-900/10">

            Semua

        </button>

        <button onclick="filterContent('news', this)"
            class="filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all duration-300 bg-white text-gray-600 hover:bg-gray-100 border border-gray-200">

            Berita

        </button>

        <button onclick="filterContent('video', this)"
            class="filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all duration-300 bg-white text-gray-600 hover:bg-gray-100 border border-gray-200">

            Video

        </button>

    </div>





    {{-- ========================= --}}

    {{-- CONTENT AREA --}}

    {{-- ========================= --}}

    <section id="news-wrapper" class="bg-gray-50 py-16">

        <div class="max-w-7xl mx-auto px-4 grid lg:grid-cols-12 gap-10">

            {{-- LEFT COLUMN (Main Feed) --}}

            <div class="lg:col-span-8 space-y-12">



                {{-- FEATURED ARTICLE (Hero Card Style) --}}

                @if($featured)

                    <article data-type="news"
                        class="group relative bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">

                        <div class="grid md:grid-cols-2 h-full">

                            <div class="relative overflow-hidden h-64 md:h-auto">

                                <img src="{{ asset('storage/' . $featured->image_path) }}"
                                    class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">

                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent md:hidden">

                                </div>

                            </div>



                            <div class="p-8 flex flex-col justify-center">

                                <div class="flex items-center gap-2 mb-4">

                                    <span
                                        class="bg-rose-100 text-rose-700 text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wider">

                                        Headlines

                                    </span>

                                    <span
                                        class="text-gray-400 text-xs font-medium">{{ $featured->published_at->format('d M Y') }}</span>

                                </div>



                                <h2
                                    class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight mb-4 group-hover:text-rose-700 transition-colors">

                                    {{ $featured->title }}

                                </h2>



                                <p class="text-gray-500 mb-6 line-clamp-3 text-sm leading-relaxed">

                                    {{ Str::limit(strip_tags($featured->content), 180) }}

                                </p>



                                <a href="{{ route('media.news.detail', $featured->slug) }}"
                                    class="inline-flex items-center text-rose-600 font-bold text-sm hover:gap-2 transition-all">

                                    Baca Selengkapnya

                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>

                                    </svg>

                                </a>

                            </div>

                        </div>

                    </article>

                @endif



                {{-- LATEST NEWS GRID --}}

                <div>

                    <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">

                        <span class="w-1 h-6 bg-rose-600 rounded-full"></span>

                        Terkini

                    </h3>



                    <div class="grid sm:grid-cols-2 gap-8">

                        @foreach($news as $item)

                            <a href="{{ route('media.news.detail', $item->slug) }}" class="block">

                                <article data-type="news"
                                    class="group flex flex-col bg-white rounded-xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">

                                    <div class="relative aspect-[16/10] overflow-hidden">

                                        <img src="{{ asset('storage/' . $item->image_path) }}"
                                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">

                                        <div
                                            class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors">

                                        </div>

                                    </div>



                                    <div class="p-5 flex-1 flex flex-col">

                                        <div class="text-xs text-gray-400 mb-2 font-medium">

                                            {{ $item->published_at->format('d M Y') }}

                                        </div>



                                        <h3
                                            class="font-bold text-lg text-gray-900 leading-snug mb-3 line-clamp-2 group-hover:text-rose-600 transition-colors">

                                            {{ $item->title }}

                                        </h3>



                                        <p class="text-sm text-gray-500 line-clamp-2 mb-4 flex-1">

                                            {{ Str::limit(strip_tags($item->content), 90) }}

                                        </p>



                                        <div class="pt-4 border-t border-gray-50 flex items-center justify-between">

                                            <span
                                                class="text-xs font-semibold text-gray-400 group-hover:text-rose-600 transition-colors">Baca

                                                Artikel</span>

                                        </div>

                                    </div>

                                </article>

                            </a>

                        @endforeach

                    </div>

                </div>

            </div>



            {{-- RIGHT COLUMN (Sidebar) --}}

            <aside class="lg:col-span-4 space-y-8">



                {{-- Popular News --}}

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-24">

                    <div class="flex items-center justify-between mb-6">

                        <h3 class="font-bold text-lg text-gray-900">Trending Topik</h3>

                        <span class="text-xs font-semibold bg-gray-100 text-gray-600 px-2 py-1 rounded">Minggu

                            Ini</span>

                    </div>



                    <div class="space-y-6">

                        @foreach($popular as $item)

                            <a href="{{ route('media.news.detail', $item->slug) }}" class="block group">



                                <div class="flex gap-4 items-start">

                                    <span
                                        class="text-2xl font-black text-gray-200 group-hover:text-rose-600 transition-colors -mt-2">

                                        0{{ $loop->iteration }}

                                    </span>



                                    <div class="flex-1">

                                        <h4 class="font-semibold text-sm text-gray-800 leading-snug line-clamp-2

                                       group-hover:text-rose-600 transition-colors mb-1">

                                            {{ $item->title }}

                                        </h4>



                                        <div class="flex items-center gap-2">

                                            <span class="text-[10px] text-gray-400 font-medium uppercase tracking-wide">

                                                {{ $item->published_at->format('d M') }}

                                            </span>

                                        </div>

                                    </div>



                                    <img src="{{ asset('storage/' . $item->image_path) }}" class="w-16 h-16 rounded-lg object-cover shadow-sm

                                    group-hover:shadow-md transition-shadow">

                                </div>



                            </a>

                        @endforeach

                    </div>





                    <a href="{{ route('media') }}?tab=news"
                        class="block w-full mt-6 py-2 text-center text-sm font-semibold text-rose-600 bg-rose-50 rounded-lg hover:bg-rose-100 transition-colors">

                        Lihat Indeks Berita

                    </a>

                </div>

            </aside>

        </div>

    </section>



    {{-- ========================= --}}

    {{-- VIDEO SECTION (Dark Mode) --}}

    {{-- ========================= --}}

    <section id="video-wrapper" class="bg-slate-900 text-white py-20 hidden">

        <div class="max-w-7xl mx-auto px-4">

            @if($videos->count())

                <section class="py-20 bg-slate-900 text-white" data-type="video">

                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                        <div class="flex flex-col md:flex-row items-end justify-between mb-10 gap-4">

                            <div>

                                <h2 class="text-3xl font-bold flex items-center gap-3">

                                    <span
                                        class="w-8 h-8 rounded-full bg-red-600 flex items-center justify-center text-xs">▶</span>

                                    Highlight Pertandingan

                                </h2>

                                <p class="text-slate-400 mt-2 text-sm">Tonton kembali momen terbaik dari Sumsel United</p>

                            </div>



                            <a href="https://www.youtube.com/@sumselunited" target="_blank" rel="noopener noreferrer"
                                class="group inline-flex items-center gap-2 text-sm font-semibold text-white

                                                                      bg-slate-800 px-4 py-2 rounded-full hover:bg-slate-700 transition-all">

                                Kanal Youtube

                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />

                                </svg>

                            </a>

                        </div>



                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

                            @foreach($videos as $video)

                                <a href="{{ $video->youtube_url }}" target="_blank" class="group block">

                                    <div
                                        class="relative rounded-xl overflow-hidden shadow-2xl bg-black aspect-video mb-4 ring-1 ring-white/10 group-hover:ring-rose-500/50 transition-all">

                                        <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/maxresdefault.jpg"
                                            class="w-full h-full object-cover opacity-90 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700"
                                            alt="{{ $video->title }}">



                                        <div
                                            class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/40 transition-colors">

                                            <div
                                                class="w-14 h-14 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center border border-white/20 group-hover:scale-110 group-hover:bg-rose-600 group-hover:border-rose-500 transition-all duration-300 shadow-xl">

                                                <svg class="w-6 h-6 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">

                                                    <path d="M8 5v14l11-7z" />

                                                </svg>

                                            </div>

                                        </div>



                                        <div
                                            class="absolute bottom-2 right-2 bg-black/80 text-white text-[10px] px-2 py-0.5 rounded font-medium">

                                            YOUTUBE

                                        </div>

                                    </div>



                                    <div>

                                        <h3
                                            class="font-semibold text-lg leading-tight group-hover:text-rose-400 transition-colors line-clamp-2">

                                            {{ $video->title }}

                                        </h3>

                                        <div class="flex items-center gap-3 mt-2 text-xs text-slate-500">

                                            <span>{{ $video->published_at->format('d M Y') }}</span>

                                            <span class="w-1 h-1 bg-slate-500 rounded-full"></span>

                                            <span class="uppercase tracking-wider">Video</span>

                                        </div>

                                    </div>

                                </a>

                            @endforeach

                        </div>

                    </div>

                </section>

            @endif

        </div>

    </section>

</div>



{{-- Script tetap sama, hanya memastikan class filter-btn sudah ada di HTML --}}

<script>

    function filterContent(type, el) {



        // ==== BUTTON STATE ====

        document.querySelectorAll('.filter-btn').forEach(btn => {

            btn.classList.remove(

                'bg-gradient-to-r',

                'from-rose-700',

                'to-red-700',

                'text-white'

            );

            btn.classList.add(

                'bg-white',

                'text-gray-600'

            );

        });



        el.classList.remove('bg-white', 'text-gray-600');

        el.classList.add(

            'bg-gradient-to-r',

            'from-rose-700',

            'to-red-700',

            'text-white'

        );



        // ==== WRAPPER TOGGLE ====

        const news = document.getElementById('news-wrapper');

        const video = document.getElementById('video-wrapper');



        if (type === 'video') {

            news.classList.add('hidden');

            video.classList.remove('hidden');

            video.scrollIntoView({ behavior: 'smooth' });

        }



        if (type === 'news') {

            video.classList.add('hidden');

            news.classList.remove('hidden');

            news.scrollIntoView({ behavior: 'smooth' });

        }



        if (type === 'all') {

            news.classList.remove('hidden');

            video.classList.remove('hidden');

        }

    }



    document.addEventListener('DOMContentLoaded', () => {

        const params = new URLSearchParams(window.location.search);

        const tab = params.get('tab') || 'all';



        const buttons = {

            all: document.querySelector('.filter-btn:nth-child(1)'),

            news: document.querySelector('.filter-btn:nth-child(2)'),

            video: document.querySelector('.filter-btn:nth-child(3)')

        };

        if (buttons[tab]) {

            filterContent(tab, buttons[tab]);

        }
    });
</script>