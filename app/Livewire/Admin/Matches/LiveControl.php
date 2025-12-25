<?php

namespace App\Livewire\Admin\Matches;

use Livewire\Component;
use App\Models\MatchGame;
use App\Models\MatchEvent;

class LiveControl extends Component
{
    public MatchGame $match;

    public $minute, $event_type, $team_side, $player_name, $description;

    public function mount($matchId)
    {
        $this->match = MatchGame::findOrFail($matchId);
        $this->minute = $this->match->current_minute;
    }

    public function startLive()
    {
        MatchGame::where('status', 'live')->update(['status' => 'finished']);
        $this->match->update(['status' => 'live']);
    }

    public function updateMinute()
    {
        $this->match->update(['current_minute' => $this->minute]);
    }

    public function addEvent()
    {
        MatchEvent::create([
            'match_id' => $this->match->id,
            'minute' => $this->minute,
            'type' => $this->event_type,
            'team_side' => $this->team_side,
            'player_name' => $this->player_name,
            'description' => $this->description,
        ]);

        if ($this->event_type === 'goal') {
            $this->team_side === 'home'
                ? $this->match->increment('home_score')
                : $this->match->increment('away_score');
        }

        $this->reset(['event_type', 'team_side', 'player_name', 'description']);
    }

    public function render()
    {
        return view('livewire.admin.matches.live-control', [
            'events' => $this->match->events()->latest()->get(),
        ])
            ->layout('admin.layouts.app')
            ->title('Live Match Control');
    }

}
