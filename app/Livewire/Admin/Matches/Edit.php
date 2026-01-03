<?php

namespace App\Livewire\Admin\Matches;

use Livewire\Component;
use App\Models\MatchModel;
use App\Models\Club;

class Edit extends Component
{
    public MatchModel $match;

    public $home_club_id;
    public $away_club_id;
    public $match_date;
    public $stadium;
    public $status = 'scheduled';

    public function mount(MatchModel $match)
    {
        $this->match = $match;

        $this->home_club_id = $match->home_club_id;
        $this->away_club_id = $match->away_club_id;
        $this->match_date  = optional($match->match_date)->format('Y-m-d\TH:i') ?? '';
        $this->stadium     = $match->stadium ?? '';
        $this->status      = $match->status ?? 'scheduled';
    }

    protected function rules(): array
    {
        return [
            'home_club_id' => 'required|different:away_club_id',
            'away_club_id' => 'required',
            'match_date'   => 'required|date',
            'stadium'      => 'required|string|max:255',
            'status'       => 'required|in:scheduled,live,finished,cancelled',
        ];
    }

    public function update()
    {
        $data = $this->validate();

        $this->match->update($data);

        session()->flash('success', 'Jadwal berhasil diupdate.');
        return redirect()->route('admin.matches.index');
    }

    public function render()
    {
        return view('livewire.admin.matches.edit', [
            'clubs' => Club::where('is_active', true)
                ->orderBy('name')
                ->get()
        ])->layout('admin.layouts.app')
          ->title('Edit Jadwal Pertandingan');
    }
}
