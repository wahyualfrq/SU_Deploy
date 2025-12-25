<?php

namespace App\Livewire\Admin\Matches;

use Livewire\Component;
use App\Models\MatchGame;
use App\Models\MatchEvent;

class LiveControl extends Component
{
    public MatchGame $match;

    public $minute;
    public $home_score;
    public $away_score;

    public $event_type = 'goal';
    public $team_side = 'home';
    public $player_name;
    public $description;

    public function mount($matchId)
    {
        $this->match = MatchGame::findOrFail($matchId);

        $this->minute = $this->match->current_minute;
        $this->home_score = $this->match->home_score;
        $this->away_score = $this->match->away_score;
    }

    public function startLive()
    {
        MatchGame::where('status', 'live')->update(['status' => 'finished']);
        $this->match->update(['status' => 'live']);
    }

    public function updateMinute()
    {
        $this->validate([
            'minute' => 'required|integer|min:0',
            'home_score' => 'required|integer|min:0',
            'away_score' => 'required|integer|min:0',
        ]);

        $this->match->update([
            'current_minute' => $this->minute,
            'home_score' => $this->home_score,
            'away_score' => $this->away_score,
        ]);

        $this->match->refresh();
    }

    public function addEvent()
    {
        $this->validate([
            'minute' => 'required|integer|min:0',
            'event_type' => 'required|in:goal,yellow,red,substitution,info',
            'team_side' => 'required|in:home,away',
            'player_name' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:255',
        ]);

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

            // sync ke input
            $this->match->refresh();
            $this->home_score = $this->match->home_score;
            $this->away_score = $this->match->away_score;
        }

        $this->reset(['event_type', 'team_side', 'player_name', 'description']);
    }

    public function endLive()
    {
        $this->validate([
            'minute' => 'required|integer|min:0',
            'home_score' => 'required|integer|min:0',
            'away_score' => 'required|integer|min:0',
        ]);

        $this->match->update([
            'status' => 'finished',
            'current_minute' => $this->minute,
            'home_score' => $this->home_score,
            'away_score' => $this->away_score,
        ]);

        // refresh state
        $this->match->refresh();

        // optional flash message
        session()->flash('success', 'Pertandingan telah diakhiri');

        return redirect()->route('admin.matches.index')
            ->with('success', 'Pertandingan selesai dan tersimpan');
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
