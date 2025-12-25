<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\MatchGame;

class UpcomingMatches extends Component
{
    public function render()
    {
        $matches = MatchGame::with(['homeClub', 'awayClub'])
            ->where('status', 'scheduled')
            ->orderBy('match_date')
            ->limit(4)
            ->get();

        return view('livewire.client.upcoming-matches', compact('matches'));
    }
}
