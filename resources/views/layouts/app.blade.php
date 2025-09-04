<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'BruteCharge - Unleash Your Beast')</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Rajdhani:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>
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
                }
            }
        }
    </script>
    
    <!-- Livewire Styles -->
    @livewireStyles
    
    @stack('styles')
</head>
<body class="bg-obsidian text-white">
    <!-- Navigation Bar -->
<nav class="bg-charcoal border-b border-steel sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="text-2xl font-rajdhani font-bold text-accent-red">
                    BruteCharge
                </a>
            </div>
            
            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-gray-300 hover:text-accent-red transition-colors duration-200">Home</a>
                <a href="{{ route('products.index') }}" class="text-gray-300 hover:text-accent-red transition-colors duration-200">Products</a>
                <a href="#" class="text-gray-300 hover:text-accent-red transition-colors duration-200">About</a>
                <a href="#" class="text-gray-300 hover:text-accent-red transition-colors duration-200">Contact</a>
            </div>
            
            <!-- Cart Counter and CTA -->
            <div class="flex items-center space-x-6">
                <!-- Cart Counter -->
                @livewire('cart-counter')
                
                <!-- CTA Button -->
                <a href="{{ route('products.index') }}" class="bg-accent-red hover:bg-blood-red text-white font-rajdhani font-semibold px-6 py-2 rounded-lg transition-colors duration-200">
                    Shop Now
                </a>
            </div>
            
            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" class="text-gray-300 hover:text-accent-red focus:outline-none focus:text-accent-red">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>
</nav>
    @yield('content')
    
    <!-- Livewire Scripts -->
    @livewireScripts
    
    @stack('scripts')
</body>
</html>