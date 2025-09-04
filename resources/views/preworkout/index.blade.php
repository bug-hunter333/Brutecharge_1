<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BruteCharge - Pre-Workout Formulas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'neon-green': '#39ff14',
                        'neon-orange': '#ff6600',
                        'neon-white': '#ffffff',
                        'dark-bg': '#0a0a0a',
                        'dark-surface': '#1a1a1a',
                        'dark-card': '#2a2a2a'
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
        }
        
        .neon-border {
            border: 3px solid #39ff14;
            box-shadow: 0 0 30px rgba(57, 255, 20, 0.4), inset 0 0 20px rgba(57, 255, 20, 0.1);
        }
        
        .hero-bg {
            background: radial-gradient(circle at 30% 70%, rgba(57, 255, 20, 0.15) 0%, transparent 50%),
                        radial-gradient(circle at 70% 30%, rgba(255, 102, 0, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 50% 50%, rgba(57, 255, 20, 0.08) 0%, transparent 70%),
                        #0a0a0a;
        }
        
        /* Product card animations */
        .product-card {
            transition: all 0.4s ease;
            background: linear-gradient(145deg, #2a2a2a, #1a1a1a);
        }
        
        .product-card:hover {
            transform: translateY(-15px) scale(1.03) rotateX(5deg);
            box-shadow: 0 25px 50px rgba(57, 255, 20, 0.3);
        }

        .hover-scale {
            transition: all 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.08) rotateY(5deg);
        }

        /* Dropdown Styles */
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
            background: linear-gradient(90deg, rgba(57, 255, 20, 0.15), transparent);
            border-left: 4px solid #39ff14;
            padding-left: 1rem;
            transform: translateX(5px);
        }

        .ingredient-bar {
            height: 8px;
            background: linear-gradient(90deg, #39ff14, #ff6600, #39ff14);
            border-radius: 4px;
        }

        /* Animation keyframes */
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(2deg); }
        }
        
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(57, 255, 20, 0.5); }
            50% { box-shadow: 0 0 40px #39ff14, 0 0 60px rgba(57, 255, 20, 0.5); }
        }
        
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-pulse-glow { animation: pulse-glow 2s infinite; }
    </style>
