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
    Schema::create('partners', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('slug')->unique();
        $table->string('category'); // guide, porter, homestay, rental, transport
        $table->string('contact_wa')->nullable(); // Format: 628xxx
        $table->string('contact_email')->nullable();
        $table->text('description')->nullable();
        $table->string('pricing_info')->nullable(); // misal: "Rp 500.000/hari"
        $table->string('location_area')->nullable(); // misal: "Sembalun, Lombok Timur"
        $table->string('image')->nullable(); // Logo/Foto profil
        $table->boolean('is_active')->default(true);
        $table->boolean('is_featured')->default(false);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
