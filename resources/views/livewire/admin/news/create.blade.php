<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-1">Tambah Berita</h1>
    <p class="text-gray-500 mb-6">Buat dan publikasikan berita baru untuk halaman Media</p>

    <form wire:submit.prevent="save" class="bg-white rounded-xl shadow p-6 space-y-6">

        {{-- Judul --}}
        <div>
            <label class="font-semibold">Judul Berita</label>
            <input type="text" wire:model="title" class="w-full mt-2 rounded-lg border-gray-300 focus:ring-rose-500">
            @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Penulis --}}
        <div>
            <label class="font-semibold">Penulis</label>
            <input type="text" wire:model="author" class="w-full mt-2 rounded-lg border-gray-300">
        </div>

        {{-- Upload Gambar --}}
        <div>
            <label class="font-semibold">Gambar / Thumbnail</label>

            <div class="mt-2 flex items-center justify-center border-2 border-dashed rounded-xl p-6 cursor-pointer hover:border-rose-500 transition"
                onclick="document.getElementById('imageUpload').click()">

                <input id="imageUpload" type="file" wire:model="image" class="hidden">

                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" class="h-48 object-cover rounded-lg shadow">
                @else
                    <div class="text-center text-gray-500">
                        <p class="font-semibold">Klik untuk upload gambar</p>
                        <p class="text-sm">PNG / JPG (Max 2MB)</p>
                    </div>
                @endif
            </div>

            @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Isi --}}
        <div>
            <label class="font-semibold">Isi Berita</label>
            <textarea wire:model="content" rows="6" class="w-full mt-2 rounded-lg border-gray-300"></textarea>
            @error('content') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Publish Date --}}
        <div>
            <label class="font-semibold">Tanggal & Waktu Publikasi</label>
            <input type="datetime-local" wire:model="published_at" class="w-full mt-2 rounded-lg border-gray-300">
            @error('published_at') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Visibility --}}
        <div class="flex items-center gap-2">
            <input type="checkbox" wire:model="is_visible" class="rounded">
            <span class="text-sm">Tampilkan berita di halaman Media</span>
        </div>

        {{-- Action --}}
        <div class="flex justify-end gap-3 pt-4 border-t">
            <a href="{{ route('admin.news.index') }}" class="px-4 py-2 rounded-lg border">Batal</a>

            <button type="submit" class="bg-rose-600 hover:bg-rose-700 text-white px-6 py-2 rounded-lg font-semibold">
                Simpan Berita
            </button>
        </div>
    </form>
</div>