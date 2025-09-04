<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Energy Boosters - BruteCharge</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Rajdhani:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'blood-red': '#DC143C',
                        'fire-red': '#FF0000',
                        'dark-red': '#8B0000',
                        'obsidian': '#0B0B0B',
                        'charcoal': '#1C1C1C',
                        'steel': '#2D2D2D',
                        'accent-red': '#FF1744',
                    },
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                        'rajdhani': ['Rajdhani', 'sans-serif'],
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 20px rgba(220, 20, 60, 0.5)' },
                            '100%': { boxShadow: '0 0 30px rgba(220, 20, 60, 0.8)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: linear-gradient(135deg, #0B0B0B 0%, #1C1C1C 50%, #0B0B0B 100%);
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #DC143C 0%, #FF0000 50%, #FF1744 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .product-card {
            background: linear-gradient(145deg, rgba(28, 28, 28, 0.95) 0%, rgba(11, 11, 11, 0.95) 100%);
            border: 1px solid rgba(220, 20, 60, 0.3);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            backdrop-filter: blur(20px);
        }
        
        .product-card:hover {
            transform: translateY(-15px) scale(1.03);
            border-color: #DC143C;
            box-shadow: 0 25px 50px rgba(220, 20, 60, 0.4), 
                        0 0 40px rgba(220, 20, 60, 0.3);
        }
        
        .red-button {
            background: linear-gradient(135deg, #DC143C 0%, #FF0000 100%);
            box-shadow: 0 8px 32px rgba(220, 20, 60, 0.4);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .red-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .red-button:hover::before {
            left: 100%;
        }
        
        .red-button:hover {
            box-shadow: 0 12px 40px rgba(220, 20, 60, 0.6);
            transform: translateY(-3px);
        }
        
        .hero-bg {
            background: 
                radial-gradient(circle at 20% 20%, rgba(220, 20, 60, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 0, 0, 0.1) 0%, transparent 50%),
                linear-gradient(135deg, rgba(11, 11, 11, 0.9), rgba(28, 28, 28, 0.9));
            border: 1px solid rgba(220, 20, 60, 0.2);
        }
        
        .nav-glass {
            background: rgba(11, 11, 11, 0.95);
            border-bottom: 1px solid rgba(220, 20, 60, 0.3);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        
        .filter-glass {
            background: rgba(28, 28, 28, 0.95);
            border: 1px solid rgba(220, 20, 60, 0.2);
            backdrop-filter: blur(20px);
        }

        .dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .dropdown-menu {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            background: rgba(11, 11, 11, 0.98);
            border: 1px solid rgba(220, 20, 60, 0.4);
            backdrop-filter: blur(20px);
        }
        
        .dropdown-item {
            transition: all 0.2s ease;
        }
        
        .dropdown-item:hover {
            background: linear-gradient(90deg, rgba(220, 20, 60, 0.15), transparent);
            border-left: 4px solid #DC143C;
            padding-left: 1.5rem;
            transform: translateX(8px);
        }

        .price-badge {
            background: linear-gradient(135deg, #DC143C 0%, #FF0000 100%);
            box-shadow: 0 0 20px rgba(220, 20, 60, 0.6);
        }
        
        .stats-card {
            background: linear-gradient(145deg, rgba(28, 28, 28, 0.8), rgba(45, 45, 45, 0.8));
            border: 1px solid rgba(220, 20, 60, 0.3);
            backdrop-filter: blur(10px);
        }
        
        .text-blood { color: #DC143C; }
        .text-fire { color: #FF0000; }
        .text-accent { color: #FF1744; }
        
        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #1C1C1C;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #DC143C, #FF0000);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #FF0000, #FF1744);
        }
        
        /* Loading Animation */
        .loading-pulse {
            animation: pulse 1.5s ease-in-out infinite;
        }
        
        /* Enhanced Product Image Hover */
        .product-image-container {
            position: relative;
            overflow: hidden;
        }
        
        .product-image-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(220, 20, 60, 0.1) 50%, transparent 70%);
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }
        
        .product-card:hover .product-image-container::before {
            transform: translateX(100%);
        }
        
        /* Active Nav Link */
        .nav-link.active {
            color: #DC143C;
            position: relative;
        }
        
        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #DC143C, #FF0000);
            animation: pulse 2s infinite;
        }
        
        /* Smooth transitions for all interactive elements */
        * {
            transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease;
        }
    </style>
</head>

<body class="bg-obsidian min-h-screen text-white">
    <!-- Enhanced Navigation -->
    <nav class="fixed w-full z-50 nav-glass">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="font-rajdhani font-black text-3xl">
                    <span class="text-white">BRUTE</span><span class="gradient-text">CHARGE</span>
                    <i class="fas fa-bolt text-blood-red ml-2 animate-pulse"></i>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="{{ url('home') }}" class="nav-link hover:text-blood-red transition-colors font-semibold tracking-wide">HOME</a>
                    
                    <!-- Products Dropdown -->
                    <div class="relative dropdown group">
                        <a href="#" class="nav-link hover:text-blood-red transition-colors font-semibold flex items-center tracking-wide">
                            PRODUCTS
                            <svg class="w-4 h-4 ml-2 transition-transform duration-300 group-hover:rotate-180" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        
                        <!-- Dropdown Menu -->
                        <div class="dropdown-menu absolute top-full left-0 mt-2 w-72 rounded-xl shadow-2xl z-50">
                            <div class="py-3">
                                <a href="{{route('energy-boosters.all')}}" class="dropdown-item block px-6 py-4 text-sm hover:text-blood-red transition-colors">
                                    <div class="font-semibold text-white">All Products</div>
                                    <div class="text-xs text-gray-400 mt-1">Complete collection</div>
                                </a>
                                <a href="{{ route('preworkout.index') }}" class="dropdown-item block px-6 py-4 text-sm hover:text-blood-red transition-colors">
                                    <div class="font-semibold text-white">Pre-Workout Formulas</div>
                                    <div class="text-xs text-gray-400 mt-1">Explosive energy boosters</div>
                                </a>
                                <a href="{{ route('protein.index') }}" class="dropdown-item block px-6 py-4 text-sm hover:text-blood-red transition-colors">
                                    <div class="font-semibold text-white">Protein Powders</div>
                                    <div class="text-xs text-gray-400 mt-1">Premium muscle builders</div>
                                </a>
                                <a href="{{ route('creatine.index') }}" class="dropdown-item block px-6 py-4 text-sm hover:text-blood-red transition-colors">
                                    <div class="font-semibold text-white">Creatine Blends</div>
                                    <div class="text-xs text-gray-400 mt-1">Pure strength enhancers</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{route('nutrition.index')}}" class="hover:text-blood-red transition-colors font-semibold tracking-wide">NUTRITION</a>
                    <a href="{{route('training.index')}}" class="hover:text-blood-red transition-colors font-semibold tracking-wide">TRAINING</a>
                    <a href="#" class="hover:text-blood-red transition-colors font-semibold tracking-wide">CONTACT</a>
                </div>
                
                <!-- CTA Button with Cart Icon -->
                <div class="hidden lg:flex items-center space-x-4">
                    <!-- Cart Icon -->
                   <a href="{{ route('cart.index') }}" class="text-white hover:text-blood-red transition-colors text-xl">
                        <i class="fas fa-shopping-cart"></i>
                    </a>

                    
                    <!-- Shop Now Button -->
                    <button class="red-button text-white px-8 py-3 rounded-lg font-bold tracking-wide hover:scale-105 transition-transform">
                        SHOP NOW
                    </button>
                </div>
                
                <!-- Mobile Menu Button -->
                <div class="lg:hidden">
                    <button id="mobile-menu-btn" class="text-blood-red text-2xl focus:outline-none">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="lg:hidden hidden mt-6 py-4 border-t border-blood-red/20">
                <div class="flex flex-col space-y-4">
                    <a href="#" class="nav-link hover:text-blood-red transition-colors font-semibold tracking-wide">HOME</a>
                    <a href="#" class="nav-link hover:text-blood-red transition-colors font-semibold tracking-wide text-blood-red">PRODUCTS ⭐</a>
                    <a href="#" class="nav-link hover:text-blood-red transition-colors font-semibold tracking-wide">NUTRITION</a>
                    <a href="#" class="nav-link hover:text-blood-red transition-colors font-semibold tracking-wide">TRAINING</a>
                    <a href="#" class="nav-link hover:text-blood-red transition-colors font-semibold tracking-wide">CONTACT</a>
                    
                    <!-- Mobile Cart and Shop Button -->
                    <div class="flex items-center space-x-4 pt-2">
                        <button class="text-white hover:text-blood-red transition-colors text-xl">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                        <button class="red-button text-white px-6 py-2 rounded-lg font-bold tracking-wide w-fit">
                            SHOP NOW
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main Content -->
    <main class="pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="text-center mb-20 hero-bg py-24 rounded-2xl relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-blood-red/5 via-transparent to-fire-red/5"></div>
                <div class="relative z-10">
                    <h1 class="text-5xl md:text-7xl lg:text-8xl font-rajdhani font-black mb-8 leading-tight">
                        <span class="gradient-text">UNLEASH</span><br>
                        <span class="text-white">YOUR</span> <span class="gradient-text">BEAST</span>
                    </h1>
                    <p class="text-xl md:text-2xl text-gray-300 font-light max-w-3xl mx-auto mb-12 leading-relaxed">
                        Premium energy boosters engineered for elite athletes who refuse to compromise on performance
                    </p>
                    
                    <!-- Performance Stats -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
                        <div class="stats-card rounded-xl p-6">
                            <div class="text-3xl font-black text-blood-red mb-2">500+</div>
                            <div class="text-sm text-gray-400 font-medium">PRODUCTS</div>
                        </div>
                        <div class="stats-card rounded-xl p-6">
                            <div class="text-3xl font-black text-blood-red mb-2">10K+</div>
                            <div class="text-sm text-gray-400 font-medium">ATHLETES</div>
                        </div>
                        <div class="stats-card rounded-xl p-6">
                            <div class="text-3xl font-black text-blood-red mb-2">99%</div>
                            <div class="text-sm text-gray-400 font-medium">SATISFACTION</div>
                        </div>
                        <div class="stats-card rounded-xl p-6">
                            <div class="text-3xl font-black text-blood-red mb-2">24H</div>
                            <div class="text-sm text-gray-400 font-medium">SHIPPING</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter and Sort Bar -->
            <div class="filter-glass rounded-xl p-6 mb-12">
                <div class="flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-blood-red rounded-full animate-pulse"></div>
                            <h2 class="text-xl font-rajdhani font-bold text-white">
                                <span id="product-count">{{ $energyBoosters->count() }}</span> ELITE FORMULATIONS
                            </h2>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <select id="sort-select" class="bg-charcoal border border-blood-red/40 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blood-red font-rajdhani font-medium">
                            <option value="featured">SORT: FEATURED</option>
                            <option value="price-low">PRICE: LOW → HIGH</option>
                            <option value="price-high">PRICE: HIGH → LOW</option>
                            <option value="name">NAME: A → Z</option>
                        </select>
                        <div class="flex bg-charcoal rounded-lg p-1 border border-blood-red/40">
                            <button id="grid-view" class="p-3 text-blood-red bg-blood-red/20 rounded transition-all">
                                <i class="fas fa-th-large"></i>
                            </button>
                            <button id="list-view" class="p-3 text-gray-400 hover:text-blood-red transition-all">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Grid - Using Livewire Component -->
            @livewire('product-list', ['products' => $energyBoosters])

            <!-- Load More Button -->
            @if($energyBoosters->count() > 0)
                <div class="text-center mt-20">
                    <button id="load-more" class="red-button text-white px-12 py-4 rounded-xl font-rajdhani font-bold text-lg tracking-wide hover:scale-105 transition-transform">
                        <i class="fas fa-plus mr-3"></i>
                        LOAD MORE POWER
                    </button>
                </div>
            @endif
        </div>
    </main>

    <!-- Enhanced Footer -->
    <footer class="nav-glass py-20 mt-24 border-t border-blood-red/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="md:col-span-2">
                    <div class="text-3xl font-rajdhani font-black mb-6">
                        <span class="text-white">BRUTE</span><span class="gradient-text">CHARGE</span>
                        <i class="fas fa-bolt text-blood-red ml-2"></i>
                    </div>
                    <p class="text-gray-400 font-rajdhani text-lg max-w-md leading-relaxed mb-8">
                        Engineering the future of athletic performance through science-backed supplementation for elite athletes worldwide.
                    </p>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-blood-red text-2xl transition-colors transform hover:scale-110">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-blood-red text-2xl transition-colors transform hover:scale-110">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-blood-red text-2xl transition-colors transform hover:scale-110">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-blood-red text-2xl transition-colors transform hover:scale-110">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="font-rajdhani font-bold text-blood-red mb-6 text-lg">PRODUCTS</h4>
                    <ul class="space-y-4 text-gray-400 font-rajdhani">
                        <li><a href="#" class="hover:text-blood-red transition-colors">Energy Boosters</a></li>
                        <li><a href="#" class="hover:text-blood-red transition-colors">Protein Powders</a></li>
                        <li><a href="#" class="hover:text-blood-red transition-colors">Pre-Workouts</a></li>
                        <li><a href="#" class="hover:text-blood-red transition-colors">Creatine Blends</a></li>
                        <li><a href="#" class="hover:text-blood-red transition-colors">Vitamins & Minerals</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-rajdhani font-bold text-blood-red mb-6 text-lg">SUPPORT</h4>
                    <ul class="space-y-4 text-gray-400 font-rajdhani">
                        <li><a href="#" class="hover:text-blood-red transition-colors">Contact Us</a></li>
                        <li><a href="#" class="hover:text-blood-red transition-colors">FAQ</a></li>
                        <li><a href="#" class="hover:text-blood-red transition-colors">Shipping Info</a></li>
                        <li><a href="#" class="hover:text-blood-red transition-colors">Returns</a></li>
                        <li><a href="#" class="hover:text-blood-red transition-colors">Track Order</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-blood-red/30 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-500 font-rajdhani mb-4 md:mb-0">
                    &copy; 2025 BruteCharge. All rights reserved. UNLEASH THE BEAST WITHIN.
                </p>
                <div class="flex items-center space-x-6 text-sm text-gray-500">
                    <a href="#" class="hover:text-blood-red transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-blood-red transition-colors">Terms of Service</a>
                    <a href="#" class="hover:text-blood-red transition-colors">Cookies</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // In-memory cart storage (replaces sessionStorage)
        let cart = {};
        
        // Cart management functions
        function addToCart(productId, productName, productPrice, productImage) {
            // Add or increment product in memory
            if (cart[productId]) {
                cart[productId].quantity++;
            } else {
                cart[productId] = {
                    id: productId,
                    name: productName,
                    price: parseFloat(productPrice),
                    quantity: 1,
                    image: productImage || ''
                };
            }
            
            // Update Livewire if available
            if (typeof Livewire !== 'undefined') {
                Livewire.dispatch('cart-updated', {
                    count: Object.values(cart).reduce((sum, item) => sum + item.quantity, 0),
                    total: Object.values(cart).reduce((sum, item) => sum + (item.price * item.quantity), 0),
                    message: `Added ${productName} to cart!`
                });
            }
            
            console.log('Added to cart:', {
                id: productId,
                name: productName,
                price: productPrice,
                image: productImage,
                currentCart: cart
            });
        }

        // Enhanced Add to cart functionality with animations
        function handleAddToCartClick(button, e) {
            e.preventDefault();
            const productId = button.dataset.productId;
            const productName = button.dataset.productName;
            const productPrice = button.dataset.productPrice;
            const productImage = button.dataset.productImage || '';
            
            // Create ripple effect
            const rect = button.getBoundingClientRect();
            const ripple = document.createElement('span');
            ripple.style.cssText = `
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.6);
                transform: scale(0);
                animation: ripple 0.6s linear;
                left: ${e.clientX - rect.left - 10}px;
                top: ${e.clientY - rect.top - 10}px;
                width: 20px;
                height: 20px;
                pointer-events: none;
            `;
            
            button.style.position = 'relative';
            button.appendChild(ripple);
            
            // Call the addToCart function
            addToCart(productId, productName, productPrice, productImage);
            
            // Update button content with success animation
            const originalContent = button.innerHTML;
            button.innerHTML = '<span class="animate-bounce"><i class="fas fa-check mr-2"></i>ADDED TO CART!</span>';
            button.classList.add('animate-pulse');
            
            // Multi-stage animation
            setTimeout(() => {
                button.innerHTML = '<span><i class="fas fa-fire mr-2"></i>BEAST MODE ACTIVATED!</span>';
            }, 1000);
            
            setTimeout(() => {
                button.innerHTML = originalContent;
                button.classList.remove('animate-pulse');
                if (ripple && ripple.parentNode) {
                    ripple.remove();
                }
            }, 3000);
        }

        // Handle all add to cart buttons (both classes)
        const addToCartButtons = document.querySelectorAll('.add-to-cart, .add-to-cart-data');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                handleAddToCartClick(this, e);
            });
        });

        // Enhanced Wishlist functionality
        const wishlistButtons = document.querySelectorAll('.wishlist-btn');
        wishlistButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const icon = this.querySelector('i');
                
                if (icon && icon.classList.contains('far')) {
                    // Add to wishlist
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                    this.classList.add('bg-blood-red', 'text-white', 'scale-110');
                    this.classList.remove('bg-obsidian/80', 'border-blood-red/40');
                    
                    // Add heart beat animation
                    icon.classList.add('animate-ping');
                    setTimeout(() => {
                        if (icon) icon.classList.remove('animate-ping');
                    }, 1000);
                } else if (icon) {
                    // Remove from wishlist
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                    this.classList.remove('bg-blood-red', 'text-white', 'scale-110');
                    this.classList.add('bg-obsidian/80', 'border-blood-red/40');
                }
            });
        });

        // View toggle functionality with smooth transitions
        const gridView = document.getElementById('grid-view');
        const listView = document.getElementById('list-view');
        const productsContainer = document.getElementById('products-container');

        if (gridView && listView && productsContainer) {
            gridView.addEventListener('click', function() {
                productsContainer.style.opacity = '0.5';
                setTimeout(() => {
                    productsContainer.className = 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 transition-all duration-500';
                    productsContainer.style.opacity = '1';
                }, 150);
                
                this.classList.add('text-blood-red', 'bg-blood-red/20');
                this.classList.remove('text-gray-400');
                listView.classList.remove('text-blood-red', 'bg-blood-red/20');
                listView.classList.add('text-gray-400');
            });

            listView.addEventListener('click', function() {
                productsContainer.style.opacity = '0.5';
                setTimeout(() => {
                    productsContainer.className = 'grid grid-cols-1 gap-6 transition-all duration-500';
                    productsContainer.style.opacity = '1';
                }, 150);
                
                this.classList.add('text-blood-red', 'bg-blood-red/20');
                this.classList.remove('text-gray-400');
                gridView.classList.remove('text-blood-red', 'bg-blood-red/20');
                gridView.classList.add('text-gray-400');
            });
        }

        // Enhanced Sort functionality with loading states
        const sortSelect = document.getElementById('sort-select');
        if (sortSelect) {
            sortSelect.addEventListener('change', function() {
                const cards = Array.from(document.querySelectorAll('.product-card'));
                const container = document.getElementById('products-container');
                
                if (container && cards.length > 0) {
                    // Add loading state
                    container.style.opacity = '0.5';
                    container.classList.add('loading-pulse');
                    
                    setTimeout(() => {
                        cards.sort((a, b) => {
                            switch(this.value) {
                                case 'price-low':
                                    const priceA = parseFloat(a.dataset.price || '0');
                                    const priceB = parseFloat(b.dataset.price || '0');
                                    return priceA - priceB;
                                case 'price-high':
                                    const priceHighA = parseFloat(a.dataset.price || '0');
                                    const priceHighB = parseFloat(b.dataset.price || '0');
                                    return priceHighB - priceHighA;
                                case 'name':
                                    const nameA = a.dataset.name || '';
                                    const nameB = b.dataset.name || '';
                                    return nameA.localeCompare(nameB);
                                default:
                                    return 0;
                            }
                        });
                        
                        // Clear container and re-append sorted cards
                        container.innerHTML = '';
                        cards.forEach(card => container.appendChild(card));
                        
                        // Remove loading state
                        container.style.opacity = '1';
                        container.classList.remove('loading-pulse');
                    }, 500);
                }
            });
        }

        // Load more functionality with enhanced animation
        const loadMoreBtn = document.getElementById('load-more');
        if (loadMoreBtn) {
            loadMoreBtn.addEventListener('click', function() {
                const originalContent = this.innerHTML;
                this.innerHTML = '<i class="fas fa-spinner fa-spin mr-3"></i>FORGING MORE POWER...';
                this.classList.add('animate-pulse');
                
                // Simulate loading
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-check mr-3"></i>MORE BEASTS UNLEASHED!';
                }, 2000);
                
                setTimeout(() => {
                    this.innerHTML = originalContent;
                    this.classList.remove('animate-pulse');
                }, 4000);
            });
        }

        // Enhanced Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', function() {
                const icon = this.querySelector('i');
                
                if (mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.remove('hidden');
                    mobileMenu.style.maxHeight = '0px';
                    mobileMenu.style.overflow = 'hidden';
                    mobileMenu.style.transition = 'max-height 0.3s ease-in-out';
                    
                    setTimeout(() => {
                        mobileMenu.style.maxHeight = '400px';
                    }, 10);
                    
                    if (icon) {
                        icon.classList.remove('fa-bars');
                        icon.classList.add('fa-times');
                    }
                } else {
                    mobileMenu.style.maxHeight = '0px';
                    
                    setTimeout(() => {
                        mobileMenu.classList.add('hidden');
                    }, 300);
                    
                    if (icon) {
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    }
                }
            });
        }
        
        // Highlight current page in nav
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            if (link.href && link.href === window.location.href) {
                link.classList.add('active');
            }
        });
        
        // Parallax effect for hero section (with throttling for performance)
        let ticking = false;
        function updateParallax() {
            const scrolled = window.pageYOffset;
            const heroSection = document.querySelector('.hero-bg');
            if (heroSection) {
                const rate = scrolled * -0.5;
                heroSection.style.transform = `translateY(${rate}px)`;
            }
            ticking = false;
        }
        
        window.addEventListener('scroll', function() {
            if (!ticking) {
                requestAnimationFrame(updateParallax);
                ticking = true;
            }
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const target = document.querySelector(targetId);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Product cards entrance animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };
        
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);
        
        // Apply animation to product cards
        document.querySelectorAll('.product-card').forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(50px)';
            card.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
            observer.observe(card);
        });
        
        // Add dynamic CSS for animations
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
            
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
            
            .loading-pulse {
                animation: pulse 1.5s ease-in-out infinite;
            }
            
            @keyframes pulse {
                0%, 100% { opacity: 0.5; }
                50% { opacity: 0.8; }
            }
        `;
        
        // Only add styles if they don't already exist
        if (!document.querySelector('#brutecharge-dynamic-styles')) {
            style.id = 'brutecharge-dynamic-styles';
            document.head.appendChild(style);
        }
    });
    </script>
</body>
</html>
