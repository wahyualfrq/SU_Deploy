<div>
    <section class="relative h-screen flex items-center justify-center overflow-hidden bg-black">

    {{-- BACKGROUND --}}
    <img
        src="{{ asset('images/team.JPG') }}"
        class="absolute inset-0 w-full h-full object-cover"
        loading="lazy"
        onerror="this.src='https://images.pexels.com/photos/274506/pexels-photo-274506.jpeg';"
    >

    {{-- OVERLAY --}}
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-red-700/60"></div>

    {{-- CONTENT (INI YANG SEBELUMNYA BIKIN NUMPUK) --}}
    <div class="relative z-10 text-center text-white max-w-4xl mx-auto px-4">
         <!-- Live Match Status -->
            <div class="mb-6">
                <div
                    class="inline-flex items-center bg-green-600/20 backdrop-blur-sm rounded-full px-6 py-3 border border-green-600/30">
                    <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse mr-3"></div>
                    <span class="text-green-100 font-semibold">PERTANDINGAN BERIKUTNYA</span>
                </div>
            </div>

        @if ($nextMatch)

            <h1 class="text-4xl sm:text-5xl font-bold mb-4 leading-tight">
                {{ $nextMatch->match_name }}
            </h1>

            <p class="text-xl text-gray-200 mb-6">
                {{ \Carbon\Carbon::parse($nextMatch->match_date)->translatedFormat('l, d F Y') }}
                • {{ \Carbon\Carbon::parse($nextMatch->match_date)->format('H:i') }} WIB
                • {{ $nextMatch->stadium }}
            </p>

            <div class="flex justify-center space-x-6 mb-8">
                @foreach ([
                    'HARI' => $countdown['days'],
                    'JAM' => $countdown['hours'],
                    'MENIT' => $countdown['minutes']
                ] as $label => $value)
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg p-4 min-w-[80px] text-center">
                        <div class="text-2xl font-bold font-mono">
                            {{ str_pad($value, 2, '0', STR_PAD_LEFT) }}
                        </div>
                        <div class="text-sm text-gray-300">{{ $label }}</div>
                    </div>
                @endforeach
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('tickets.purchase') }}"
                   class="bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-lg font-semibold text-lg shadow-lg">
                    Beli Tiket Sekarang
                </a>
                <a href="{{ route('team') }}"
                   class="bg-white/20 hover:bg-white/30 text-white px-8 py-4 rounded-lg font-semibold text-lg border border-white/30">
                    Lihat Tim
                </a>
            </div>

        @else
            <h1 class="text-4xl sm:text-5xl font-bold mb-4">
                Belum Ada Jadwal Pertandingan
            </h1>
            <p class="text-xl text-gray-200">
                Silakan cek kembali nanti.
            </p>
        @endif
    </div>

    {{-- SCROLL ICON --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce z-10">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
    </div>

</section>





        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
            </svg>
        </div>
    </section>

    <section class="py-20 bg-gradient-to-br from-gray-50 via-white to-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

                <!-- Hasil Pertandingan Terakhir -->
                <div
                    class="bg-white rounded-2xl border border-gray-200 shadow-md p-6 hover:shadow-rose-600/20 transition-all duration-500">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-neutral-900">Hasil Pertandingan</h2>
                        <a href="matches.html"
                            class="text-rose-600 hover:text-rose-700 font-semibold text-sm transition-colors">Lihat
                            Semua</a>
                    </div>

                    <div class="space-y-5">
                        @php
                            $matchResults = [
                                [
                                    'date' => '29 Agustus 2025',
                                    'status' => 'MENANG',
                                    'status_color' => 'success',
                                    'score' => '3 - 1',
                                    'home_team' => 'Football Club Pro',
                                    'away_team' => 'Bali United',
                                    'home_logo' => 'https://images.unsplash.com/photo-1614632537190-23e4b2e69c88?q=80',
                                    'away_logo' => 'https://images.unsplash.com/photo-1551698618-1dfe5d97d256?q=80',
                                    'scorers' => ['Ahmad Rizki (15\')', 'Budi Santoso (34\')', 'Carlos Silva (78\')'],
                                ],
                                [
                                    'date' => '22 Agustus 2025',
                                    'status' => 'SERI',
                                    'status_color' => 'warning',
                                    'score' => '2 - 2',
                                    'home_team' => 'Arema FC',
                                    'away_team' => 'Football Club Pro',
                                    'home_logo' => 'https://images.unsplash.com/photo-1614632537190-23e4b2e69c88?q=80',
                                    'away_logo' => 'https://images.unsplash.com/photo-1551698618-1dfe5d97d256?q=80',
                                    'scorers' => [],
                                ],
                            ];
                        @endphp

                        @foreach ($matchResults as $match)
                            <div
                                class="border border-gray-200 rounded-xl p-4 hover:border-rose-500/50 hover:shadow-md hover:shadow-rose-600/10 transition-all duration-300">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm text-gray-500">{{ $match['date'] }}</span>
                                    <span class="px-2 py-1 rounded text-xs font-semibold
                                        @if($match['status_color'] == 'success') bg-green-100 text-green-700
                                        @elseif($match['status_color'] == 'warning') bg-yellow-100 text-yellow-700
                                        @else bg-gray-100 text-gray-600 @endif">
                                        {{ $match['status'] }}
                                    </span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{ $match['home_logo'] }}" alt="{{ $match['home_team'] }}"
                                            class="w-9 h-9 rounded-full object-cover border border-gray-200">
                                        <span class="font-semibold text-gray-800">{{ $match['home_team'] }}</span>
                                    </div>
                                    <div
                                        class="flex items-center justify-center gap-2 font-oswald font-extrabold text-3xl leading-none">
                                        @php
                                            [$homeScore, $awayScore] = explode('-', $match['score']);
                                        @endphp

                                        <span class="text-rose-600">{{ trim($homeScore) }}</span>
                                        <span class="text-gray-500 text-2xl -mt-[2px]">-</span>
                                        <span class="text-rose-600">{{ trim($awayScore) }}</span>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <span class="font-semibold text-gray-800">{{ $match['away_team'] }}</span>
                                        <img src="{{ $match['away_logo'] }}" alt="{{ $match['away_team'] }}"
                                            class="w-9 h-9 rounded-full object-cover border border-gray-200">
                                    </div>
                                </div>
                                @if (!empty($match['scorers']))
                                    <div class="mt-3 text-sm text-gray-500">
                                        <span class="font-semibold text-gray-700">Pencetak Gol:</span>
                                        {{ implode(', ', $match['scorers']) }}
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Berita Terbaru -->
        
            <div
                class="bg-white rounded-2xl border border-gray-200 shadow-md p-6 hover:shadow-rose-600/20 transition-all duration-500">

                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-neutral-900">Berita Terbaru</h2>
                    <a href="{{ route('media') }}?tab=news"
                    class="text-rose-600 hover:text-rose-700 font-semibold text-sm transition-colors">
                        Lihat Semua
                    </a>
                </div>

                <div class="space-y-6">
                    @forelse ($latestNews as $news)
                        <article
                            class="flex space-x-4 hover:-translate-y-1 hover:shadow-lg hover:shadow-rose-600/10
                                border border-transparent hover:border-rose-500/30 rounded-xl p-2 transition-all duration-300">

                            {{-- Thumbnail --}}
                            <img
                                src="{{ asset('storage/' . $news->image_path) }}"
                                alt="{{ $news->title }}"
                                class="w-24 h-20 rounded-lg object-cover border border-gray-200"
                                onerror="this.src='https://images.pexels.com/photos/274506/pexels-photo-274506.jpeg';">

                            {{-- Content --}}
                            <div class="flex-1 min-w-0">
                                <h3
                                    class="text-sm font-semibold text-neutral-800 hover:text-rose-600 transition-colors mb-1 line-clamp-2">
                                    {{ $news->title }}
                                </h3>

                                <p class="text-xs text-gray-500 mb-1">
                                    {{ $news->published_at->translatedFormat('d F Y') }}
                                    • {{ $news->published_at->format('H:i') }} WIB
                                </p>

                                <p class="text-sm text-gray-600 line-clamp-2">
                                    {{ Str::limit(strip_tags($news->content), 80) }}
                                </p>
                            </div>
                        </article>
                    @empty
                        <p class="text-sm text-gray-500 text-center">
                            Belum ada berita terbaru.
                        </p>
                    @endforelse
                </div>
            </div>


                <!-- Jadwal Pertandingan -->
                <div
                    class="bg-white rounded-2xl border border-gray-200 shadow-md p-6 hover:shadow-rose-600/20 transition-all duration-500">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-neutral-900">Jadwal Pertandingan</h2>
                       <a href="{{ route('tickets.purchase') }}"
                        class="text-rose-600 hover:text-rose-700 font-semibold text-sm">
                            Lihat Semua
                        </a>

                    </div>
                <div class="space-y-5">
                    @forelse ($upcomingMatches as $match)
                        <div class="border border-gray-200 rounded-xl p-4 hover:border-rose-500/50 transition">

                            {{-- Header --}}
                            <div class="flex items-center justify-end mb-3">
                                

                                @if ($match->status === 'available')
                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">
                                        TIKET TERSEDIA
                                    </span>
                                @elseif ($match->status === 'upcoming')
                                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-semibold">
                                        SEGERA TERSEDIA
                                    </span>
                                @else
                                    <span class="bg-gray-200 text-gray-600 px-2 py-1 rounded text-xs font-semibold">
                                        HABIS
                                    </span>
                                @endif

                            </div>

                            {{-- Tanggal --}}
                            <div class="text-center mb-3">
                                <div class="text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($match->match_date)->translatedFormat('l, d F Y') }}
                                </div>
                                <div class="text-lg font-bold text-rose-600">
                                    {{ \Carbon\Carbon::parse($match->match_date)->format('H:i') }} WIB
                                </div>
                            </div>

                            {{-- Tim --}}
                            <div class="flex justify-center">
                                <div class="text-sm font-bold text-center">
                                    {{ $match->match_name }}
                                </div>
                            </div>


                            {{-- CTA --}}
                            @if ($match->status === 'available')
                                <a href="{{ route('tickets.detail', $match->id) }}"
                                class="mt-5 block bg-gradient-to-r from-rose-600 to-red-600 text-white py-2 rounded-lg text-center font-semibold">
                                    Beli Tiket
                                </a>
                            @else
                                <button disabled
                                    class="mt-5 w-full bg-gray-300 text-gray-600 py-2 rounded-lg font-semibold cursor-not-allowed">
                                    Tiket Belum Tersedia
                                </button>
                            @endif
                        </div>
                    @empty
                        <p class="text-center text-gray-500">Belum ada jadwal pertandingan.</p>
                    @endforelse
                </div>

                </div>

            </div>
        </div>
    </section>

    @php
        $galleries = [
            [
                'title' => 'Latihan Pra-Musim',
                'images' => [
                    'https://images.unsplash.com/photo-1607746882042-944635dfe10e',
                    'https://images.unsplash.com/photo-1518972559570-7cc1309f3229',
                    'https://images.unsplash.com/photo-1521412644187-c49fa3b3c1b7',
                ],
            ],
            [
                'title' => 'Turnamen Lokal',
                'images' => [
                    'https://images.unsplash.com/photo-1599058917212-d750089bc07d',
                    'https://images.unsplash.com/photo-1584467735871-1f7f7f4f6b6f',
                    'https://images.unsplash.com/photo-1607746882042-944635dfe10e',
                ],
            ],
            // Tambah galeri lain di sini...
        ];
    @endphp

    <!-- Gallery Section -->
    <section class="relative bg-gradient-to-b from-gray-50 via-white to-gray-50 py-24 overflow-hidden">
        <!-- Decorative Glow Background -->
        <div
            class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-rose-100/40 rounded-full blur-3xl opacity-30 pointer-events-none">
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Title -->
            <div class="text-center mb-16">
                <h2
                    class="text-5xl font-extrabold bg-gradient-to-r from-neutral-900 via-neutral-700 to-neutral-500 bg-clip-text text-transparent mb-4 drop-shadow-sm">
                    Galeri Foto
                </h2>
                <div class="w-24 h-1 mx-auto bg-gradient-to-r from-rose-600 to-red-600 rounded-full mb-4"></div>
                <p class="text-gray-600 text-lg">Momen-momen terbaik <span class="font-semibold text-rose-600">Sumsel
                        United</span></p>
            </div>

            <!-- Image Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($galleries as $gallery)
                    <a href="#"
                        class="group relative block rounded-2xl border border-gray-200 shadow-md overflow-hidden 
                           hover:shadow-rose-600/30 hover:border-rose-500 transition-all duration-500 transform hover:-translate-y-2">
                        <div class="relative h-64">
                            <img src="{{ $gallery['images'][0] }}" alt="Cover Galeri"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                onerror="this.src='https://images.pexels.com/photos/274506/pexels-photo-274506.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'; this.onerror=null;">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                <h3 class="text-white text-xl font-bold mb-1">{{ $gallery['title'] }}</h3>
                                <p class="text-gray-200 text-sm font-medium group-hover:text-rose-400 transition-colors">
                                    Lihat koleksi foto →
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Video Section -->
            <div class="mt-24">
                <div class="text-center mb-14">
                    <h2
                        class="text-5xl font-extrabold bg-gradient-to-r from-neutral-900 via-neutral-700 to-neutral-500 bg-clip-text text-transparent mb-4 drop-shadow-sm">
                        Galeri Video
                    </h2>
                    <div class="w-24 h-1 mx-auto bg-gradient-to-r from-rose-600 to-red-600 rounded-full mb-4"></div>
                    <p class="text-gray-600 text-lg">Tonton aksi terbaik kami</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Example Video Card -->
                    <div
                        class="bg-white border border-gray-200 rounded-2xl shadow-md hover:shadow-rose-600/30 hover:border-rose-500 overflow-hidden transition-all duration-500 transform hover:-translate-y-2">
                        <div class="aspect-video overflow-hidden">
                            <iframe src="https://www.youtube.com/embed/7HiKTMNHyME" frameborder="0" allowfullscreen
                                class="w-full h-full"></iframe>
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Latihan Pramusim di Hong Kong</h3>
                            <p class="text-sm text-gray-500 font-medium">Dipublikasikan 2 September 2025</p>
                        </div>
                    </div>

                    <div
                        class="bg-white border border-gray-200 rounded-2xl shadow-md hover:shadow-rose-600/30 hover:border-rose-500 overflow-hidden transition-all duration-500 transform hover:-translate-y-2">
                        <div class="aspect-video overflow-hidden">
                            <iframe src="https://www.youtube.com/embed/U_PmnRJnM5Y" frameborder="0" allowfullscreen
                                class="w-full h-full"></iframe>
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Turnamen Kades Cup II</h3>
                            <p class="text-sm text-gray-500 font-medium">Dipublikasikan 1 September 2025</p>
                        </div>
                    </div>

                    <div
                        class="bg-white border border-gray-200 rounded-2xl shadow-md hover:shadow-rose-600/30 hover:border-rose-500 overflow-hidden transition-all duration-500 transform hover:-translate-y-2">
                        <div class="aspect-video overflow-hidden">
                            <iframe src="https://www.youtube.com/embed/9xwazD5SyVg" frameborder="0" allowfullscreen
                                class="w-full h-full"></iframe>
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Behind the Scenes: Pemain Baru</h3>
                            <p class="text-sm text-gray-500 font-medium">Dipublikasikan 30 Agustus 2025</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        $players = [
            [
                'name' => 'Ahmad Rizki',
                'position' => 'Striker',
                'number' => 10,
                'photo' => 'https://images.unsplash.com/photo-1594736797933-d0401ba2fe65?q=80',
                'slug' => 'ahmad-rizki',
                'stats' => ['Gol' => 15, 'Assist' => 8],
            ],
            [
                'name' => 'Budi Santoso',
                'position' => 'Gelandang',
                'number' => 7,
                'photo' => 'https://images.unsplash.com/photo-1552374196-1ab2a1c593e8?q=80',
                'slug' => 'budi-santoso',
                'stats' => ['Gol' => 12, 'Assist' => 18],
            ],
            [
                'name' => 'Carlos Silva',
                'position' => 'Bek',
                'number' => 4,
                'photo' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80',
                'slug' => 'carlos-silva',
                'stats' => ['Gol' => 3, 'Tackle' => 95],
            ],
            [
                'name' => 'Dedi Kurniawan',
                'position' => 'Kiper',
                'number' => 1,
                'photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80',
                'slug' => 'dedi-kurniawan',
                'stats' => ['Clean Sheet' => 12, 'Saves' => 89],
            ],
        ];
    @endphp

    <!-- Players Section -->
    <section class="bg-white shadow-sm p-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold text-black mb-4">Skuad Pemain</h2>
                <div class="w-24 h-1 mx-auto bg-gradient-to-r from-rose-600 to-red-600 rounded-full mb-4"></div>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                    Kenali para bintang tim yang siap memberikan performa terbaik di setiap pertandingan
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($players as $player)
                    <div class="group relative bg-gradient-to-br from-white/5 to-white/[0.02] backdrop-blur-sm rounded-2xl p-8 text-center
                        shadow-sm border border-gray-200 
                        hover:shadow-2xl hover:shadow-rose-600/20 
                        hover:border-rose-500/50 
                        transition-all duration-300 transform hover:scale-105">

                        <!-- Background Glow Effect -->
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-rose-600/0 to-red-600/0 group-hover:from-rose-600/10 group-hover:to-red-600/10 rounded-2xl transition-all duration-300">
                        </div>

                        <div class="relative">
                            <div class="relative mb-8">
                                <div
                                    class="w-32 h-32 mx-auto rounded-full bg-gradient-to-br from-rose-600 to-red-600 p-1 shadow-2xl shadow-rose-600/50 group-hover:shadow-rose-600/80 transition-all duration-300">
                                    <img src="{{ $player['photo'] }}" alt="{{ $player['name'] }}"
                                        class="w-full h-full rounded-full object-cover"
                                        onerror="this.src='https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'; this.onerror=null;" />
                                </div>
                                <div
                                    class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-rose-600 to-red-600 text-white rounded-full w-12 h-12 flex items-center justify-center font-bold text-lg shadow-lg shadow-rose-600/50">
                                    {{ $player['number'] }}
                                </div>
                            </div>

                            <h3 class="text-xl font-bold text-white mb-2">{{ $player['name'] }}</h3>
                            <p class="text-sm text-gray-400 mb-6 font-medium uppercase tracking-wide">
                                {{ $player['position'] }}</p>

                            <div class="grid grid-cols-2 gap-4 mb-6">
                                @foreach ($player['stats'] as $label => $value)
                                    <div class="bg-white/5 rounded-xl p-4 backdrop-blur-sm border border-white/10">
                                        <div
                                            class="text-3xl font-bold bg-gradient-to-r from-rose-400 to-red-400 bg-clip-text text-transparent">
                                            {{ $value }}</div>
                                        <div class="text-xs text-gray-400 mt-1 font-medium uppercase">{{ $label }}</div>
                                    </div>
                                @endforeach
                            </div>

                            <a href="/team/{{ $player['slug'] }}"
                                class="inline-flex items-center gap-2 text-rose-400 hover:text-rose-300 font-bold text-sm transition-colors group/link">
                                Lihat Profil
                                <svg class="w-4 h-4 group-hover/link:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View All Players Button -->
            <div class="text-center mt-12">
                <a href="team.html"
                    class="inline-block bg-gradient-to-r from-rose-600 to-red-600 hover:from-rose-700 hover:to-red-700 text-white px-10 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-2xl shadow-rose-600/40 hover:shadow-rose-600/60 hover:scale-105">
                    Lihat Semua Pemain
                </a>
            </div>
        </div>
    </section>
</div>