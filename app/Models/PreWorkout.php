<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreWorkout extends Model
{
    protected $table = 'preworkouts'; // ✅ Correct - matches migration & seeder
    protected $fillable = ['name', 'description', 'price', 'image_url'];
}