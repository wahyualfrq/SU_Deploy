<div class="p-6 space-y-6">

    {{-- HEADER --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold">Live Match Control</h1>
            <p class="text-gray-500">
                {{ $match->homeClub->name }} vs {{ $match->awayClub->name }}
            </p>
        </div>

        <div class="flex gap-2">
            @if($match->status !== 'live')
                <button wire:click="startLive"
                    class="px-4 py-2 bg-green-600 text-white rounded-lg">
                    ▶ Start Live
                </button>
            @else
                <span class="px-3 py-1 rounded bg-red-100 text-red-600 font-semibold">
                    ● LIVE
                </span>
            @endif
        </div>
    </div>

    {{-- SCORE --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 bg-white p-6 rounded-xl shadow">
        <div>
            <label class="text-sm text-gray-600">Menit</label>
            <input type="number" wire:model="minute"
                class="w-full border rounded-lg p-2">
        </div>

        <div>
            <label class="text-sm text-gray-600">Home Score</label>
            <input type="number" wire:model="match.home_score"
                class="w-full border rounded-lg p-2">
        </div>

        <div>
            <label class="text-sm text-gray-600">Away Score</label>
            <input type="number" wire:model="match.away_score"
                class="w-full border rounded-lg p-2">
        </div>

        <div class="md:col-span-3">
            <button wire:click="updateMinute"
                class="px-4 py-2 bg-indigo-600 text-white rounded-lg">
                💾 Simpan Menit
            </button>
        </div>
    </div>

    {{-- ADD EVENT --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 bg-white p-6 rounded-xl shadow">
        <div>
            <label class="text-sm">Tipe</label>
            <select wire:model="event_type" class="w-full border rounded p-2">
                <option value="goal">⚽ Goal</option>
                <option value="yellow">🟨 Kartu Kuning</option>
                <option value="red">🟥 Kartu Merah</option>
                <option value="substitution">🔁 Pergantian</option>
                <option value="info">ℹ Info</option>
            </select>
        </div>

        <div>
            <label class="text-sm">Tim</label>
            <select wire:model="team_side" class="w-full border rounded p-2">
                <option value="home">Home</option>
                <option value="away">Away</option>
            </select>
        </div>

        <div>
            <label class="text-sm">Pemain</label>
            <input wire:model="player_name"
                class="w-full border rounded p-2"
                placeholder="Nama pemain">
        </div>

        <div>
            <label class="text-sm">Deskripsi</label>
            <input wire:model="description"
                class="w-full border rounded p-2"
                placeholder="Keterangan singkat">
        </div>

        <div class="md:col-span-4">
            <button wire:click="addEvent"
                class="w-full px-4 py-2 bg-rose-600 text-white rounded-lg">
                ➕ Tambah Event
            </button>
        </div>
    </div>

    {{-- EVENT LIST --}}
    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="font-semibold mb-3">Daftar Event</h2>

        <div class="space-y-2">
            @forelse($events as $event)
                <div class="flex justify-between items-center border p-3 rounded">
                    <div>
                        <strong>{{ $event->minute }}'</strong>
                        @if($event->type === 'goal') ⚽ @endif
                        @if($event->type === 'yellow') 🟨 @endif
                        @if($event->type === 'red') 🟥 @endif
                        {{ $event->player_name }} — {{ $event->description }}
                    </div>
                </div>
            @empty
                <p class="text-gray-500">Belum ada event.</p>
            @endforelse
        </div>
    </div>

</div>
