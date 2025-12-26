<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\YouTubeService;
use App\Models\Video;

class SyncYouTubeVideos extends Command
{
    protected $signature = 'youtube:sync';
    protected $description = 'Sync latest videos from YouTube channel';

    public function handle(YouTubeService $youtube)
    {
        $videos = $youtube->fetchLatestVideos(9);

        foreach ($videos as $video) {
            Video::updateOrCreate(
                ['youtube_id' => $video['youtube_id']],
                [
                    'title' => $video['title'],
                    'thumbnail' => $video['thumbnail'],
                    'youtube_url' => $video['youtube_url'],
                    'published_at' => $video['published_at'],
                    'is_visible' => true,
                ]
            );
        }

        $this->info('YouTube videos synced successfully.');
    }
}
