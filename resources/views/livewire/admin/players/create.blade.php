<div class="max-w-4xl p-6">
    {{-- HEADER --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900">Tambah Pemain</h1>
        <p class="text-sm text-slate-500">
            Tambahkan data pemain baru ke dalam tim
        </p>
    </div>

    {{-- FORM --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 space-y-6">

        {{-- NAMA --}}
        <div>
            <label class="block text-sm font-semibold text-slate-700">
                Nama Pemain
            </label>
            <input type="text" wire:model.defer="name" placeholder="Contoh: Bayu Gatra" class="mt-1 w-full px-4 py-2 rounded-lg border border-slate-300
                       focus:ring-2 focus:ring-rose-200 focus:border-rose-500 outline-none">
            @error('name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- POSISI & KATEGORI --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700">
                    Posisi
                </label>
                <select wire:model.defer="position" class="mt-1 w-full px-4 py-2 rounded-lg border border-slate-300
                           focus:ring-2 focus:ring-rose-200 focus:border-rose-500 outline-none">
                    <option value="">-- Pilih Posisi --</option>
                    <option value="GK">Goalkeeper</option>
                    <option value="DF">Defender</option>
                    <option value="MF">Midfielder</option>
                    <option value="FW">Forward</option>
                </select>
                @error('position') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700">
                    Kategori
                </label>
                <input type="text" wire:model.defer="category" placeholder="Utama / Cadangan / U-23" class="mt-1 w-full px-4 py-2 rounded-lg border border-slate-300
                           focus:ring-2 focus:ring-rose-200 focus:border-rose-500 outline-none">
            </div>
        </div>

        {{-- NOMOR & USIA --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700">
                    Nomor Punggung
                </label>
                <input type="number" wire:model.defer="number" placeholder="1 - 99"
                    class="mt-1 w-full px-4 py-2 rounded-lg border border-slate-300">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700">
                    Usia
                </label>
                <input type="number" wire:model.defer="age" placeholder="Contoh: 25"
                    class="mt-1 w-full px-4 py-2 rounded-lg border border-slate-300">
            </div>
        </div>

        {{-- NEGARA --}}
        <div>
            <label class="block text-sm font-semibold text-slate-700">
                Negara
            </label>
            <input type="text" wire:model.defer="country" placeholder="Indonesia"
                class="mt-1 w-full px-4 py-2 rounded-lg border border-slate-300">
        </div>

        {{-- FOTO PEMAIN --}}
        <div>
            <label class="block text-sm font-semibold text-slate-700">
                Foto Pemain
            </label>

            <input type="file" wire:model="photo" accept="image/*" class="mt-2 block w-full text-sm text-slate-600">

            {{-- PREVIEW --}}
            @if ($photo)
                <div class="mt-3">
                    <img src="{{ $photo->temporaryUrl() }}" class="w-24 h-24 rounded-full object-cover border">
                </div>
            @endif
        </div>

        {{-- ACTION --}}
        <div class="flex justify-between pt-4">
            <a href="{{ route('admin.players.index') }}" class="px-4 py-2 rounded-lg border border-slate-300
                      text-slate-700 font-semibold hover:bg-slate-50">
                Batal
            </a>

            <button type="button" wire:click="save" wire:loading.attr="disabled" class="px-6 py-2 rounded-lg bg-rose-600 text-white
           font-semibold hover:bg-rose-700 transition">
                <span wire:loading.remove>💾 Simpan Pemain</span>
                <span wire:loading>Menyimpan...</span>
            </button>
        </div>

        </form>
    </div>