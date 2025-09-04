<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

/**
 * Cart Counter Component for Navbar
 * Displays cart count and listens for cart updates
 */
class CartCount extends Component
{
    // Public properties for cart statistics
    public $cartCount = 0;
    public $cartTotal = 0;

    /**
     * Component initialization
     * Load cart stats from session
     */
    public function mount()
    {
        $this->loadCartStats();
    }

    /**
     * Listen for cart updates from other components
     * This method is triggered when 'cart-updated' event is dispatched
     */
    #[On('cart-updated')]
    public function updateCartStats($data)
    {
        $this->cartCount = $data['count'] ?? 0;
        $this->cartTotal = $data['total'] ?? 0;
    }

    /**
     * Load cart statistics from session
     */
    private function loadCartStats()
    {
        $cartItems = session()->get('cart', []);
        $this->cartCount = 0;
        $this->cartTotal = 0;

        foreach ($cartItems as $item) {
            $this->cartCount += $item['quantity'];
            $this->cartTotal += $item['price'] * $item['quantity'];
        }
    }

    /**
     * Render the cart counter component
     */
    public function render()
    {
        return view('livewire.cart-counter');
    }
}