<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AllEnergyBooster;
use App\Models\AllEnergyBoosters;

/**
 * Product List Component
 * Displays products with Add to Cart functionality
 * Can be embedded in any product listing page
 */
class ProductList extends Component
{
    // Products to display
    public $products;
    
    // Component configuration
    public $showFilters = true;
    public $showSorting = true;
    public $viewMode = 'grid'; // 'grid' or 'list'
    public $sortBy = 'featured';

    /**
     * Component initialization
     */
    public function mount($products = null, $showFilters = true, $showSorting = true)
    {
        $this->products = $products ?? AllEnergyBoosters::all();
        $this->showFilters = $showFilters;
        $this->showSorting = $showSorting;
    }

    /**
     * Add product to cart
     * This method communicates with the Cart component
     */
    public function addToCart($productId)
    {
        $product = AllEnergyBoosters::find($productId);
        
        if (!$product) {
            $this->dispatch('cart-error', ['message' => 'Product not found']);
            return;
        }

        // Get current cart from session
        $cart = session()->get('cart', []);
        
        // Add or increment product
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => (float)$product->price,
                'quantity' => 1,
                'image' => $product->image_url
            ];
        }

        // Save cart to session
        session()->put('cart', $cart);

        // Calculate cart stats
        $cartCount = 0;
        $cartTotal = 0;
        foreach ($cart as $item) {
            $cartCount += $item['quantity'];
            $cartTotal += $item['price'] * $item['quantity'];
        }

        // Dispatch event to update cart counter and other components
        $this->dispatch('cart-updated', [
            'count' => $cartCount,
            'total' => $cartTotal,
            'message' => "Added {$product->name} to cart!"
        ]);

        // Show success message
        $this->dispatch('product-added', [
            'productName' => $product->name,
            'productId' => $productId
        ]);
    }

    /**
     * Toggle view mode between grid and list
     */
    public function setViewMode($mode)
    {
        $this->viewMode = $mode;
    }

    /**
     * Sort products
     */
    public function sortProducts($sortBy)
    {
        $this->sortBy = $sortBy;
        
        switch ($sortBy) {
            case 'price-low':
                $this->products = $this->products->sortBy('price');
                break;
            case 'price-high':
                $this->products = $this->products->sortByDesc('price');
                break;
            case 'name':
                $this->products = $this->products->sortBy('name');
                break;
            default:
                // Featured/default order
                break;
        }
    }

    /**
     * Render the component
     */
    public function render()
    {
        return view('livewire.product-list');
    }
}