</head>
<body class="bg-dark-bg text-white font-rajdhani overflow-x-hidden">
    <nav class="fixed w-full z-50 bg-dark-bg/95 backdrop-blur-lg border-b border-neon-green/30">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="font-orbitron font-black text-2xl gradient-text">
                    BruteCharge⚡
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="{{ url('home') }}" class="hover:text-neon-green transition-colors font-semibold">HOME</a>
                    
                    <!-- Products Dropdown -->
                    <div class="relative dropdown">
                        <a href="#" class="hover:text-neon-green transition-colors font-semibold flex items-center text-neon-green">
                            PRODUCTS
                            <svg class="w-4 h-4 ml-1 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        
                        <!-- Dropdown Menu -->
                        <div class="dropdown-menu absolute top-full left-0 mt-2 w-64 bg-dark-bg/95 backdrop-blur-lg border border-neon-green/40 rounded-lg shadow-2xl">
                            <div class="py-2">
                                <a href="{{route('energy-boosters.all')}}" class="dropdown-item block px-4 py-3 text-sm hover:text-neon-green transition-colors">
                                    <div class="font-semibold">All</div>
                                </a>
                                <a href="{{ route('preworkout.index') }}" class="dropdown-item block px-4 py-3 text-sm hover:text-neon-green transition-colors">
                                    <div class="font-semibold">Pre-Workout Formulas</div>
                                    <div class="text-xs text-gray-400 mt-1">Explosive energy boosters</div>
                                </a>
                                <a href="{{ route('protein.index') }}" class="dropdown-item block px-4 py-3 text-sm hover:text-neon-green transition-colors">
                                    <div class="font-semibold">Protein Powders</div>
                                    <div class="text-xs text-gray-400 mt-1">Premium muscle builders</div>
                                </a>
                                <a href="{{ route('creatine.index') }}" class="dropdown-item block px-4 py-3 text-sm hover:text-neon-green transition-colors">
                                    <div class="font-semibold">Creatine Blends</div>
                                    <div class="text-xs text-gray-400 mt-1">Pure strength enhancers</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{route('nutrition.index')}}" class="hover:text-neon-green transition-colors font-semibold">NUTRITION</a>
                    <a href="{{route('training.index')}}"class="hover:text-neon-green transition-colors font-semibold">TRAINING</a>
                    
                </div>
                <div class="flex items-center space-x-4">
                    <button class="bg-neon-green text-black px-6 py-2 rounded-full font-bold hover:bg-white hover:text-black transition-colors">
                        SHOP NOW
                    </button>
                    <div class="md:hidden">
                        <button class="text-neon-green text-2xl">☰</button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-24 pb-16 relative overflow-hidden hero-bg">
        <div class="absolute inset-0 gradient-bg opacity-20"></div>
        <!-- Static Energy Molecules -->
        <div class="absolute top-20 left-10 text-neon-green text-4xl opacity-20">⚡</div>
        <div class="absolute top-40 right-20 text-orange-500 text-3xl opacity-15">🔥</div>
        <div class="absolute bottom-20 left-1/4 text-neon-green text-5xl opacity-10">💥</div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center">
                <h1 class="font-orbitron font-black text-5xl md:text-7xl gradient-text mb-6">
                    PRE-WORKOUT POWER
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto font-light mb-4">
                    Unleash your inner beast with scientifically formulated energy accelerators
                </p>
                <div class="text-lg text-neon-green font-semibold mb-8">
                    🔥 EXPLOSIVE ENERGY • LASER FOCUS • MAXIMUM PUMP 🔥
                </div>
                <div class="mt-8">
                    <div class="inline-block px-8 py-3 bg-neon-green/20 border-2 border-neon-green rounded-full text-neon-green font-bold text-lg">
                        ⚡ 350MG CAFFEINE • 6G CITRULLINE • ZERO CRASH ⚡
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Showcase -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                
                <!-- Product Image -->
                <div>
                    <div class="relative">
                        <div class="animate-float">
                            <div class="product-card rounded-2xl p-8 text-center hover-scale">
                                <div class="animate-float">
                            <!-- In your Blade template -->
                            <div class="animate-float">
                                 @if($preworkout->image_url)
                            <img src="{{ $preworkout->image_url }}"  class="w-full max-w-md mx-auto rounded-lg">
                            @endif
                            </div>
                        </div>
                                <h3 class="font-orbitron font-bold text-2xl gradient-text mb-2">BRUTAL IGNITION</h3>
                                <p class="text-neon-green font-semibold">30 SERVINGS • FRUIT PUNCH</p>
                            </div>
                        </div>
                        
                        <!-- Floating Elements -->
                        <div class="absolute -top-4 -right-4 bg-orange-500 text-black px-4 py-2 rounded-full font-bold text-sm animate-pulse">
                            NEW!
                        </div>
                        <div class="absolute -bottom-4 -left-4 bg-neon-green text-black px-4 py-2 rounded-full font-bold text-sm">
                            #1 SELLER
                        </div>
                    </div>
                </div>

                <!-- Product Details -->
                <div>
                    <div class="space-y-8">
                        <div>
                            <h2 class="font-orbitron font-black text-4xl gradient-text mb-4">
                                {{ strtoupper($preworkout->name ?? 'PRODUCT NAME') }}
                            </h2>
                            <p class="text-xl text-gray-300 leading-relaxed mb-6">
                                  {{ $preworkout->description ?? 'No description available.' }}
                            </p>
                            <div class="flex items-center space-x-4 mb-6">
    <span class="text-white bg-gradient-to-r from-green-500 px-4 py-2 rounded-full shadow-lg font-semibold text-lg">
        ${{ number_format($preworkout->price ?? 0, 2) }}
    </span>
