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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // 1. RELASI KATEGORI
            // Kita sederhanakan penulisan foreign key-nya
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            
            // 2. DATA BERITA (Sesuai Form Input Kita)
            $table->string('image')->nullable();    // Foto
            $table->string('title');                // Judul
            $table->text('content');                // Isi Berita (INI YANG TADI ERROR, sekarang sudah bernama 'content')

            // $table->string('slug');
            // $table->string("excerpt");
            // $table->string('status');

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