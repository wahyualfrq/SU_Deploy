<?php

namespace App\Livewire\Admin\News;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\News;
use Illuminate\Support\Str;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class Edit extends Component
{
    use WithFileUploads;

    public News $news;

    public $title;
    public $image;
    public $content;
    public $published_at;
    public $is_visible = true;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'content' => 'required|string|min:20',
            'published_at' => 'nullable|date',
            'is_visible' => 'boolean',
        ];
    }

    public function mount(News $news)
    {
        $this->news = $news;

        $this->title = $news->title;
        $this->content = $news->content;
        $this->published_at = optional($news->published_at)->format('Y-m-d\TH:i');
        $this->is_visible = $news->is_visible;
    }

    public function update()
    {
        $this->validate();

        $imagePath = $this->news->image_path;
        $publicId  = $this->news->image_public_id;

        if ($this->image) {

            if ($publicId) {
                Cloudinary::destroy($publicId);
            }

            $upload = Cloudinary::upload(
                $this->image->getRealPath(),
                ['folder' => 'news']
            );

            $imagePath = $upload->getSecurePath();
            $publicId  = $upload->getPublicId();
        }

        $this->news->update([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'author' => auth()->user()->name,
            'image_path' => $imagePath,
            'image_public_id' => $publicId,
            'content' => $this->content,
            'published_at' => $this->published_at,
            'is_visible' => $this->is_visible,
        ]);

        return redirect()
            ->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui');
    }

    public function render()
    {
        return view('livewire.admin.news.edit')
            ->layout('admin.layouts.app')
            ->title('Edit Berita');
    }
}
