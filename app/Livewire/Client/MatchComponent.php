<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\MatchGame;
use App\Models\Club;

class MatchComponent extends Component
{
    public function render()
    {
        // Ambil klub utama (Sumsel United)
        $mainClub = Club::where('name', 'Sumsel United')->first();

        // 🔢 STATISTIK PERTANDINGAN
        $remainingMatches = MatchGame::where('status', 'scheduled')->count();

        $homeMatches = $mainClub
            ? MatchGame::where('status', 'scheduled')
                ->where('home_club_id', $mainClub->id)
                ->count()
            : 0;

        $awayMatches = $mainClub
            ? MatchGame::where('status', 'scheduled')
                ->where('away_club_id', $mainClub->id)
                ->count()
            : 0;

        return view('livewire.client.match-component', [

            // 🔴 LIVE MATCH
            'liveMatch' => MatchGame::with(['homeClub', 'awayClub', 'events'])
                ->where('status', 'live')
                ->latest('match_date')
                ->first(),

            // ⏳ UPCOMING
            'upcomingMatches' => MatchGame::with(['homeClub', 'awayClub'])
                ->where('status', 'scheduled')
                ->orderBy('match_date')
                ->take(4)
                ->get(),

            // ✅ FINISHED
            'finishedMatches' => MatchGame::with(['homeClub', 'awayClub', 'events'])
                ->where('status', 'finished')
                ->latest('match_date')
                ->take(4)
                ->get(),

            // 📊 QUICK STATS (INI YANG KAMU TANYA)
            'remainingMatches' => $remainingMatches,
            'homeMatches' => $homeMatches,
            'awayMatches' => $awayMatches,

        ])->layout('client.layouts.app');
    }
}
