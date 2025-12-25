<div class="p-6 max-w-3xl">
    <div class="mb-5">
        <h1 class="text-2xl font-bold">Tambah Jadwal</h1>
        <p class="text-sm text-gray-500">Isi data pertandingan untuk muncul di dropdown tiket dan halaman user.</p>
    </div>

    <div class="bg-white rounded-xl shadow p-5 space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- HOME CLUB --}}
            <div>
                <label class="block text-sm font-semibold mb-2">Home Team</label>
                <select wire:model="home_club_id"
                    class="w-full rounded-xl border border-gray-200 px-4 py-2 focus:ring-2 focus:ring-indigo-200">
                    <option value="">Pilih Klub Home</option>
                    @foreach($clubs as $club)
                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                    @endforeach
                </select>
                @error('home_club_id') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

            {{-- AWAY CLUB --}}
            <div>
                <label class="block text-sm font-semibold mb-2">Away Team</label>
                <select wire:model="away_club_id"
                    class="w-full rounded-xl border border-gray-200 px-4 py-2 focus:ring-2 focus:ring-indigo-200">
                    <option value="">Pilih Klub Away</option>
                    @foreach($clubs as $club)
                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                    @endforeach
                </select>
                @error('away_club_id') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
            </div>

        </div>


        <div>
            <label class="text-sm font-semibold">Tanggal & Jam</label>
            <input wire:model="match_date" type="datetime-local"
                class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none">
            @error('match_date') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="text-sm font-semibold">Stadion</label>
            <input wire:model="stadium" type="text"
                class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none">
            @error('stadium') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
            <label class="block text-sm font-semibold mb-1">Status</label>
            <select wire:model="status" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                <option value="scheduled">Scheduled</option>
                <option value="live">Live</option>
                <option value="finished">Finished</option>
                <option value="cancelled">Cancelled</option>
            </select>
            @error('status') <div class="text-xs text-red-600 mt-1">{{ $message }}</div> @enderror
        </div>


        <div class="flex gap-2">
            <a href="{{ route('admin.matches.index') }}"
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