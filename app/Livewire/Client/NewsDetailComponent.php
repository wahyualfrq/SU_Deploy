<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\News;

class NewsDetailComponent extends Component
{
    public News $news;

    public function mount(News $news)
    {
        // otomatis resolve via slug
        $this->news = $news;
    }

    public function render()
    {
        $related = News::where('id', '!=', $this->news->id)
            ->where('is_visible', true)
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('livewire.client.news-detail-component', [
            'related' => $related
        ])->layout('client.layouts.app');
    }
}