</div>

                        </div>

                        <!-- Key Ingredients -->
                        <div class="bg-dark-card rounded-xl p-6 border-2 border-neon-green/40 relative overflow-hidden">
                            <div class="absolute top-0 right-0 bg-neon-green text-black px-3 py-1 text-xs font-bold">
                                PREMIUM BLEND
                            </div>
                            <h3 class="font-orbitron font-bold text-xl text-neon-green mb-4">KEY INGREDIENTS</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="font-semibold">Caffeine Anhydrous</span>
                                        <span class="text-neon-green font-bold">350mg</span>
                                    </div>
                                    <div class="ingredient-bar w-full"></div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="font-semibold">Beta-Alanine</span>
                                        <span class="text-neon-green font-bold">3.2g</span>
                                    </div>
                                    <div class="ingredient-bar w-4/5"></div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="font-semibold">Citrulline Malate</span>
                                        <span class="text-neon-green font-bold">6g</span>
                                    </div>
                                    <div class="ingredient-bar w-full"></div>
                                </div>
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="font-semibold">Creatine Monohydrate</span>
                                        <span class="text-neon-green font-bold">5g</span>
                                    </div>
                                    <div class="ingredient-bar w-3/4"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-4">
                            <button class="w-full bg-neon-green text-black py-4 rounded-xl font-orbitron font-bold text-lg hover:bg-white hover:text-black transition-colors animate-pulse-glow">
                                ADD TO CART - $49.99
                            </button>
                            <div class="grid grid-cols-2 gap-4">
                              <a href="{{ route('nutrition.index') }}" 
                                class="border-2 border-neon-green text-neon-green py-3 px-6 rounded-xl font-bold hover:bg-neon-green hover:text-black transition-colors">
                                NUTRITION FACTS
                                </a>

                                <button class="border-2 border-orange-500 text-orange-500 py-3 rounded-xl font-bold hover:bg-orange-500 hover:text-black transition-colors">
                                    REVIEWS (4.8★)
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-16 bg-dark-card/50">
        <div class="container mx-auto px-6">
            <h2 class="font-orbitron font-black text-4xl text-center gradient-text mb-12">
                FEEL THE DIFFERENCE
            </h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center p-6 hover-scale">
                    <div class="text-6xl mb-4">⚡</div>
                    <h3 class="font-orbitron font-bold text-xl text-neon-green mb-2">EXPLOSIVE ENERGY</h3>
                    <p class="text-gray-300">Clean, sustained energy without the crash. Power through your toughest workouts.</p>
                </div>
                <div class="text-center p-6 hover-scale">
                    <div class="text-6xl mb-4">🎯</div>
                    <h3 class="font-orbitron font-bold text-xl text-orange-500 mb-2">LASER FOCUS</h3>
                    <p class="text-gray-300">Mental clarity and concentration that keeps you locked in on every rep.</p>
                </div>
                <div class="text-center p-6 hover-scale">
                    <div class="text-6xl mb-4">💪</div>
                    <h3 class="font-orbitron font-bold text-xl text-neon-green mb-2">MASSIVE PUMPS</h3>
                    <p class="text-gray-300">Skin-splitting muscle pumps that make you feel unstoppable in the gym.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Flavors Section -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="font-orbitron font-black text-3xl text-center gradient-text mb-12">
                EXPLOSIVE FLAVORS
            </h2>
            <div class="grid md:grid-cols-4 gap-6">
                <div class="bg-dark-card rounded-xl p-6 text-center hover-scale border border-neon-green/30 hover:border-neon-green transition-all">
                    <div class="text-4xl mb-3">🍓</div>
                    <h4 class="font-bold text-neon-green">FRUIT PUNCH FURY</h4>
                    <p class="text-sm text-gray-400">Tropical & Intense</p>
                </div>
                <div class="bg-dark-card rounded-xl p-6 text-center hover-scale border border-orange-500/30 hover:border-orange-500 transition-all">
                    <div class="text-4xl mb-3">🍊</div>
                    <h4 class="font-bold text-orange-500">ORANGE CRUSHER</h4>
                    <p class="text-sm text-gray-400">Citrus Power</p>
                </div>
                <div class="bg-dark-card rounded-xl p-6 text-center hover-scale border border-neon-green/30 hover:border-neon-green transition-all">
                    <div class="text-4xl mb-3">🍇</div>
                    <h4 class="font-bold text-neon-green">GRAPE RAMPAGE</h4>
                    <p class="text-sm text-gray-400">Sweet & Brutal</p>
                </div>
                <div class="bg-dark-card rounded-xl p-6 text-center hover-scale border border-orange-500/30 hover:border-orange-500 transition-all">
                    <div class="text-4xl mb-3">🍋</div>
                    <h4 class="font-bold text-orange-500">LEMON LIGHTNING</h4>
                    <p class="text-sm text-gray-400">Electric Energy</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-neon-green/10 to-orange-500/5"></div>
        <div class="container mx-auto px-6 text-center relative z-10">
            <div class="max-w-2xl mx-auto">
                <h2 class="font-orbitron font-black text-4xl gradient-text mb-6">
                    READY TO DOMINATE?
                </h2>
                <p class="text-xl text-gray-300 mb-8">
                    Join thousands of athletes who have unlocked their true potential with BruteCharge
                </p>
                <div class="space-y-4">
                    <button class="bg-neon-green text-black px-12 py-4 rounded-full font-orbitron font-bold text-xl hover:bg-white hover:text-black transition-colors animate-pulse-glow">
                        UNLEASH THE BEAST ⚡
                    </button>
                    <div class="text-neon-green font-semibold">
                        ⚡ FREE SHIPPING ON ORDERS OVER $75 ⚡
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
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to navbar
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 100) {
                navbar.classList.add('bg-dark-bg');
                navbar.classList.remove('bg-dark-bg/95');
            } else {
                navbar.classList.add('bg-dark-bg/95');
                navbar.classList.remove('bg-dark-bg');
            }
        });

        // Add animation on scroll
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

        // Observe elements for scroll animations
        document.querySelectorAll('.product-card, .hover-scale').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.6s ease';
            observer.observe(el);
        });
    </script>
</body>
</html>