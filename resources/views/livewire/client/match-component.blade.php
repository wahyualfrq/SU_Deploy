{{-- SATU-SATUNYA ROOT ELEMENT --}}
<div class="bg-[#f8f9fa] font-sans antialiased text-slate-900 overflow-x-hidden no-scrollbar scroll-smooth">

    <section class="relative h-[55vh] min-h-[400px] flex items-center overflow-hidden bg-rose-950 pt-24">
        <div class="absolute inset-0">
            <img src="{{ asset('images/hero-national-team.jpg') }}"
                class="w-full h-full object-cover object-top opacity-50" alt="Gambar Hero">
            <div class="absolute inset-0 bg-gradient-to-t from-rose-950 via-rose-950/60 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-rose-950/90 via-transparent to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="max-w-3xl">
                <div data-aos="fade-right" data-aos-duration="1000"
                    class="inline-block px-3 py-1 mb-3 text-[10px] font-bold tracking-[0.3em] text-rose-400 uppercase bg-rose-400/10 border border-rose-400/20 rounded">
                    Jadwal Resmi
                </div>
                <h1 data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200"
                    class="text-5xl md:text-7xl font-black uppercase tracking-tighter leading-[0.85] text-white mb-4">
                    Jadwal <br> <span class="text-rose-500">Pertandingan</span>
                </h1>
                <p data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400"
                    class="text-base md:text-lg text-slate-300 max-w-xl leading-relaxed mb-8 border-l-2 border-rose-600 pl-5">
                    Ikuti perjalanan <span class="font-bold text-white">Sumsel United</span> musim ini.
                </p>

                <div data-aos="zoom-in-up" data-aos-duration="1000" data-aos-delay="600"
                    class="inline-flex flex-wrap gap-8 p-6 backdrop-blur-md bg-white/5 border border-white/10 rounded-xl shadow-2xl">
                    <div class="text-center md:text-left">
                        <div class="text-3xl font-black text-white font-oswald leading-none">{{ $remainingMatches }}
                        </div>
                        <div class="text-[9px] uppercase tracking-[0.2em] text-rose-400 font-bold mt-1">Sisa Laga</div>
                    </div>
                    <div class="hidden md:block w-px h-10 bg-white/10"></div>
                    <div class="text-center md:text-left">
                        <div class="text-3xl font-black text-white font-oswald leading-none">{{ $homeMatches }}</div>
                        <div class="text-[9px] uppercase tracking-[0.2em] text-rose-400 font-bold mt-1">Kandang</div>
                    </div>
                    <div class="hidden md:block w-px h-10 bg-white/10"></div>
                    <div class="text-center md:text-left">
                        <div class="text-3xl font-black text-white font-oswald leading-none">{{ $awayMatches }}</div>
                        <div class="text-[9px] uppercase tracking-[0.2em] text-rose-400 font-bold mt-1">Tandang</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sticky top-0 z-40 bg-white/90 backdrop-blur-xl border-b border-slate-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
            <div class="flex items-center justify-between" data-aos="fade-down" data-aos-duration="800">
                <div class="flex items-center space-x-2">
                    <div class="w-2 h-2 rounded-full bg-rose-600 animate-pulse"></div>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-slate-500">Filter
                        Pertandingan</span>
                </div>
            </div>
        </div>
    </section>

    @if($liveMatch)
        <section id="live-matches" class="py-10 bg-white" wire:key="live-match-container">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div data-aos="fade-up" data-aos-duration="1000"
                    class="relative bg-slate-900 rounded-[2rem] overflow-hidden shadow-xl border-b-[8px] border-rose-600">

                    <div class="relative z-10 p-6 md:p-10 pb-4">
                        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                            <div
                                class="flex items-center space-x-3 bg-rose-600/10 border border-rose-600/20 px-4 py-1.5 rounded-full shadow-lg shadow-rose-600/20">
                                <span class="relative flex h-2.5 w-2.5">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-500 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-rose-600"></span>
                                </span>
                                <span
                                    class="text-[10px] font-black tracking-[0.2em] text-rose-500 uppercase">Langsung</span>
                            </div>
                            <div
                                class="text-center md:text-right text-white font-black uppercase text-xs italic tracking-tight opacity-70">
                                {{ $liveMatch->stadium }}
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-6 mb-10">
                            <div class="flex flex-col items-center" data-aos="fade-right" data-aos-delay="400">
                                <img src="{{ $liveMatch->homeClub->logo ? asset('storage/' . $liveMatch->homeClub->logo) : asset('images/default-club.png') }}"
                                    class="w-20 h-20 md:w-28 md:h-28 rounded-full mb-4 object-cover border-2 border-slate-800 shadow-2xl transition-transform hover:scale-110 duration-500">
                                <h3 class="text-lg font-black text-white uppercase italic tracking-tighter">
                                    {{ $liveMatch->homeClub->name }}</h3>
                            </div>

                            <div class="text-center flex flex-col items-center" data-aos="zoom-in" data-aos-delay="600">
                                <div
                                    class="text-7xl md:text-8xl font-black text-white font-oswald leading-none tracking-tighter tabular-nums drop-shadow-2xl">
                                    {{ $liveMatch->home_score }}<span
                                        class="text-rose-600 mx-2">:</span>{{ $liveMatch->away_score }}
                                </div>
                                <div
                                    class="mt-4 bg-rose-600 text-white font-black px-6 py-2 rounded-lg text-sm uppercase tracking-widest italic shadow-lg shadow-rose-600/40 transform -skew-x-12">
                                    Menit {{ $liveMatch->current_minute }}'
                                </div>
                            </div>

                            <div class="flex flex-col items-center" data-aos="fade-left" data-aos-delay="400">
                                <img src="{{ $liveMatch->awayClub->logo ? asset('storage/' . $liveMatch->awayClub->logo) : asset('images/default-club.png') }}"
                                    class="w-20 h-20 md:w-28 md:h-28 rounded-full mb-4 object-cover border-2 border-slate-800 shadow-2xl transition-transform hover:scale-110 duration-500">
                                <h3 class="text-lg font-black text-white uppercase italic tracking-tighter">
                                    {{ $liveMatch->awayClub->name }}</h3>
                            </div>
                        </div>
                    </div>

                    {{-- LIVE COMMENTARY --}}
                    <div class="bg-black/30 backdrop-blur-md p-6 border-t border-white/5" data-aos="fade-up"
                        data-aos-offset="0">
                        <div class="max-w-4xl mx-auto">
                            <h4
                                class="text-[9px] font-black text-rose-500 uppercase tracking-[0.3em] mb-4 text-center italic opacity-80">
                                Lini Masa Pertandingan</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 max-h-40 overflow-y-auto pr-2 scrollbar-thin">
                                @foreach($liveMatch->events->sortByDesc('minute') as $event)
                                    <div class="flex items-start space-x-4 bg-white/5 p-3 rounded-xl border border-white/5 hover:bg-white/10 transition-colors"
                                        wire:key="event-{{ $event->id }}">
                                        <span
                                            class="bg-rose-600 text-white text-[9px] font-black px-2 py-1 rounded italic shadow-md">{{ $event->minute }}'</span>
                                        <div class="text-[11px] text-gray-300 leading-tight">
                                            <span class="text-white font-bold uppercase tracking-tighter block mb-0.5 italic">
                                                @if($event->type === 'goal') ⚽ @elseif($event->type === 'yellow') 🟨
                                                @elseif($event->type === 'red') 🟥 @endif
                                                {{ $event->player_name }}
                                            </span>
                                            {{ $event->description }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center space-x-3 mb-8" data-aos="fade-right">
                <div class="w-10 h-1 bg-rose-600 rounded-full"></div>
                <h2 class="text-3xl font-black uppercase italic tracking-tighter text-slate-900 leading-none">
                    Laga <span class="text-rose-600">Mendatang</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($upcomingMatches as $index => $match)
                    <div wire:key="upcoming-{{ $match->id }}" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}"
                        class="group relative bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                        <div class="bg-slate-50 p-4 flex justify-between items-center border-b border-slate-100">
                            <span
                                class="text-[9px] font-black tracking-widest text-slate-400 uppercase leading-none">{{ $match->match_date->format('d M Y') }}</span>
                            <span
                                class="text-rose-700 text-[9px] font-black uppercase italic tracking-widest">{{ $match->match_date->format('H:i') }}
                                WIB</span>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-6 h-16">
                                <div class="text-center flex-1">
