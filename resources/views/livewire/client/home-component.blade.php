<div class="font-sans antialiased text-neutral-900 bg-white selection:bg-[#E11D48] selection:text-white">



    {{-- HERO SECTION --}}

    <section class="relative w-full min-h-[90vh] flex items-center overflow-hidden bg-neutral-900">



        {{-- 1. Background Layer --}}

        <div class="absolute inset-0 z-0 select-none">

            {{-- Main Image --}}

            <img src="{{ asset('images/team.JPG') }}" class="w-full h-full object-cover object-center scale-105"
                alt="Suasana Stadion" loading="eager"
                onerror="this.src='https://images.pexels.com/photos/274506/pexels-photo-274506.jpeg';">



            {{-- Cinematic Overlays --}}

            <div class="absolute inset-0 bg-gradient-to-r from-neutral-900/90 via-neutral-900/60 to-transparent"></div>

            <div class="absolute inset-0 bg-gradient-to-t from-neutral-900 via-transparent to-transparent"></div>



            {{-- Red Accent Glow (Shifted to Right for Balance) --}}

            <div
                class="absolute top-1/2 right-0 -translate-y-1/2 w-[40vw] h-[40vw] bg-[#E11D48] opacity-20 blur-[150px] rounded-full pointer-events-none">

            </div>

        </div>



        {{-- 2. Main Content Layer (Split Layout) --}}

        <div
            class="relative z-10 w-full max-w-[95rem] mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center py-20 pt-32">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center h-full">

                {{-- LEFT COLUMN: Headline & CTA --}}

                <div class="lg:col-span-7 flex flex-col justify-center items-start text-left" data-aos="fade-right"
                    data-aos-duration="1000">



                    {{-- Dynamic Headline --}}

                    <h1
                        class="text-5xl md:text-7xl lg:text-8xl font-black text-white leading-[0.95] tracking-tight mb-6 uppercase drop-shadow-lg">

                        @if($nextMatch)

                            BERSATU KITA <br>BERSAING

                            <br>

                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#E11D48] to-white">

                                KITA MENANG

                            </span>

                        @else

                            Musim<br>Segera Dimulai...

                        @endif

                    </h1>



                    {{-- Subheadline --}}

                    <p
                        class="text-lg md:text-xl text-gray-300 font-medium leading-relaxed max-w-2xl mb-10 drop-shadow-md border-l-4 border-[#E11D48] pl-6">

                        Mewakili Sumatera Selatan dengan kerja keras, loyalitas, dan keberanian di setiap pertandingan.

                    </p>



                    {{-- CTA Buttons --}}

                    <div class="flex flex-wrap items-center gap-5">

                        <a href="{{ route('tickets.purchase') }}"
                            class="group relative px-8 py-4 bg-[#E11D48] text-white rounded-full font-bold text-sm uppercase tracking-widest shadow-lg shadow-[#E11D48]/30 overflow-hidden transition-transform hover:-translate-y-1 hover:shadow-[#E11D48]/50">

                            <div
                                class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]">

                            </div>

                            <span class="relative flex items-center gap-2">

                                Beli Tiket

                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>

                                </svg>

                            </span>

                        </a>



                        <a href="{{ route('team') }}"
                            class="px-8 py-4 bg-white/5 backdrop-blur-sm border border-white/20 text-white rounded-full font-bold text-sm uppercase tracking-widest hover:bg-white hover:text-black transition-all duration-300">

                            Lihat Tim

                        </a>

                    </div>

                </div>



                {{-- RIGHT COLUMN: "Next Match" Card --}}

                <div class="lg:col-span-5 flex justify-center lg:justify-end w-full" data-aos="fade-left"
                    data-aos-duration="1000" data-aos-delay="200">



                    @if($nextMatch)

                        <div class="w-full max-w-md">

                            <div
                                class="relative overflow-hidden rounded-[2rem] bg-neutral-900/60 backdrop-blur-xl border border-white/10 shadow-2xl transition-transform hover:scale-[1.02] duration-500 group">



                                {{-- Decorative Elements --}}

                                <div
                                    class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#E11D48] to-transparent">

                                </div>

                                <div
                                    class="absolute -bottom-10 -right-10 w-32 h-32 bg-[#E11D48]/20 blur-3xl rounded-full pointer-events-none">

                                </div>



                                <div class="p-8">

                                    {{-- Header Card --}}

                                    <div class="flex items-center justify-between mb-8">

                                        <div>

                                            <span
                                                class="flex items-center gap-2 text-[#E11D48] text-[11px] font-bold uppercase tracking-[0.2em] mb-1">

                                                <span class="w-2 h-2 rounded-full bg-[#E11D48] animate-pulse"></span>

                                                Laga Berikutnya

                                            </span>

                                            <h3 class="text-2xl font-black text-white leading-tight mt-2">

                                                {{ $nextMatch->home_team }} vs {{ $nextMatch->away_team }}


                                            </h3>

                                        </div>

                                        {{-- Icon Stadium --}}

                                        <div
                                            class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center border border-white/10 text-white/50">

                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />

                                            </svg>

                                        </div>

                                    </div>



                                    {{-- Stadium & Time --}}

                                    <div class="flex items-center gap-3 mb-8 text-sm text-neutral-400 font-medium">

                                        <span class="px-3 py-1 rounded-full bg-white/5 border border-white/5">

                                            {{ $nextMatch->stadium }}

                                        </span>

                                        <span class="w-1 h-1 bg-neutral-600 rounded-full"></span>

                                        <span>Official Match</span>

                                    </div>



                                    {{-- Countdown --}}

                                    <div class="grid grid-cols-3 gap-2">

                                        @foreach (['HARI' => $countdown['days'], 'JAM' => $countdown['hours'], 'MNT' => $countdown['minutes']] as $label => $value)

                                            <div
                                                class="bg-black/40 rounded-xl p-3 border border-white/5 flex flex-col items-center justify-center group-hover:border-[#E11D48]/30 transition-colors">

                                                <span
                                                    class="text-3xl font-black text-white tabular-nums leading-none tracking-tight">

                                                    {{ str_pad($value, 2, '0', STR_PAD_LEFT) }}

                                                </span>

                                                <span
                                                    class="text-[9px] font-bold text-neutral-500 uppercase tracking-widest mt-1">{{ $label }}</span>

                                            </div>

                                        @endforeach

                                    </div>



                                    {{-- Action inside card --}}

                                    <a href="{{ route('tickets.detail', $nextMatch->id) }}"
                                        class="mt-6 flex items-center justify-between w-full py-3 px-4 rounded-xl bg-[#E11D48]/10 border border-[#E11D48]/20 hover:bg-[#E11D48] hover:text-white transition-all group/btn">

                                        <span
                                            class="text-xs font-bold uppercase tracking-widest text-[#E11D48] group-hover/btn:text-white">Lihat

                                            Detail</span>

                                        <svg class="w-4 h-4 text-[#E11D48] group-hover/btn:text-white transition-transform group-hover/btn:translate-x-1"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>

                                        </svg>

                                    </a>

                                </div>

                            </div>

                        </div>

                    @endif

                </div>



            </div>

        </div>

    </section>



    {{-- CONTENT GRID --}}

    <section class="py-32 bg-neutral-50 relative overflow-hidden">

        {{-- Watermark --}}

        <div class="absolute top-20 left-0 w-full overflow-hidden pointer-events-none opacity-[0.02]">

            <h2 class="text-[20vw] font-black uppercase whitespace-nowrap leading-none text-center tracking-tighter">

                Statistik

            </h2>

        </div>



        <div class="max-w-[95rem] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">



                {{-- COL 1: Match Results --}}

                <div class="lg:col-span-4 flex flex-col gap-10">

                    <div class="flex items-end justify-between border-b-2 border-neutral-200 pb-6">

                        <h2 class="text-3xl font-black uppercase tracking-tighter">Hasil Laga</h2>

                        <a href="matches.html"
                            class="text-[10px] font-bold uppercase tracking-widest text-[#E11D48] hover:text-black transition-colors">

                            Lihat Semua

                        </a>

                    </div>



                    <div class="flex flex-col gap-5">

                        @php

                            $matchResults = [

                                ['date' => '29 AGT', 'status' => 'M', 'score' => '3 - 1', 'home_team' => 'FC Pro', 'away_team' => 'Bali Utd', 'home_logo' => 'https://images.unsplash.com/photo-1614632537190-23e4b2e69c88?q=80', 'away_logo' => 'https://images.unsplash.com/photo-1551698618-1dfe5d97d256?q=80'],

                                ['date' => '22 AGT', 'status' => 'S', 'score' => '2 - 2', 'home_team' => 'Arema FC', 'away_team' => 'FC Pro', 'home_logo' => 'https://images.unsplash.com/photo-1614632537190-23e4b2e69c88?q=80', 'away_logo' => 'https://images.unsplash.com/photo-1551698618-1dfe5d97d256?q=80'],

                            ];

                        @endphp



                        @foreach ($matchResults as $match)

                            <div class="bg-white p-8 rounded-[2rem] shadow-sm hover:shadow-xl hover:shadow-[#E11D48]/10 transition-all duration-500 group border border-neutral-100 hover:-translate-y-1"
                                data-aos="fade-up">

                                <div class="flex justify-between items-center mb-6">

                                    <span
                                        class="text-[10px] font-bold text-neutral-400 tracking-widest uppercase">{{ $match['date'] }}</span>

                                    <span
                                        class="w-8 h-8 flex items-center justify-center rounded-full text-xs font-bold {{ $match['status'] === 'M' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">

                                        {{ $match['status'] }}

                                    </span>

                                </div>

                                <div class="flex items-center justify-between">

                                    <div class="text-center w-1/3">

                                        <img src="{{ $match['home_logo'] }}"
                                            class="w-10 h-10 mx-auto mb-3 grayscale group-hover:grayscale-0 transition-all">

                                        <h4 class="font-bold text-xs uppercase tracking-wider">{{ $match['home_team'] }}

                                        </h4>

                                    </div>

                                    <div
                                        class="text-3xl font-black tracking-tighter text-neutral-300 group-hover:text-black transition-colors">

                                        {{ $match['score'] }}

                                    </div>

                                    <div class="text-center w-1/3">

                                        <img src="{{ $match['away_logo'] }}"
                                            class="w-10 h-10 mx-auto mb-3 grayscale group-hover:grayscale-0 transition-all">

                                        <h4 class="font-bold text-xs uppercase tracking-wider">{{ $match['away_team'] }}

                                        </h4>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>



                {{-- COL 2: News Feed --}}

                <div class="lg:col-span-4 flex flex-col gap-10">

                    <div class="flex items-end justify-between border-b-2 border-neutral-200 pb-6">

                        <h2 class="text-3xl font-black uppercase tracking-tighter">Berita Terbaru</h2>

                        <a href="{{ route('media') }}"
                            class="text-[10px] font-bold uppercase tracking-widest text-[#E11D48] hover:text-black transition-colors">

                            Arsip

                        </a>

                    </div>



                    <div class="divide-y divide-neutral-200">

                        @forelse ($latestNews as $news)

                            <a href="{{ route('media.news.detail', $news->slug) }}" class="group block py-6"
                                data-aos="fade-up" data-aos-delay="100">

                                <div class="flex gap-5 items-start">

                                    <div class="w-20 h-20 shrink-0 overflow-hidden rounded-2xl bg-neutral-100">

                                        <img src="{{ asset('storage/' . $news->image_path) }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 grayscale group-hover:grayscale-0">

                                    </div>

                                    <div>

                                        <span
                                            class="text-[10px] font-bold uppercase tracking-widest text-[#E11D48] mb-2 block">

                                            {{ $news->published_at->format('d M') }}

                                        </span>

                                        <h3
                                            class="text-lg font-bold leading-tight group-hover:text-[#E11D48] transition-colors line-clamp-2 mb-2">

                                            {{ $news->title }}

                                        </h3>

                                    </div>

                                </div>

                            </a>

                        @empty

                            <p class="py-6 text-neutral-400 italic">Belum ada berita terbaru.</p>

                        @endforelse

                    </div>

                </div>



                {{-- COL 3: Upcoming (Table Style) --}}

                <div class="lg:col-span-4 flex flex-col gap-10">

                    <div class="flex items-end justify-between border-b-2 border-neutral-200 pb-6">

                        <h2 class="text-3xl font-black uppercase tracking-tighter">Jadwal</h2>

                        <a href="{{ route('tickets.purchase') }}"
                            class="text-[10px] font-bold uppercase tracking-widest text-[#E11D48] hover:text-black transition-colors">

                            Tiket

                        </a>

                    </div>



                    <div class="flex flex-col gap-4">

                        @forelse ($upcomingMatches as $match)
                            <div
                                class="group relative bg-white border border-neutral-200 p-6 rounded-[2rem] hover:border-[#E11D48] transition-all">

                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <div class="text-lg font-black uppercase tracking-tight">
                                            {{ $match->home_team }} vs {{ $match->away_team }}
                                        </div>
                                        <div class="text-xs font-medium text-neutral-400 mt-1 uppercase tracking-wide">
                                            {{ \Carbon\Carbon::parse($match->match_date)->translatedFormat('l, d M • H:i') }}
                                        </div>
                                    </div>

                                    @if ($match->sales_status === 'available')
                                        <span class="text-green-500 font-bold text-xs">Tiket Tersedia</span>
                                    @elseif ($match->sales_status === 'upcoming')
                                        <span class="text-yellow-500 font-bold text-xs">Segera Tersedia</span>
                                    @endif
                                </div>

                                <div class="flex flex-wrap items-center gap-5">
                                    @auth
                                        <a href="{{ route('tickets.detail', $match->id) }}"
                                            class="px-6 py-3 bg-[#E11D48] text-white rounded-full font-bold uppercase">
                                            Beli Tiket →
                                        </a>
                                    @else
                                        <a href="{{ route('login.page') }}"
                                            class="px-6 py-3 bg-[#E11D48] text-white rounded-full font-bold uppercase">
                                            Login & Beli →
                                        </a>
                                    @endauth
                                </div>
                            </div>
                        @empty
                            <div class="py-10 text-center text-neutral-400">
                                Tidak ada jadwal pertandingan
                            </div>
                        @endforelse


                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- GALLERY & MEDIA --}}

    <section class="py-32 bg-white relative">

        <div class="max-w-[95rem] mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">

                <div>

                    <h2 class="text-5xl md:text-8xl font-black uppercase tracking-tighter leading-none mb-4">

                        Momen<br>Terbaik

                    </h2>

                    <div class="w-24 h-2 bg-[#E11D48]"></div>

                </div>

                {{-- Navigation Buttons --}}

                <div class="flex gap-4">

                    <a href="{{ route('galleries.index') }}"
                        class="w-14 h-14 rounded-full border border-neutral-200 flex items-center justify-center hover:bg-black hover:text-white transition-colors group">

                        <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />

                        </svg>

                    </a>

                    <a href="{{ route('galleries.index') }}"
                        class="w-14 h-14 rounded-full border border-neutral-200 flex items-center justify-center hover:bg-[#E11D48] hover:border-[#E11D48] hover:text-white transition-colors group">

                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />

                        </svg>

                    </a>

                </div>

            </div>



            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">

                @forelse ($galleries as $gallery)

                    <a href="{{ route('galleries.show', $gallery->slug) }}"
                        class="group relative aspect-[4/5] overflow-hidden rounded-[2rem] bg-neutral-100 shadow-lg"
                        data-aos="zoom-in" data-aos-delay="{{ $loop->index * 50 }}">

                        <img src="{{ asset('storage/' . $gallery->cover_image) }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 grayscale hover:grayscale-0"
                            onerror="this.src='https://images.pexels.com/photos/274506/pexels-photo-274506.jpeg';">

                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent opacity-60 group-hover:opacity-100 transition-opacity duration-300">

                            <div class="absolute bottom-8 left-8">

                                <span
                                    class="inline-block bg-[#E11D48] text-white text-[9px] font-bold uppercase tracking-widest px-2 py-1 rounded mb-2">

                                    Galeri

                                </span>

                                <p class="text-white font-bold text-xl leading-tight mb-1">{{ $gallery->title }}</p>

                                <p class="text-neutral-300 text-xs uppercase tracking-wider">{{ $gallery->photos_count }}

                                    Foto</p>

                            </div>

                        </div>

                    </a>

                @empty

                    <div class="col-span-4 py-20 text-center bg-slate-50 rounded-3xl">

                        <p class="text-neutral-400">Galeri segera hadir</p>

                    </div>

                @endforelse

            </div>

        </div>

    </section>



    {{-- HIGHLIGHTS SECTION --}}

    <section class="py-32 bg-neutral-50 relative overflow-hidden">

        {{-- Watermark Background --}}

        <div class="absolute top-20 right-0 w-full overflow-hidden pointer-events-none opacity-[0.03] text-right">

            <h2 class="text-[20vw] font-black uppercase whitespace-nowrap leading-none tracking-tighter">

                Sorotan

            </h2>

        </div>



        <div class="max-w-[95rem] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            {{-- Header Section --}}

            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">

                <div>

                    <h2 class="text-5xl md:text-8xl font-black uppercase tracking-tighter leading-none mb-4">

                        Cuplikan<br>Laga

                    </h2>

                    <div class="w-24 h-2 bg-[#E11D48]"></div>

                    <p class="mt-4 text-neutral-500 font-medium text-lg max-w-xl">

                        Saksikan kembali momen-momen terbaik, gol spektakuler, dan aksi di lapangan.

                    </p>

                </div>

                {{-- Button ke Youtube --}}

                <a href="https://www.youtube.com/@sumselunited" target="_blank" rel="noopener noreferrer"
                    class="group px-8 py-4 bg-white border border-neutral-200 text-neutral-900 rounded-full font-bold text-sm uppercase tracking-widest hover:bg-[#E11D48] hover:text-white hover:border-[#E11D48] transition-all duration-300 shadow-lg flex items-center gap-2">

                    Saluran Youtube

                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7-7 7M3 12h18" />

                    </svg>

                </a>

            </div>



            {{-- Video Grid --}}

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse ($videos as $video)

                    <a href="https://www.youtube.com/watch?v={{ $video->youtube_id }}" target="_blank"
                        rel="noopener noreferrer"
                        class="group bg-white rounded-[2rem] shadow-sm hover:shadow-2xl hover:shadow-[#E11D48]/10 overflow-hidden transition-all duration-500 transform hover:-translate-y-2 border border-neutral-100"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">

                        {{-- Thumbnail --}}

                        <div class="relative aspect-video overflow-hidden">

                            <img src="{{ $video->thumbnail }}" alt="{{ $video->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 grayscale group-hover:grayscale-0">

                            {{-- Overlay & Play Icon --}}

                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition-colors"></div>

                            <div class="absolute inset-0 flex items-center justify-center">

                                <div
                                    class="w-16 h-16 bg-[#E11D48] rounded-full flex items-center justify-center text-white shadow-lg group-hover:scale-110 transition-transform duration-300">

                                    <svg class="w-6 h-6 ml-1" fill="currentColor" viewBox="0 0 24 24">

                                        <path d="M8 5v14l11-7z" />

                                    </svg>

                                </div>

                            </div>

                        </div>

                        {{-- Content --}}

                        <div class="p-8">

                            <h3
                                class="text-xl font-bold text-neutral-900 mb-3 line-clamp-2 leading-tight group-hover:text-[#E11D48] transition-colors">

                                {{ $video->title }}

                            </h3>

                            <div
                                class="flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-neutral-400">

                                <svg class="w-4 h-4 text-[#E11D48]" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />

                                </svg>

                                {{ $video->published_at?->translatedFormat('d F Y') }}

                            </div>

                        </div>

                    </a>

                @empty

                    <div class="col-span-full py-20 text-center border-2 border-dashed border-neutral-200 rounded-[2rem]">

                        <p class="text-neutral-400 font-medium">Belum ada video tersedia.</p>

                    </div>

                @endforelse

            </div>

        </div>

    </section>



    {{-- PLAYERS --}}

    @php

        $players = [

            ['name' => 'Ahmad Rizki', 'position' => 'Penyerang', 'number' => 10, 'photo' => 'https://images.unsplash.com/photo-1594736797933-d0401ba2fe65?q=80', 'slug' => 'ahmad-rizki'],

            ['name' => 'Budi Santoso', 'position' => 'Gelandang', 'number' => 7, 'photo' => 'https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?q=80', 'slug' => 'budi-santoso'],

            ['name' => 'Carlos Silva', 'position' => 'Bek', 'number' => 4, 'photo' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80', 'slug' => 'carlos-silva'],

            ['name' => 'Dedi Kurniawan', 'position' => 'Kiper', 'number' => 1, 'photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80', 'slug' => 'dedi-kurniawan'],

        ];

    @endphp



    <section class="py-32 bg-neutral-900 relative overflow-hidden text-white">

        <div
            class="absolute top-1/2 -translate-y-1/2 right-0 w-full overflow-hidden pointer-events-none opacity-[0.05] text-right">

            <h2 class="text-[25vw] font-black uppercase whitespace-nowrap leading-none tracking-tighter text-white">

                Skuad

            </h2>

        </div>



        <div class="max-w-[95rem] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <div class="flex flex-col md:flex-row justify-between items-end mb-20 gap-8">

                <div>

                    <span class="text-[#E11D48] font-bold tracking-widest uppercase text-sm mb-2 block">

                        Daftar Pemain

                    </span>

                    <h2 class="text-5xl md:text-7xl font-black uppercase tracking-tighter">Tim Utama</h2>

                </div>

                <a href="team.html"
                    class="inline-flex items-center gap-2 border-b border-[#E11D48] pb-1 font-bold uppercase tracking-widest text-xs hover:text-[#E11D48] transition-colors">

                    Lihat Skuad Lengkap

                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>

                    </svg>

                </a>

            </div>



            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                @foreach ($players as $player)

                    <div class="group cursor-pointer" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">

                        <div
                            class="relative overflow-hidden rounded-[2.5rem] bg-neutral-800 mb-6 aspect-[3/4] border border-white/5 group-hover:border-[#E11D48]/50 transition-colors">

                            <img src="{{ $player['photo'] }}"
                                class="w-full h-full object-cover mix-blend-luminosity opacity-80 group-hover:opacity-100 group-hover:mix-blend-normal transition-all duration-700 scale-100 group-hover:scale-110"
                                onerror="this.src='https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg';">

                            {{-- Number Badge --}}

                            <div
                                class="absolute top-4 right-4 w-12 h-12 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center font-black text-xl z-10 group-hover:bg-[#E11D48] transition-colors">

                                {{ $player['number'] }}

                            </div>

                            <div
                                class="absolute bottom-0 left-0 w-full h-1/2 bg-gradient-to-t from-[#E11D48]/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">

                            </div>

                        </div>

                        <div class="text-center">

                            <h3
                                class="text-2xl font-black uppercase tracking-tight mb-1 group-hover:text-[#E11D48] transition-colors">

                                {{ $player['name'] }}

                            </h3>

                            <p class="text-[10px] font-bold uppercase tracking-widest text-neutral-500">

                                {{ $player['position'] }}

                            </p>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </section>



</div>