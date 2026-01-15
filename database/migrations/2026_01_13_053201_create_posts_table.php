<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            
            // RELASI (FOREIGN KEYS)
            // Menghubungkan ke tabel categories. Jika kategori dihapus, berita ikut terhapus (cascade)
            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'posts_category_id'
            );
            
            // Menghubungkan ke tabel users (penulis). Jika user dihapus, berita ikut terhapus
            $table->foreignId('user_id')->constrained(
                table: 'users',
                indexName: 'posts_user_id'
            );
            
            // DATA BERITA
            $table->string('title'); // Judul
            $table->string('slug')->unique(); // URL unik
            $table->string('image')->nullable(); // Foto (boleh kosong)
            $table->text('excerpt'); // Kutipan singkat
            $table->longText('body'); // Isi lengkap
            $table->enum('status', ['published', 'draft'])->default('draft'); // Status tayang
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};