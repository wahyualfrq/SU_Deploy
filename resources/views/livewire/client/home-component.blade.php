<div class="font-sans antialiased text-neutral-900 bg-white selection:bg-[#E11D48] selection:text-white">

{{-- HERO SECTION --}}
<section class="relative w-full min-h-[90vh] flex items-center overflow-hidden bg-neutral-900">

    <div class="absolute inset-0 z-0 select-none">
        <img
            src="{{ env('HERO_IMAGE') }}"
            class="w-full h-full object-cover object-center scale-105"
            alt="Suasana Stadion"
            loading="eager"
            onerror="this.src='https://images.pexels.com/photos/274506/pexels-photo-274506.jpeg';"
        >

        <div class="absolute inset-0 bg-gradient-to-r from-neutral-900/90 via-neutral-900/60 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-neutral-900 via-transparent to-transparent"></div>

        <div class="absolute top-1/2 right-0 -translate-y-1/2 w-[40vw] h-[40vw] bg-[#E11D48] opacity-20 blur-[150px] rounded-full"></div>
    </div>

    <div class="relative z-10 w-full max-w-[95rem] mx-auto px-4 sm:px-6 lg:px-8 py-20 pt-32">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

            {{-- LEFT --}}
            <div class="lg:col-span-7" data-aos="fade-right">
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-black text-white uppercase mb-6">
                    @if($nextMatch)
                        <span class="block">LASKAR WONG KITO</span>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#E11D48] to-white italic">
                            NYALI JUARA
                        </span>
                    @else
                        Musim<br>Segera Dimulai
                    @endif
                </h1>

                <p class="text-lg text-gray-300 border-l-4 border-[#E11D48] pl-6 mb-10">
                    Mewakili Sumatera Selatan dengan kerja keras dan loyalitas.
                </p>

                @php
                    $ticketHref = auth()->check() && $nextMatch
                        ? route('tickets.detail', $nextMatch->id)
                        : route('login.page');

                    $ticketLabel = auth()->check() ? 'Beli Tiket' : 'Masuk & Beli';
                @endphp

                <div class="flex gap-5">
                    <a href="{{ $ticketHref }}" class="px-8 py-4 bg-[#E11D48] text-white rounded-full font-bold">
                        {{ $ticketLabel }}
                    </a>
                    <a href="{{ route('team') }}" class="px-8 py-4 border border-white/30 text-white rounded-full">
                        Lihat Tim
                    </a>
                </div>
            </div>

            {{-- RIGHT --}}
            @if($nextMatch)
            <div class="lg:col-span-5" data-aos="fade-left">
                <div class="bg-neutral-900/70 rounded-3xl p-8 border border-white/10">
                    <h3 class="text-2xl font-black text-white mb-4">
                        {{ $nextMatch->home_team }} vs {{ $nextMatch->away_team }}
                    </h3>

                    <p class="text-sm text-neutral-400 mb-6">
                        {{ $nextMatch->stadium }}
                    </p>

                    <div class="grid grid-cols-3 gap-2 mb-6">
                        @foreach (['HARI' => $countdown['days'], 'JAM' => $countdown['hours'], 'MNT' => $countdown['minutes']] as $label => $value)
                            <div class="bg-black/40 rounded-xl p-3 text-center">
                                <div class="text-2xl font-black text-white">
                                    {{ str_pad($value, 2, '0', STR_PAD_LEFT) }}
                                </div>
                                <div class="text-[10px] text-neutral-400">{{ $label }}</div>
                            </div>
                        @endforeach
                    </div>

                    <a href="{{ route('tickets.detail', $nextMatch->id) }}"
                        class="block text-center py-3 bg-[#E11D48] text-white rounded-xl font-bold">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @endif

        </div>
    </div>
</section>

{{-- NEWS --}}
<section class="py-32 bg-neutral-50">
    <div class="max-w-[95rem] mx-auto px-6 grid lg:grid-cols-3 gap-10">

        {{-- HASIL --}}
        <div>
            <h2 class="text-3xl font-black mb-6">Hasil Laga</h2>
            @forelse ($finishedMatches as $match)
                <div class="bg-white p-6 rounded-2xl mb-4">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-xs text-neutral-400">
                            {{ $match->match_date->translatedFormat('d M') }}
                        </span>
                        <span class="font-bold">
                            {{ $match->home_score }} - {{ $match->away_score }}
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <img src="{{ $match->homeClub->logo }}" class="w-12 h-12 object-contain">
                        <img src="{{ $match->awayClub->logo }}" class="w-12 h-12 object-contain">
                    </div>
                </div>
            @empty
                <p class="text-neutral-400">Belum ada hasil</p>
            @endforelse
        </div>

        {{-- NEWS --}}
        <div>
            <h2 class="text-3xl font-black mb-6">Berita Terbaru</h2>
            @foreach ($latestNews as $news)
                <a href="{{ route('media.news.detail', $news->slug) }}" class="flex gap-4 mb-6">
                    <img src="{{ $news->image_path }}" class="w-20 h-20 rounded-xl object-cover">
                    <div>
                        <p class="text-xs text-[#E11D48]">{{ $news->published_at->format('d M') }}</p>
                        <h3 class="font-bold">{{ $news->title }}</h3>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- UPCOMING --}}
        <div>
            <h2 class="text-3xl font-black mb-6">Jadwal</h2>
            @foreach ($upcomingMatches as $match)
                <div class="bg-white p-6 rounded-2xl mb-4">
                    <h4 class="font-bold">
                        {{ $match->home_team }} vs {{ $match->away_team }}
                    </h4>
                    <p class="text-xs text-neutral-400">
                        {{ \Carbon\Carbon::parse($match->match_date)->translatedFormat('l, d M H:i') }}
                    </p>
                </div>
            @endforeach
        </div>

    </div>
</section>

{{-- GALLERY --}}
<section class="py-32 bg-white">
    <div class="max-w-[95rem] mx-auto px-6 grid md:grid-cols-4 gap-6">
        @foreach ($galleries as $gallery)
            <a href="{{ route('galleries.show', $gallery->slug) }}" class="block rounded-3xl overflow-hidden">
                <img src="{{ $gallery->cover_image }}" class="w-full h-full object-cover">
            </a>
        @endforeach
    </div>
</section>

{{-- PLAYERS --}}
<section class="py-32 bg-neutral-900 text-white">
    <div class="max-w-[95rem] mx-auto px-6 grid md:grid-cols-4 gap-8">
        @foreach ($players as $player)
            <div class="text-center">
                <img
                    src="{{ $player->photo_url ?? asset('images/default-player.png') }}"
                    class="w-full h-80 object-cover rounded-3xl mb-4"
                >
                <h3 class="font-black">{{ $player->name }}</h3>
                <p class="text-xs text-neutral-400">{{ $player->position }}</p>
            </div>
        @endforeach
    </div>
</section>

</div>
