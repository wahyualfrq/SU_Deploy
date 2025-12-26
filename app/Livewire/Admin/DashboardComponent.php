<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\MatchGame;
use App\Models\Ticket;
use App\Models\News;
use App\Models\Video;

#[Layout('admin.layouts.app')]
class DashboardComponent extends Component
{
    public function render()
    {
        // 🔴 Ambil match LIVE
        $liveMatch = MatchGame::with(['homeClub', 'awayClub'])
            ->where('status', 'live')
            ->latest('match_date')
            ->first();

        return view('livewire.admin.dashboard-component', [
            'liveMatch'        => $liveMatch,
            'totalMatches'     => MatchGame::count(),
            'activeTickets'    => Ticket::where('is_active', true)->count(),
            'totalMedia'       => News::count() + Video::count(),
        ]);
    }
}