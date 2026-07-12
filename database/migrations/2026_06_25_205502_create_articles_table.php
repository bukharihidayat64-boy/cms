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
    Schema::create('articles', function (Blueprint $table) {
        $table->id();
        
        // Basic Info
        $table->string('title'); // Judul artikel
        $table->string('slug')->unique(); // URL friendly (untuk SEO)
        $table->text('excerpt')->nullable(); // Ringkasan singkat
        
        // Content
        $table->longText('content'); // Isi artikel lengkap
        
        // Media
        $table->string('image')->nullable(); // Thumbnail artikel
        $table->string('image_alt')->nullable(); // Alt text untuk aksesibilitas
        
        // Metadata
        $table->string('category')->default('general'); // Kategori: tips, news, guide, conservation
        $table->string('tags')->nullable(); // Tags dipisah koma: "safety,gear,weather"
        $table->boolean('is_featured')->default(false); // Tampil di homepage
        $table->boolean('is_published')->default(false); // Draft vs Published
        
        // Author & Stats
        $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
        $table->unsignedInteger('views')->default(0);
        
        // Timestamps
        $table->timestamp('published_at')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('articles');
}
};
