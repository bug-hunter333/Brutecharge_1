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
        Schema::create('all_energy_boosters', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Name of the booster
            $table->text('description')->nullable(); // Optional description
            $table->decimal('price', 8, 2); // Price with 2 decimal points
            $table->string('image_url')->nullable(); // Optional image URL
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_energy_boosters');
    }
};
