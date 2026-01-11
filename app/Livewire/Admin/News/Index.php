<?php

namespace App\Livewire\Admin\News;

use Livewire\Component;
use App\Models\News;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class Index extends Component
{
    public function delete($id)
    {
        $news = News::findOrFail($id);

        if ($news->image_public_id) {
            Cloudinary::destroy($news->image_public_id);
        }

        $news->delete();

        session()->flash('success', 'Berita berhasil dihapus');
    }

    public function render()
    {
        return view('livewire.admin.news.index', [
            'news' => News::latest()->get()
        ])->layout('admin.layouts.app')
          ->title('Manajemen Berita');
    }
}
