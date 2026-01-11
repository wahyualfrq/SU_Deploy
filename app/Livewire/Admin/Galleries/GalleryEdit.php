<?php

namespace App\Livewire\Admin\Galleries;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Gallery;

class GalleryEdit extends Component
{
    use WithFileUploads;

    public Gallery $gallery;
    public string $title;
    public $cover_image;

    protected $rules = [
        'title' => 'required|string|max:255',
        'cover_image' => 'nullable|image|max:2048',
    ];


    public function mount(Gallery $gallery)
    {
        $this->gallery = $gallery;
        $this->title = $gallery->title;
    }

    public function update()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
        ];

        if ($this->cover_image) {
            $upload = cloudinary()->uploadApi()->upload(
                $this->cover_image->getRealPath(),
                ['folder' => 'gallery/covers']
            );

            $data['cover_image'] = $upload['secure_url'];
        }

        $this->gallery->update($data);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Galeri berhasil diperbarui');
    }


    public function render()
    {
        return view('livewire.admin.gallery.edit')
            ->layout('admin.layouts.app');
    }
}
