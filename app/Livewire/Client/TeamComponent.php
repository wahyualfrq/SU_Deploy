<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Player;

class TeamComponent extends Component
{
    public $all_players;

    public function mount()
    {
        $this->all_players = Player::all();
    }

    public function render()
    {
        return view('livewire.client.team-component')
        ->layout('client.layouts.app');
    }
}
