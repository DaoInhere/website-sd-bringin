<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('title');    // Nama Acara (misal: HUT RI ke-79)
            $table->string('name');     // Nama Lomba (misal: Lomba Makan Kerupuk)
            $table->string('category'); // Kategori (Olahraga/Akademik)
            $table->string('level');    // Tingkat (Daerah/Nasional)
            $table->string('position'); // Juara 1/2/3
            $table->string('award')->nullable(); // Sertifikat/Piala
            $table->date('date');
            
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('achievements');
    }
};