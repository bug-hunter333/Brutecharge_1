<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Protein extends Model
{
          protected $fillable = ['name', 'description', 'price',  'image_url'];
}
