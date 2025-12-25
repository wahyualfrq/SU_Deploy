<div class="p-6" wire:poll.5s>

    <h1 class="text-3xl font-bold mb-6 text-center">
        🔴 Live Match
    </h1>

    @if(!$match)
        <div class="bg-white p-6 rounded-xl shadow text-center text-gray-500">
            Tidak ada pertandingan yang sedang berlangsung.
        </div>
        @return
    @endif

    {{-- SCOREBOARD --}}
    <div class="bg-white p-6 rounded-xl shadow mb-6">
        <div class="flex items-center justify-between">

            <div class="text-center">
                <img src="{{ $match->homeClub->logo ?? '' }}"
                     class="h-16 mx-auto mb-2">
                <div class="font-bold">{{ $match->homeClub->name }}</div>
            </div>

            <div class="text-center">
                <div class="text-5xl font-extrabold text-rose-600">
                    {{ $match->home_score }} - {{ $match->away_score }}
                </div>
                <div class="mt-2 inline-block px-3 py-1 bg-green-600 text-white rounded-full">
                    {{ $match->current_minute }}'
                </div>
            </div>

            <div class="text-center">
                <img src="{{ $match->awayClub->logo ?? '' }}"
                     class="h-16 mx-auto mb-2">
                <div class="font-bold">{{ $match->awayClub->name }}</div>
            </div>

        </div>
    </div>

    {{-- LIVE EVENTS --}}
    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="font-semibold mb-4">📢 Komentar Langsung</h2>

        <div class="space-y-3">
            @forelse($match->events->sortByDesc('minute') as $event)
                <div class="flex gap-3">
                    <div class="font-bold text-rose-600">
                        {{ $event->minute }}'
                    </div>
                    <div>
                        @if($event->type === 'goal') ⚽ @endif
                        @if($event->type === 'yellow') 🟨 @endif
                        @if($event->type === 'red') 🟥 @endif
                        <strong>{{ $event->player_name }}</strong>
                        {{ $event->description }}
                    </div>
                </div>
            @empty
                <p class="text-gray-500">Belum ada komentar.</p>
            @endforelse
        </div>
    </div>

</div>
