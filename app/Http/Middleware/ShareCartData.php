<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShareCartData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // In the middleware
public function handle($request, Closure $next)
{
    $cart = session()->get('cart', []);
    $cartCount = array_sum(array_column($cart, 'quantity'));
    $cartTotal = array_sum(array_map(function($item) {
        return $item['price'] * $item['quantity'];
    }, $cart));
    
    view()->share([
        'cartCount' => $cartCount,
        'cartTotal' => $cartTotal,
        'cartItems' => $cart
    ]);
    
    return $next($request);
}
}
