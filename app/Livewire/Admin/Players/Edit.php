<?php

namespace App\Livewire\Admin\Players;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Player;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public Player $player;

    // 🔥 FLAT PROPERTIES (INI KUNCI)
    public $name;
    public $position;
    public $category;
    public $number;
    public $age;
    public $country;

    public $photo;

    public function mount(Player $player)
    {
        $this->player = $player;

        // INISIALISASI DATA
        $this->name = $player->name;
        $this->position = $player->position;
        $this->category = $player->category;
        $this->number = $player->number;
        $this->age = $player->age;
        $this->country = $player->country;
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:50',
            'category' => 'nullable|string|max:100',
            'number' => 'nullable|integer|min:1|max:99',
            'age' => 'nullable|integer|min:15|max:50',
            'country' => 'nullable|string|max:100',
            'photo' => 'nullable|image|max:2048',
        ];
    }

    public function update()
    {
        $this->validate();

        // 🔥 UPDATE DATA UTAMA
        Player::where('id', $this->player->id)->update([
            'name' => $this->name,
            'position' => $this->position,
            'category' => $this->category,
            'number' => $this->number,
            'age' => $this->age,
            'country' => $this->country,
        ]);

        // FOTO BARU
        if ($this->photo) {

            if (
                $this->player->photo_url &&
                !str_starts_with($this->player->photo_url, 'http')
            ) {
                Storage::disk('public')->delete($this->player->photo_url);
            }

            Player::where('id', $this->player->id)->update([
                'photo_url' => $this->photo->store('players', 'public')
            ]);
        }

        session()->flash('success', 'Data pemain berhasil diperbarui.');
        return redirect()->route('admin.players.index');
    }

    public function render()
    {
        return view('livewire.admin.players.edit')
            ->layout('admin.layouts.app')
            ->title('Edit Pemain');
    }
}