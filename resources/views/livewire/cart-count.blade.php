{{-- Navbar Cart Counter Component --}}
<div class="relative">
    {{-- Cart Icon with Link --}}
    <a href="{{ route('cart.index') }}" 
       class="flex items-center space-x-2 bg-charcoal/50 border border-blood-red/40 rounded-lg px-4 py-2 hover:bg-blood-red hover:border-blood-red transition-all duration-300 group">
        
        {{-- Cart Icon --}}
        <div class="relative">
            <i class="fas fa-shopping-cart text-xl text-white group-hover:scale-110 transition-transform"></i>
            
            {{-- Cart Count Badge --}}
            @if($cartCount > 0)
                <span class="absolute -top-2 -right-2 bg-blood-red text-white text-xs font-bold rounded-full h-6 w-6 flex items-center justify-center animate-pulse border-2 border-obsidian">
                    {{ $cartCount > 99 ? '99+' : $cartCount }}
                </span>
            @endif
        </div>

        {{-- Cart Total (Hidden on Mobile) --}}
        <div class="hidden md:flex flex-col text-right">
            <span class="text-xs text-gray-400 font-rajdhani">CART</span>
            <span class="text-sm font-rajdhani font-bold text-blood-red">
                ${{ number_format($cartTotal, 2) }}
            </span>
        </div>
    </a>

    {{-- Cart Dropdown Preview (Optional) --}}
    <div class="absolute top-full right-0 mt-2 w-80 bg-obsidian/95 border border-blood-red/40 rounded-xl shadow-2xl backdrop-filter backdrop-blur-20 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50">
        @if($cartCount > 0)
            <div class="p-4">
                <h3 class="font-rajdhani font-bold text-white mb-3">Quick Cart Preview</h3>
                
                {{-- Mini cart items preview --}}
                <div class="space-y-2 max-h-48 overflow-y-auto">
                    @php
                        $cartItems = session()->get('cart', []);
                        $displayItems = array_slice($cartItems, 0, 3, true); // Show max 3 items
                    @endphp
                    
                    @foreach($displayItems as $item)
                        <div class="flex items-center space-x-3 py-2">
                            <div class="w-8 h-8 bg-charcoal rounded flex items-center justify-center">
                                @if($item['image'])
                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="max-w-full max-h-full object-contain">
                                @else
                                    <i class="fas fa-dumbbell text-blood-red/50 text-xs"></i>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-gray-400 text-sm font-rajdhani mb-3">Your cart is empty</p>
                <a href="{{ route('energy-boosters.all') }}" 
                   class="red-button text-white px-4 py-2 rounded-lg text-sm font-rajdhani font-medium inline-block">
                    Start Shopping
                </a>
            </div>
        @endif
    </div>
</div>

{{-- JavaScript for enhanced cart counter behavior --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add click animation to cart icon
        const cartIcon = document.querySelector('.fa-shopping-cart').parentElement;
        
        cartIcon.addEventListener('click', function() {
            this.classList.add('animate-bounce');
            setTimeout(() => {
                this.classList.remove('animate-bounce');
            }, 1000);
        });

        // Listen for cart updates and animate badge
        window.addEventListener('cart-updated', function(event) {
            const badge = document.querySelector('[class*="animate-pulse"]');
            if (badge) {
                badge.classList.add('animate-ping');
                setTimeout(() => {
                    badge.classList.remove('animate-ping');
                    badge.classList.add('animate-pulse');
                }, 1000);
            }
        });
    });
</script>text-white text-sm font-rajdhani truncate">{{ $item['name'] }}</p>
                                <p class="text-blood-red text-xs font-rajdhani">
                                    {{ $item['quantity'] }}x ${{ number_format($item['price'], 2) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    
                    @if(count($cartItems) > 3)
                        <p class="text-gray-400 text-xs text-center py-2">
                            +{{ count($cartItems) - 3 }} more items
                        </p>
                    @endif
                </div>

                {{-- Cart Actions --}}
                <div class="mt-4 pt-3 border-t border-blood-red/30">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-300 font-rajdhani">Total:</span>
                        <span class="text-blood-red font-rajdhani font-bold">${{ number_format($cartTotal, 2) }}</span>
                    </div>
                    
                    <div class="flex space-x-2">
                        <a href="{{ route('cart.index') }}" 
                           class="flex-1 bg-charcoal border border-blood-red/40 text-blood-red px-3 py-2 rounded-lg text-sm font-rajdhani font-medium text-center hover:bg-blood-red hover:text-white transition-colors">
                            View Cart
                        </a>
                        <button class="flex-1 red-button text-white px-3 py-2 rounded-lg text-sm font-rajdhani font-medium">
                            Checkout
                        </button>
                    </div>
                </div>
            </div>
        @else
            <div class="p-4 text-center">
                <i class="fas fa-shopping-cart text-3xl text-blood-red/30 mb-2"></i>
                <p class="text-gray-400 text-sm font-rajdhani mb-3">Your cart is empty</p>
                <a href="{{ route('energy-boosters.all') }}" 
                   class="red-button text-white px-4 py-2 rounded-lg text-sm font-rajdhani font-medium inline-block">
                    Start Shopping
                </a>
            </div>
        @endif
    </div>
</div>  