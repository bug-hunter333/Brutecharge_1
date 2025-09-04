<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AllEnergyBooster;
use App\Models\AllEnergyBoosters;

/**
 * Main Cart Livewire Component
 * Handles all cart operations: add, remove, update quantities, calculate totals
 * Uses session-based storage for cart persistence
 */
class Cart extends Component
{
    // Public properties that are automatically reactive
    public $cartItems = [];
    public $cartCount = 0;
    public $cartTotal = 0;
    
    // Mobile cart sidebar visibility
    public $showCart = false;
    
    // Loading state
    public $isLoading = false;
    
    // Messages
    public $successMessage = '';
    public $errorMessage = '';

    /**
     * Component initialization
     * Loads cart data from session when component mounts
     */
    public function mount()
    {
        $this->loadCartFromSession();
        $this->calculateCartStats();
    }

    /**
     * Toggle mobile cart sidebar
     */
    public function toggleCart()
    {
        $this->showCart = !$this->showCart;
    }

    /**
     * Add product to cart
     * If product exists, increment quantity, otherwise add new item
     */
    public function addToCart($productId, $productName = null, $productPrice = null, $productImage = null)
    {
        $this->isLoading = true;
        
        // If product details not provided, fetch from database
        if (!$productName || !$productPrice) {
            $product = AllEnergyBoosters::find($productId);
            if (!$product) {
                $this->errorMessage = 'Product not found';
                $this->isLoading = false;
                $this->dispatch('clear-messages');
                return;
            }
            $productName = $product->name;
            $productPrice = $product->price;
            $productImage = $product->image_url;
        }

        // Check if product already exists in cart
        if (isset($this->cartItems[$productId])) {
            $this->cartItems[$productId]['quantity']++;
            $this->successMessage = "Increased quantity of {$productName} in cart!";
        } else {
            // Add new product to cart
            $this->cartItems[$productId] = [
                'id' => $productId,
                'name' => $productName,
                'price' => (float)$productPrice,
                'quantity' => 1,
                'image' => $productImage
            ];
            $this->successMessage = "Added {$productName} to cart!";
        }

        $this->saveCartToSession();
        $this->calculateCartStats();
        $this->isLoading = false;
        
        // Emit event to notify other components (like navbar counter)
        $this->dispatch('cart-updated', [
            'count' => $this->cartCount,
            'total' => $this->cartTotal,
            'message' => $this->successMessage
        ]);
        
        $this->dispatch('clear-messages');
    }

    /**
     * Remove product completely from cart
     */
    public function removeFromCart($productId)
    {
        if (isset($this->cartItems[$productId])) {
            $productName = $this->cartItems[$productId]['name'];
            unset($this->cartItems[$productId]);
            
            $this->saveCartToSession();
            $this->calculateCartStats();
            
            $this->successMessage = "Removed {$productName} from cart";
            
            $this->dispatch('cart-updated', [
                'count' => $this->cartCount,
                'total' => $this->cartTotal,
                'message' => $this->successMessage
            ]);
            
            $this->dispatch('clear-messages');
        }
    }

    /**
     * Increment product quantity
     */
    public function incrementQuantity($productId)
    {
        if (isset($this->cartItems[$productId])) {
            $this->cartItems[$productId]['quantity']++;
            $this->saveCartToSession();
            $this->calculateCartStats();
            
            $this->dispatch('cart-updated', [
                'count' => $this->cartCount,
                'total' => $this->cartTotal
            ]);
        }
    }

    /**
     * Decrement product quantity
     * Removes product if quantity reaches 0
     */
    public function decrementQuantity($productId)
    {
        if (isset($this->cartItems[$productId])) {
            $this->cartItems[$productId]['quantity']--;
            
            // Remove item if quantity is 0 or less
            if ($this->cartItems[$productId]['quantity'] <= 0) {
                $this->removeFromCart($productId);
                return;
            }
            
            $this->saveCartToSession();
            $this->calculateCartStats();
            
            $this->dispatch('cart-updated', [
                'count' => $this->cartCount,
                'total' => $this->cartTotal
            ]);
        }
    }

    /**
     * Update quantity directly (for input fields)
     */
    public function updateQuantity($productId, $quantity)
    {
        $quantity = (int)$quantity;
        
        if ($quantity <= 0) {
            $this->removeFromCart($productId);
            return;
        }
        
        if (isset($this->cartItems[$productId])) {
            $this->cartItems[$productId]['quantity'] = $quantity;
            $this->saveCartToSession();
            $this->calculateCartStats();
            
            $this->dispatch('cart-updated', [
                'count' => $this->cartCount,
                'total' => $this->cartTotal
            ]);
        }
    }

    /**
     * Clear entire cart
     */
    public function clearCart()
    {
        $this->cartItems = [];
        $this->saveCartToSession();
        $this->calculateCartStats();
        
        $this->successMessage = 'Cart cleared successfully!';
        
        $this->dispatch('cart-updated', [
            'count' => $this->cartCount,
            'total' => $this->cartTotal,
            'message' => $this->successMessage
        ]);
        
        $this->dispatch('clear-messages');
    }

    /**
     * Proceed to checkout
     */
    public function checkout()
    {
        if (empty($this->cartItems)) {
            $this->errorMessage = 'Your cart is empty!';
            $this->dispatch('clear-messages');
            return;
        }

        $this->isLoading = true;
        $this->successMessage = 'Processing your order...';
        
        // Simulate processing time
        $this->dispatch('checkout-initiated');
    }

    /**
     * Get item subtotal (price * quantity)
     */
    public function getItemSubtotal($productId)
    {
        if (isset($this->cartItems[$productId])) {
            return $this->cartItems[$productId]['price'] * $this->cartItems[$productId]['quantity'];
        }
        return 0;
    }

    /**
     * Calculate cart statistics (count and total)
     * Also adds subtotal to each item for easier template access
     */
    private function calculateCartStats()
    {
        $this->cartCount = 0;
        $this->cartTotal = 0;

        foreach ($this->cartItems as $key => $item) {
            $subtotal = $item['price'] * $item['quantity'];
            $this->cartItems[$key]['subtotal'] = $subtotal;
            
            $this->cartCount += $item['quantity'];
            $this->cartTotal += $subtotal;
        }
    }

    /**
     * Load cart data from Laravel session
     */
    private function loadCartFromSession()
    {
        $this->cartItems = session()->get('cart', []);
    }

    /**
     * Save cart data to Laravel session
     */
    private function saveCartToSession()
    {
        session()->put('cart', $this->cartItems);
    }

    /**
     * Clear messages after timeout
     */
    public function clearMessages()
    {
        $this->successMessage = '';
        $this->errorMessage = '';
    }

    /**
     * Render the cart component
     */
    public function render()
    {
        return view('livewire.cart');
    }
}