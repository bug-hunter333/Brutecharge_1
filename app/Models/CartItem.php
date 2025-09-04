<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'user_id',
        'product_id',
        'product_type',
        'quantity',
        'price'
    ];

    /**
     * Get the product (supplement) for this cart item
     */
    public function product()
    {
        return $this->belongsTo(AllEnergyBoosters::class, 'product_id');
    }

    /**
     * Get the user if logged in
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get total price for this cart item
     */
    public function getTotalAttribute()
    {
        return $this->quantity * $this->price;
    }

    /**
     * Scope to get cart items for current session/user
     */
    public function scopeForCurrentUser($query)
    {
        if (Auth::check()) {
            return $query->where('user_id', Auth::id());
        }
        
        // Ensure we have a session ID
        $sessionId = session()->getId();
        if (!$sessionId) {
            session()->start();
            $sessionId = session()->getId();
        }
        
        return $query->where('session_id', $sessionId);
    }

    /**
     * Boot method to handle session generation
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($cartItem) {
            // If no session_id is provided and user is not authenticated, generate one
            if (!$cartItem->session_id && !$cartItem->user_id) {
                if (!session()->isStarted()) {
                    session()->start();
                }
                $cartItem->session_id = session()->getId() ?: str()->random(40);
            }
        });
    }
}