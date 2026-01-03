<?php

namespace App\Livewire\Admin\Players;

use Livewire\Component;
use App\Models\Player;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.players.index', [
            'players' => Player::orderBy('name')->get()
        ])->layout('admin.layouts.app')
            ->title('Manajemen Tim');
    }

    public function delete($id)
    {
        Player::findOrFail($id)->delete();

        session()->flash('success', 'Pemain berhasil dihapus.');
    }
}
