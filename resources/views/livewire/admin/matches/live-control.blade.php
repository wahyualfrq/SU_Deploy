<div class="p-6 space-y-6">

   <div class="flex gap-2">
    @if($match->status === 'live')
        <button
            wire:click="endLive"
            wire:loading.attr="disabled"
            wire:target="endLive"
            class="px-4 py-2 bg-black text-white rounded-lg font-semibold flex items-center gap-2">

            <span wire:loading.remove wire:target="endLive">
                ⏹ Akhiri Pertandingan
            </span>

            <span wire:loading wire:target="endLive" class="flex items-center gap-2">
                <svg class="w-4 h-4 animate-spin" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="10" stroke="white" stroke-width="4" opacity="0.3"/>
                    <path d="M22 12a10 10 0 0 1-10 10" stroke="white" stroke-width="4"/>
                </svg>
                Menyimpan hasil...
            </span>
        </button>

        <span class="px-3 py-1 rounded bg-red-100 text-red-600 font-semibold">
            ● LIVE
        </span>

    @elseif($match->status === 'finished')
        <span class="px-3 py-1 rounded bg-green-100 text-green-700 font-semibold">
            ✔ SELESAI
        </span>
    @endif
</div>


    {{-- SCORE & TIME --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 bg-white p-6 rounded-xl shadow">
        <div>
            <label class="text-sm text-gray-600">Menit</label>
            <input type="number" wire:model="minute" min="0"
                class="w-full border rounded-lg p-2">
        </div>

        <div>
            <label class="text-sm text-gray-600">Home Score</label>
            <input type="number" wire:model="home_score" min="0"
                class="w-full border rounded-lg p-2">
        </div>

        <div>
            <label class="text-sm text-gray-600">Away Score</label>
            <input type="number" wire:model="away_score" min="0"
                class="w-full border rounded-lg p-2">
        </div>

        <div class="md:col-span-3">
            <button
                wire:click="updateMinute"
                wire:loading.attr="disabled"
                wire:target="updateMinute"
                class="px-4 py-2 bg-indigo-600 text-white rounded-lg font-semibold flex items-center gap-2">

                <span wire:loading.remove wire:target="updateMinute">
                    💾 Simpan Menit & Skor
                </span>

                <span wire:loading wire:target="updateMinute" class="flex items-center gap-2">
                    <svg class="w-4 h-4 animate-spin" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="10" stroke="white" stroke-width="4" opacity="0.3"/>
                        <path d="M22 12a10 10 0 0 1-10 10" stroke="white" stroke-width="4"/>
                    </svg>
                    Menyimpan...
                </span>
            </button>
        </div>
    </div>

    {{-- ADD EVENT --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 bg-white p-6 rounded-xl shadow">
        <div>
            <label class="text-sm">Tipe Event</label>
            <select wire:model="event_type" class="w-full border rounded p-2"
                @disabled($match->status !== 'live')>
                <option value="goal">⚽ Goal</option>
                <option value="yellow">🟨 Kartu Kuning</option>
                <option value="red">🟥 Kartu Merah</option>
                <option value="substitution">🔁 Pergantian</option>
                <option value="info">ℹ Info</option>
            </select>
        </div>

        <div>
            <label class="text-sm">Tim</label>
            <select wire:model="team_side" class="w-full border rounded p-2"
                @disabled($match->status !== 'live')>
                <option value="home">Home</option>
                <option value="away">Away</option>
            </select>
        </div>

        <div>
            <label class="text-sm">Pemain</label>
            <input wire:model="player_name"
                class="w-full border rounded p-2"
                placeholder="Nama pemain"
                @disabled($match->status !== 'live')>
        </div>

        <div>
            <label class="text-sm">Deskripsi</label>
            <input wire:model="description"
                class="w-full border rounded p-2"
                placeholder="Keterangan singkat"
                @disabled($match->status !== 'live')>
        </div>

        <div class="md:col-span-4">
            <button
                wire:click="addEvent"
                wire:loading.attr="disabled"
                wire:target="addEvent"
                @disabled($match->status !== 'live')
                class="w-full px-4 py-2 rounded-lg font-semibold flex justify-center gap-2
                {{ $match->status === 'live'
                    ? 'bg-rose-600 text-white hover:bg-rose-700'
                    : 'bg-gray-300 text-gray-600 cursor-not-allowed' }}">

                <span wire:loading.remove wire:target="addEvent">
                    ➕ Tambah Event
                </span>

                <span wire:loading wire:target="addEvent" class="flex items-center gap-2">
                    <svg class="w-4 h-4 animate-spin" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="10" stroke="white" stroke-width="4" opacity="0.3"/>
                        <path d="M22 12a10 10 0 0 1-10 10" stroke="white" stroke-width="4"/>
                    </svg>
                    Menambahkan...
                </span>
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
                        @if($event->type === 'substitution') 🔁 @endif
                        @if($event->type === 'info') ℹ @endif

                        {{ $event->player_name }}
                        @if($event->description)
                            — {{ $event->description }}
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-gray-500">Belum ada event.</p>
            @endforelse
        </div>
    </div>

</div>
