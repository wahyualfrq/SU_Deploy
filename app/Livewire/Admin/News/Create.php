<?php

namespace App\Livewire\Admin\News;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\News;
use Illuminate\Support\Str;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $author;
    public $image;
    public $content;
    public $published_at;
    public $is_visible = true;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:100',
            'image' => 'required|image|max:2048',
            'content' => 'required|string|min:20',
            'published_at' => 'nullable|date',
            'is_visible' => 'boolean',
        ];
    }

    /**
     * 🔥 INIT DEFAULT VALUE
     */
    public function mount()
    {
        // default author = user login
        $this->author = auth()->user()->name ?? 'Admin';

        // default publish = sekarang
        $this->published_at = now()->format('Y-m-d\TH:i');
    }

    /**
     * 💾 SIMPAN BERITA
     */
    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'content' => 'required|string|min:20',
            'published_at' => 'nullable|date',
            'is_visible' => 'boolean',
        ]);

        $upload = Cloudinary::upload(
            $this->image->getRealPath(),
            ['folder' => 'news']
        );

        News::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'author' => auth()->user()->name,
            'image_path' => $upload->getSecurePath(),
            'image_public_id' => $upload->getPublicId(),
            'content' => $this->content,
            'published_at' => $this->published_at,
            'is_visible' => $this->is_visible,
        ]);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    public function render()
    {
        return view('livewire.admin.news.create')
            ->layout('admin.layouts.app')
            ->title('Tambah Berita');
    }
}
