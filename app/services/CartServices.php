<?php

namespace App\Services;

use App\Models\CartItem;
use App\Models\AllEnergyBooster;
use App\Models\AllEnergyBoosters;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CartServices
{
    /**
     * Get the current session ID, creating one if needed
     */
    private function getSessionId(): string
    {
        if (!session()->isStarted()) {
            session()->start();
        }

        $sessionId = session()->getId();
        
        if (!$sessionId) {
            session()->regenerate();
            $sessionId = session()->getId();
        }

        return $sessionId ?: Str::random(40);
    }

    /**
     * Get cart items for current user/session
     */
    public function getCartItems()
    {
        if (Auth::check()) {
            return CartItem::with('product')->where('user_id', Auth::id())->get();
        }
        
        return CartItem::with('product')->where('session_id', $this->getSessionId())->get();
    }

    /**
     * Add product to cart
     */
    public function addToCart(int $productId, int $quantity = 1): array
    {
        $product = AllEnergyBoosters::findOrFail($productId);
        $existingItem = $this->findExistingCartItem($productId);

        if ($existingItem) {
            $existingItem->update([
                'quantity' => $existingItem->quantity + $quantity
            ]);
            $message = 'Cart updated! Quantity increased.';
        } else {
            CartItem::create([
                'session_id' => Auth::check() ? null : $this->getSessionId(),
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'product_type' => 'all_energy_boosters',
                'quantity' => $quantity,
                'price' => $product->price
            ]);
            $message = $product->name . ' added to cart!';
        }

        return [
            'success' => true,
            'message' => $message,
            'cart_count' => $this->getCartCount()
        ];
    }

    /**
    /**
     * Find existing cart item for current user/session
     */
    private function findExistingCartItem(int $productId): ?CartItem
    {
        $query = CartItem::where('product_id', $productId)
                        ->where('product_type', 'all_energy_boosters');

        if (Auth::check()) {
            $query->where('user_id', Auth::id());
        } else {
            $query->where('session_id', $this->getSessionId());
        }

        return $query->first();
    }
    /**
    /**
     * Get total cart count
     */
    public function getCartCount(): int
    {
        if (Auth::check()) {
            return CartItem::where('user_id', Auth::id())->sum('quantity');
        }
        
        return CartItem::where('session_id', $this->getSessionId())->sum('quantity');
    }
    /**
     * Get cart total
     */
    public function getCartTotal(): float
    {
        $items = $this->getCartItems();
        return $items->sum(function($item) {
            return $item->quantity * $item->price;
        });
    }

    /**
     * Update cart item quantity
     */
    public function updateQuantity(int $cartItemId, int $quantity): array
    {
        $cartItem = $this->findCartItem($cartItemId);
        
        if (!$cartItem) {
            return ['success' => false, 'message' => 'Cart item not found'];
        }

        if ($quantity <= 0) {
            return $this->removeFromCart($cartItemId);
        }

        $cartItem->update(['quantity' => $quantity]);
        
        return [
            'success' => true,
            'message' => 'Cart updated successfully!',
            'cart_count' => $this->getCartCount()
        ];
    }

    /**
     * Remove item from cart
     */
    public function removeFromCart(int $cartItemId): array
    {
        $cartItem = $this->findCartItem($cartItemId);
        
        if (!$cartItem) {
            return ['success' => false, 'message' => 'Cart item not found'];
        }

        $productName = $cartItem->product->name;
        $cartItem->delete();
        
        return [
            'success' => true,
            'message' => $productName . ' removed from cart!',
            'cart_count' => $this->getCartCount()
        ];
    }

    /**
    /**
     * Clear entire cart
     */
    public function clearCart(): array
    {
        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())->delete();
        } else {
            CartItem::where('session_id', $this->getSessionId())->delete();
        }
        
        return [
            'success' => true,
            'message' => 'Cart cleared successfully!',
            'cart_count' => 0
        ];
    }
    /**
    /**
     * Find cart item for current user/session
     */
    private function findCartItem(int $cartItemId): ?CartItem
    {
        $query = CartItem::where('id', $cartItemId);

        if (Auth::check()) {
            $query->where('user_id', Auth::id());
        } else {
            $query->where('session_id', $this->getSessionId());
        }

        return $query->first();
    }
}