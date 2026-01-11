<?php

namespace App\Livewire\Admin\Galleries;

use Livewire\Component;
use App\Models\Gallery;

class GalleryIndex extends Component
{
    public function delete($id)
    {
        Gallery::findOrFail($id)->delete();

        session()->flash('success', 'Galeri berhasil dihapus');
    }

    public function render()
    {
        return view('livewire.admin.gallery.index', [
            'galleries' => Gallery::latest()->get()
        ])->layout('admin.layouts.app');
    }
}
