<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();

            $table->foreignId('home_club_id')
                ->constrained('clubs')
                ->cascadeOnDelete();

            $table->foreignId('away_club_id')
                ->constrained('clubs')
                ->cascadeOnDelete();

            $table->dateTime('match_date');
            $table->string('stadium')->nullable();

            // 🔴 STATUS MATCH
            $table->enum('status', [
                'scheduled', // belum mulai
                'live',      // sedang berlangsung
                'finished',  // selesai
                'cancelled'  // dibatalkan
            ])->default('scheduled');

            // 🔥 LIVE MATCH FIELDS
            $table->unsignedSmallInteger('current_minute')
                ->default(0)
                ->comment('Menit pertandingan');

            $table->unsignedSmallInteger('home_score')
                ->default(0)
                ->comment('Skor tuan rumah');

            $table->unsignedSmallInteger('away_score')
                ->default(0)
                ->comment('Skor tim tamu');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
