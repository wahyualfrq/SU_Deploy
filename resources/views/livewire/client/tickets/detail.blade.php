<div class="max-w-2xl mx-auto px-4 py-12 sm:px-6 lg:px-8 font-sans">
    <div
        class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] ring-1 ring-gray-900/5 p-8 sm:p-12 transition-all duration-300">
        {{-- HEADER --}}
        <div class="mb-10 text-center sm:text-left">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">
                {{ $ticket->match_name }}
            </h1>

            <div
                class="mt-4 flex flex-col sm:flex-row items-center sm:items-start gap-2 text-sm font-medium text-slate-500">
                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ $ticket->stadium }}
                </span>
                <span class="hidden sm:inline text-slate-300">•</span>
                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ $ticket->match_date->format('d F Y • H:i') }} WIB
                </span>
            </div>
        </div>

        {{-- INFO GRID --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 mb-8">
            <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 flex flex-col justify-center">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">
                    Harga Tiket
                </p>
                <p class="text-3xl font-black text-indigo-600 tracking-tight">
                    <span
                        class="text-lg font-bold text-indigo-400 align-top mr-0.5">Rp</span>{{ number_format($ticket->price, 0, ',', '.') }}
                </p>
            </div>

            <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100 flex flex-col justify-center">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">
                    Ketersediaan
                </p>
                <div class="flex items-baseline gap-2">
                    <p class="text-2xl font-bold text-slate-800">
                        {{ $ticket->stock }}
                    </p>
                    <span class="text-sm font-medium text-slate-400">tiket tersisa</span>
                </div>
            </div>
        </div>

        {{-- STATUS --}}
        <div class="mb-10">
            @if($ticket->status === 'available')
                <div
                    class="inline-flex items-center gap-2.5 bg-emerald-50 border border-emerald-100 text-emerald-700 px-5 py-2.5 rounded-full text-sm font-semibold shadow-sm">
                    <span class="relative flex h-2.5 w-2.5">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                    </span>
                    Tiket Tersedia
                </div>
            @elseif($ticket->status === 'upcoming')
                <div
                    class="inline-flex items-center gap-2.5 bg-amber-50 border border-amber-100 text-amber-700 px-5 py-2.5 rounded-full text-sm font-semibold shadow-sm">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-amber-500"></span>
                    </span>
                    Segera Tersedia
                </div>
            @else
                <div
                    class="inline-flex items-center gap-2.5 bg-slate-100 border border-slate-200 text-slate-500 px-5 py-2.5 rounded-full text-sm font-semibold shadow-sm">
                    <span class="h-2.5 w-2.5 rounded-full bg-slate-400"></span>
                    Tiket Habis
                </div>
            @endif
        </div>

        {{-- CTA --}}
        <div class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-slate-100">
            @if($ticket->status === 'available')
                    <button wire:click="$set('confirmingTicketId', {{ $ticket->id }})" class="flex-1 group bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 transition-all duration-200
                   text-white py-4 rounded-xl font-bold text-base shadow-lg shadow-indigo-600/20
                   transform hover:-translate-y-0.5 active:translate-y-0 focus:ring-4 focus:ring-indigo-100">
                        Beli Tiket Sekarang
                    </button>

            @endif

            <a href="{{ route('tickets.purchase') }}"
                class="flex-1 flex items-center justify-center border-2 border-slate-100 hover:border-slate-300 hover:bg-white
                  transition-colors duration-200 text-center py-3.5 rounded-xl font-bold text-slate-600 hover:text-slate-900">
                Lihat Tiket Lainnya
            </a>
        </div>

    </div>

    {{-- MODAL KONFIRMASI --}}
    @if($confirmingTicketId)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4">
            {{-- Backdrop --}}
            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-md transition-opacity"></div>

            {{-- Modal Content --}}
            <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md p-8 animate-slideDown ring-1 ring-black/5">

                <div class="mb-6">
                    <div class="w-12 h-12 bg-indigo-50 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">
                        Konfirmasi Pembelian
                    </h3>
                    <p class="text-slate-500 leading-relaxed">
                        Apakah kamu yakin ingin melanjutkan pembelian tiket untuk pertandingan ini?
                    </p>
                </div>

                <div class="flex flex-col-reverse sm:flex-row justify-end gap-3">
                    {{-- BATAL --}}
                    <button type="button" wire:click="$set('confirmingTicketId', null)" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600
                               hover:bg-slate-50 hover:text-slate-900 transition-colors duration-200">
                        Batal
                    </button>

                    {{-- KONFIRMASI --}}
                    <button type="button" wire:click="buyConfirmed" wire:loading.attr="disabled" wire:target="buyConfirmed"
                        class="px-6 py-2.5 rounded-xl text-sm font-bold shadow-lg shadow-indigo-600/20
                               bg-indigo-600 hover:bg-indigo-700 transition-all duration-200
                               text-white disabled:opacity-70 disabled:cursor-not-allowed">

                        <span wire:loading.remove wire:target="buyConfirmed">
                            Ya, Beli Tiket
                        </span>

                        <span wire:loading wire:target="buyConfirmed" class="flex items-center gap-2">
                            <svg class="animate-spin h-4 w-4 text-white"
                                xmlns="[http://www.w3.org/2000/svg](http://www.w3.org/2000/svg)" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                                </circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            Memproses...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    @endif

</div>