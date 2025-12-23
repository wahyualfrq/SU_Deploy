<?php

namespace App\Livewire\Admin\News;

use Livewire\Component;
use App\Models\News;

class Index extends Component
{
    public function delete($id)
    {
        News::findOrFail($id)->delete();
    }
    public function render()
    {
        return view('livewire.client.gallery.index', [
            'galleries' => Gallery::where('is_visible', true)
                ->withCount('photos')
                ->latest()
                ->get()
        ])->layout('admin.layouts.app')
            ->title('Manajemen Berita');
    }

}