<<<<<<< HEAD
                                    <img
    src="{{ 
        $match->homeClub->logo
            ? (str_starts_with($match->homeClub->logo, 'http')
                ? $match->homeClub->logo
                : asset('storage/' . $match->homeClub->logo))
            : asset('images/default-club.png')
    }}"
=======
                                    <img src="{{ $match->homeClub->logo ? asset('storage/' . $match->homeClub->logo) : asset('images/default-club.png') }}"
>>>>>>> 5ccdc1136a48a9455443e147b6f7cf6521b63faf
                                        class="w-12 h-12 mx-auto object-contain mb-2 group-hover:scale-110 transition-transform duration-300">
                                    <div
                                        class="text-[9px] font-black uppercase text-slate-900 tracking-tighter leading-tight">
                                        {{ $match->homeClub->name }}</div>
                                </div>
<<<<<<< HEAD
                                <div class="text-[9px] font-black text-slate-900 italic uppercase">VS</div>
                                <div class="text-center flex-1">
                                    <img
    src="{{ 
        $match->awayClub->logo
            ? (str_starts_with($match->awayClub->logo, 'http')
                ? $match->awayClub->logo
                : asset('storage/' . $match->awayClub->logo))
            : asset('images/default-club.png')
    }}"
=======
                                <div class="text-[9px] font-black text-slate-200 italic uppercase">VS</div>
                                <div class="text-center flex-1">
                                    <img src="{{ $match->awayClub->logo ? asset('storage/' . $match->awayClub->logo) : asset('images/default-club.png') }}"
