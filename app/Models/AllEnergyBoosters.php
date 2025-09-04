<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * AllEnergyBooster Model
 * Represents gym supplement products in the database
 */
class AllEnergyBoosters extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'all_energy_boosters';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'description', 
        'price',
        'image_url',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'price' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope for searching products by name
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
    }

    /**
     * Scope for filtering by price range
     */
    public function scopePriceBetween($query, $min, $max)
    {
        return $query->whereBetween('price', [$min, $max]);
    }

    /**
     * Get formatted price attribute
     */
    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price, 2);
    }

    /**
     * Get short description attribute
     */
    public function getShortDescriptionAttribute()
    {
        return strlen($this->description) > 120 
            ? substr($this->description, 0, 120) . '...' 
            : $this->description;
    }

    /**
     * Check if product has image
     */
    public function hasImage()
    {
        return !empty($this->image_url);
    }
}