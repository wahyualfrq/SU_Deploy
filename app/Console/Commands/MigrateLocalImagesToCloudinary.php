<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\File;
use App\Models\Gallery;
use App\Models\Player;
use App\Models\News;

class MigrateLocalImagesToCloudinary extends Command
{
    protected $signature = 'images:migrate';
    protected $description = 'Migrate local images in public/images to Cloudinary';

    public function handle()
    {
        $basePath = public_path('images');

        if (!File::exists($basePath)) {
            $this->error('Folder public/images tidak ditemukan');
            return;
        }

        $files = File::files($basePath);

        foreach ($files as $file) {

            $filename = $file->getFilename();
            $extension = $file->getExtension();
            $fullPath = $file->getRealPath();

            $base64 = base64_encode(file_get_contents($fullPath));
            $dataUri = 'data:image/'.$extension.';base64,'.$base64;

            $upload = Cloudinary::upload($dataUri, [
                'folder' => 'sumsel-united'
            ]);

            $url = $upload->getSecurePath();

            if ($filename === 'team.JPG') {
                file_put_contents(
                    base_path('.env'),
                    PHP_EOL.'HERO_IMAGE='.$url,
                    FILE_APPEND
                );
            }

            if ($filename === 'blankprofile.png') {
                Player::whereNull('photo_url')->update([
                    'photo_url' => $url
                ]);
            }

            if ($filename === 'stadion_sriwijaya.jpg') {
                Gallery::whereNull('cover_image')->update([
                    'cover_image' => $url
                ]);
            }

            if ($filename === 'favicon.png') {
                News::whereNull('image_path')->update([
                    'image_path' => $url
                ]);
            }

            $this->info('Uploaded: '.$filename);
        }

        $this->info('Migrasi selesai');
    }
}
