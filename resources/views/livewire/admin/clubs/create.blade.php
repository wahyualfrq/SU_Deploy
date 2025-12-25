<div class="p-6 max-w-xl">
    <h1 class="text-2xl font-bold mb-6">Tambah Klub</h1>

    <form wire:submit.prevent="save" class="space-y-4 bg-white p-6 rounded-xl shadow">
        <div>
            <label class="font-semibold">Nama Klub</label>
            <input wire:model="name" class="w-full border rounded-lg px-4 py-2">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="font-semibold">Kota</label>
            <input wire:model="city" class="w-full border rounded-lg px-4 py-2">
        </div>

        <div>
            <label class="font-semibold">Logo Klub</label>
            <input type="file" wire:model="logo">
        </div>

        <div class="flex gap-3">
            <a href="{{ route('admin.clubs.index') }}" class="px-4 py-2 border rounded-lg">Batal</a>
            <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg">
                Simpan
            </button>
        </div>
    </form>
</div>