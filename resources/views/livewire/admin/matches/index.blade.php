<div class="p-6">

    {{-- HEADER --}}
    <div class="flex items-center justify-between mb-5">
        <div>
            <h1 class="text-2xl font-bold">Manajemen Jadwal</h1>
            <p class="text-sm text-gray-500">
                Tambah, edit, dan kontrol live pertandingan.
            </p>
        </div>
        <a href="{{ route('admin.matches.create') }}"
            class="px-4 py-2 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700">
            + Tambah Jadwal
        </a>
    </div>

    {{-- FLASH MESSAGE --}}
    @if(session('success'))
        <div class="mb-4 p-3 rounded-lg bg-green-50 text-green-700 border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 p-3 rounded-lg bg-yellow-50 text-yellow-700 border border-yellow-200">
            {{ session('error') }}
        </div>
    @endif

    {{-- FILTER --}}
    <div class="bg-white rounded-xl shadow p-4 mb-4 flex flex-col md:flex-row gap-3 items-center justify-between">
        <div class="w-full md:w-1/2">
            <input wire:model.live="search" type="text" placeholder="Cari tim / stadion..." class="w-full px-4 py-2 rounded-lg border border-gray-200
                       focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none">
        </div>

        <div class="w-full md:w-56">
            <select wire:model.live="status" class="w-full px-4 py-2 rounded-lg border border-gray-200
                       focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none">
                <option value="all">Semua Status</option>
                <option value="scheduled">Scheduled</option>
                <option value="live">Live</option>
                <option value="finished">Finished</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="text-left p-3 cursor-pointer" wire:click="sortBy('match_date')">
                        Tanggal
                    </th>
                    <th class="text-left p-3">Home</th>
                    <th class="text-left p-3">Away</th>
                    <th class="text-left p-3">Stadion</th>
                    <th class="text-center p-3 cursor-pointer" wire:click="sortBy('status')">
                        Status
                    </th>
                    <th class="text-right p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($matches as $m)
                    <tr class="border-t hover:bg-gray-50">

                        {{-- DATE --}}
                        <td class="p-3">
                            {{ $m->match_date?->format('d M Y H:i') ?? '-' }}
                        </td>

                        {{-- HOME --}}
                        <td class="p-3 font-semibold">
                            {{ $m->homeClub->name ?? '-' }}
                        </td>

                        {{-- AWAY --}}
                        <td class="p-3 font-semibold">
                            {{ $m->awayClub->name ?? '-' }}
                        </td>

                        {{-- STADIUM --}}
                        <td class="p-3 text-gray-600">
                            {{ $m->stadium ?? '-' }}
                        </td>

                        {{-- STATUS --}}
                        <td class="p-3 text-center">
                            @if($m->status === 'live')
                                <span class="px-3 py-1 rounded-full text-xs font-bold
                                                   bg-red-600 text-white animate-pulse">
                                    🔴 LIVE
                                </span>
                            @elseif($m->status === 'scheduled')
                                <span class="px-3 py-1 rounded-full text-xs font-bold
                                                   bg-blue-100 text-blue-700">
                                    SCHEDULED
                                </span>
                            @elseif($m->status === 'finished')
                                <span class="px-3 py-1 rounded-full text-xs font-bold
                                                   bg-green-100 text-green-700">
                                    FINISHED
                                </span>
                            @else
                                <span class="px-3 py-1 rounded-full text-xs font-bold
                                                   bg-red-100 text-red-700">
                                    CANCELLED
                                </span>
                            @endif
                        </td>

                        {{-- ACTION --}}
                        <td class="p-3 text-right space-x-2">

                            {{-- LIVE CONTROL --}}
                            @if(in_array($m->status, ['scheduled', 'live']))
                                <a href="{{ route('admin.matches.live', $m->id) }}" class="px-3 py-1 rounded-lg bg-red-600 text-white
                                                  font-semibold hover:bg-red-700">
                                    Live Control
                                </a>
                            @endif

                            {{-- EDIT --}}
                            <a href="{{ route('admin.matches.edit', $m->id) }}" class="px-3 py-1 rounded-lg bg-indigo-50 text-indigo-700
                                          font-semibold hover:bg-indigo-100">
                                Edit
                            </a>

                            {{-- DELETE --}}
                            <button onclick="confirm('Hapus jadwal ini?') || event.stopImmediatePropagation()"
                                wire:click="delete({{ $m->id }})" class="px-3 py-1 rounded-lg bg-red-50 text-red-700
                                           font-semibold hover:bg-red-100">
                                Hapus
                            </button>

                        </td>
                    </tr>
                @empty
                    <tr class="border-t">
                        <td colspan="6" class="p-8 text-center text-gray-500">
                            Belum ada jadwal pertandingan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $matches->links() }}
    </div>

</div>