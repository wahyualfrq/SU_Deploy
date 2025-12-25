<div class="p-6 max-w-3xl">
    <div class="mb-5">
        <h1 class="text-2xl font-bold">Tambah Tiket</h1>
        <p class="text-sm text-gray-500">
            Pilih pertandingan lalu atur kategori dan stok tiket.
        </p>
    </div>

    <div class="bg-white rounded-xl shadow p-5 space-y-4">

        {{-- PILIH PERTANDINGAN --}}
        <div>
            <label class="text-sm font-semibold">Pertandingan</label>
            <select wire:model="match_id"
                class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none">
                <option value="">-- Pilih Pertandingan --</option>
                @foreach ($matches as $match)
                    <option value="{{ $match->id }}">
                        {{ $match->homeClub->name }} vs {{ $match->awayClub->name }}
                        — {{ \Carbon\Carbon::parse($match->match_date)->format('d M Y H:i') }}
                        ({{ $match->stadium }})
                    </option>
                @endforeach

            </select>
            @error('match_id')
                <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- KATEGORI --}}
        <div>
            <label class="text-sm font-semibold">Kategori Tiket</label>
            <input wire:model="category" type="text" placeholder="Contoh: VIP, Tribune Utara, VVIP"
                class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none">
            @error('category')
                <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- STATUS PENJUALAN --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Status Penjualan</label>
            <select wire:model="sales_status" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                <option value="upcoming">Segera Tersedia</option>
                <option value="available">Tiket Tersedia</option>
            </select>
            @error('sales_status')
                <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- HARGA & STOK --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="text-sm font-semibold">Harga</label>
                <input wire:model="price" type="number" min="0"
                    class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none">
                @error('price')
                    <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="text-sm font-semibold">Stok</label>
                <input wire:model="stock" type="number" min="0"
                    class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none">
                @error('stock')
                    <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        {{-- AKTIF --}}
        <div class="flex items-center gap-2">
            <input wire:model="is_active" type="checkbox" class="rounded">
            <span class="text-sm">Aktifkan tiket (tampil di halaman user)</span>
        </div>

        {{-- ACTION --}}
        <div class="flex gap-2">
            <a href="{{ route('admin.tickets.index') }}"
                class="px-4 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 font-semibold">
                Kembali
            </a>
            <button wire:click="save"
                class="px-4 py-2 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700">
                Simpan
            </button>
        </div>

    </div>
</div>