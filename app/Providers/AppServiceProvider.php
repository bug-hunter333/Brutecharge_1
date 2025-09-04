<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Register Livewire components manually if auto-discovery fails
        Livewire::component('cart-count', \App\Livewire\CartCount::class);
        Livewire::component('add-to-cart-button', \App\Livewire\AddToCartButton::class);
    }
}