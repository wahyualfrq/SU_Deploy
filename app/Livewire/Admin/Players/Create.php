<?php

namespace App\Livewire\Admin\Players;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Player;

class Create extends Component
{
    use WithFileUploads;

    public string $name = '';
    public string $position = '';
    public string $category = '';
    public ?int $number = null;
    public ?int $age = null;
    public string $country = '';

    public $photo; // FILE UPLOAD

    protected function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:100',
            'category' => 'nullable|string|max:100',
            'number' => 'nullable|integer|min:1|max:99',
            'age' => 'nullable|integer|min:15|max:50',
            'country' => 'nullable|string|max:100',
            'photo' => 'nullable|image|max:2048',
        ];
    }

    public function save()
    {
        $data = $this->validate();

        if ($this->photo) {
            $data['photo_url'] = $this->photo->store('players', 'public');
        }

        unset($data['photo']); // WAJIB

        Player::create($data);

        // NOTIF
        session()->flash('success', 'Pemain berhasil ditambahkan');

        // REDIRECT
        return redirect()->route('admin.players.index');
    }


    public function render()
    {
        return view('livewire.admin.players.create')
            ->layout('admin.layouts.app')
            ->title('Tambah Pemain');
    }
}