>>>>>>> 5ccdc1136a48a9455443e147b6f7cf6521b63faf
                                        class="w-12 h-12 mx-auto object-contain mb-2 group-hover:scale-110 transition-transform duration-300">
                                    <div
                                        class="text-[9px] font-black uppercase text-slate-900 tracking-tighter leading-tight">
                                        {{ $match->awayClub->name }}</div>
                                </div>
                            </div>
                            <a href="{{ route('tickets.detail', $match->id) }}"
                                class="flex items-center justify-center w-full bg-slate-900 hover:bg-rose-600 text-white py-3 rounded-xl font-black text-[10px] uppercase tracking-[0.2em] transition-all shadow-lg hover:shadow-rose-600/20">
                                Pesan Tiket
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="recent-results" class="py-12 bg-slate-50 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-end justify-between mb-8" data-aos="fade-right">
                <h2 class="text-3xl font-black uppercase italic tracking-tighter text-slate-900 leading-none">
                    Hasil <span class="text-rose-600">Terbaru</span>
                </h2>
                <button
                    class="text-slate-500 hover:text-rose-600 font-black text-[10px] uppercase tracking-widest border-b-2 border-slate-200 hover:border-rose-600 transition-all pb-1">Semua
                    Hasil</button>
            </div>

            <div class="space-y-4">
                @forelse($finishedMatches as $index => $match)
                    @php
                        if ($match->home_score > $match->away_score) {
                            $label = 'Menang';
                            $class = 'bg-emerald-100 text-emerald-700 border-emerald-200';
                        } elseif ($match->home_score < $match->away_score) {
                            $label = 'Kalah';
                            $class = 'bg-rose-100 text-rose-700 border-rose-200';
                        } else {
                            $label = 'Seri';
                            $class = 'bg-amber-100 text-amber-700 border-amber-200';
                        }
                    @endphp
                    <div wire:key="result-{{ $match->id }}" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}"
                        class="bg-white rounded-xl p-5 flex flex-col md:flex-row items-center gap-6 shadow-sm border border-slate-200 hover:border-rose-300 transition-all duration-300 group">

                        <div class="w-full md:w-32 flex-shrink-0 text-center md:text-left border-r border-slate-100 pr-4">
                            <span
                                class="{{ $class }} border text-[8px] font-black px-2 py-0.5 rounded uppercase tracking-widest italic mb-1 inline-block shadow-sm">{{ $label }}</span>
                            <div class="text-[9px] font-black text-slate-400 uppercase tracking-widest">
                                {{ $match->match_date->format('d M Y') }}</div>
                        </div>

                        <div class="flex-1 flex items-center justify-between w-full md:max-w-2xl">
                            <div class="flex items-center gap-3 flex-1 justify-end">
                                <span
                                    class="text-xs md:text-sm font-black uppercase text-slate-900 tracking-tighter italic">{{ $match->homeClub->name }}</span>
                                <img src="{{ $match->homeClub->logo ? asset('storage/' . $match->homeClub->logo) : asset('images/default-club.png') }}"
                                    class="w-10 h-10 rounded-full bg-slate-50 p-1.5 shadow-inner">
                            </div>

                            <div class="px-6 transform group-hover:scale-110 transition-transform duration-500">
                                <div
                                    class="text-3xl md:text-4xl font-black text-rose-700 font-oswald italic tabular-nums tracking-tighter">
                                    {{ $match->home_score }} - {{ $match->away_score }}
                                </div>
                            </div>

                            <div class="flex items-center gap-3 flex-1 justify-start">
                                <img src="{{ $match->awayClub->logo ? asset('storage/' . $match->awayClub->logo) : asset('images/default-club.png') }}"
                                    class="w-10 h-10 rounded-full bg-slate-50 p-1.5 shadow-inner">
                                <span
                                    class="text-xs md:text-sm font-black uppercase text-slate-900 tracking-tighter italic">{{ $match->awayClub->name }}</span>
                            </div>
                        </div>

                        <button
                            class="w-full md:w-auto bg-rose-700 hover:bg-rose-800 text-white px-6 py-2 rounded-lg font-black text-[9px] uppercase tracking-widest transition-all shadow-lg shadow-rose-700/20 active:scale-95">Ringkasan</button>
                    </div>
                @empty
                    <div
                        class="text-center py-12 bg-white rounded-2xl border border-slate-200 text-slate-400 font-black uppercase tracking-widest italic text-xs">
                        Data tidak ditemukan.</div>
                @endforelse
            </div>
        </div>
    </section>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap');

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        .font-oswald {
            font-family: 'Oswald', sans-serif;
        }

        /* Custom Scrollbar Thin */
        .scrollbar-thin::-webkit-scrollbar {
            width: 3px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background: #e11d48;
            border-radius: 10px;
        }

        /* Sembunyikan scrollbar browser utama */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* AOS Smoothing */
        [data-aos] {
            transition-timing-function: cubic-bezier(.4, 0, .2, 1) !important;
        }
    </style>
</div>