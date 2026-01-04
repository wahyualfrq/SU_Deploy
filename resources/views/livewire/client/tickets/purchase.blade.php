<div>
    {{-- GLOBAL WRAPPER: LIGHT BACKGROUND --}}
    {{-- Background gray-50 agar mata tidak cepat lelah dan kontras dengan card putih --}}
    <div class="min-h-screen bg-gray-50 font-sans antialiased text-slate-800 selection:bg-rose-700 selection:text-white relative">

        {{-- HERO SECTION: RED GRADIENT BRANDING --}}
        {{-- Menggunakan gradasi merah gelap sesuai referensi visual sebelumnya --}}
        <div class="relative bg-gradient-to-br from-[#5B0F1B] via-[#881337] to-[#9F1239] pb-32 pt-20 md:pt-28 shadow-xl overflow-hidden z-10">
            
            {{-- Background Texture --}}
            <div class="absolute inset-0 opacity-10 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] mix-blend-overlay"></div>
            
            {{-- Decorative Abstract Element --}}
            <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-bl-[100px] pointer-events-none"></div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
                
                {{-- Small Tagline --}}
                <div class="inline-block px-4 py-1 mb-4 border border-white/20 rounded-full bg-white/10 backdrop-blur-sm">
                    <span class="text-white text-xs font-bold tracking-[0.2em] uppercase">TIKET RESMI</span>
                </div>

                <h1 class="text-4xl md:text-6xl font-black tracking-tight mb-4 leading-tight text-white uppercase italic">
                    JADWAL <span class="text-rose-200">PERTANDINGAN</span>
                </h1>
                
                <p class="text-rose-100 max-w-2xl mx-auto text-lg font-medium opacity-90">
                    Dukung tim kebanggaan langsung dari tribun. Rasakan atmosfer sesungguhnya.
                </p>
            </div>
        </div>

        {{-- CONTENT CONTAINER --}}
        {{-- Margin negatif (-mt-20) membuat konten naik menumpuk hero section --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 pb-24 relative z-20">
            
            {{-- SEARCH BAR: MANUAL TRIGGER (Tombol Cari & Enter) --}}
            <div class="bg-white rounded-xl shadow-lg shadow-slate-200/50 p-2 mb-12 flex flex-col md:flex-row items-center gap-4 border border-gray-100">
                
                {{-- Label Visual --}}
                <div class="hidden md:flex items-center gap-3 px-4 border-r border-gray-100 py-2">
                    <div class="p-2 bg-rose-50 rounded-lg text-rose-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <span class="font-bold text-slate-700 whitespace-nowrap text-sm uppercase tracking-wide">CARI LAGA</span>
                </div>

                {{-- Input Area --}}
                <div class="relative w-full flex items-center">
                    <input type="text" 
                        wire:model.defer="search" 
                        wire:keydown.enter="$refresh"
                        placeholder="Ketik nama lawan atau stadion..." 
                        class="w-full pl-4 pr-24 py-3 rounded-lg border-none bg-transparent text-slate-800 placeholder-slate-400 focus:ring-0 text-base font-medium">
                    
                    {{-- Tombol Cari --}}
                    <button wire:click="$refresh" 
                            class="absolute right-2 top-1/2 -translate-y-1/2 bg-slate-900 hover:bg-rose-700 text-white px-6 py-2 rounded-lg text-sm font-bold uppercase tracking-wider shadow-md transition-all duration-300 flex items-center gap-2">
                        
                        <span wire:loading.remove wire:target="search, $refresh">CARI</span>

                        {{-- Spinner Loading --}}
                        <span wire:loading wire:target="search, $refresh">
                            <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>

            {{-- SECTION HEADER --}}
            <div class="flex items-center gap-4 mb-8">
                <div class="h-1 w-8 bg-rose-600 rounded-full"></div>
                <h2 class="text-2xl font-black text-slate-800 uppercase italic tracking-wide">
                    LAGA <span class="text-rose-600">MENDATANG</span>
                </h2>
            </div>

            @if($tickets->isEmpty())
                {{-- EMPTY STATE --}}
                <div class="bg-white rounded-2xl p-12 text-center border border-gray-200 shadow-sm">
                    <div class="mx-auto h-16 w-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Jadwal Kosong</h3>
                    <p class="text-slate-500 text-sm">Tidak ada pertandingan yang cocok dengan pencarianmu.</p>
                </div>
            @else
                {{-- GRID LIST TIKET --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    @foreach($tickets as $ticket)
                       @php
                            $isAvailable = $ticket->sales_status === 'available';
                            $isSoldOut  = $ticket->sales_status === 'sold_out';
                            $isUpcoming = $ticket->sales_status === 'upcoming';
                            $isLowStock = $isAvailable && $ticket->stock > 0 && $ticket->stock <= 20;
                        @endphp


                        {{-- TICKET CARD COMPONENT --}}
                        <div wire:key="ticket-{{ $ticket->id }}"
                             class="group relative flex flex-col md:flex-row bg-white rounded-2xl border border-gray-200 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                            
                            {{-- LEFT SIDE: INFO LAGA --}}
                            <div class="p-6 md:w-[65%] flex flex-col justify-between relative z-10">
                                
                                {{-- Meta Header --}}
                                <div class="flex justify-between items-start mb-4">
                                    <div class="flex flex-col">
                                        <div class="text-rose-600 font-bold text-[10px] tracking-widest uppercase mb-1">WAKTU TANDING</div>
                                        <div class="text-slate-900 font-black text-lg flex items-center gap-2">
                                            {{ \Carbon\Carbon::parse($ticket->match_date)->translatedFormat('d M Y') }}
                                        </div>
                                        <div class="text-slate-500 text-xs font-bold">{{ \Carbon\Carbon::parse($ticket->match_date)->format('H:i') }} WIB</div>
                                    </div>
                                    
                                   {{-- Status Badge --}}
                                        @if($ticket->stock < 1)
                                            <div class="px-2 py-1 bg-slate-100 border border-slate-200 rounded
                                                        text-[10px] font-bold text-slate-500 uppercase tracking-wide">
                                                Tiket Habis
                                            </div>

                                        @elseif($isUpcoming)
                                            <div class="px-2 py-1 bg-amber-50 border border-amber-100 rounded
                                                        text-[10px] font-bold text-amber-600 uppercase tracking-wide">
                                                Segera Tersedia
                                            </div>

                                        @elseif($isLowStock)
                                            <div class="px-2 py-1 bg-red-50 border border-red-100 rounded
                                                        text-[10px] font-bold text-red-600 uppercase tracking-wide animate-pulse">
                                                Hampir Habis
                                            </div>

                                        @else
                                            <div class="px-2 py-1 bg-emerald-50 border border-emerald-100 rounded
                                                        text-[10px] font-bold text-emerald-600 uppercase tracking-wide">
                                                Tersedia
                                            </div>
                                        @endif


                                </div>

                                {{-- Match Title --}}
                                <h3 class="text-xl font-black text-slate-800 uppercase leading-tight mb-4 group-hover:text-rose-700 transition-colors">
                                    {{ $ticket->match_name }}
                                </h3>

                                {{-- Stadium Info --}}
                                <div class="flex items-center gap-2 text-slate-500 text-xs font-semibold uppercase tracking-wide">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    {{ $ticket->stadium }}
                                </div>
                            </div>

                            {{-- CUTOUT SEPARATOR (Garis Putus-putus) --}}
                            <div class="relative md:w-[1px] h-auto md:h-full flex md:flex-col items-center justify-center bg-white z-10">
                                {{-- Dashed Line --}}
                                <div class="w-full h-[1px] md:w-[1px] md:h-[80%] border-t md:border-t-0 md:border-l-2 border-dashed border-gray-200"></div>
                                
                                {{-- Lubang Atas (Circle) --}}
                                <div class="absolute -left-3 md:left-auto md:-top-3 md:-translate-x-[50%] w-6 h-6 bg-gray-50 rounded-full border border-gray-200 z-20 box-border" style="border-width: 0 0 1px 1px; transform: rotate(-45deg) translate(-50%, -50%);"></div>
                                
                                {{-- Lubang Bawah (Circle) --}}
                                <div class="absolute -right-3 md:right-auto md:-bottom-3 md:-translate-x-[50%] w-6 h-6 bg-gray-50 rounded-full border border-gray-200 z-20 box-border" style="border-width: 1px 1px 0 0; transform: rotate(-45deg) translate(-50%, -50%);"></div>
                            </div>

                            {{-- RIGHT SIDE: PRICE & BUTTON --}}
                            <div class="p-6 md:w-[35%] bg-white relative flex flex-col justify-center items-center text-center">
                                <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">HARGA TIKET</div>
                                <div class="text-2xl font-black text-slate-900 mb-5">
                                    <span class="text-sm font-bold text-slate-500 mr-1">Rp</span>{{ number_format($ticket->price, 0, ',', '.') }}
                                </div>

                                <a href="{{ route('tickets.detail', $ticket->id) }}" 
                                   class="w-full py-3 rounded-xl font-bold text-xs uppercase tracking-wider transition-all duration-300
                                   {{ $isSoldOut 
                                        ? 'bg-gray-100 text-gray-400 cursor-not-allowed' 
                                        : 'bg-slate-900 text-white hover:bg-rose-700 shadow-lg hover:shadow-rose-600/20' 
                                   }}">
                                    {{ $isSoldOut ? 'HABIS' : 'BELI TIKET' }}
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>