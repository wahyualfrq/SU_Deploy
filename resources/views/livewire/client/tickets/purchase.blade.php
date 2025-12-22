<div>
    <div class="min-h-screen bg-gray-50 font-sans">
        {{-- Hero Section: Context Setting --}}
        <div class="bg-indigo-600 pb-32 pt-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight mb-4">
                    Jangan Lewatkan Pertandingan Seru!
                </h1>
                <p class="text-indigo-100 max-w-2xl mx-auto text-lg">
                    Dapatkan tiket resmi tim favoritmu sekarang sebelum kehabisan. Dukung langsung dari tribun!
                </p>
            </div>
        </div>

        {{-- Content --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 pb-12">
            {{-- Filter/Search Bar (Optional Enhancement) --}}
            <div
                class="bg-white rounded-xl shadow-lg p-4 mb-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z">
                        </path>
                    </svg>
                    Jadwal Pertandingan
                </h2>
                {{-- Placeholder Search --}}
                <div class="relative w-full md:w-64">
                    <input type="text" wire:model.debounce.500ms="search" placeholder="Cari tim atau stadion..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-200
           focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200
           outline-none transition text-sm">
                    <div wire:loading.delay wire:target="search" class="text-xs text-gray-400 mt-1">
                        Mencari pertandingan...
                    </div>

                    <svg class="w-4 h-4 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            @if($tickets->isEmpty())
                {{-- Enhanced Empty State --}}
                <div class="bg-white rounded-2xl shadow-sm p-12 text-center border border-dashed border-gray-300">
                    <div class="mx-auto h-24 w-24 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">Belum ada pertandingan</h3>
                    <p class="text-gray-500 mt-1">Cek kembali nanti untuk jadwal terbaru.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($tickets as $ticket)
                                {{-- Logic Stock Warning --}}
                                @php
                                $isAvailable = $ticket->status === 'available';
                                $isUpcoming = $ticket->status === 'upcoming';
                                $isSoldOut  = $ticket->status === 'sold_out';

                                $isLowStock = $isAvailable && $ticket->stock > 0 && $ticket->stock <= 20;
                            @endphp


                                {{-- PENTING: Tambahkan wire:key agar Livewire bisa melacak elemen --}}
                                <div wire:key="ticket-{{ $ticket->id }}"
                                    class="group bg-white rounded-2xl shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 flex flex-col overflow-hidden relative">

                                    {{-- Badge Status --}}
                                  
                                    @if($isSoldOut || ($isAvailable && $ticket->stock == 0))
                                        <div class="absolute top-4 right-4 bg-gray-800 text-white text-xs font-bold px-3 py-1 rounded-full z-10">
                                            SOLD OUT
                                        </div>

                                    @elseif($isUpcoming)
                                        <div class="absolute top-4 right-4 bg-amber-100 text-amber-700 text-xs font-bold px-3 py-1 rounded-full z-10">
                                            Segera Tersedia
                                        </div>

                                    @elseif($isLowStock)
                                        <div class="absolute top-4 right-4 bg-red-100 text-red-600 text-xs font-bold px-3 py-1 rounded-full z-10 animate-pulse">
                                            🔥Segera Habis
                                        </div>

                                    @elseif($isAvailable)
                                        <div class="absolute top-4 right-4 bg-emerald-100 text-emerald-700 text-xs font-bold px-3 py-1 rounded-full z-10">
                                            Tersedia
                                        </div>
                                    @endif


                                    {{-- Card Header --}}
                                    {{-- Card Header: Date & Venue --}}
                                    <div class="p-5 border-b border-gray-50 bg-gray-50/50">
                                        {{-- PERBAIKAN: Ganti 'justify-between' menjadi 'justify-start gap-4'
                                        agar Jam pindah ke kiri dan tidak tertumpuk Badge --}}
                                        <div
                                            class="flex items-center justify-start gap-4 text-xs font-medium text-gray-500 uppercase tracking-wider">

                                            {{-- Tanggal --}}
                                            <div class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                {{ \Carbon\Carbon::parse($ticket->match_date)->translatedFormat('d M Y') }}
                                            </div>

                                            {{-- Separator (Opsional, pemanis visual) --}}
                                            <div class="h-1 w-1 rounded-full bg-gray-300"></div>

                                            {{-- Jam (Sekarang di sebelah kiri) --}}
                                            <div class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ \Carbon\Carbon::parse($ticket->match_date)->format('H:i') }} WIB
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Card Body --}}
                                    {{-- FIX: Sebelumnya ada typo di penutup komentar --}}
                                    <div class="p-6 flex-grow flex flex-col justify-center text-center">
                                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                                            {{ $ticket->match_name }}
                                        </h3>

                                        <div class="flex items-center justify-center gap-2 text-sm text-gray-500 mt-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            {{ $ticket->stadium }}
                                        </div>
                                    </div>

                                    {{-- Card Footer --}}
                                    <div class="p-5 border-t border-gray-100 bg-white mt-auto relative z-20">
                                        <div class="flex justify-between items-end mb-4">
                                            <div>
                                                <p class="text-xs text-gray-400 mb-1">Harga Tiket</p>
                                                <span class="text-lg font-bold text-indigo-600">
                                                    Rp {{ number_format($ticket->price, 0, ',', '.') }}
                                                </span>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-xs text-gray-400 mb-1">Sisa Stok</p>
                                                <span
                                                    class="text-sm font-semibold {{ $isLowStock ? 'text-red-500' : 'text-gray-700' }}">
                                                    {{ $ticket->stock }} Tiket
                                                </span>
                                            </div>
                                        </div>

                                        {{-- Tambahkan wire:loading.attr untuk mencegah double click --}}
                                        <a href="{{ route('tickets.detail', $ticket->id) }}" class="block w-full py-3 px-4 rounded-xl font-semibold text-sm text-center transition-all duration-200 transform hover:-translate-y-0.5
                        {{ $isSoldOut
                            ? 'bg-gray-100 text-gray-400 pointer-events-none cursor-not-allowed'
                            : 'bg-indigo-600 hover:bg-indigo-700 text-white shadow-lg hover:shadow-indigo-500/30'
                        }}">
                                            {{ $isSoldOut ? 'Tiket Habis' : 'Beli Tiket Sekarang' }}
                                        </a>

                                    </div>
                                </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>