{{-- Product List Component View - Fixed for Livewire --}}
<div>
    {{-- Filter and Sort Bar --}}
    @if($showFilters || $showSorting)
        <div class="filter-glass rounded-xl p-6 mb-12">
            <div class="flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-blood-red rounded-full animate-pulse"></div>
                        <h2 class="text-xl font-rajdhani font-bold text-white">
                            <span>{{ $products->count() }}</span> ELITE FORMULATIONS
                        </h2>
                    </div>
                </div>
                
                @if($showSorting)
                    <div class="flex items-center space-x-4">
                        {{-- Sort Dropdown --}}
                        <select wire:change="sortProducts($event.target.value)" 
                                class="bg-charcoal border border-blood-red/40 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blood-red font-rajdhani font-medium">
                            <option value="featured">SORT: FEATURED</option>
                            <option value="price-low">PRICE: LOW → HIGH</option>
                            <option value="price-high">PRICE: HIGH → LOW</option>
                            <option value="name">NAME: A → Z</option>
                        </select>
                        
                        {{-- View Toggle --}}
                        <div class="flex bg-charcoal rounded-lg p-1 border border-blood-red/40">
                            <button wire:click="setViewMode('grid')" 
                                    class="p-3 transition-all {{ $viewMode === 'grid' ? 'text-blood-red bg-blood-red/20 rounded' : 'text-gray-400 hover:text-blood-red' }}">
                                <i class="fas fa-th-large"></i>
                            </button>
                            <button wire:click="setViewMode('list')" 
                                    class="p-3 transition-all {{ $viewMode === 'list' ? 'text-blood-red bg-blood-red/20 rounded' : 'text-gray-400 hover:text-blood-red' }}">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif

    {{-- Loading Indicator --}}
    <div wire:loading class="text-center py-8">
        <div class="inline-flex items-center px-4 py-2 font-semibold leading-6 text-sm text-white transition ease-in-out duration-150">
            <i class="fas fa-spinner fa-spin mr-2"></i>
            Loading products...
        </div>
    </div>

    {{-- Products Grid/List --}}
    <div class="{{ $viewMode === 'grid' ? 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8' : 'space-y-6' }}" 
         wire:loading.class="opacity-50">
        
        @foreach($products as $product)
            <div class="product-card rounded-2xl overflow-hidden group {{ $viewMode === 'list' ? 'flex' : '' }}" 
                 data-name="{{ $product->name }}" 
                 data-price="{{ $product->price }}">
                
                {{-- Product Image --}}
                <div class="product-image-container relative bg-gradient-to-br from-charcoal to-obsidian {{ $viewMode === 'list' ? 'w-48 h-48 flex-shrink-0' : 'h-80' }} flex items-center justify-center p-8">
                    @if($product->image_url)
                        <img src="{{ $product->image_url }}" 
                             alt="{{ $product->name }}" 
                             class="max-h-full max-w-full object-contain filter drop-shadow-2xl group-hover:scale-110 transition-transform duration-500">
                    @else
                        <div class="text-gray-500 text-center">
                            <i class="fas fa-dumbbell text-7xl mb-4 text-blood-red/50"></i>
                            <p class="font-rajdhani font-medium">COMING SOON</p>
                        </div>
                    @endif
                    
                    {{-- Price Badge --}}
                    <div class="price-badge absolute top-4 right-4 text-white px-4 py-2 rounded-full font-rajdhani font-bold text-lg">
                        ${{ number_format($product->price, 2) }}
                    </div>

                    {{-- Wishlist Button --}}
                    <button class="wishlist-btn absolute top-4 left-4 bg-obsidian/80 border border-blood-red/40 rounded-full w-12 h-12 flex items-center justify-center hover:bg-blood-red hover:text-white transition-all duration-300 hover:scale-110">
                        <i class="far fa-heart text-blood-red"></i>
                    </button>
                </div>

                {{-- Product Details --}}
                <div class="p-8 {{ $viewMode === 'list' ? 'flex-1' : '' }}">
                    <h3 class="font-rajdhani font-bold text-2xl text-white mb-3 line-clamp-2">
                        {{ $product->name }}
                    </h3>
                    
                    <p class="text-gray-400 mb-6 text-sm leading-relaxed line-clamp-3">
                        {{ strlen($product->description) > 120 
                            ? substr($product->description, 0, 120) . '...' 
                            : $product->description }}
                    </p>

                    {{-- Rating --}}
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="flex text-blood-red mr-3">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star text-sm"></i>
                                @endfor
                            </div>
                            <span class="text-gray-500 text-sm font-rajdhani">(4.{{ rand(6, 9) }})</span>
                        </div>
                        <span class="text-xs text-gray-500 bg-charcoal px-3 py-1 rounded-full">{{ rand(50, 250) }} REVIEWS</span>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex space-x-3 {{ $viewMode === 'list' ? 'mt-auto' : '' }}">
                        {{-- Add to Cart Button --}}
                        <button wire:click="addToCart({{ $product->id }})" 
                                wire:loading.attr="disabled"
                                wire:loading.class="opacity-50 cursor-not-allowed"
                                class="add-to-cart-btn flex-1 red-button text-white py-4 rounded-xl font-rajdhani font-bold text-sm tracking-wide relative overflow-hidden disabled:opacity-50">
                            
                            {{-- Loading State --}}
                            <span wire:loading.remove wire:target="addToCart({{ $product->id }})">
                                <i class="fas fa-shopping-cart mr-2"></i>
                                ADD TO CART
                            </span>
                            
                            <span wire:loading wire:target="addToCart({{ $product->id }})">
                                <i class="fas fa-spinner fa-spin mr-2"></i>
                                ADDING...
                            </span>
                        </button>
                        
                        {{-- View Details Button --}}
                        <a href="#" class="bg-charcoal border border-blood-red/40 text-blood-red px-6 py-4 rounded-xl transition-all flex items-center justify-center hover:bg-blood-red hover:text-white group">
                            <i class="fas fa-eye group-hover:scale-110 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Empty State --}}
    @if($products->count() === 0)
        <div class="text-center py-20">
            <div class="filter-glass rounded-xl p-12 max-w-2xl mx-auto">
                <i class="fas fa-search text-6xl text-blood-red/30 mb-6"></i>
                <h2 class="text-3xl font-rajdhani font-bold text-white mb-4">
                    NO PRODUCTS FOUND
                </h2>
                <p class="text-lg text-gray-400 font-inter">
                    Try adjusting your filters or browse our other categories.
                </p>
            </div>
        </div>
    @endif

    {{-- Inline Styles --}}
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(220, 20, 60, 0.3);
        }

        .add-to-cart-btn {
            position: relative;
            overflow: hidden;
        }

        .add-to-cart-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .add-to-cart-btn:hover::before {
            left: 100%;
        }
    </style>

    {{-- JavaScript for animations and interactions --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Listen for successful product addition
            window.addEventListener('product-added', function(event) {
                const data = event.detail[0];
                const productId = data.productId;
                const productName = data.productName;
                
                // Find the button for this product
                const addButton = document.querySelector(`[wire\\:click="addToCart(${productId})"]`);
                if (addButton) {
                    // Temporarily change button content
                    const originalContent = addButton.innerHTML;
                    addButton.innerHTML = '<i class="fas fa-check mr-2 animate-bounce"></i>ADDED!';
                    addButton.classList.add('animate-pulse', 'bg-green-600');
                    
                    // Reset after 2 seconds
                    setTimeout(() => {
                        addButton.innerHTML = originalContent;
                        addButton.classList.remove('animate-pulse', 'bg-green-600');
                    }, 2000);
                }
                
                // Create flying cart animation
                createFlyToCartAnimation(addButton);
            });

            // Enhanced wishlist functionality
            const wishlistButtons = document.querySelectorAll('.wishlist-btn');
            wishlistButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const icon = this.querySelector('i');
                    
                    if (icon.classList.contains('far')) {
                        icon.classList.remove('far');
                        icon.classList.add('fas');
                        this.classList.add('bg-blood-red', 'text-white', 'scale-110');
                        this.classList.remove('bg-obsidian/80', 'border-blood-red/40');
                        
                        // Add heart beat animation
                        icon.classList.add('animate-ping');
                        setTimeout(() => icon.classList.remove('animate-ping'), 1000);
                    } else {
                        icon.classList.remove('fas');
                        icon.classList.add('far');
                        this.classList.remove('bg-blood-red', 'text-white', 'scale-110');
                        this.classList.add('bg-obsidian/80', 'border-blood-red/40');
                    }
                });
            });

            // Flying cart animation function
            function createFlyToCartAnimation(button) {
                if (!button) return;
                
                const rect = button.getBoundingClientRect();
                const cartIcon = document.querySelector('.fa-shopping-cart');
                
                if (cartIcon) {
                    const cartRect = cartIcon.getBoundingClientRect();
                    
                    // Create flying element
                    const flyingElement = document.createElement('div');
                    flyingElement.innerHTML = '<i class="fas fa-shopping-cart text-blood-red text-2xl"></i>';
                    flyingElement.style.position = 'fixed';
                    flyingElement.style.left = rect.left + rect.width / 2 + 'px';
                    flyingElement.style.top = rect.top + rect.height / 2 + 'px';
                    flyingElement.style.zIndex = '9999';
                    flyingElement.style.pointerEvents = 'none';
                    flyingElement.style.transition = 'all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                    
                    document.body.appendChild(flyingElement);
                    
                    // Animate to cart
                    setTimeout(() => {
                        flyingElement.style.left = cartRect.left + cartRect.width / 2 + 'px';
                        flyingElement.style.top = cartRect.top + cartRect.height / 2 + 'px';
                        flyingElement.style.transform = 'scale(0.5)';
                        flyingElement.style.opacity = '0';
                    }, 10);
                    
                    // Remove element
                    setTimeout(() => {
                        document.body.removeChild(flyingElement);
                        
                        // Animate cart icon
                        if (cartIcon) {
                            cartIcon.parentElement.classList.add('animate-bounce');
                            setTimeout(() => {
                                cartIcon.parentElement.classList.remove('animate-bounce');
                            }, 1000);
                        }
                    }, 800);
                }
            }
        });
    </script>
</div>