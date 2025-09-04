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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->string('session_id'); // For guest users
            $table->unsignedBigInteger('user_id')->nullable(); // For logged in users
            $table->unsignedBigInteger('product_id'); // Reference to all_energy_boosters
            $table->string('product_type')->default('all_energy_boosters'); // Table name for polymorphic
            $table->integer('quantity')->default(1);
            $table->decimal('price', 8, 2); // Store price at time of adding to cart
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('product_id')->references('id')->on('all_energy_boosters')->onDelete('cascade');
            
            // Add index for better performance
            $table->index(['session_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};