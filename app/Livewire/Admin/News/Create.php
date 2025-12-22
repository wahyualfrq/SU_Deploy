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
    public $author;
    public $image;
    public $content;
    public $published_at;
    public $is_visible = true;

    protected function rules()
    {
        return [
            'title'        => 'required|string|max:255',
            'author'       => 'nullable|string|max:100',
            'image'        => 'required|image|max:2048',
            'content'      => 'required|string|min:20',
            'published_at' => 'nullable|date',
            'is_visible'   => 'boolean',
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
        $this->validate();

        $imagePath = $this->image->store('news', 'public');

        News::create([
            'title'        => $this->title,
            'slug'         => Str::slug($this->title),
            'author'       => $this->author,
            'image_path'   => $imagePath,
            'content'      => $this->content,
            'published_at' => $this->published_at ?? now(),
            'is_visible'   => $this->is_visible,
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
