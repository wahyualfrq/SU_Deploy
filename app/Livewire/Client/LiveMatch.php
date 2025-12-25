<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\MatchGame;

class LiveMatch extends Component
{
    public function render()
    {
        $match = MatchGame::with([
            'homeClub',
            'awayClub',
            'events' => fn($q) => $q->latest()
        ])
            ->where('status', 'live')
            ->first();

        return view('livewire.client.live-match', [
            'match' => $match
        ]);
    }
}
