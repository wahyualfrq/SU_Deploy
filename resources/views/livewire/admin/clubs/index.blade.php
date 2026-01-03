<div class="p-8 bg-white min-h-screen">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h1 class="text-[20px] font-semibold text-slate-900 tracking-tight">Manajemen Klub</h1>
            <p class="text-sm text-slate-500 mt-1">Kelola dan pantau daftar klub yang terdaftar dalam sistem.</p>
        </div>
        <div class="flex items-center gap-3">
            {{-- BUTTON IMPORT EXCEL --}}
            <a href="{{ route('admin.clubs.import') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-50 text-blue-700 hover:bg-blue-100 border border-blue-100 rounded-lg text-sm font-semibold transition-all duration-200 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 16v-8m0 0l-3 3m3-3l3 3M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2" />
                </svg>
                Import Excel
            </a>

            {{-- BUTTON TAMBAH KLUB --}}
            <a href="{{ route('admin.clubs.create') }}"
                class="inline-flex items-center px-4 py-2 bg-red-50 text-red-700 hover:bg-red-100 border border-red-100 rounded-lg text-sm font-semibold transition-all duration-200 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Klub
            </a>
        </div>

    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 text-sm rounded-xl flex items-center">
            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                    clip-rule="evenodd"></path>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-[14px] text-left border-collapse">
                <thead class="bg-slate-50/50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 uppercase tracking-wide text-xs font-semibold text-slate-500">Logo</th>
                        <th class="px-6 py-4 uppercase tracking-wide text-xs font-semibold text-slate-500">Nama Klub
                        </th>
                        <th class="px-6 py-4 uppercase tracking-wide text-xs font-semibold text-slate-500">Kota</th>
                        <th class="px-6 py-4 uppercase tracking-wide text-xs font-semibold text-slate-500">Stadion</th>
                        <th class="px-6 py-4 uppercase tracking-wide text-xs font-semibold text-slate-500 text-right">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($clubs as $club)
                        <tr class="hover:bg-slate-50/80 transition-colors duration-150 group">
                            <td class="px-6 py-4">
                                <div class="relative inline-block">
                                    @if($club->logo)
                                        <img src="{{ $club->logo }}" alt="{{ $club->name }}"
                                            class="w-10 h-10 rounded-full object-contain border border-slate-200 bg-white shadow-sm"
                                            loading="lazy" onerror="this.style.display='none'">
                                    @else
                                        <div
                                            class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center border border-slate-200">
                                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif

                                </div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-slate-900">{{ $club->name }}</td>
                            <td class="px-6 py-4 text-slate-600 font-medium">{{ $club->city ?? '-' }}</td>
                            <td class="px-6 py-4 text-slate-600">
                                {{ $club->stadium ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button wire:click="delete({{ $club->id }})"
                                    onclick="confirm('Hapus klub {{ $club->name }}?') || event.stopImmediatePropagation()"
                                    class="inline-flex items-center px-3 py-1.5 text-red-600 hover:bg-red-50 rounded-lg font-semibold transition-all duration-200">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="p-4 bg-slate-50 rounded-full mb-4">
                                        <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                            </path>
                                        </svg>
                                    </div>
                                    <p class="text-slate-500 font-medium text-base">Belum ada klub terdaftar</p>
                                    <p class="text-slate-400 text-sm mt-1">Silakan tambah klub baru untuk memulai manajemen.
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-8 flex justify-center md:justify-end">
        <div class="px-4 py-2 bg-white border border-slate-200 rounded-xl shadow-sm">
            {{ $clubs->links() }}
        </div>
<div class="p-6">
    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Manajemen Klub</h1>
        <a href="{{ route('admin.clubs.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg">
            + Tambah Klub
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-3 text-left">Logo</th>
                    <th class="p-3 text-left">Nama Klub</th>
                    <th class="p-3 text-left">Kota</th>
                    <th class="p-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clubs as $club)
                    <tr class="border-t">
                        <td class="p-3">
                            @if($club->logo)
                                <img src="{{ asset('storage/' . $club->logo) }}" class="w-10 h-10 rounded-full">
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="p-3 font-semibold">{{ $club->name }}</td>
                        <td class="p-3">{{ $club->city ?? '-' }}</td>
                        <td class="p-3 text-right">
                            <button wire:click="delete({{ $club->id }})"
                                onclick="confirm('Hapus klub?') || event.stopImmediatePropagation()"
                                class="text-red-600 font-semibold">
                                Hapus
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-6 text-center text-gray-500">
                            Belum ada klub
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $clubs->links() }}
    </div>
</div>