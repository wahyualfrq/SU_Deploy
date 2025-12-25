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