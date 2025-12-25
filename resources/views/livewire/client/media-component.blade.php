{{-- AOS CSS --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<div class="bg-white">
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
            will-change: transform;
        }

        .animate-marquee:hover {
            animation-play-state: paused;
        }

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
    {{-- Perbaikan: Tambah pt-28 agar tidak tertutup header --}}
    {{-- ========================= --}}
    <section class="relative h-[550px] flex items-center justify-center overflow-hidden bg-gray-900 pt-23">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1574629810360-7efbbe195018?q=80"
                class="w-full h-full object-cover opacity-60" alt="Stadium Background">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
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
                </div>

                <div class="flex-1 flex items-center overflow-hidden bg-gray-50 pl-4 relative">
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
    {{-- FILTER BAR --}}
    {{-- ========================= --}}
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-wrap gap-2 mt-8 mb-10 justify-center md:justify-start" data-aos="fade-right">
            <button onclick="filterContent('all', this)"
                class="filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all duration-300 bg-gradient-to-r from-rose-700 to-red-700 text-white shadow-md shadow-rose-900/10">Semua</button>
            <button onclick="filterContent('news', this)"
                class="filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all duration-300 bg-white text-gray-600 hover:bg-gray-100 border border-gray-200">Berita</button>
            <button onclick="filterContent('video', this)"
                class="filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all duration-300 bg-white text-gray-600 hover:bg-gray-100 border border-gray-200">Video</button>
        </div>
    </div>

    {{-- ========================= --}}
    {{-- CONTENT AREA --}}
    {{-- ========================= --}}
    <section id="news-wrapper" class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 grid lg:grid-cols-12 gap-10">
            <div class="lg:col-span-8 space-y-12">
                @if($featured)
                    <article data-aos="fade-up"
                        class="group relative bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                        <div class="grid md:grid-cols-2 h-full">
                            <div class="relative overflow-hidden h-64 md:h-auto">
                                <img src="{{ asset('storage/' . $featured->image_path) }}"
                                    class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                            </div>
                            <div class="p-8 flex flex-col justify-center">
                                <div class="flex items-center gap-2 mb-4">
                                    <span
                                        class="bg-rose-100 text-rose-700 text-[10px] font-bold px-2 py-1 rounded uppercase tracking-wider">Headlines</span>
                                    <span
                                        class="text-gray-400 text-xs font-medium">{{ $featured->published_at->format('d M Y') }}</span>
                                </div>
                                <h2
                                    class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight mb-4 group-hover:text-rose-700 transition-colors">
                                    {{ $featured->title }}</h2>
                                <p class="text-gray-500 mb-6 line-clamp-3 text-sm leading-relaxed">
                                    {{ Str::limit(strip_tags($featured->content), 180) }}</p>
                                <a href="{{ route('media.news.detail', $featured->slug) }}"
                                    class="inline-flex items-center text-rose-600 font-bold text-sm hover:gap-2 transition-all">Baca
                                    Selengkapnya →</a>
                            </div>
                        </div>
                    </article>
                @endif

                <div class="grid sm:grid-cols-2 gap-8">
                    @foreach($news as $index => $item)
                        <article data-aos="fade-up" data-aos-delay="{{ $index * 50 }}"
                            class="group flex flex-col bg-white rounded-xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-lg transition-all duration-300">
                            <a href="{{ route('media.news.detail', $item->slug) }}">
                                <div class="relative aspect-[16/10] overflow-hidden">
                                    <img src="{{ asset('storage/' . $item->image_path) }}"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                </div>
                                <div class="p-5 flex-1">
                                    <div class="text-xs text-gray-400 mb-2">{{ $item->published_at->format('d M Y') }}</div>
                                    <h3
                                        class="font-bold text-lg text-gray-900 line-clamp-2 group-hover:text-rose-600 transition-colors">
                                        {{ $item->title }}</h3>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>

            <aside class="lg:col-span-4 space-y-8">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-24"
                    data-aos="fade-left">
                    <h3 class="font-bold text-lg text-gray-900 mb-6">Trending Topik</h3>
                    <div class="space-y-6">
                        @foreach($popular as $item)
                            <a href="{{ route('media.news.detail', $item->slug) }}" class="block group">
                                <div class="flex gap-4 items-start">
                                    <span
                                        class="text-2xl font-black text-gray-200 group-hover:text-rose-600 transition-colors">0{{ $loop->iteration }}</span>
                                    <div class="flex-1">
                                        <h4
                                            class="font-semibold text-sm text-gray-800 line-clamp-2 group-hover:text-rose-600 transition-colors">
                                            {{ $item->title }}</h4>
                                    </div>
                                    <img src="{{ asset('storage/' . $item->image_path) }}"
                                        class="w-16 h-16 rounded-lg object-cover">
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </section>

    {{-- VIDEO SECTION --}}
    <section id="video-wrapper" class="bg-slate-900 text-white py-20 hidden">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col md:flex-row items-end justify-between mb-10 gap-4">
                <h2 class="text-3xl font-bold flex items-center gap-3">Highlight Pertandingan</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($videos as $video)
                    <a href="{{ $video->youtube_url }}" target="_blank" class="group block" data-aos="zoom-in">
                        <div class="relative rounded-xl overflow-hidden aspect-video mb-4">
                            <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/maxresdefault.jpg"
                                class="w-full h-full object-cover">
                            <div
                                class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/40">
                                <div class="w-14 h-14 bg-rose-600 rounded-full flex items-center justify-center shadow-xl">▶
                                </div>
                            </div>
                        </div>
                        <h3 class="font-semibold text-lg group-hover:text-rose-400 transition-colors">{{ $video->title }}
                        </h3>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</div>

{{-- AOS JS --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    // Inisialisasi AOS
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });

    function filterContent(type, el) {
        // Button state
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('bg-gradient-to-r', 'from-rose-700', 'to-red-700', 'text-white');
            btn.classList.add('bg-white', 'text-gray-600');
        });
        el.classList.remove('bg-white', 'text-gray-600');
        el.classList.add('bg-gradient-to-r', 'from-rose-700', 'to-red-700', 'text-white');

        const news = document.getElementById('news-wrapper');
        const video = document.getElementById('video-wrapper');

        if (type === 'video') {
            news.classList.add('hidden');
            video.classList.remove('hidden');
        } else if (type === 'news') {
            video.classList.add('hidden');
            news.classList.remove('hidden');
        } else {
            news.classList.remove('hidden');
            video.classList.remove('hidden');
        }

        // Refresh AOS agar animasi jalan di elemen yang baru muncul
        setTimeout(() => {
            AOS.refresh();
        }, 100);
    }
</script>