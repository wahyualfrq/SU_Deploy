<?php

namespace App\Livewire\Admin\Matches;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MatchGame;

class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public string $status = 'all'; // all | scheduled | live | finished | cancelled

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => 'all'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function delete(int $id): void
    {
        MatchGame::findOrFail($id)->delete();

        session()->flash('success', 'Jadwal berhasil dihapus.');
        $this->resetPage();
    }

    public function render()
    {
        $matches = MatchGame::with(['homeClub', 'awayClub'])
            ->when($this->search, function ($q) {
                $s = trim($this->search);

                $q->whereHas('homeClub', function ($q) use ($s) {
                    $q->where('name', 'like', "%{$s}%");
                })
                    ->orWhereHas('awayClub', function ($q) use ($s) {
                        $q->where('name', 'like', "%{$s}%");
                    })
                    ->orWhere('stadium', 'like', "%{$s}%");
            })
            ->when($this->status !== 'all', function ($q) {
                $q->where('status', $this->status);
            })
            ->orderBy('match_date', 'desc')
            ->paginate(10);

        return view('livewire.admin.matches.index', compact('matches'))
            ->layout('admin.layouts.app')
            ->title('Manajemen Jadwal');
    }
}
