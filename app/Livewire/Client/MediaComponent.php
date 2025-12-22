<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\News;
use App\Models\Video;

class MediaComponent extends Component
{
    public function render()
    {
        return view('livewire.client.media-component', [
            'featured' => News::where('is_visible', true)
                ->orderByDesc('published_at')
                ->first(),

            'news' => News::where('is_visible', true)
                ->orderByDesc('published_at')
                ->skip(1)
                ->take(6)
                ->get(),

            'popular' => News::where('is_visible', true)
                ->orderByDesc('published_at')
                ->take(3)
                ->get(),

            'videos' => Video::where('is_visible', true)
                ->orderByDesc('published_at')
                ->take(6)
                ->get(),
        ])
            ->layout('client.layouts.app')   // ✅ INI WAJIB
            ->title('Media');
    }

}