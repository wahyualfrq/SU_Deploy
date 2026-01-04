<div class="min-h-screen bg-slate-50 font-sans text-slate-900">

    {{-- ========================================================================
         SECTION 1: HEADER & CONTEXT (Gradasi Merah Gelap)
         Tujuannya: Memberikan identitas brand & konteks halaman sebelum melihat tiket.
    ======================================================================== --}}
    <div class="relative w-full bg-slate-900 overflow-hidden pb-32 pt-12 lg:pt-16">
        
        {{-- Background Effects --}}
        <div class="absolute inset-0 bg-gradient-to-br from-rose-900 via-slate-900 to-slate-950 opacity-90"></div>
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10 mix-blend-overlay"></div>
        
        {{-- Header Content --}}
        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center lg:text-left">
            <div class="flex flex-col lg:flex-row justify-between items-end gap-6">
                
                {{-- Title & Subtitle --}}
                <div>
                    <div class="inline-flex items-center gap-2 mb-3">
                        <span class="px-2 py-1 rounded bg-rose-500/20 text-rose-300 text-[10px] font-bold tracking-widest uppercase border border-rose-500/30">
                            Langkah 1 dari 2
                        </span>
                        <span class="h-px w-8 bg-rose-500/30"></span>
                        <span class="text-slate-400 text-xs font-medium uppercase tracking-wider">Tiket Resmi</span>
                    </div>
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-black text-white tracking-tight mb-2">
                        Detail Pembelian
                    </h1>
                    <p class="text-slate-400 text-sm md:text-base max-w-xl">
                        Anda akan melakukan pemesanan tiket untuk pertandingan <span class="text-rose-400 font-bold">{{ $ticket->match->home_team }} vs {{ $ticket->match->away_team }}</span>.
                    </p>
                </div>

                {{-- Visual Step Indicator (Non-functional, Visual Context Only) --}}
                <div class="hidden lg:flex items-center gap-3 opacity-60">
                    <div class="flex items-center gap-2 text-white font-bold">
                        <div class="w-8 h-8 rounded-full bg-rose-600 flex items-center justify-center text-sm">1</div>
                        <span>Tinjau</span>
                    </div>
                    <div class="w-12 h-px bg-slate-700"></div>
                    <div class="flex items-center gap-2 text-slate-500 font-medium">
                        <div class="w-8 h-8 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-sm">2</div>
                        <span>Pembayaran</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ========================================================================
         SECTION 2: MAIN CONTENT (The Ticket)
         Tujuannya: Menampilkan tiket dengan efek "Floating" di atas header.
    ======================================================================== --}}
    <div class="relative -mt-24 px-4 sm:px-6 lg:px-8 pb-24">
        
        {{-- Container agar tidak terlalu lebar --}}
        <div class="max-w-5xl mx-auto">
            
            {{-- TICKET COMPONENT (Kode asli Anda, dipertahankan strukturnya) --}}
            <div class="relative w-full group drop-shadow-2xl">
                
                {{-- Glow Effect di belakang tiket --}}
                <div class="absolute -inset-2 bg-gradient-to-b from-rose-500/20 to-transparent rounded-[3rem] blur-xl opacity-0 group-hover:opacity-100 transition duration-700"></div>

                <div class="relative flex flex-col lg:flex-row bg-white rounded-[2rem] shadow-sm overflow-hidden ring-1 ring-slate-900/5">

                    {{-- BAGIAN KIRI: INFO MATCH (70%) --}}
                    <div class="relative flex-1 p-8 sm:p-10 lg:p-12 flex flex-col justify-between bg-white bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:20px_20px]">
                        
                        {{-- Header Tiket --}}
                        <div class="flex justify-between items-start mb-8">
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 border border-slate-200 text-xs font-bold uppercase tracking-widest text-slate-500">
                                <span>Tiket Resmi</span>
                            </div>
                            
                          @if($ticket->stock < 1)
                            {{-- SOLD OUT --}}
                            <div class="inline-flex items-center gap-1.5 text-slate-500 font-bold text-sm
                                        bg-slate-100 px-3 py-1 rounded-full border border-slate-200">
                                <span class="h-2 w-2 rounded-full bg-slate-400"></span>
                                Tiket Habis
                            </div>

                        @elseif($ticket->sales_status === 'upcoming')
                            {{-- UPCOMING --}}
                            <div class="inline-flex items-center gap-1.5 text-amber-600 font-bold text-sm
                                        bg-amber-50 px-3 py-1 rounded-full border border-amber-100">
                                <span class="h-2 w-2 rounded-full bg-amber-500"></span>
                                Segera Tersedia
                            </div>

                        @else
                            {{-- AVAILABLE --}}
                            <div class="inline-flex items-center gap-1.5 text-emerald-600 font-bold text-sm
                                        bg-emerald-50 px-3 py-1 rounded-full border border-emerald-100">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                                </span>
                                Tersedia
                            </div>
                        @endif

                        </div>

                        {{-- Judul Pertandingan --}}
                        <div class="mb-10 relative z-10">
                           <div class="flex items-center justify-between gap-6 mb-10">

                            {{-- HOME CLUB --}}
                            <div class="flex flex-col items-center text-center w-1/3">
                                <div wire:ignore>
                                    <img
                                        src="{{ $ticket->home_club_logo
                                            ? (str_starts_with($ticket->home_club_logo, 'http')
                                                ? $ticket->home_club_logo
                                                : asset('storage/' . $ticket->home_club_logo))
                                            : asset('images/default-club.png') }}"
                                        alt="{{ $ticket->match->homeClub->name }}"
                                        class="w-20 h-20 object-contain mb-3">
                                </div>


                                <span class="text-xl sm:text-2xl font-black uppercase text-rose-600">
                                    {{ $ticket->match->homeClub->name }}
                                </span>
                            </div>

                            {{-- VS --}}
                            <div class="flex flex-col items-center">
                                <span class="text-2xl sm:text-3xl font-black italic text-slate-300">
                                    VS
                                </span>
                            </div>

                            {{-- AWAY CLUB --}}
                            <div class="flex flex-col items-center text-center w-1/3">
                                <div wire:ignore>
                                    <img
                                        src="{{ $ticket->away_club_logo
                                            ? (str_starts_with($ticket->away_club_logo, 'http')
                                                ? $ticket->away_club_logo
                                                : asset('storage/' . $ticket->away_club_logo))
                                            : asset('images/default-club.png') }}"
                                        alt="{{ $ticket->match->awayClub->name }}"
                                        class="w-20 h-20 object-contain mb-3">
                                </div>
                                                            <span class="text-xl sm:text-2xl font-black uppercase text-slate-900">
                                    {{ $ticket->match->awayClub->name }}
                                </span>

                            </div>

                        </div>


                        </div>

                        {{-- Info Meta (Venue & Date) --}}
                        <div class="flex flex-col sm:flex-row gap-6 sm:gap-12 mt-auto pt-8 border-t-2 border-dashed border-slate-100">
                            <div class="flex items-start gap-4">
                                <div class="p-2.5 bg-rose-50 rounded-xl text-rose-600 ring-1 ring-rose-100">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Lokasi Stadion</p>
                                    <p class="text-lg font-bold text-slate-800 leading-tight">{{ $ticket->stadium }}</p>
                                    <p class="text-sm text-slate-500 font-medium">{{ $ticket->match->stadium }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="p-2.5 bg-rose-50 rounded-xl text-rose-600 ring-1 ring-rose-100">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Waktu Kick-off</p>
                                    <p class="text-lg font-bold text-slate-800 leading-tight">
                                        {{ optional($ticket->match?->match_date)->format('d M Y') ?? '-' }}
                                    </p>
                                    <p class="text-sm text-slate-500 font-medium">
                                        {{ optional($ticket->match?->match_date)->format('H:i') ?? '-' }} WIB
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PEMBATAS TIKET (Perforation Visual) --}}
                    <div class="relative hidden lg:flex flex-col items-center justify-center w-6 bg-slate-50 overflow-hidden">
                         {{-- Top Notch --}}
                        <div class="absolute -top-3 w-6 h-6 rounded-full bg-slate-900 z-20"></div>
                        {{-- Dotted Line --}}
                        <div class="h-full w-0 border-l-2 border-dashed border-slate-300"></div>
                        {{-- Bottom Notch --}}
                        <div class="absolute -bottom-3 w-6 h-6 rounded-full bg-slate-50 z-20"></div> {{-- Blend to page bg --}}
                    </div>

                    {{-- Mobile Divider --}}
                    <div class="relative flex lg:hidden items-center justify-between px-4 overflow-hidden h-6 bg-white">
                        <div class="w-4 h-8 bg-slate-50 rounded-full -ml-6 shadow-inner"></div>
                        <div class="flex-1 border-t-2 border-dashed border-slate-200"></div>
                        <div class="w-4 h-8 bg-slate-50 rounded-full -mr-6 shadow-inner"></div>
                    </div>

                    {{-- BAGIAN KANAN: ACTION / STUB (30%) --}}
                    <div class="relative lg:w-[22rem] bg-slate-50 p-8 flex flex-col justify-between border-l border-slate-100">
                        
                        <div>
                             {{-- Barcode Visual (Fixed CSS Gradient to avoid flicker) --}}
                            <div class="mb-8 opacity-40 mix-blend-multiply w-full h-12" 
                                 style="background-image: repeating-linear-gradient(90deg, #334155, #334155 2px, transparent 2px, transparent 4px, #334155 4px, #334155 6px, transparent 6px, transparent 9px);">
                            </div>

                            <div class="text-center mb-6">
                                <p class="text-[10px] font-bold uppercase text-slate-400 mb-2 tracking-widest">Total Harga</p>
                                <div class="flex items-start justify-center text-rose-600 font-black tracking-tight">
                                    <span class="text-lg mt-1 mr-1">Rp</span>
                                    <span class="text-5xl">{{ number_format($ticket->price, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            {{-- Stock Indicator --}}
                            <div class="bg-white rounded-xl p-4 border border-slate-200 mb-6 flex justify-between items-center shadow-sm">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full {{ $ticket->stock > 5 ? 'bg-emerald-500' : 'bg-red-500' }}"></span>
                                    <span class="text-xs font-bold text-slate-400 uppercase">Stok</span>
                                </div>
                                <span class="text-sm font-bold text-slate-800">{{ $ticket->stock }} <span class="font-normal text-slate-400">kursi</span></span>
                            </div>
                        </div>

                        {{-- CTA Buttons --}}
                        <div class="space-y-3">
                            @if($ticket->status === 'available')
                                <button wire:click="$set('confirmingTicketId', {{ $ticket->id }})"
                                    class="w-full bg-rose-600 hover:bg-rose-700 active:bg-rose-800 text-white py-4 rounded-xl font-bold text-sm uppercase tracking-wide shadow-lg shadow-rose-600/30 hover:shadow-rose-600/50 transition-all duration-200 transform hover:-translate-y-0.5">
                                    Beli Tiket Sekarang
                                </button>
                            @else
                                <button disabled class="w-full bg-slate-200 text-slate-400 py-4 rounded-xl font-bold uppercase tracking-wide cursor-not-allowed">
                                    Tidak Tersedia
                                </button>
                            @endif

                            <a href="{{ route('tickets.purchase') }}"
                                class="block w-full text-center py-3 rounded-xl font-bold text-sm text-slate-500 hover:text-slate-800 hover:bg-white hover:shadow-md transition-all duration-200">
                                Batalkan
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECTION 3: TRUST INDICATORS (Untuk mengisi kekosongan di bawah card) --}}
                        <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-4">

                    <!-- OFFICIAL PARTNER -->
                    <div class="flex items-center justify-center gap-3 p-4 rounded-2xl 
                                bg-rose-50 border border-rose-100">
                        <svg class="w-5 h-5 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-xs font-bold text-rose-700 uppercase tracking-wide">
                            Mitra Resmi
                        </span>
                    </div>

                    <!-- SECURE PAYMENT -->
                    <div class="flex items-center justify-center gap-3 p-4 rounded-2xl 
                                bg-emerald-50 border border-emerald-100">
                        <svg class="w-5 h-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                        <span class="text-xs font-bold text-emerald-700 uppercase tracking-wide">
                            Pembayaran Aman
                        </span>
                    </div>

                    <!-- INSTANT PROCESS -->
                    <div class="flex items-center justify-center gap-3 p-4 rounded-2xl 
                                bg-indigo-50 border border-indigo-100">
                        <svg class="w-5 h-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        <span class="text-xs font-bold text-indigo-700 uppercase tracking-wide">
                            Proses Instan
                        </span>
                    </div>

                </div>


                        </div>
                    </div>


                    {{-- MODAL KONFIRMASI (Kode asli, hanya sedikit polish di backdrop) --}}
                    @if($confirmingTicketId)
                        <div class="fixed inset-0 z-[100] flex items-center justify-center p-4">
                            
                            {{-- Backdrop dengan blur lebih kuat --}}
                            <div class="absolute inset-0 bg-slate-900/90 backdrop-blur-md transition-opacity" wire:click="$set('confirmingTicketId', null)"></div>

                            {{-- Modal Content --}}
                            <div
                    wire:key="checkout-modal-{{ $ticket->id }}-{{ $confirmingTicketId }}"
                    class="relative bg-white rounded-3xl shadow-2xl w-full max-w-md p-8 animate-slideDown ring-1 ring-white/20">


                                <div class="text-center mb-8">
                                    <div class="mx-auto w-16 h-16 bg-rose-50 rounded-full flex items-center justify-center mb-6 ring-4 ring-rose-50">
                                        <svg class="w-8 h-8 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                    </div>
                                    
                                                    <h3 class="text-2xl font-black text-slate-900 mb-2">Checkout</h3>
                                                    {{-- CLUB PREVIEW --}}
                                <div class="flex items-center justify-center gap-6 my-6">

                                    {{-- HOME CLUB --}}
                                    <div class="flex flex-col items-center text-center w-1/3">
                                        <img
                    src="{{ $ticket->match->homeClub->logo
                        ? (str_starts_with($ticket->match->homeClub->logo, 'http')
                            ? $ticket->match->homeClub->logo
                            : asset('storage/' . $ticket->match->homeClub->logo))
                        : asset('images/default-club.png') }}"
                    alt="{{ $ticket->match->homeClub->name }}"
                    class="w-14 h-14 object-contain mb-2">

                <span class="text-xs font-bold uppercase text-slate-700 leading-tight">
                    {{ $ticket->match->homeClub->name }}
                </span>

                                    </div>

                                    {{-- VS --}}
                                    <div class="text-sm font-black italic text-slate-400">
                                        VS
                                    </div>

                                    {{-- AWAY CLUB --}}
                                    <div class="flex flex-col items-center text-center w-1/3">
                                    <img
                    src="{{ $ticket->match->awayClub->logo
                        ? (str_starts_with($ticket->match->awayClub->logo, 'http')
                            ? $ticket->match->awayClub->logo
                            : asset('storage/' . $ticket->match->awayClub->logo))
                        : asset('images/default-club.png') }}"
                    alt="{{ $ticket->match->awayClub->name }}"
                    class="w-14 h-14 object-contain mb-2">

                <span class="text-xs font-bold uppercase text-slate-700 leading-tight">
                    {{ $ticket->match->awayClub->name }}
                </span>

                    </div>

                </div>

                    <p class="text-slate-900 font-bold">
                        Konfirmasi pembelian tiket
                    </p>
                </div>

                <div class="bg-slate-50 rounded-2xl p-5 mb-8 border border-slate-100 flex justify-between items-center">
                    <span class="text-slate-500 font-bold text-xs uppercase tracking-wider">Total Tagihan</span>
                    <span class="text-xl font-black text-slate-900">Rp {{ number_format($ticket->price, 0, ',', '.') }}</span>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <button type="button" wire:click="$set('confirmingTicketId', null)" 
                        class="px-5 py-3.5 rounded-xl text-sm font-bold text-slate-600 bg-white border border-slate-200 hover:bg-slate-50 hover:text-slate-900 transition-colors">
                        Batal
                    </button>

                    <button type="button" wire:click="buyConfirmed" wire:loading.attr="disabled" wire:target="buyConfirmed"
                        class="px-5 py-3.5 rounded-xl text-sm font-bold text-white bg-rose-600 hover:bg-rose-700 shadow-lg shadow-rose-600/20 transition-all disabled:opacity-70 disabled:cursor-not-allowed flex justify-center items-center">
                        <span wire:loading.remove wire:target="buyConfirmed">Bayar Sekarang</span>
                        <span wire:loading wire:target="buyConfirmed" class="flex items-center gap-2">
                            <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    @endif

</div>