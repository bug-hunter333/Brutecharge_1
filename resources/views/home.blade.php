<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BruteCharge⚡ - Beast Mode Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'neon-green': '#39ff14',
                        'neon-orange': '#ff6600',
                        'dark-bg': '#0a0a0a',
                        'dark-surface': '#1a1a1a',
                        'dark-card': '#2a2a2a'
                    },
                    animation: {
                        'pulse-glow': 'pulse-glow 2s ease-in-out infinite alternate',
                        'float': 'float 3s ease-in-out infinite',
                        'slide-up': 'slide-up 0.6s ease-out',
                        'zoom-in': 'zoom-in 0.5s ease-out'
                    },
                    keyframes: {
                        'pulse-glow': {
                            'from': { 'box-shadow': '0 0 20px rgba(57, 255, 20, 0.5)' },
                            'to': { 'box-shadow': '0 0 40px rgba(57, 255, 20, 0.8), 0 0 60px rgba(57, 255, 20, 0.3)' }
                        },
                        'float': {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        'slide-up': {
                            'from': { transform: 'translateY(50px)', opacity: '0' },
                            'to': { transform: 'translateY(0)', opacity: '1' }
                        },
                        'zoom-in': {
                            'from': { transform: 'scale(0.8)', opacity: '0' },
                            'to': { transform: 'scale(1)', opacity: '1' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@300;400;600;700&display=swap');
        
        .font-orbitron { font-family: 'Orbitron', monospace; }
        .font-rajdhani { font-family: 'Rajdhani', sans-serif; }
        
        .gradient-text {
            background: linear-gradient(45deg, #39ff14, #ff6600, #39ff14);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradient-shift 3s ease-in-out infinite;
        }
        
        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .neon-border {
            border: 2px solid #39ff14;
            box-shadow: 0 0 20px rgba(57, 255, 20, 0.3);
        }
        
        .hero-bg {
            background: radial-gradient(circle at 20% 80%, rgba(57, 255, 20, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(255, 102, 0, 0.1) 0%, transparent 50%),
                        #0a0a0a;
        }
        
        .product-card {
            transition: all 0.3s ease;
            background: linear-gradient(145deg, #2a2a2a, #1a1a1a);
        }
        
        .product-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(57, 255, 20, 0.2);
        }
        /* Enhanced Dropdown Styles */
        .dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .dropdown-menu {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }
        
        .dropdown-item {
            transition: all 0.2s ease;
        }
        
        .dropdown-item:hover {
            background: linear-gradient(90deg, rgba(57, 255, 20, 0.1), transparent);
            border-left: 3px solid #39ff14;
            padding-left: 1rem;
        }
        /* Mobile Menu Styles */
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
        }
        
        .mobile-menu.active {
            transform: translateX(0);
        }
        /* Enhanced User Menu Dropdown */
        .user-dropdown:hover .user-dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .user-dropdown-menu {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }
        .user-dropdown-item:hover {
            background: linear-gradient(90deg, rgba(255, 102, 0, 0.1), transparent);
            border-left: 3px solid #ff6600;
            padding-left: 1rem;
        }
        /* Hover glow effect */
        .hover-glow:hover {
            box-shadow: 0 0 20px rgba(57, 255, 20, 0.5);
        }
    </style>
</head>
<body class="bg-dark-bg text-white font-rajdhani overflow-x-hidden">
    <!-- Enhanced Navigation -->
    <nav class="fixed w-full z-50 bg-dark-bg/90 backdrop-blur-lg border-b border-neon-green/20">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Brand Logo -->
                <div class="font-orbitron font-black text-2xl gradient-text">
                    BruteCharge⚡
                </div>
                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="hover:text-neon-green transition-colors font-semibold">HOME</a>
                    
                    <!-- Enhanced Products Dropdown -->
                    <div class="relative dropdown">
                        <a href="#" class="hover:text-neon-green transition-colors font-semibold flex items-center">
                            PRODUCTS
                            <svg class="w-4 h-4 ml-1 transition-transform duration-200 group-hover:rotate-180" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        
                        <!-- Enhanced Dropdown Menu -->
                        <div class="dropdown-menu absolute top-full left-0 mt-2 w-72 bg-dark-bg/95 backdrop-blur-lg border border-neon-green/30 rounded-lg shadow-2xl">
                            <div class="py-3">
                                <a href="{{ route('energy-boosters.all') }}" class="dropdown-item block px-4 py-3 text-sm hover:text-neon-green transition-colors">
                                    <div class="flex items-center">
                                        <span class="text-lg mr-3">🛍️</span>
                                        <div>
                                            <div class="font-semibold">All Products</div>
                                            <div class="text-xs text-gray-400 mt-1">Complete beast collection</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('preworkout.index') }}" class="dropdown-item block px-4 py-3 text-sm hover:text-neon-green transition-colors">
                                    <div class="flex items-center">
                                        <span class="text-lg mr-3">💪</span>
                                        <div>
                                            <div class="font-semibold">Pre-Workout Formulas</div>
                                            <div class="text-xs text-gray-400 mt-1">Explosive energy boosters</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('protein.index') }}" class="dropdown-item block px-4 py-3 text-sm hover:text-neon-green transition-colors">
                                    <div class="flex items-center">
                                        <span class="text-lg mr-3">🥤</span>
                                        <div>
                                            <div class="font-semibold">Protein Powders</div>
                                            <div class="text-xs text-gray-400 mt-1">Premium muscle builders</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('creatine.index') }}" class="dropdown-item block px-4 py-3 text-sm hover:text-neon-green transition-colors">
                                    <div class="flex items-center">
                                        <span class="text-lg mr-3">⚡</span>
                                        <div>
                                            <div class="font-semibold">Creatine Blends</div>
                                            <div class="text-xs text-gray-400 mt-1">Pure strength enhancers</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{ route('nutrition.index') }}" class="hover:text-neon-green transition-colors font-semibold">NUTRITION</a>
                    <a href="{{ route('training.index') }}" class="hover:text-neon-green transition-colors font-semibold">TRAINING</a>
                  
                </div>
                <!-- User Menu & Actions -->
                @auth
                <div class="hidden md:flex items-center space-x-4">
                    <!-- Enhanced User Dropdown -->
                    <div class="relative user-dropdown">
                        <button class="text-neon-green font-semibold flex items-center space-x-2 hover:text-neon-orange transition-colors">
                            <span>Welcome, {{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <!-- User Dropdown Menu -->
                        <div class="user-dropdown-menu absolute right-0 mt-2 w-56 bg-dark-bg/95 backdrop-blur-lg border border-neon-orange/30 rounded-lg shadow-2xl">
                            <div class="py-2">
                                {{-- <a href="{{ route('dashboard') }}" class="user-dropdown-item block px-4 py-3 text-sm hover:text-neon-orange transition-all duration-200">
                                    <div class="flex items-center">
                                        <span class="text-lg mr-3">📊</span>
                                        <div>
                                            <div class="font-semibold">Dashboard</div>
                                            <div class="text-xs text-gray-400 mt-1">Your beast control center</div>
                                        </div>
                                    </div>
                                </a> --}}
                                <a href="{{ route('profile.show') }}" class="user-dropdown-item block px-4 py-3 text-sm hover:text-neon-orange transition-all duration-200">
                                    <div class="flex items-center">
                                        <span class="text-lg mr-3">👤</span>
                                        <div>
                                            <div class="font-semibold">Profile Settings</div>
                                            <div class="text-xs text-gray-400 mt-1">Manage your beast profile</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="" class="user-dropdown-item block px-4 py-3 text-sm hover:text-neon-orange transition-all duration-200">
                                    <div class="flex items-center">
                                        <span class="text-lg mr-3">📦</span>
                                        <div>
                                            <div class="font-semibold">My Orders</div>
                                            <div class="text-xs text-gray-400 mt-1">Track your deliveries</div>
                                        </div>
                                    </div>
                                </a>
                            <div class="border-t border-gray-700 my-2"></div>
                                 <a href="{{ route('cart.index') }}" class="text-white hover:text-blood-red transition-colors text-xl">
                                    <i class="fas fa-shopping-cart"></i>
                                    <div class="flex items-center">
                                            <span class="text-sm mr-3">🛒</span>
                                            <div>
                                                <div class="font-semibold">Cart</div>
                                                <div class="text-xs text-gray-400 mt-1">My Cart</div>
                                            </div>
                                        </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- CTA Button -->
                    
                    <a href="{{ route('energy-boosters.all') }}" class="bg-neon-orange text-black px-6 py-2 rounded-full font-bold hover:bg-red-600 transition-colors hover-glow">
                        SHOP BEAST
                    </a>
                </div>
                @else
                <!-- Guest User Actions -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="border-2 border-neon-green text-neon-green px-6 py-2 rounded-full font-bold hover:bg-neon-green hover:text-black transition-colors">
                        LOGIN
                    </a>
                    <a href="{{ route('register') }}" class="bg-neon-green text-black px-6 py-2 rounded-full font-bold hover:bg-neon-orange transition-colors hover-glow">
                        JOIN BEAST MODE
                    </a>
                </div>
                @endauth
                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-neon-green text-2xl focus:outline-none hover:text-neon-orange transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu md:hidden fixed top-0 right-0 h-full w-80 bg-dark-bg/95 backdrop-blur-lg border-l border-neon-green/30 z-50">
            <div class="p-6">
                <!-- Mobile Menu Header -->
                <div class="flex items-center justify-between mb-8">
                    <div class="font-orbitron font-bold text-xl gradient-text">BEAST MENU</div>
                    <button id="mobile-menu-close" class="text-neon-orange text-2xl hover:text-red-500 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <!-- Mobile User Info -->
                @auth
                <div class="bg-dark-card rounded-lg p-4 mb-6 border border-neon-green/30">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-neon-green rounded-full flex items-center justify-center">
                            <span class="text-black font-bold">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</span>
                        </div>
                        <div>
                            <div class="font-semibold text-neon-green">{{ Auth::user()->name }}</div>
                            <div class="text-sm text-gray-400">Beast Mode Active</div>
                        </div>
                    </div>
                </div>
                @else
                <div class="bg-dark-card rounded-lg p-4 mb-6 border border-neon-orange/30">
                    <div class="text-center">
                        <div class="text-2xl mb-2">🚀</div>
                        <div class="font-semibold text-neon-orange">Join Beast Mode</div>
                        <div class="text-sm text-gray-400">Sign up to unlock features</div>
                    </div>
                </div>
                @endauth
                <!-- Mobile Navigation Links -->
                <div class="space-y-4">
                    <a href="{{ route('home') }}" class="block py-3 px-4 rounded-lg hover:bg-neon-green/10 transition-colors font-semibold">
                        🏠 HOME
                    </a>
                    
                    <!-- Mobile Products Section -->
                    <div class="space-y-2">
                        <div class="font-semibold text-neon-green py-2 px-4">PRODUCTS</div>
                        <a href="{{ route('energy-boosters.all') }}" class="block py-2 px-6 text-sm hover:bg-neon-green/10 rounded-lg transition-colors">
                            🛍️ All Products
                        </a>
                        <a href="{{ route('preworkout.index') }}" class="block py-2 px-6 text-sm hover:bg-neon-green/10 rounded-lg transition-colors">
                            💪 Pre-Workout
                        </a>
                        <a href="{{ route('protein.index') }}" class="block py-2 px-6 text-sm hover:bg-neon-green/10 rounded-lg transition-colors">
                            🥤 Protein Powders
                        </a>
                        <a href="{{ route('creatine.index') }}" class="block py-2 px-6 text-sm hover:bg-neon-green/10 rounded-lg transition-colors">
                            ⚡ Creatine Blends
                        </a>
                    </div>
                    
                    <a href="{{ route('nutrition.index') }}" class="block py-3 px-4 rounded-lg hover:bg-neon-green/10 transition-colors font-semibold">
                        🥗 NUTRITION
                    </a>
                    <a href="{{ route('training.index') }}" class="block py-3 px-4 rounded-lg hover:bg-neon-green/10 transition-colors font-semibold">
                        🏋️ TRAINING
                    </a>
                    <a href="{{ route('dashboard') }}" class="block py-3 px-4 rounded-lg hover:bg-neon-orange/10 transition-colors font-semibold text-neon-orange">
                        📊 DASHBOARD
                    </a>
                </div>
                <!-- Mobile Actions -->
                <div class="mt-8 space-y-4">
                    @auth
                        <a href="{{ route('energy-boosters.all') }}" class="w-full bg-neon-green text-black py-3 rounded-full font-bold hover:bg-neon-orange transition-colors block text-center">
                            🛒 SHOP BEAST MODE
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit" class="w-full border-2 border-neon-orange text-neon-orange py-3 rounded-full font-bold hover:bg-neon-orange hover:text-black transition-colors">
                                🚪 LOGOUT
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="w-full border-2 border-neon-green text-neon-green py-3 rounded-full font-bold hover:bg-neon-green hover:text-black transition-colors block text-center">
                            🔑 LOGIN
                        </a>
                        <a href="{{ route('register') }}" class="w-full bg-neon-orange text-black py-3 rounded-full font-bold hover:bg-neon-green transition-colors block text-center">
                            🚀 JOIN BEAST MODE
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section - Personalized -->
    <section class="hero-bg min-h-screen flex items-center justify-center pt-20">
        <div class="container mx-auto px-6 text-center">
            <div class="animate-slide-up">
                <h1 class="font-orbitron font-black text-4xl md:text-6xl lg:text-7xl gradient-text mb-6">
                    WELCOME BACK, {{ $user->name }} ☠
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto">
                    Ready to dominate another day? {{ $user->name }} Your personalized beast mode arsenal awaits.
                </p>
                
                <!-- User Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto mb-12">
                    <div class="animate-float" style="animation-delay: 0.1s">
                        <div class="text-3xl font-orbitron font-bold text-neon-green">{{ $user_stats['total_orders'] }}</div>
                        <div class="text-gray-400">Beast Orders</div>
                    </div>
                    <div class="animate-float" style="animation-delay: 0.2s">
                        <div class="text-3xl font-orbitron font-bold text-neon-orange">{{ $user_stats['loyalty_points'] }}</div>
                        <div class="text-gray-400">Beast Points</div>
                    </div>
                    <div class="animate-float" style="animation-delay: 0.3s">
                        <div class="text-3xl font-orbitron font-bold text-neon-green">{{ $user_stats['member_since'] }}</div>
                        <div class="text-gray-400">Beast Since</div>
                    </div>
                    <div class="animate-float" style="animation-delay: 0.4s">
                        <div class="text-2xl font-orbitron font-bold text-neon-orange">{{ $user_stats['favorite_category'] }}</div>
                        <div class="text-gray-400">Favorite Beast</div>
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="{{ route('energy-boosters.all') }}" class="bg-neon-green text-black px-8 py-4 rounded-full font-bold text-lg hover:bg-neon-orange transition-all hover:scale-105 animate-pulse-glow">
                        🔥 SHOP BEAST MODE
                    </a>
                   <a href="https://maps.app.goo.gl/7M8U7BDMaUnB4kKi8" 
                    target="_blank" 
                    rel="noopener noreferrer" 
                    class="border-2 border-neon-green text-neon-green px-8 py-4 rounded-full font-bold text-lg hover:bg-neon-green hover:text-black transition-all">
                    📍 SPOT OUR LOCATION
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Actions -->
    <section class="py-12 bg-dark-surface/50">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="{{ route('energy-boosters.all') }}" class="bg-dark-card rounded-xl p-6 border border-neon-green/30 hover:border-neon-green hover:scale-105 transition-all">
                    <div class="text-center">
                        <div class="text-4xl mb-4">🛒</div>
                        <h3 class="font-orbitron font-bold text-xl text-neon-green mb-2">SHOP NOW</h3>
                        <p class="text-gray-400">Browse our complete beast arsenal</p>
                    </div>
                </a>
                
                <a href="{{ route('dashboard') }}" class="bg-dark-card rounded-xl p-6 border border-neon-orange/30 hover:border-neon-orange hover:scale-105 transition-all">
                    <div class="text-center">
                        <div class="text-4xl mb-4">📊</div>
                        <h3 class="font-orbitron font-bold text-xl text-neon-orange mb-2">MY ORDERS</h3>
                        <p class="text-gray-400">Track your beast deliveries</p>
                    </div>
                </a>
                
                <a href="{{ route('profile.show') }}" class="bg-dark-card rounded-xl p-6 border border-neon-green/30 hover:border-neon-green hover:scale-105 transition-all">
                    <div class="text-center">
                        <div class="text-4xl mb-4">👤</div>
                        <h3 class="font-orbitron font-bold text-xl text-neon-green mb-2">PROFILE</h3>
                        <p class="text-gray-400">Manage your beast settings</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-20 bg-dark-surface">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="font-orbitron font-bold text-4xl md:text-5xl gradient-text mb-6">
                    YOUR BEAST MODE ESSENTIALS
                </h2>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                    Handpicked for maximum domination - your personalized recommendation engine
                </p>
            </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <!-- Product 1 -->
    <div class="product-card rounded-2xl p-6 neon-border animate-zoom-in" style="animation-delay: 0.1s">
        <div class="bg-gradient-to-br from-neon-green/20 to-transparent h-48 rounded-xl mb-6 flex items-center justify-center overflow-hidden">
            <img src="{{ asset('images/pre.jpg') }}" alt="Beast Pre-Workout" class="h-full w-full object-cover rounded-xl">
        </div>
        <h3 class="font-orbitron font-bold text-2xl text-neon-green mb-3">BEAST PRE-WORKOUT</h3>
        <p class="text-gray-300 mb-4">Explosive energy that transforms workouts into domination sessions</p>
        <div class="flex items-center justify-between">
            <span class="text-2xl font-bold text-neon-orange">$49.99</span>
            <button class="bg-neon-green text-black px-4 py-2 rounded-full font-bold hover:bg-neon-orange transition-colors">
                ADD TO BEAST CART
            </button>
        </div>
    </div>

    <!-- Product 2 -->
    <div class="product-card rounded-2xl p-6 neon-border animate-zoom-in" style="animation-delay: 0.2s">
        <div class="bg-gradient-to-br from-neon-orange/20 to-transparent h-48 rounded-xl mb-6 flex items-center justify-center overflow-hidden">
            <img src="{{ asset('images/protein.jpg') }}" alt="Savage Protein" class="h-full w-full object-cover rounded-xl">
        </div>
        <h3 class="font-orbitron font-bold text-2xl text-neon-orange mb-3">SAVAGE PROTEIN</h3>
        <p class="text-gray-300 mb-4">25g of pure muscle-building fury in every scoop</p>
        <div class="flex items-center justify-between">
            <span class="text-2xl font-bold text-neon-green">$39.99</span>
            <button class="bg-neon-orange text-black px-4 py-2 rounded-full font-bold hover:bg-neon-green transition-colors">
                FUEL UP NOW
            </button>
        </div>
    </div>

    <!-- Product 3 -->
    <div class="product-card rounded-2xl p-6 neon-border animate-zoom-in" style="animation-delay: 0.3s">
        <div class="bg-gradient-to-br from-neon-green/20 to-transparent h-48 rounded-xl mb-6 flex items-center justify-center overflow-hidden">
            <img src="{{ asset('images/creatine.jpg') }}" alt="Beast Creatine" class="h-full w-full object-cover rounded-xl">
        </div>
        <h3 class="font-orbitron font-bold text-2xl text-neon-green mb-3">BEAST CREATINE</h3>
        <p class="text-gray-300 mb-4">Pure strength amplification for maximum power output</p>
        <div class="flex items-center justify-between">
            <span class="text-2xl font-bold text-neon-orange">$29.99</span>
            <button class="bg-neon-green text-black px-4 py-2 rounded-full font-bold hover:bg-neon-orange transition-colors">
                POWER UP NOW
            </button>
        </div>
    </div>
</div>



    <!-- Recent Activity -->
    <section class="py-20 bg-dark-bg">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="font-orbitron font-bold text-4xl gradient-text mb-6">
                    YOUR BEAST JOURNEY
                </h2>
                <p class="text-xl text-gray-300">Track your progress and recent beast activities</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <!-- Recent Orders -->
                <div class="bg-dark-card rounded-2xl p-6 border border-neon-green/30">
                    <h3 class="font-orbitron font-bold text-xl text-neon-green mb-4 flex items-center">
                        <span class="mr-3">📦</span> Recent Orders
                    </h3>
                    @if(count($recent_orders) > 0)
                        @foreach($recent_orders as $order)
                            <div class="bg-dark-surface rounded-lg p-4 mb-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-300">Order #{{ $order['id'] }}</span>
                                    <span class="text-neon-orange font-bold">${{ $order['total'] }}</span>
                                </div>
                                <div class="text-sm text-gray-400 mt-1">{{ $order['date'] }}</div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center py-8 text-gray-400">
                            <div class="text-4xl mb-4">🛒</div>
                            <p>No recent orders found.</p>
                            <a href="{{ route('energy-boosters.all') }}" class="text-neon-green hover:underline">Start your beast journey!</a>
                        </div>
                    @endif
                </div>

                <!-- Beast Achievements -->
                <div class="bg-dark-card rounded-2xl p-6 border border-neon-orange/30">
                    <h3 class="font-orbitron font-bold text-xl text-neon-orange mb-4 flex items-center">
                        <span class="mr-3">🏆</span> Beast Achievements
                    </h3>
                    <div class="space-y-4">
                        <div class="bg-dark-surface rounded-lg p-4">
                            <div class="flex items-center">
                                <span class="text-2xl mr-3">🔥</span>
                                <div>
                                    <div class="text-neon-green font-bold">First Beast Order</div>
                                    <div class="text-sm text-gray-400">Welcome to the beast family!</div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-dark-surface rounded-lg p-4">
                            <div class="flex items-center">
                                <span class="text-2xl mr-3">💪</span>
                                <div>
                                    <div class="text-neon-orange font-bold">Beast Mode Activated</div>
                                    <div class="text-sm text-gray-400">Account created successfully</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     </section>

    <!-- Newsletter Section -->
      <!-- Newsletter Section -->
    <section class="py-20 bg-gradient-to-r from-dark-bg via-dark-surface to-dark-bg relative overflow-hidden">
        <!-- Background Effects -->
        <div class="absolute inset-0 bg-gradient-to-r from-neon-green/5 via-transparent to-neon-orange/5"></div>
        <div class="absolute top-1/2 left-1/4 w-96 h-96 bg-neon-green/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute top-1/3 right-1/4 w-64 h-64 bg-neon-orange/10 rounded-full blur-3xl animate-float" style="animation-delay: 1s;"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <!-- Newsletter Header -->
                <div class="animate-slide-up mb-12">
                    <div class="text-6xl mb-6 animate-float">💥</div>
                    <h2 class="font-orbitron font-black text-4xl md:text-5xl lg:text-6xl gradient-text mb-6">
                        BEAST MODE INTEL
                    </h2>
                    <p class="text-xl md:text-2xl text-gray-300 max-w-2xl mx-auto mb-8">
                        Get exclusive access to pro training secrets, nutrition hacks, and beast-mode product drops that'll transform your game!
                    </p>
                </div>

                <!-- Newsletter Benefits -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                    <div class="bg-dark-card rounded-xl p-6 border border-neon-green/30 hover:border-neon-green hover:scale-105 transition-all animate-zoom-in" style="animation-delay: 0.1s;">
                        <div class="text-4xl mb-4">🎯</div>
                        <h3 class="font-orbitron font-bold text-xl text-neon-green mb-2">EXCLUSIVE DROPS</h3>
                        <p class="text-gray-400">First access to new beast formulas and limited releases</p>
                    </div>
                    
                    <div class="bg-dark-card rounded-xl p-6 border border-neon-orange/30 hover:border-neon-orange hover:scale-105 transition-all animate-zoom-in" style="animation-delay: 0.2s;">
                        <div class="text-4xl mb-4">💰</div>
                        <h3 class="font-orbitron font-bold text-xl text-neon-orange mb-2">BEAST DISCOUNTS</h3>
                        <p class="text-gray-400">Members-only deals and flash sales up to 40% off</p>
                    </div>
                    
                    <div class="bg-dark-card rounded-xl p-6 border border-neon-green/30 hover:border-neon-green hover:scale-105 transition-all animate-zoom-in" style="animation-delay: 0.3s;">
                        <div class="text-4xl mb-4">🧬</div>
                        <h3 class="font-orbitron font-bold text-xl text-neon-green mb-2">PRO SECRETS</h3>
                        <p class="text-gray-400">Advanced training protocols and nutrition strategies</p>
                    </div>
                </div>

                <!-- Newsletter Signup Form -->
                <div class="bg-dark-card rounded-2xl p-8 md:p-12 border-2 border-neon-green/50 neon-border animate-pulse-glow">
                    <form id="newsletter-form" class="max-w-md mx-auto">
                        <div class="flex flex-col sm:flex-row gap-4">
                            <div class="flex-1">
                                <input 
                                    type="email" 
                                    id="newsletter-email" 
                                    placeholder="Enter your beast email..." 
                                    required
                                    class="w-full px-6 py-4 rounded-full bg-dark-bg border-2 border-neon-green/30 text-white placeholder-gray-400 focus:border-neon-green focus:outline-none focus:ring-2 focus:ring-neon-green/30 transition-all font-rajdhani text-lg"
                                >
                            </div>
                            <button 
                                type="submit"
                                class="px-8 py-4 bg-neon-green text-black rounded-full font-orbitron font-bold text-lg hover:bg-neon-orange hover:scale-105 transition-all duration-300 whitespace-nowrap shadow-lg hover:shadow-neon-green/50"
                            >
                                🚀 JOIN BEAST INTEL
                            </button>
                        </div>
                        
                        <!-- Terms -->
                        <div class="mt-6 text-sm text-gray-400">
                            <label class="flex items-center justify-center space-x-2 cursor-pointer hover:text-neon-green transition-colors">
                                <input type="checkbox" required class="rounded border-neon-green/30 bg-dark-bg text-neon-green focus:ring-neon-green">
                                <span>I'm ready to receive beast-mode intel and exclusive offers</span>
                            </label>
                        </div>
                    </form>

                    <!-- Success Message (Hidden by default) -->
                    <div id="success-message" class="hidden mt-6 p-4 bg-neon-green/20 border border-neon-green rounded-lg">
                        <div class="flex items-center justify-center text-neon-green">
                            <span class="text-2xl mr-3">🎉</span>
                            <span class="font-bold">WELCOME TO THE BEAST FAMILY! Check your email for exclusive content.</span>
                        </div>
                    </div>
                </div>

                <!-- Social Proof -->
                <div class="mt-12 text-center">
                    <div class="flex items-center justify-center space-x-8 text-gray-400">
                        <div class="flex items-center space-x-2">
                            <span class="text-2xl">👥</span>
                            <span class="font-bold text-neon-green">15,000+</span>
                            <span>Beast Members</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="text-2xl">⭐</span>
                            <span class="font-bold text-neon-orange">4.9/5</span>
                            <span>Beast Rating</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="text-2xl">📈</span>
                            <span class="font-bold text-neon-green">98%</span>
                            <span>Success Rate</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark-surface py-16 border-t border-neon-green/20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="font-orbitron font-bold text-2xl gradient-text mb-4">
                        BRUTECHARGE⚡
                    </div>
                    <p class="text-gray-400">
                        Transforming limits into launchpads since 2020
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-neon-green mb-4">PRODUCTS</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('preworkout.index') }}" class="hover:text-neon-green transition-colors">Pre-Workouts</a></li>
                        <li><a href="{{ route('protein.index') }}" class="hover:text-neon-green transition-colors">Proteins</a></li>
                        <li><a href="{{ route('creatine.index') }}" class="hover:text-neon-green transition-colors">Creatine</a></li>
                        <li><a href="{{ route('energy-boosters.all') }}" class="hover:text-neon-green transition-colors">All Products</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-neon-orange mb-4">ACCOUNT</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('dashboard') }}" class="hover:text-neon-orange transition-colors">Dashboard</a></li>
                        <li><a href="{{ route('profile.show') }}" class="hover:text-neon-orange transition-colors">Profile</a></li>
                        <li><a href="{{ route('nutrition.index') }}" class="hover:text-neon-orange transition-colors">Nutrition</a></li>
                        <li><a href="{{ route('training.index') }}" class="hover:text-neon-orange transition-colors">Training</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-neon-green mb-4">CONNECT</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-neon-green/20 rounded-full flex items-center justify-center hover:bg-neon-green hover:text-black transition-colors">📘</a>
                        <a href="#" class="w-10 h-10 bg-neon-orange/20 rounded-full flex items-center justify-center hover:bg-neon-orange hover:text-black transition-colors">📷</a>
                        <a href="#" class="w-10 h-10 bg-neon-green/20 rounded-full flex items-center justify-center hover:bg-neon-green hover:text-black transition-colors">🐦</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; 2025 BruteCharge. All rights reserved. Go Beast Mode! 💪</p>
            </div>
        </div>
    </footer>

    <script>

        // Newsletter Form Handling
document.getElementById('newsletter-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const email = document.getElementById('newsletter-email').value;
    const submitButton = e.target.querySelector('button[type="submit"]');
    const successMessage = document.getElementById('success-message');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    // Disable button and show loading state
    submitButton.disabled = true;
    submitButton.innerHTML = '⚡ PROCESSING...';
    submitButton.classList.add('opacity-50');
    
    // Send to Laravel backend
    fetch('/newsletter/subscribe', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify({ email: email })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show success message
            successMessage.querySelector('span:last-child').textContent = data.message;
            successMessage.classList.remove('hidden');
            successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
            
            // Reset form
            e.target.reset();
            
            // Add beast celebration effects
            createBeastExplosion();
            
            // Hide success message after 7 seconds
            setTimeout(() => {
                successMessage.classList.add('hidden');
            }, 7000);
        } else {
            // Show error message
            alert(data.message || 'Thanks for subscribing Us BEAST.');
        }
    })
    // .catch(error => {
    //     console.error('Error:', error);
    //     alert('Network error. Please check your connection and try again.');
    // })
    .finally(() => {
        // Reset button
        submitButton.disabled = false;
        submitButton.innerHTML = '🚀 JOIN BEAST INTEL';
        submitButton.classList.remove('opacity-50');
    });
});
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add scroll effect to navbar
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 100) {
                navbar.classList.add('bg-dark-bg/95');
            } else {
                navbar.classList.remove('bg-dark-bg/95');
            }
        });

        // Animate elements on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all animated elements
        document.querySelectorAll('.product-card, .animate-zoom-in').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.6s ease-out';
            observer.observe(el);
        });

        // Dynamic button hover effects
        document.querySelectorAll('button, a').forEach(button => {
            button.addEventListener('mouseenter', function() {
                if (this.classList.contains('hover:scale-105')) {
                    this.style.transform = 'scale(1.05)';
                }
            });
            
            button.addEventListener('mouseleave', function() {
                if (this.classList.contains('hover:scale-105')) {
                    this.style.transform = 'scale(1)';
                }
            });
        });
    </script>
</body>
</html>
