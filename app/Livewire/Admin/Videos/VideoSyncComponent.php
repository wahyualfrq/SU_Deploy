<?php
namespace App\Livewire\Admin\Videos;

use Livewire\Component;
use App\Models\Video;
use Illuminate\Support\Facades\Artisan;

class VideoSyncComponent extends Component
{
    public function sync()
    {
        Artisan::call('youtube:sync');
        session()->flash('success', 'Video berhasil disinkronkan dari YouTube');
    }

    public function toggle($id)
    {
        $video = Video::findOrFail($id);
        $video->update(['is_visible' => ! $video->is_visible]);
    }

    public function render()
    {
        return view('livewire.admin.videos.index', [
            'videos' => Video::orderByDesc('published_at')->get()
        ])->layout('admin.layouts.app')
          ->title('Video YouTube');
    }
}
