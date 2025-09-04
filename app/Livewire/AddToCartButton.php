<?php

namespace App\Livewire;

use Livewire\Component;

class AddToCartButton extends Component
{
    public $product;
    public $size;
    public $style;
    public $quantity = 1;
    public $isAdding = false;
    public $showSuccess = false;

    public function mount($product, $size = 'default', $style = 'default')
    {
        $this->product = $product;
        $this->size = $size;
        $this->style = $style;
    }

    public function addToCart()
    {
        $this->isAdding = true;

        // Get current cart from session
        $cart = session()->get('cart', []);

        // Check if product already exists in cart
        if (isset($cart[$this->product->id])) {
            // Increment quantity
            $cart[$this->product->id]['quantity'] += $this->quantity;
        } else {
            // Add new product to cart
            $cart[$this->product->id] = [
                'id' => $this->product->id,
                'name' => $this->product->name,
                'price' => $this->product->price,
                'quantity' => $this->quantity,
                'image' => $this->product->image_url ?? null,
            ];
        }

        // Save cart to session
        session()->put('cart', $cart);

        // Show success state
        $this->showSuccess = true;
        
        // Dispatch event to update cart count
        $this->dispatch('cart-updated');
        
        // Reset states after delay
        $this->dispatch('show-success-animation');
        
        // Reset after 2 seconds
        $this->js('setTimeout(() => { $wire.resetStates() }, 2000)');
    }

    public function resetStates()
    {
        $this->isAdding = false;
        $this->showSuccess = false;
    }

    public function getButtonClasses()
    {
        $baseClasses = 'font-rajdhani font-bold transition-all duration-300 flex items-center justify-center';
        
        switch ($this->size) {
            case 'small':
                $sizeClasses = 'px-4 py-2 text-sm rounded-lg';
                break;
            case 'large':
                $sizeClasses = 'px-8 py-4 text-lg rounded-xl';
                break;
            default:
                $sizeClasses = 'px-6 py-4 text-base rounded-xl flex-1';
        }

        $styleClasses = $this->showSuccess 
            ? 'bg-green-600 hover:bg-green-500 text-white' 
            : 'red-button text-white hover:scale-105';

        return $baseClasses . ' ' . $sizeClasses . ' ' . $styleClasses;
    }

    public function getButtonText()
    {
        if ($this->showSuccess) {
            return '<i class="fas fa-check mr-2"></i>ADDED TO ARSENAL!';
        }
        
        if ($this->isAdding) {
            return '<i class="fas fa-spinner fa-spin mr-2"></i>ADDING...';
        }
        
        return '<i class="fas fa-plus mr-2"></i>ADD TO ARSENAL';
    }

    public function render()
    {
        return view('livewire.add-to-cart-button');
    }
}