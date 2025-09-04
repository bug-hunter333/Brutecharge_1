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
        Schema::table('users', function (Blueprint $table) {
            // Add beast-specific fields if they don't exist
            if (!Schema::hasColumn('users', 'beast_goals')) {
                $table->enum('beast_goals', ['Muscle Domination', 'Fat Destruction', 'Strength Maximization', 'Endurance Evolution'])->nullable()->after('profile_photo_path');
            }
            
            if (!Schema::hasColumn('users', 'workout_intensity')) {
                $table->enum('workout_intensity', ['BEAST', 'SAVAGE', 'LEGEND'])->nullable()->after('beast_goals');
            }
            
            if (!Schema::hasColumn('users', 'supplement_focus')) {
                $table->json('supplement_focus')->nullable()->after('workout_intensity');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['beast_goals', 'workout_intensity', 'supplement_focus']);
        });
    }
};