<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('match_events', function (Blueprint $table) {
            $table->id();

            $table->foreignId('match_id')->constrained('matches')->cascadeOnDelete();

            $table->unsignedSmallInteger('minute');
            $table->enum('type', ['goal', 'yellow', 'red', 'substitution', 'info']);
            $table->enum('team_side', ['home', 'away'])->nullable();

            $table->string('player_name')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('match_events');
    }
};
