<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class YouTubeService
{
    public function fetchLatestVideos(int $maxResults = 6): array
    {
        $response = Http::withOptions([
            // 🔥 SOLUSI SSL WINDOWS (DEV ONLY)
            'verify' => false,
        ])->get('https://www.googleapis.com/youtube/v3/search', [
            'key'        => config('services.youtube.key'),
            'channelId'  => config('services.youtube.channel_id'),
            'part'       => 'snippet',
            'order'      => 'date',
            'type'       => 'video',
            'maxResults' => $maxResults,
        ]);

        if (!$response->successful()) {
            return [];
        }

        return collect($response->json('items'))->map(function ($item) {
            return [
                'youtube_id'  => $item['id']['videoId'],
                'title'       => $item['snippet']['title'],
                'thumbnail'   => $item['snippet']['thumbnails']['high']['url'],
                'published_at'=> $item['snippet']['publishedAt'],
                'youtube_url' => 'https://www.youtube.com/watch?v=' . $item['id']['videoId'],
            ];
        })->toArray();
    }
}
