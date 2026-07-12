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
    Schema::create('routes', function (Blueprint $table) {
        $table->id();
        
        // Info Dasar
        $table->string('name'); // Nama Rute (misal: Sembalun)
        $table->string('slug')->unique(); // URL friendly
        
        // Data Teknis
        $table->string('difficulty'); // Easy, Moderate, Hard, Extreme
        $table->string('duration'); // misal: "3 Hari 2 Malam"
        $table->integer('elevation_gain')->nullable(); // Ketinggian (meter)
        $table->string('start_point')->nullable(); // Titik awal (misal: Pos 1 Sembalun)
        
        // Media & Konten
        $table->string('image')->nullable(); // Foto jalur
        $table->longText('description')->nullable(); // Deskripsi lengkap
        
        // Status
        $table->boolean('is_active')->default(true); // Rute dibuka/tutup
        $table->boolean('is_featured')->default(false); // Tampil di homepage
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
