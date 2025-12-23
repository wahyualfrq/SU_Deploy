<?php

namespace App\Livewire\Client\Gallery;

use Livewire\Component;
use App\Models\Gallery;

class Show extends Component
{
    public Gallery $gallery;

    public function mount(Gallery $gallery)
    {
        $this->gallery = $gallery;
    }

    public function render()
    {
        return view('livewire.client.gallery.show')
            ->layout('client.layouts.app');
    }
}
