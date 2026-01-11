<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\File;
use App\Models\Gallery;
use App\Models\Player;
use App\Models\Setting;

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
            $fullPath = $file->getRealPath();

            $this->info("Uploading: {$filename}");

            try {

                $upload = Cloudinary::uploadApi()->upload($fullPath, [
                    'folder' => 'sumsel-united'
                ]);

                $url = $upload['secure_url'] ?? null;

                if (!$url) {
                    $this->error("No URL returned for {$filename}");
                    continue;
                }

                // Mapping ke sistem kamu
                if ($filename === 'team.JPG') {
                    file_put_contents(
                        base_path('.env'),
                        PHP_EOL . 'HERO_IMAGE=' . $url,
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
                    Setting::updateOrCreate(
                        ['key' => 'favicon'],
                        ['value' => $url]
                    );
                }

                $this->info("Uploaded: {$filename}");

            } catch (\Throwable $e) {

                $this->error("FAILED: {$filename}");
                $this->error($e->getMessage());
                continue;
            }
        }

        $this->info('Migrasi selesai');
    }
}
