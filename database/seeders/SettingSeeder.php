<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::updateOrCreate(
            ['key' => 'hero_image'],
            ['value' => 'https://res.cloudinary.com/ddlgu8xrc/image/upload/v1768129454/sumsel-united/qfgf4xol6irt1wz68vmu.jpg']
        );
        Setting::updateOrCreate(
            ['key' => 'favicon'],
            ['value' => 'https://res.cloudinary.com/ddlgu8xrc/image/upload/v1768129445/sumsel-united/zqouyjrab6f0mqigals2.png']
        );
    }
}
