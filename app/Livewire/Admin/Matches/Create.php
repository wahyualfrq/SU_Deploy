<?php

namespace App\Livewire\Admin\Matches;

use Livewire\Component;
use App\Models\MatchGame;
use App\Models\Club;

class Create extends Component
{
    public $home_club_id;
    public $away_club_id;
    public $match_date;
    public $stadium;
    public $status = 'scheduled';

    public function save()
    {
        $this->validate([
            'home_club_id' => 'required|different:away_club_id',
            'away_club_id' => 'required',
            'match_date' => 'required|date',
            'stadium' => 'required|string|max:255',
            'status' => 'required|in:scheduled,live,finished,cancelled',
        ]);

        MatchGame::create([
            'home_club_id' => $this->home_club_id,
            'away_club_id' => $this->away_club_id,
            'match_date' => $this->match_date,
            'stadium' => $this->stadium,
            'status' => $this->status,
            'current_minute' => 0,
            'home_score' => 0,
            'away_score' => 0,
        ]);

        return redirect()
            ->route('admin.matches.index')
            ->with('success', 'Jadwal pertandingan berhasil ditambahkan');
    }

    public function render()
    {
        return view('livewire.admin.matches.create', [
            'clubs' => Club::where('is_active', true)
                ->orderBy('name')
                ->get()
        ])->layout('admin.layouts.app')
            ->title('Tambah Jadwal Pertandingan');
    }
}
