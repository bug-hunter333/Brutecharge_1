<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Creatine extends Model
{
    protected $table = 'creatines'; // ✅ Correct - matches migration & seeder
    protected $fillable = ['name', 'description', 'price', 'image_url'];
}