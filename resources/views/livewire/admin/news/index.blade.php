<div class="p-6">
    {{-- PAGE HEADER --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Berita</h1>
            <p class="text-sm text-gray-500 mt-1">
                Kelola berita yang tampil di halaman Media
            </p>
        </div>

        <a href="{{ route('admin.news.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2 rounded-lg
                  bg-indigo-600 text-white font-semibold
                  hover:bg-indigo-700 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Berita
        </a>
    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b">
                <tr class="text-left text-gray-600 uppercase text-xs tracking-wider">
                    <th class="px-6 py-3">Judul</th>
                    <th class="px-6 py-3">Penulis</th>
                    <th class="px-6 py-3">Tanggal Publish</th>
                    <th class="px-6 py-3 text-center">Status</th>
                    <th class="px-6 py-3 text-right">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse ($news as $item)
                    <tr class="hover:bg-gray-50 transition">
                        {{-- JUDUL --}}
                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-800">
                                {{ $item->title }}
                            </div>
                        </td>

                        {{-- AUTHOR --}}
                        <td class="px-6 py-4 text-gray-600">
                            {{ $item->author ?? '-' }}
                        </td>

                        {{-- PUBLISHED AT --}}
                        <td class="px-6 py-4 text-gray-600">
                            {{ \Carbon\Carbon::parse($item->published_at)->format('d M Y H:i') }}
                        </td>

                        {{-- STATUS --}}
                        <td class="px-6 py-4 text-center">
                            @if ($item->is_visible)
                                <span class="inline-flex px-3 py-1 rounded-full
                                             bg-green-100 text-green-700 text-xs font-semibold">
                                    Visible
                                </span>
                            @else
                                <span class="inline-flex px-3 py-1 rounded-full
                                             bg-gray-200 text-gray-600 text-xs font-semibold">
                                    Hidden
                                </span>
                            @endif
                        </td>

                        {{-- ACTION --}}
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-3">
                                <a href="{{ route('admin.news.edit', $item->id) }}"
                                   class="text-indigo-600 hover:underline text-sm font-semibold">
                                    Edit
                                </a>

                                <button
                                    wire:click="delete({{ $item->id }})"
                                    wire:confirm="Yakin ingin menghapus berita ini?"
                                    class="text-red-600 hover:underline text-sm font-semibold">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            Belum ada berita
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
