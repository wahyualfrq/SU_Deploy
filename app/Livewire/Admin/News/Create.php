<?php

namespace App\Livewire\Admin\News;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\News;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $image;
    public $content;
    public $published_at;
    public $is_visible = true;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'content' => 'required|string|min:20',
            'published_at' => 'nullable|date',
            'is_visible' => 'boolean',
        ];
    }

    public function mount()
    {
        $this->published_at = now()->format('Y-m-d\TH:i');
    }

    public function save()
    {
        $this->validate();

        $upload = cloudinary()->uploadApi()->upload(
            $this->image->getRealPath(),
            [
                'folder' => 'news'
            ]
        );

        News::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'author' => auth()->user()->name,
            'image_path' => $upload['secure_url'],
            'image_public_id' => $upload['public_id'],
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
