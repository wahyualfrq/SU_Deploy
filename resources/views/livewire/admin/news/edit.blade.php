<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Edit Berita</h1>

    <form wire:submit.prevent="update" class="bg-white rounded-xl shadow p-6 space-y-6">

        {{-- Judul --}}
        <div>
            <label class="font-semibold">Judul Berita</label>
            <input type="text" wire:model="title"
                class="w-full mt-2 rounded-lg border-gray-300">
            @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Penulis --}}
        <div>
            <label class="font-semibold">Penulis</label>
            <input type="text" wire:model="author"
                class="w-full mt-2 rounded-lg border-gray-300">
        </div>

        {{-- Gambar --}}
        <div>
            <label class="font-semibold">Gambar / Thumbnail</label>

            <div
                class="mt-2 border-2 border-dashed rounded-xl p-6 text-center cursor-pointer"
                onclick="document.getElementById('imageEdit').click()">

                <input id="imageEdit" type="file" wire:model="image" class="hidden">

                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}"
                        class="h-48 mx-auto rounded-lg object-cover">
                @elseif ($oldImage)
                    <img src="{{ asset('storage/'.$oldImage) }}"
                        class="h-48 mx-auto rounded-lg object-cover">
                    <p class="text-sm text-gray-500 mt-2">Gambar saat ini</p>
                @else
                    <p class="text-gray-500">Klik untuk upload gambar baru</p>
                @endif
            </div>

            @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Isi --}}
        <div>
            <label class="font-semibold">Isi Berita</label>
            <textarea wire:model="content" rows="6"
                class="w-full mt-2 rounded-lg border-gray-300"></textarea>
        </div>

        {{-- Publish --}}
        <div>
            <label class="font-semibold">Tanggal & Waktu Publikasi</label>
            <input type="datetime-local" wire:model="published_at"
                class="w-full mt-2 rounded-lg border-gray-300">
        </div>

        {{-- Visible --}}
        <div class="flex items-center gap-2">
            <input type="checkbox" wire:model="is_visible">
            <span>Tampilkan di halaman Media</span>
        </div>

        {{-- Action --}}
        <div class="flex justify-end gap-3 pt-4 border-t">
            <a href="{{ route('admin.news.index') }}"
                class="px-4 py-2 rounded-lg border">Batal</a>

            <button type="submit"
                class="bg-rose-600 hover:bg-rose-700 text-white px-6 py-2 rounded-lg font-semibold">
                Update Berita
            </button>
        </div>
    </form>
</div>
