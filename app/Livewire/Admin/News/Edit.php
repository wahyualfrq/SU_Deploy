<?php

namespace App\Livewire\Admin\News;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public News $news;

    public $title;
    public $author;
    public $image;          // gambar BARU (opsional)
    public $content;
    public $published_at;
    public $is_visible = true;
    public $oldImage;       // simpan gambar lama

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'author' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:2048', // 👈 TIDAK WAJIB
            'content' => 'required|string',
            'published_at' => 'required|date',
            'is_visible' => 'boolean',
        ];
    }

    /**
     * 🔥 INIT DATA DARI DATABASE
     */
    public function mount(News $news)
    {
        $this->news = $news;

        $this->title = $news->title;
        $this->author = $news->author;
        $this->content = $news->content;
        $this->published_at = $news->published_at;
        $this->is_visible = $news->is_visible;
        $this->oldImage = $news->image_path;
    }

    public function update()
    {
        $this->validate();

        // jika upload gambar baru
        if ($this->image) {
            // hapus gambar lama
            if ($this->oldImage && Storage::disk('public')->exists($this->oldImage)) {
                Storage::disk('public')->delete($this->oldImage);
            }

            $imagePath = $this->image->store('news', 'public');
        } else {
            $imagePath = $this->oldImage;
        }

        $this->news->update([
            'title' => $this->title,
            'author' => $this->author,
            'image_path' => $imagePath,
            'content' => $this->content,
            'published_at' => $this->published_at,
            'is_visible' => $this->is_visible,
        ]);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui');
    }

    public function render()
    {
        return view('livewire.admin.news.edit')
            ->layout('admin.layouts.app')
            ->title('Edit Berita');
    }
}
