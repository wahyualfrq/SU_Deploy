<form wire:submit.prevent="update" class="max-w-xl space-y-6">

    <h1 class="text-xl font-bold">Edit Galeri</h1>

    <input
        type="text"
        wire:model.defer="title"
        class="w-full border rounded px-4 py-2"
        placeholder="Judul Galeri"
    >

    @error('title')
        <p class="text-sm text-red-500">{{ $message }}</p>
    @enderror

    <input type="file" wire:model="cover_image">

    @error('cover_image')
        <p class="text-sm text-red-500">{{ $message }}</p>
    @enderror

    <img
        src="{{ $gallery->cover_image_url }}"
        class="w-full h-48 object-cover rounded-lg"
    >

    <button
        type="submit"
        class="bg-rose-600 text-white px-6 py-2 rounded">
        Simpan
    </button>

</form>
