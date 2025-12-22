<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\News;
use Carbon\Carbon;

class HomeComponent extends Component
{
    public $nextMatch;
    public $upcomingMatches;
    public $latestNews;

    public $countdown = [
        'days' => 0,
        'hours' => 0,
        'minutes' => 0,
    ];

    public function render()
    {
        $now = now('Asia/Jakarta');

        /**
         * ===========================
         * NEXT MATCH (HERO)
         * ===========================
         */
        $this->nextMatch = Ticket::query()
            ->where('is_active', true)
            ->where('match_date', '>=', $now)
            ->orderBy('match_date', 'asc')
            ->orderBy('id', 'asc')
            ->first();

        $this->countdown = ['days' => 0, 'hours' => 0, 'minutes' => 0];

        if ($this->nextMatch) {
            $diff = $now->diff(Carbon::parse($this->nextMatch->match_date));

            $this->countdown = [
                'days' => $diff->days,
                'hours' => $diff->h,
                'minutes' => $diff->i,
            ];
        }

        /**
         * ===========================
         * UPCOMING MATCHES (KANAN)
         * ===========================
         */
        $this->upcomingMatches = Ticket::where('is_active', true)
            ->where('match_date', '>=', $now)
            ->orderByRaw("CASE sales_status WHEN 'available' THEN 0 ELSE 1 END")
            ->orderBy('match_date')
            ->limit(2)
            ->get();

        /**
         * ===========================
         * BERITA TERBARU (HOME)
         * ===========================
         */
        $this->latestNews = News::where('is_visible', true)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return view('livewire.client.home-component')
            ->layout('client.layouts.app');
    }
}
