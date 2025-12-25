<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Video;

class HomeComponent extends Component
{
    public $nextMatch;
    public $upcomingMatches;
    public $latestNews;
    public $galleries;
    public $videos;

    public $countdown = [
        'days' => 0,
        'hours' => 0,
        'minutes' => 0,
    ];

    public function render()
    {
        $now = now('Asia/Jakarta');

        /* =========================
         * GALERI
         * ========================= */
        $this->galleries = Gallery::where('is_visible', true)
            ->latest()
            ->limit(4)
            ->get();

        /* =========================
         * VIDEO
         * ========================= */
        $this->videos = Video::where('is_visible', true)
            ->latest('published_at')
            ->limit(3)
            ->get();

        /* =========================
         * NEXT MATCH (HERO CARD)
         * ========================= */
        $this->nextMatch = Ticket::query()
            ->join('matches', 'matches.id', '=', 'tickets.match_id')
            ->join('clubs as home_club', 'home_club.id', '=', 'matches.home_club_id')
            ->join('clubs as away_club', 'away_club.id', '=', 'matches.away_club_id')
            ->where('tickets.is_active', true)
            ->where('matches.match_date', '>=', $now)
            ->orderByRaw("
                CASE
                    WHEN tickets.sales_status = 'available' THEN 0
                    ELSE 1
                END
            ")
            ->orderBy('matches.match_date', 'asc')
            ->select([
                'tickets.*',
                'matches.match_date',
                'matches.stadium',
                'home_club.name as home_team',
                'away_club.name as away_team',
            ])
            ->first();

        /* =========================
         * COUNTDOWN
         * ========================= */
        $this->countdown = ['days' => 0, 'hours' => 0, 'minutes' => 0];

        if ($this->nextMatch?->match_date) {
            $diff = $now->diff($this->nextMatch->match_date);

            $this->countdown = [
                'days' => $diff->days,
                'hours' => $diff->h,
                'minutes' => $diff->i,
            ];
        }

        /* =========================
         * UPCOMING MATCHES (KANAN)
         * ========================= */
        $this->upcomingMatches = Ticket::query()
            ->join('matches', 'matches.id', '=', 'tickets.match_id')
            ->join('clubs as home_club', 'home_club.id', '=', 'matches.home_club_id')
            ->join('clubs as away_club', 'away_club.id', '=', 'matches.away_club_id')
            ->whereDate('matches.match_date', '>=', now()->toDateString())
            ->orderByRaw("
                CASE
                    WHEN tickets.sales_status = 'available' THEN 0
                    WHEN tickets.sales_status = 'upcoming' THEN 1
                    ELSE 2
                END
            ")
            ->orderBy('matches.match_date', 'asc')
            ->select([
                'tickets.id',
                'tickets.sales_status',
                'matches.match_date',
                'matches.stadium',
                'home_club.name as home_team',
                'away_club.name as away_team',
            ])
            ->limit(3)
            ->get();

        /* =========================
         * BERITA
         * ========================= */
        $this->latestNews = News::where('is_visible', true)
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('livewire.client.home-component')
            ->layout('client.layouts.app');
    }
}
