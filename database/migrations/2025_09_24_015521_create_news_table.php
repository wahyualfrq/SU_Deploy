<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id(); // ID unik berita
            $table->string('title'); // Judul berita
            $table->text('content'); // Isi lengkap berita
            $table->string('image_path'); // gambar berita
            $table->string('slug')->unique();
            $table->dateTime('published_at'); // Tanggal dan waktu publikasi
            $table->string('author')->nullable(); // Nama penulis (opsional)
            $table->boolean('is_visible')->default(true); // Status tampil di frontend
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
