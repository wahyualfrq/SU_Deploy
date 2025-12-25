<?php

namespace App\Livewire\Admin\Clubs;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Club;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $city;
    public $logo;

    protected $rules = [
        'name' => 'required|string|max:255',
        'city' => 'nullable|string|max:255',
        'logo' => 'nullable|image|max:2048',
    ];

    public function save()
    {
        $this->validate();

        $logoPath = null;
        if ($this->logo) {
            $logoPath = $this->logo->store('clubs', 'public');
        }

        Club::create([
            'name' => $this->name,
            'city' => $this->city,
            'logo' => $logoPath,
        ]);

        session()->flash('success', 'Klub berhasil ditambahkan');
        return redirect()->route('admin.clubs.index');
    }

    public function render()
    {
        return view('livewire.admin.clubs.create')
            ->layout('admin.layouts.app');
    }
}
