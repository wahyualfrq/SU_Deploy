<div class="p-6 max-w-xl mx-auto min-h-screen">
    <div class="mb-6">
        <h1 class="text-[20px] font-semibold text-slate-900 tracking-tight">Tambah Klub</h1>
        <p class="text-sm text-slate-500">Lengkapi informasi detail untuk mendaftarkan klub baru ke sistem.</p>
    </div>

    <form wire:submit.prevent="save"
        class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-5 transition-all">

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Klub</label>
            <input type="text" wire:model="name" placeholder="Masukkan nama resmi klub"
                class="w-full text-[14px] rounded-lg border border-slate-300 px-4 py-2.5 bg-white text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-4 focus:ring-red-500/10 focus:border-red-600 transition-all duration-200">
            @error('name') <span class="block text-sm text-red-600 mt-1.5 font-medium">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">Kota</label>
            <input type="text" wire:model="city" placeholder="Contoh: Palembang"
                class="w-full text-[14px] rounded-lg border border-slate-300 px-4 py-2.5 bg-white text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-4 focus:ring-red-500/10 focus:border-red-600 transition-all duration-200">
            @error('city') <span class="block text-sm text-red-600 mt-1.5 font-medium">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1.5">
                Stadion Kandang
            </label>
            <input type="text" wire:model.live="stadium" placeholder="Contoh: Stadion Gelora Sriwijaya Jakabaring"
                class="w-full text-[14px] rounded-lg border border-slate-300 px-4 py-2.5 bg-white text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-4 focus:ring-red-500/10 focus:border-red-600 transition-all duration-200">
            @error('stadium')
                <span class="block text-sm text-red-600 mt-1.5 font-medium">
                    {{ $message }}
                </span>
            @enderror
        </div>


        <div class="pt-2">
            <label class="block text-sm font-medium text-slate-700 mb-2">Logo Klub</label>

            <div class="flex items-center gap-4">
                @if ($logo)
                    <div class="relative group">
                        <img src="{{ $logo->temporaryUrl() }}"
                            class="w-16 h-16 rounded-xl border border-slate-200 object-cover shadow-sm">
                        <div
                            class="absolute inset-0 bg-black/5 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                    </div>
                @else
                    <div
                        class="w-16 h-16 rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 flex items-center justify-center">
                        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                @endif

                <div class="flex-1">
                    <input type="file" wire:model="logo" id="logo-upload" class="hidden">
                    <label for="logo-upload"
                        class="inline-flex items-center px-4 py-2 border border-slate-300 rounded-lg text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 cursor-pointer transition-colors shadow-sm">
                        Pilih Gambar
                    </label>
                    <p class="text-[12px] text-slate-500 mt-1.5">Format PNG, JPG maksimal 2MB.</p>
                </div>
            </div>

            <div wire:loading wire:target="logo"
                class="mt-2 flex items-center gap-2 text-xs text-red-600 font-medium italic">
                <svg class="animate-spin h-3 w-3 text-red-600" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Sedang mengunggah...
            </div>
            @error('logo') <span class="block text-sm text-red-600 mt-1.5 font-medium">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 mt-6">
            <a href="{{ route('admin.clubs.index') }}"
                class="px-4 py-2.5 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 transition-colors">
                Batal
            </a>
            <button type="submit" wire:loading.attr="disabled"
                class="px-5 py-2.5 text-sm font-semibold text-white bg-red-600 hover:bg-red-700 rounded-lg shadow-sm shadow-red-200 transition-all active:scale-[0.98] disabled:opacity-70 disabled:cursor-not-allowed">
                <span wire:loading.remove wire:target="save">Simpan Klub</span>
                <span wire:loading wire:target="save" class="flex items-center gap-2">
                    <svg class="animate-spin h-4 w-4 text-white" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    Menyimpan...
                </span>
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