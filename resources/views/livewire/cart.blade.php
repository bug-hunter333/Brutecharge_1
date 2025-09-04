{{-- resources/views/livewire/cart.blade.php --}}
<div class="relative">
    {{-- Cart Toggle Button (for mobile/sidebar cart) --}}
    <button 
        wire:click="toggleCart" 
        class="fixed bottom-6 right-6 z-50 bg-gradient-to-r from-blood-red to-fire-red text-white w-16 h-16 rounded-full shadow-2xl hover:scale-110 transition-all duration-300 lg:hidden"
    >
        <div class="relative">
            <i class="fas fa-shopping-cart text-xl"></i>
            @if($cartCount > 0)
                <span class="absolute -top-2 -right-2 bg-accent-red text-white text-xs font-bold rounded-full w-6 h-6 flex items-center justify-center animate-pulse">
                    {{ $cartCount }}
                </span>
            @endif
        </div>
    </button>

    {{-- Cart Sidebar (Mobile) --}}
    <div class="fixed inset-y-0 right-0 z-50 w-full max-w-md transform transition-transform duration-300 lg:hidden {{ $showCart ? 'translate-x-0' : 'translate-x-full' }}">
        <div class="h-full bg-gradient-to-b from-obsidian to-charcoal border-l border-blood-red/30 shadow-2xl">
            {{-- Cart Header --}}
            <div class="flex items-center justify-between p-6 border-b border-blood-red/30">
                <h2 class="font-rajdhani font-bold text-2xl text-white">
                    <i class="fas fa-shopping-cart text-blood-red mr-2"></i>
                    YOUR ARSENAL
                </h2>
                <button wire:click="toggleCart" class="text-gray-400 hover:text-blood-red text-2xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            {{-- Cart Content --}}
            <div class="flex-1 overflow-y-auto p-6">
                {{-- Mobile Cart Items --}}
                @if(!empty($cartItems))
                    <div class="space-y-4">
                        @foreach($cartItems as $item)
                            <div class="product-card rounded-lg p-4 flex items-center space-x-4 group">
                                {{-- Product Image --}}
                                <div class="flex-shrink-0 w-16 h-16 rounded-lg bg-gradient-to-br from-charcoal to-steel flex items-center justify-center overflow-hidden">
                                    @if($item['image'])
                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-contain">
                                    @else
                                        <i class="fas fa-dumbbell text-xl text-blood-red/50"></i>
                                    @endif
                                </div>

                                {{-- Product Details --}}
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-rajdhani font-bold text-white mb-1 text-sm truncate">{{ $item['name'] }}</h3>
                                    <p class="text-blood-red font-bold text-lg">${{ number_format($item['price'], 2) }}</p>
                                    <p class="text-gray-400 text-xs">Qty: {{ $item['quantity'] }} | ${{ number_format($item['subtotal'], 2) }}</p>
                                </div>

                                {{-- Mobile Controls --}}
                                <div class="flex flex-col space-y-2">
                                    <div class="flex items-center space-x-2">
                                        <button 
                                            wire:click="decrementQuantity({{ $item['id'] }})"
                                            class="w-8 h-8 bg-charcoal border border-blood-red/40 text-blood-red rounded hover:bg-blood-red hover:text-white transition-all duration-200 flex items-center justify-center"
                                        >
                                            <i class="fas fa-minus text-xs"></i>
                                        </button>
                                        
                                        <span class="font-rajdhani font-bold text-white text-sm min-w-[1.5rem] text-center">
                                            {{ $item['quantity'] }}
                                        </span>
                                        
                                        <button 
                                            wire:click="incrementQuantity({{ $item['id'] }})"
                                            class="w-8 h-8 bg-charcoal border border-blood-red/40 text-blood-red rounded hover:bg-blood-red hover:text-white transition-all duration-200 flex items-center justify-center"
                                        >
                                            <i class="fas fa-plus text-xs"></i>
                                        </button>
                                    </div>
                                    
                                    <button 
                                        wire:click="removeFromCart({{ $item['id'] }})"
                                        class="w-full bg-red-600/20 border border-red-500/40 text-red-400 rounded py-1 hover:bg-red-600 hover:text-white transition-all duration-200 text-xs"
                                        title="Remove from cart"
                                    >
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                        
                        {{-- Mobile Cart Summary --}}
                        <div class="mt-6 pt-6 border-t border-gray-700">
                            <div class="space-y-3 mb-6">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-400">Subtotal</span>
                                    <span class="text-white font-rajdhani font-bold">${{ number_format($cartTotal, 2) }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-400">Tax (est.)</span>
                                    <span class="text-white font-rajdhani font-bold">${{ number_format($cartTotal * 0.08, 2) }}</span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-t border-blood-red">
                                    <span class="text-white font-rajdhani font-bold">TOTAL</span>
                                    <span class="text-blood-red font-rajdhani font-bold text-lg">${{ number_format($cartTotal * 1.08, 2) }}</span>
                                </div>
                            </div>
                            
                            <div class="space-y-3">
                                <button 
                                    wire:click="checkout"
                                    class="w-full red-button text-white py-3 rounded-lg font-rajdhani font-bold tracking-wide"
                                >
                                    <i class="fas fa-bolt mr-2"></i>
                                    CHECKOUT
                                </button>
                                
                                <button 
                                    wire:click="clearCart"
                                    class="w-full bg-gray-700 hover:bg-gray-600 text-white py-2 rounded-lg font-rajdhani font-medium transition-all duration-300 text-sm"
                                    onclick="return confirm('Clear cart?')"
                                >
                                    <i class="fas fa-trash mr-2"></i>
                                    Clear Cart
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- Mobile Empty Cart --}}
                    <div class="text-center py-8">
                        <div class="w-20 h-20 bg-gradient-to-br from-charcoal to-steel rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shopping-cart text-3xl text-blood-red/50"></i>
                        </div>
                        
                        <h3 class="font-rajdhani font-bold text-xl text-white mb-2">
                            EMPTY ARSENAL
                        </h3>
                        
                        <p class="text-gray-400 text-sm mb-4">
                            Add some beast mode supplements!
                        </p>
                        
                        <a href="{{ route('energy-boosters.all') }}" 
                           class="inline-block red-button text-white px-6 py-2 rounded-lg font-rajdhani font-bold text-sm"
                           wire:click="toggleCart">
                            <i class="fas fa-dumbbell mr-2"></i>
                            SHOP NOW
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Desktop Cart (Full Page) --}}
    <div class="lg:block hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Cart Header --}}
            <div class="mb-12">
                <div class="text-center mb-8">
                    <h1 class="text-5xl md:text-6xl font-rajdhani font-black mb-4">
                        <span class="gradient-text">YOUR</span>
                        <span class="text-white">ARSENAL</span>
                    </h1>
                    <p class="text-xl text-gray-400 font-inter">
                        Review your beast mode supplements before checkout
                    </p>
                </div>

                {{-- Cart Stats --}}
                <div class="grid grid-cols-3 gap-6 max-w-2xl mx-auto">
                    <div class="stats-card rounded-xl p-6 text-center">
                        <div class="text-3xl font-black text-blood-red mb-2">{{ $cartCount }}</div>
                        <div class="text-sm text-gray-400 font-medium">ITEMS</div>
                    </div>
                    <div class="stats-card rounded-xl p-6 text-center">
                        <div class="text-3xl font-black text-blood-red mb-2">{{ count($cartItems) }}</div>
                        <div class="text-sm text-gray-400 font-medium">PRODUCTS</div>
                    </div>
                    <div class="stats-card rounded-xl p-6 text-center">
                        <div class="text-3xl font-black text-blood-red mb-2">${{ number_format($cartTotal, 0) }}</div>
                        <div class="text-sm text-gray-400 font-medium">TOTAL</div>
                    </div>
                </div>
            </div>

            {{-- Main Cart Content --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                {{-- Cart Items (Left Column) --}}
                <div class="lg:col-span-2">
                    {{-- Inline Cart Items Content --}}
                    @if(!empty($cartItems))
                        <div class="space-y-6">
                            @foreach($cartItems as $item)
                                <div class="product-card rounded-xl p-6 flex items-center space-x-6 group hover:scale-[1.02] transition-all duration-300">
                                    {{-- Product Image --}}
                                    <div class="flex-shrink-0 w-20 h-20 rounded-lg bg-gradient-to-br from-charcoal to-steel flex items-center justify-center overflow-hidden">
                                        @if($item['image'])
                                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-contain">
                                        @else
                                            <i class="fas fa-dumbbell text-2xl text-blood-red/50"></i>
                                        @endif
                                    </div>

                                    {{-- Product Details --}}
                                    <div class="flex-1 min-w-0">
                                        <h3 class="font-rajdhani font-bold text-lg text-white mb-1 truncate">{{ $item['name'] }}</h3>
                                        <p class="text-blood-red font-bold text-xl">${{ number_format($item['price'], 2) }}</p>
                                        <p class="text-gray-400 text-sm">Subtotal: ${{ number_format($item['subtotal'], 2) }}</p>
                                    </div>

                                    {{-- Quantity Controls --}}
                                    <div class="flex items-center space-x-3">
                                        <button 
                                            wire:click="decrementQuantity({{ $item['id'] }})"
                                            class="w-10 h-10 bg-charcoal border border-blood-red/40 text-blood-red rounded-lg hover:bg-blood-red hover:text-white transition-all duration-200 flex items-center justify-center"
                                        >
                                            <i class="fas fa-minus text-sm"></i>
                                        </button>
                                        
                                        <span class="font-rajdhani font-bold text-xl text-white min-w-[2rem] text-center">
                                            {{ $item['quantity'] }}
                                        </span>
                                        
                                        <button 
                                            wire:click="incrementQuantity({{ $item['id'] }})"
                                            class="w-10 h-10 bg-charcoal border border-blood-red/40 text-blood-red rounded-lg hover:bg-blood-red hover:text-white transition-all duration-200 flex items-center justify-center"
                                        >
                                            <i class="fas fa-plus text-sm"></i>
                                        </button>
                                    </div>

                                    {{-- Remove Button --}}
                                    <button 
                                        wire:click="removeFromCart({{ $item['id'] }})"
                                        class="w-10 h-10 bg-red-600/20 border border-red-500/40 text-red-400 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-200 flex items-center justify-center group-hover:scale-110"
                                        title="Remove from cart"
                                    >
                                        <i class="fas fa-trash text-sm"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @else
                        {{-- Empty Cart State --}}
                        <div class="text-center py-16">
                            <div class="max-w-md mx-auto">
                                <div class="w-32 h-32 bg-gradient-to-br from-charcoal to-steel rounded-full flex items-center justify-center mx-auto mb-8">
                                    <i class="fas fa-shopping-cart text-6xl text-blood-red/50"></i>
                                </div>
                                
                                <h3 class="font-rajdhani font-bold text-3xl text-white mb-4">
                                    YOUR ARSENAL IS EMPTY
                                </h3>
                                
                                <p class="text-gray-400 text-lg mb-8 leading-relaxed">
                                    Ready to unleash your potential? Add some beast mode supplements to fuel your transformation.
                                </p>
                                
                                <a href="{{ route('energy-boosters.all') }}" 
                                   class="inline-block red-button text-white px-8 py-4 rounded-xl font-rajdhani font-bold text-lg tracking-wide hover:scale-105 transition-all duration-300">
                                    <i class="fas fa-dumbbell mr-2"></i>
                                    START SHOPPING
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Cart Summary (Right Column) --}}
                <div class="lg:col-span-1">
                    @if(!empty($cartItems))
                        <div class="product-card rounded-2xl p-8 sticky top-24">
                            <h2 class="font-rajdhani font-bold text-2xl text-white mb-6">
                                <i class="fas fa-calculator text-blood-red mr-2"></i>
                                ORDER SUMMARY
                            </h2>

                            <div class="space-y-4 mb-8">
                                <div class="flex justify-between items-center py-3 border-b border-gray-700">
                                    <span class="text-gray-400">Subtotal ({{ $cartCount }} items)</span>
                                    <span class="text-white font-rajdhani font-bold text-lg">${{ number_format($cartTotal, 2) }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center py-3 border-b border-gray-700">
                                    <span class="text-gray-400">Shipping</span>
                                    <span class="text-green-400 font-rajdhani font-bold">FREE</span>
                                </div>
                                
                                <div class="flex justify-between items-center py-3 border-b border-gray-700">
                                    <span class="text-gray-400">Tax (estimated)</span>
                                    <span class="text-white font-rajdhani font-bold">${{ number_format($cartTotal * 0.08, 2) }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center py-4 border-t-2 border-blood-red">
                                    <span class="text-white font-rajdhani font-bold text-xl">TOTAL</span>
                                    <span class="text-blood-red font-rajdhani font-bold text-2xl">${{ number_format($cartTotal * 1.08, 2) }}</span>
                                </div>
                            </div>

                            <div class="space-y-4">
                               <a href="{{ route('checkout.index') }}" 
                                        class="w-full red-button text-white py-4 rounded-xl font-rajdhani font-bold text-lg tracking-wide hover:scale-105 transition-all duration-300 flex items-center justify-center">
                                        <i class="fas fa-bolt mr-2"></i>
                                        UNLEASH THE BEAST - CHECKOUT
                                </a>

                                
                                <button 
                                    wire:click="clearCart"
                                    class="w-full bg-gray-700 hover:bg-gray-600 text-white py-3 rounded-xl font-rajdhani font-medium transition-all duration-300"
                                    onclick="return confirm('Are you sure you want to clear your cart?')"
                                >
                                    <i class="fas fa-trash mr-2"></i>
                                    Clear Cart
                                </button>
                                
                                <a href="{{ route('energy-boosters.all') }}" 
                                   class="block w-full text-center bg-charcoal border border-blood-red/40 text-blood-red py-3 rounded-xl font-rajdhani font-medium hover:bg-blood-red hover:text-white transition-all duration-300">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Continue Shopping
                                </a>
                            </div>

                            {{-- Trust Badges --}}
                            <div class="mt-8 pt-6 border-t border-gray-700">
                                <div class="grid grid-cols-2 gap-4 text-center text-sm text-gray-400">
                                    <div class="flex items-center justify-center space-x-2">
                                        <i class="fas fa-shield-alt text-green-400"></i>
                                        <span>Secure Checkout</span>
                                    </div>
                                    <div class="flex items-center justify-center space-x-2">
                                        <i class="fas fa-shipping-fast text-blue-400"></i>
                                        <span>Fast Shipping</span>
                                    </div>
                                    <div class="flex items-center justify-center space-x-2">
                                        <i class="fas fa-undo text-yellow-400"></i>
                                        <span>30-Day Returns</span>
                                    </div>
                                    <div class="flex items-center justify-center space-x-2">
                                        <i class="fas fa-certificate text-purple-400"></i>
                                        <span>Quality Guaranteed</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Success/Error Messages --}}
    @if($successMessage || $errorMessage)
        <div class="fixed top-24 right-6 z-50 animate-fade-in">
            @if($successMessage)
                <div class="bg-gradient-to-r from-green-600 to-green-500 text-white px-6 py-4 rounded-lg shadow-2xl border border-green-400">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-3 text-xl"></i>
                        <span class="font-rajdhani font-medium">{{ $successMessage }}</span>
                    </div>
                </div>
            @endif
            
            @if($errorMessage)
                <div class="bg-gradient-to-r from-red-600 to-red-500 text-white px-6 py-4 rounded-lg shadow-2xl border border-red-400">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-3 text-xl"></i>
                        <span class="font-rajdhani font-medium">{{ $errorMessage }}</span>
                    </div>
                </div>
            @endif
        </div>
    @endif

    {{-- Loading Overlay --}}
    @if($isLoading)
        <div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
            <div class="bg-gradient-to-br from-charcoal to-obsidian p-8 rounded-2xl border border-blood-red/30">
                <div class="text-center">
                    <div class="animate-spin w-16 h-16 border-4 border-blood-red border-t-transparent rounded-full mx-auto mb-4"></div>
                    <p class="text-white font-rajdhani font-medium">Processing your beast mode order...</p>
                </div>
            </div>
        </div>
    @endif

    {{-- Overlay for mobile cart --}}
    @if($showCart)
        <div class="fixed inset-0 bg-black/50 z-40 lg:hidden" wire:click="toggleCart"></div>
    @endif

    {{-- JavaScript for animations and event handling --}}
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-clear messages after 3 seconds
        window.addEventListener('clear-messages', function() {
            setTimeout(function() {
                @this.successMessage = '';
                @this.errorMessage = '';
            }, 3000);
        });

        // Handle checkout initiation
        window.addEventListener('checkout-initiated', function() {
            setTimeout(function() {
                // In a real app, redirect to checkout page
                window.location.href = '/checkout';
            }, 1500);
        });

        // Add fade-in animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fade-in {
                from { opacity: 0; transform: translateY(-20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-fade-in {
                animation: fade-in 0.3s ease-out forwards;
            }
        `;
        document.head.appendChild(style);
    });
    </script>
</div>