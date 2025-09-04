<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AllEnergyBooster;
use App\Models\AllEnergyBoosters;
use Illuminate\Support\Facades\Session;

/**
 * Cart Controller (Optional)
 * Provides traditional controller methods for cart operations
 * Can be used alongside or instead of Livewire components
 */
class CartController extends Controller
{
    /**
     * Display the cart page
     */
    public function index()
    {
        $cartItems = session()->get('cart', []);
        $cartCount = $this->calculateCartCount($cartItems);
        $cartTotal = $this->calculateCartTotal($cartItems);

        return view('cart.index', compact('cartItems', 'cartCount', 'cartTotal'));
    }

    /**
     * Add product to cart via AJAX
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:all_energy_boosters,id',
            'quantity' => 'integer|min:1|max:99'
        ]);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        
        $product = AllEnergyBoosters::findOrFail($productId);
        $cart = session()->get('cart', []);

        // Add or update product in cart
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => (float)$product->price,
                'quantity' => $quantity,
                'image' => $product->image_url
            ];
        }

        session()->put('cart', $cart);

        $cartCount = $this->calculateCartCount($cart);
        $cartTotal = $this->calculateCartTotal($cart);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => "Added {$product->name} to cart!",
                'cart_count' => $cartCount,
                'cart_total' => $cartTotal,
                'item_subtotal' => $cart[$productId]['price'] * $cart[$productId]['quantity']
            ]);
        }

        return redirect()->back()->with('success', "Added {$product->name} to cart!");
    }

    /**
     * Update product quantity in cart
     */
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1|max:99'
        ]);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);

            $cartCount = $this->calculateCartCount($cart);
            $cartTotal = $this->calculateCartTotal($cart);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Cart updated successfully!',
                    'cart_count' => $cartCount,
                    'cart_total' => $cartTotal,
                    'item_subtotal' => $cart[$productId]['price'] * $cart[$productId]['quantity']
                ]);
            }

            return redirect()->back()->with('success', 'Cart updated successfully!');
        }

        if ($request->expectsJson()) {
            return response()->json(['error' => 'Product not found in cart'], 404);
        }

        return redirect()->back()->with('error', 'Product not found in cart');
    }

    /**
     * Remove product from cart
     */
    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer'
        ]);

        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $productName = $cart[$productId]['name'];
            unset($cart[$productId]);
            session()->put('cart', $cart);

            $cartCount = $this->calculateCartCount($cart);
            $cartTotal = $this->calculateCartTotal($cart);

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => "Removed {$productName} from cart",
                    'cart_count' => $cartCount,
                    'cart_total' => $cartTotal
                ]);
            }

            return redirect()->back()->with('success', "Removed {$productName} from cart");
        }

        if ($request->expectsJson()) {
            return response()->json(['error' => 'Product not found in cart'], 404);
        }

        return redirect()->back()->with('error', 'Product not found in cart');
    }

    /**
     * Clear entire cart
     */
    public function clear(Request $request)
    {
        session()->forget('cart');

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Cart cleared successfully',
                'cart_count' => 0,
                'cart_total' => 0
            ]);
        }

        return redirect()->back()->with('success', 'Cart cleared successfully');
    }

    /**
     * Get cart statistics
     */
    public function getStats()
    {
        $cart = session()->get('cart', []);
        $cartCount = $this->calculateCartCount($cart);
        $cartTotal = $this->calculateCartTotal($cart);

        return response()->json([
            'cart_count' => $cartCount,
            'cart_total' => $cartTotal,
            'items' => count($cart)
        ]);
    }

    /**
     * Get cart contents for API
     */
    public function getContents()
    {
        $cart = session()->get('cart', []);
        $cartCount = $this->calculateCartCount($cart);
        $cartTotal = $this->calculateCartTotal($cart);

        return response()->json([
            'cart_items' => $cart,
            'cart_count' => $cartCount,
            'cart_total' => $cartTotal,
            'formatted_total' => '$' . number_format($cartTotal, 2)
        ]);
    }

    /**
     * Calculate total number of items in cart
     */
    private function calculateCartCount($cart)
    {
        return array_sum(array_column($cart, 'quantity'));
    }

    /**
     * Calculate total price of items in cart
     */
    private function calculateCartTotal($cart)
    {
        return array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
    }

    /**
     * Get item subtotal
     */
    private function getItemSubtotal($item)
    {
        return $item['price'] * $item['quantity'];
    }
}