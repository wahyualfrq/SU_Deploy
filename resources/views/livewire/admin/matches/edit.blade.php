<div class="p-6 max-w-3xl">
    <div class="mb-5">
        <h1 class="text-2xl font-bold">Edit Jadwal</h1>
        <p class="text-sm text-gray-500">Update data pertandingan.</p>
    </div>

    <div class="bg-white rounded-xl shadow p-5 space-y-4">

        {{-- HOME & AWAY --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            {{-- HOME CLUB --}}
            <div>
                <label class="text-sm font-semibold">Home Club</label>
                <select wire:model="home_club_id"
                    class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-200
                           focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none">
                    <option value="">Pilih Klub Home</option>
                    @foreach ($clubs as $club)
                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                    @endforeach
                </select>
                @error('home_club_id')
                    <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

            {{-- AWAY CLUB --}}
            <div>
                <label class="text-sm font-semibold">Away Club</label>
                <select wire:model="away_club_id"
                    class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-200
                           focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none">
                    <option value="">Pilih Klub Away</option>
                    @foreach ($clubs as $club)
                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                    @endforeach
                </select>
                @error('away_club_id')
                    <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
                @enderror
            </div>

        </div>

        {{-- MATCH DATE --}}
        <div>
            <label class="text-sm font-semibold">Tanggal & Jam</label>
            <input wire:model="match_date" type="datetime-local"
                class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-200
                       focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none">
            @error('match_date')
                <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- STADIUM --}}
        <div>
            <label class="text-sm font-semibold">Stadion</label>
            <input wire:model="stadium" type="text"
                class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-200
                       focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 outline-none">
            @error('stadium')
                <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- STATUS --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Status</label>
            <select wire:model="status"
                class="w-full border border-gray-300 rounded-lg px-3 py-2">
                <option value="scheduled">Scheduled</option>
                <option value="live">Live</option>
                <option value="finished">Finished</option>
                <option value="cancelled">Cancelled</option>
            </select>
            @error('status')
                <div class="text-xs text-red-600 mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- ACTION --}}
        <div class="flex gap-2 pt-2">
            <a href="{{ route('admin.matches.index') }}"
                class="px-4 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 font-semibold">
                Kembali
            </a>

            <button wire:click="update"
                class="px-4 py-2 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700">
                Update
            </button>
        </div>

    </div>
</div>
