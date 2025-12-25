<div class="p-6 space-y-6" wire:poll.5s>

    {{-- TITLE --}}
    <h1 class="text-3xl font-bold text-center text-rose-600">
        🔴 Pertandingan Live
    </h1>

    {{-- NO LIVE MATCH --}}
    @if(!$match)
        <div class="bg-white p-6 rounded-xl shadow text-center text-gray-500">
            Tidak ada pertandingan yang sedang berlangsung.
        </div>
    @else

        {{-- SCOREBOARD --}}
        <div class="bg-white p-6 rounded-2xl shadow">
            <div class="flex items-center justify-between">

                {{-- HOME --}}
                <div class="text-center w-1/3">
                    <img src="{{ $match->homeClub->logo_url ?? asset('images/club-placeholder.png') }}"
                        class="h-16 mx-auto mb-2" alt="{{ $match->homeClub->name }}">
                    <div class="font-bold">{{ $match->homeClub->name }}</div>
                    <div class="text-xs text-gray-500">(Kandang)</div>
                </div>

                {{-- SCORE --}}
                <div class="text-center w-1/3">
                    <div class="text-5xl font-extrabold text-rose-600">
                        {{ $match->home_score }} - {{ $match->away_score }}
                    </div>

                    <div
                        class="mt-3 inline-flex items-center gap-2 px-4 py-1 bg-green-600 text-white rounded-full text-sm font-semibold animate-pulse">
                        ● Menit {{ $match->current_minute }}'
                    </div>
                </div>

                {{-- AWAY --}}
                <div class="text-center w-1/3">
                    <img src="{{ $match->awayClub->logo_url ?? asset('images/club-placeholder.png') }}"
                        class="h-16 mx-auto mb-2" alt="{{ $match->awayClub->name }}">
                    <div class="font-bold">{{ $match->awayClub->name }}</div>
                    <div class="text-xs text-gray-500">(Tandang)</div>
                </div>

            </div>
        </div>

        {{-- LIVE EVENTS --}}
        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="font-semibold mb-4 flex items-center gap-2">
                📢 Komentar Langsung
            </h2>

            <div class="space-y-3 max-h-80 overflow-y-auto pr-2">
                @forelse($match->events->sortByDesc('minute') as $event)
                    <div class="flex gap-3 items-start border-l-4 pl-3
                            @if($event->type === 'goal') border-rose-600
                            @elseif($event->type === 'yellow') border-yellow-400
                            @elseif($event->type === 'red') border-red-700
                            @else border-gray-300
                            @endif
                        ">
                        <div class="font-bold text-rose-600 w-10">
                            {{ $event->minute }}'
                        </div>

                        <div class="text-sm">
                            <div class="font-semibold">
                                @if($event->type === 'goal') ⚽ @endif
                                @if($event->type === 'yellow') 🟨 @endif
                                @if($event->type === 'red') 🟥 @endif
                                @if($event->type === 'substitution') 🔁 @endif
                                @if($event->type === 'info') ℹ @endif
                                {{ $event->player_name }}
                            </div>

                            @if($event->description)
                                <div class="text-gray-600">
                                    {{ $event->description }}
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm">Belum ada komentar.</p>
                @endforelse
            </div>
        </div>

    @endif
</div>