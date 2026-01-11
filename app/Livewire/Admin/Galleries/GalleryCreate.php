<?php

namespace App\Livewire\Admin\Galleries;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Gallery;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class GalleryCreate extends Component
{
    use WithFileUploads;

    public $title;
    public $cover_image;
    public $is_visible = true;

    protected $rules = [
        'title' => 'required|string|max:255',
        'cover_image' => 'required|image|max:2048',
    ];

    public function save()
    {
        $this->validate();
        $upload = cloudinary()->uploadApi()->upload(
            $this->cover_image->getRealPath(),
            ['folder' => 'galleries']
        );

        Gallery::create([
            'title' => $this->title,
            'cover_image' => $upload['secure_url'],
            'cover_image_public_id' => $upload['public_id'],
            'is_visible' => $this->is_visible,
        ]);

        session()->flash('success', 'Galeri berhasil dibuat');

        return redirect()->route('admin.gallery.index');
    }

    public function render()
    {
        return view('livewire.admin.gallery.create')
            ->layout('admin.layouts.app');
    }
}
