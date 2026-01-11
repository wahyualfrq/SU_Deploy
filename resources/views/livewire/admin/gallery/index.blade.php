<div x-data="{ open:false, deleteId:null }" class="p-6 space-y-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">Galeri Foto</h1>

        <a href="{{ route('admin.gallery.create') }}"
           class="bg-rose-600 text-white px-4 py-2 rounded-lg font-semibold">
            + Tambah Galeri
        </a>
    </div>

    {{-- FLASH --}}
    @if(session()->has('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABLE --}}
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="p-4">Cover</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th class="text-right p-4">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($galleries as $gallery)
                    <tr class="border-t">
                        <td class="p-4">
                            <img
                                src="{{ $gallery->cover_image }}"
                                class="w-20 h-14 rounded object-cover"
                                onerror="this.src='https://via.placeholder.com/150'"
                            >
                        </td>

                        <td class="font-semibold">
                            {{ $gallery->title }}
                        </td>

                        <td>
                            @if($gallery->is_visible)
                                <span class="text-green-600 font-semibold">Aktif</span>
                            @else
                                <span class="text-gray-400">Draft</span>
                            @endif
                        </td>

                        <td class="p-4 text-right space-x-3">
                            <a href="{{ route('admin.gallery.edit', $gallery->id) }}"
                               class="text-blue-600 font-semibold">
                                Edit
                            </a>

                            <button
                                @click="open=true; deleteId={{ $gallery->id }}"
                                class="text-red-600 font-semibold">
                                Hapus
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center p-6 text-gray-400">
                            Belum ada galeri
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- MODAL DELETE --}}
    <div
        x-show="open"
        x-transition
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/40"
    >
        <div
            @click.away="open=false"
            class="bg-white rounded-xl shadow-lg w-full max-w-sm p-6"
        >
            <h2 class="text-lg font-bold mb-3">
                Hapus Galeri
            </h2>

            <p class="text-sm text-gray-600 mb-6">
                Galeri akan dihapus permanen. Lanjutkan?
            </p>

            <div class="flex justify-end gap-3">
                <button
                    @click="open=false"
                    class="px-4 py-2 rounded border text-gray-600">
                    Batal
                </button>

                <button
                    wire:click="delete(deleteId)"
                    @click="open=false"
                    class="px-4 py-2 rounded bg-red-600 text-white font-semibold">
                    Ya, Hapus
                </button>
            </div>
        </div>
    </div>

</div>
