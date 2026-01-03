<div class="p-6">
    {{-- HEADER --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Manajemen Tim</h1>

        <div class="flex gap-2">
            <a href="{{ route('admin.players.import') }}"
               class="px-4 py-2 bg-slate-600 text-white rounded-lg hover:bg-slate-700 font-semibold">
                Import Excel
            </a>
                        <a href="{{ route('admin.players.create') }}"
               class="px-4 py-2 bg-rose-600 text-white rounded-lg hover:bg-rose-700 font-semibold">
                + Tambah Pemain
            </a>
        </div>
    </div>

    {{-- CARD --}}
    <div class="bg-white p-6 rounded-xl shadow-sm border">

        <h2 class="text-lg font-semibold mb-4">Daftar Pemain</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="border-b bg-slate-50">
                    <tr>
                        <th class="py-3 px-2 font-semibold">Nama</th>
                        <th class="py-3 px-2 font-semibold">Posisi</th>
                        <th class="py-3 px-2 font-semibold">Kategori</th>
                        <th class="py-3 px-2 font-semibold text-center">Nomor</th>
                        <th class="py-3 px-2 font-semibold text-center">Usia</th>
                        <th class="py-3 px-2 font-semibold">Negara</th>
                        <th class="py-3 px-2 font-semibold text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($players as $player)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="py-3 px-2 font-medium">
                                <div class="flex items-center gap-3">
                                    <img
                                        src="{{ $player->photo_url
                                            ? (str_starts_with($player->photo_url, 'http')
                                                ? $player->photo_url
                                                : asset('storage/' . $player->photo_url))
                                            : asset('images/default-player.png') }}"
                                        class="w-9 h-9 rounded-full object-cover">
                                    {{ $player->name }}
                                </div>
                            </td>

                            <td class="py-3 px-2">{{ $player->position }}</td>
                            <td class="py-3 px-2">{{ $player->category ?? '-' }}</td>
                            <td class="py-3 px-2 text-center font-semibold">
                                {{ $player->number ?? '-' }}
                            </td>
                            <td class="py-3 px-2 text-center">
                                {{ $player->age ?? '-' }}
                            </td>
                            <td class="py-3 px-2">
                                {{ $player->country ?? '-' }}
                            </td>

                            <td class="py-3 px-2 text-right space-x-3">
                                <a href="{{ route('admin.players.edit', $player->id) }}"
                                   class="text-blue-600 hover:underline font-semibold">
                                    Edit
                                </a>

                                <button
                                    wire:click="delete({{ $player->id }})"
                                    onclick="confirm('Yakin hapus pemain ini?') || event.stopImmediatePropagation()"
                                    class="text-red-600 hover:underline font-semibold">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-10 text-center text-gray-400">
                                Belum ada data pemain
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>
