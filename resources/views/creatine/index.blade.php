<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BruteCharge - Creatine Power</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">
 <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'neon-blue': '#00bfff',
                        'electric-blue': '#0080ff',
                        'ice-blue': '#87ceeb',
                        'neon-white': '#ffffff',
                        'dark-bg': '#000000',
                        'dark-surface': '#0a0a0a',
                        'dark-card': '#1a1a1a'
                    },
                    animation: {
                        'pulse-glow': 'pulse-glow 2s ease-in-out infinite alternate',
                        'float': 'float 3s ease-in-out infinite',
                        'slide-up': 'slide-up 0.6s ease-out',
                        'slide-left': 'slide-left 0.8s ease-out',
                        'slide-right': 'slide-right 0.8s ease-out',
                        'zoom-in': 'zoom-in 0.5s ease-out',
                        'fade-in': 'fade-in 0.6s ease-out',
                        'bounce-in': 'bounce-in 0.8s ease-out',
                        'rotate-glow': 'rotate-glow 4s linear infinite',
                        'electric-pulse': 'electric-pulse 1.5s ease-in-out infinite'
                    },
                    keyframes: {
                        'pulse-glow': {
                            'from': { 'box-shadow': '0 0 20px rgba(0, 191, 255, 0.5)' },
                            'to': { 'box-shadow': '0 0 40px rgba(0, 191, 255, 0.8), 0 0 60px rgba(0, 191, 255, 0.3)' }
                        },
                        'float': {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        'slide-up': {
                            'from': { transform: 'translateY(50px)', opacity: '0' },
                            'to': { transform: 'translateY(0)', opacity: '1' }
                        },
                        'slide-left': {
                            'from': { transform: 'translateX(-100px)', opacity: '0' },
                            'to': { transform: 'translateX(0)', opacity: '1' }
                        },
                        'slide-right': {
                            'from': { transform: 'translateX(100px)', opacity: '0' },
                            'to': { transform: 'translateX(0)', opacity: '1' }
                        },
                        'zoom-in': {
                            'from': { transform: 'scale(0.8)', opacity: '0' },
                            'to': { transform: 'scale(1)', opacity: '1' }
                        },
                        'fade-in': {
                            'from': { opacity: '0' },
                            'to': { opacity: '1' }
                        },
                        'bounce-in': {
                            '0%': { transform: 'scale(0.3)', opacity: '0' },
                            '50%': { transform: 'scale(1.05)' },
                            '70%': { transform: 'scale(0.9)' },
                            '100%': { transform: 'scale(1)', opacity: '1' }
                        },
                        'rotate-glow': {
                            '0%': { transform: 'rotate(0deg)', filter: 'hue-rotate(0deg)' },
                            '100%': { transform: 'rotate(360deg)', filter: 'hue-rotate(360deg)' }
                        },
                        'electric-pulse': {
                            '0%, 100%': { opacity: '1', transform: 'scale(1)' },
                            '50%': { opacity: '0.7', transform: 'scale(1.05)' }
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
            background: linear-gradient(45deg, #00bfff, #ffffff, #00bfff);
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
            border: 3px solid #00bfff;
            box-shadow: 0 0 30px rgba(0, 191, 255, 0.4), inset 0 0 20px rgba(0, 191, 255, 0.1);
        }
        
        .hero-bg {
            background: radial-gradient(circle at 30% 70%, rgba(0, 191, 255, 0.15) 0%, transparent 50%),
                        radial-gradient(circle at 70% 30%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
                        radial-gradient(circle at 50% 50%, rgba(0, 128, 255, 0.08) 0%, transparent 70%),
                        #000000;
        }
        
        /* Product card animations - ENHANCED */
        .product-card {
            transition: all 0.4s ease;
            background: linear-gradient(145deg, #1a1a1a, #0a0a0a);
        }
        
        .product-card:hover {
            transform: translateY(-15px) scale(1.03) rotateX(5deg);
            box-shadow: 0 25px 50px rgba(0, 191, 255, 0.3);
        }

        .hover-scale {
            transition: all 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.08) rotateY(5deg);
            box-shadow: 0 10px 30px rgba(0, 191, 255, 0.2);
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
            background: linear-gradient(90deg, rgba(0, 191, 255, 0.15), transparent);
            border-left: 4px solid #00bfff;
            padding-left: 1rem;
            transform: translateX(5px);
        }

        .ingredient-bar {
            height: 8px;
            background: linear-gradient(90deg, #00bfff, #ffffff, #00bfff);
            border-radius: 4px;
            animation: pulse-glow 2s ease-in-out infinite alternate;
        }

        /* Floating molecules animation */
        .floating-molecule {
            animation: float 4s ease-in-out infinite;
        }

        .floating-molecule:nth-child(1) { animation-delay: 0s; }
        .floating-molecule:nth-child(2) { animation-delay: 1s; }
        .floating-molecule:nth-child(3) { animation-delay: 2s; }

        /* Enhanced button animations */
        .btn-animated {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn-animated::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-animated:hover::before {
            left: 100%;
        }

        .btn-animated:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 191, 255, 0.3);
        }

        /* Stagger animation delays */
        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }
        .stagger-4 { animation-delay: 0.4s; }
        .stagger-5 { animation-delay: 0.5s; }
        .stagger-6 { animation-delay: 0.6s; }

        /* Electric effects */
        .electric-text {
            text-shadow: 0 0 10px rgba(0, 191, 255, 0.8), 0 0 20px rgba(0, 191, 255, 0.6);
        }

        /* Crystal-like effects for creatine */
        .crystal-border {
            border: 2px solid;
            border-image: linear-gradient(45deg, #00bfff, #ffffff, #87ceeb, #00bfff) 1;
            box-shadow: 0 0 20px rgba(0, 191, 255, 0.3);
        }
    </style>
</head>
<body class="bg-dark-bg text-white font-rajdhani overflow-x-hidden">
   <nav class="fixed w-full z-50 bg-dark-bg/95 backdrop-blur-lg border-b border-neon-blue/30">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="font-orbitron font-black text-2xl gradient-text">
                    BruteCharge⚡
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="{{ url('home') }}" class="hover:text-neon-blue transition-colors font-semibold">HOME</a>
                    
                    <!-- Products Dropdown -->
                    <div class="relative dropdown">
                        <a href="#" class="hover:text-neon-blue transition-colors font-semibold flex items-center text-neon-blue">
                            PRODUCTS
                            <svg class="w-4 h-4 ml-1 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        
                        <!-- Dropdown Menu -->
                        <div class="dropdown-menu absolute top-full left-0 mt-2 w-64 bg-dark-bg/95 backdrop-blur-lg border border-neon-blue/40 rounded-lg shadow-2xl">
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
                    <button class="bg-neon-blue text-black px-6 py-2 rounded-full font-bold hover:bg-white hover:text-black transition-colors animate-pulse-glow">
                        SHOP NOW
                    </button>
                    <div class="md:hidden">
                        <button class="text-neon-blue text-2xl">☰</button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-24 pb-16 relative overflow-hidden hero-bg">
        <div class="absolute inset-0 gradient-bg opacity-20"></div>
        <!-- Animated Floating Molecules -->
        <div class="absolute top-20 left-10 text-neon-blue text-4xl opacity-20 floating-molecule animate-float stagger-1">💎</div>
        <div class="absolute top-40 right-20 text-white text-3xl opacity-15 floating-molecule animate-float stagger-2">⚡</div>
        <div class="absolute bottom-20 left-1/4 text-neon-blue text-5xl opacity-10 floating-molecule animate-float stagger-3">🔥</div>
        <div class="absolute top-32 right-1/3 text-ice-blue text-2xl opacity-20 floating-molecule animate-float stagger-4">💪</div>
        <div class="absolute bottom-32 right-10 text-white text-3xl opacity-15 floating-molecule animate-float stagger-5">⚛️</div>
        <div class="absolute top-1/2 left-10 text-electric-blue text-2xl opacity-15 floating-molecule animate-float stagger-6">🧬</div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center animate-slide-up">
                <h1 class="font-orbitron font-black text-5xl md:text-7xl gradient-text mb-6 electric-text">
                    CREATINE POWER
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto font-light mb-4 animate-fade-in stagger-2">
                    Unleash explosive strength and power with pure micronized creatine monohydrate
                </p>
                <div class="text-lg text-neon-blue font-semibold mb-8 animate-bounce-in stagger-3">
                    ⚡ INSTANT STRENGTH • MAXIMUM POWER • PURE ENERGY ⚡
                </div>
                <div class="mt-8 animate-zoom-in stagger-4">
                    <div class="inline-block px-8 py-3 bg-neon-blue/20 border-2 border-neon-blue rounded-full text-neon-blue font-bold text-lg animate-pulse-glow">
                        💎 5G PURE CREATINE • ZERO FILLERS • INSTANT MIXING 💎
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
                <div class="animate-slide-left">
                    <div class="relative">
                        <div class="animate-float">
                            <!-- In your Blade template -->
                            <div class="animate-float">
                               @if($creatine->image_url)
                            <img src="{{ $creatine->image_url }}"  class="w-full max-w-md mx-auto rounded-lg">
                            @endif
                            </div>
                        </div>
                        
                        <!-- Floating Elements -->
                        <div class="absolute -top-4 -right-4 bg-electric-blue text-white px-4 py-2 rounded-full font-bold text-sm animate-bounce-in stagger-1">
                            PURE!
                        </div>
                        <div class="absolute -bottom-4 -left-4 bg-neon-blue text-black px-4 py-2 rounded-full font-bold text-sm animate-bounce-in stagger-2">
                            #1 STRENGTH
                        </div>
                        
                        <!-- Rotating Glow Effect */
                        <div class="absolute inset-0 rounded-lg border-2 border-neon-blue/30 animate-pulse-glow"></div>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="animate-slide-right">
              {{-- Better approach with fallbacks --}}
                <h2 class="font-orbitron font-black text-4xl gradient-text mb-4">
                    {{ strtoupper($creatine->name ?? 'PRODUCT NAME') }}
                </h2>

                <p class="text-xl text-gray-300 leading-relaxed mb-6">
                    {{ $creatine->description ?? 'No description available.' }}
                </p>

                <div class="text-3xl font-orbitron font-black text-neon-blue animate-pulse-glow">
                    ${{ number_format($creatine->price ?? 0, 2) }}
                </div>

                        <!-- Creatine Profile -->
                        <div class="bg-dark-card rounded-xl p-6 crystal-border relative overflow-hidden animate-zoom-in stagger-2">
                            <div class="absolute top-0 right-0 bg-neon-blue text-black px-3 py-1 text-xs font-bold animate-slide-left">
                                PURE FORMULA
                            </div>
                            <h3 class="font-orbitron font-bold text-xl text-neon-blue mb-4">STRENGTH PROFILE</h3>
                            <div class="space-y-4">
                                <div class="animate-slide-right stagger-1">
                                    <div class="flex justify-between mb-1">
                                        <span class="font-semibold">Creatine Monohydrate</span>
                                        <span class="text-neon-blue font-bold">5g</span>
                                    </div>
                                    <div class="ingredient-bar w-full"></div>
                                </div>
                                <div class="animate-slide-right stagger-2">
                                    <div class="flex justify-between mb-1">
                                        <span class="font-semibold">Micronized Formula</span>
                                        <span class="text-neon-blue font-bold">200 Mesh</span>
                                    </div>
                                    <div class="ingredient-bar w-5/6"></div>
                                </div>
                                <div class="animate-slide-right stagger-3">
                                    <div class="flex justify-between mb-1">
                                        <span class="font-semibold">Purity Level</span>
                                        <span class="text-neon-blue font-bold">99.9%</span>
                                    </div>
                                    <div class="ingredient-bar w-full"></div>
                                </div>
                                <div class="animate-slide-right stagger-4">
                                    <div class="flex justify-between mb-1">
                                        <span class="font-semibold">Absorption Rate</span>
                                        <span class="text-neon-blue font-bold">Maximum</span>
                                    </div>
                                    <div class="ingredient-bar w-5/6"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-4 animate-slide-up stagger-3">
                            <button class="w-full bg-neon-blue text-black py-4 rounded-xl font-orbitron font-bold text-lg btn-animated hover:bg-white hover:text-black transition-colors">
                                ADD TO CART - $24.99
                            </button>
                            <div class="grid grid-cols-2 gap-4">
                              <a href="{{ route('training.index') }}" 
                                class="border-2 border-neon-blue text-neon-blue py-3 px-6 rounded-xl font-bold btn-animated hover:bg-neon-blue hover:text-black transition-colors">
                                STRENGTH GUIDE
                                </a>

                                 <a href="{{ route('nutrition.index') }}" 
                                class="border-2 border-neon-green text-neon-green py-3 px-6 rounded-xl font-bold hover:bg-neon-green hover:text-black transition-colors">
                                NUTRITION FACTS
                                </a>
                                
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
            <h2 class="font-orbitron font-black text-4xl text-center gradient-text mb-12 animate-slide-up">
                EXPLOSIVE STRENGTH BENEFITS
            </h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center p-6 hover-scale animate-zoom-in stagger-1">
                    <div class="text-6xl mb-4 animate-bounce-in stagger-1">⚡</div>
                    <h3 class="font-orbitron font-bold text-xl text-neon-blue mb-2">INSTANT POWER</h3>
                    <p class="text-gray-300">Explosive strength gains from your very first workout with maximum power output.</p>
                </div>
                <div class="text-center p-6 hover-scale animate-zoom-in stagger-2">
                    <div class="text-6xl mb-4 animate-bounce-in stagger-2">💎</div>
                    <h3 class="font-orbitron font-bold text-xl text-white mb-2">PURE FORMULA</h3>
                    <p class="text-gray-300">99.9% pure micronized creatine monohydrate with zero fillers or additives.</p>
                </div>
                <div class="text-center p-6 hover-scale animate-zoom-in stagger-3">
                    <div class="text-6xl mb-4 animate-bounce-in stagger-3">🔥</div>
                    <h3 class="font-orbitron font-bold text-xl text-neon-blue mb-2">RAPID RECOVERY</h3>
                    <p class="text-gray-300">Enhanced ATP regeneration for faster recovery between sets and workouts.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Usage Timeline Section -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="font-orbitron font-black text-3xl text-center gradient-text mb-12 animate-slide-up">
                STRENGTH TRANSFORMATION TIMELINE
            </h2>
            <div class="grid md:grid-cols-4 gap-6">
                <div class="bg-dark-card rounded-xl p-6 text-center hover-scale border border-neon-blue/30 hover:border-neon-blue transition-all animate-zoom-in stagger-1">
                    <div class="text-4xl mb-3 animate-electric-pulse">📅</div>
                    <h4 class="font-bold text-neon-blue mb-2">WEEK 1</h4>
                    <p class="text-sm text-gray-400">Loading Phase</p>
                    <p class="text-xs text-white mt-2">Initial strength surge</p>
                </div>
                <div class="bg-dark-card rounded-xl p-6 text-center hover-scale border border-white/30 hover:border-white transition-all animate-zoom-in stagger-2">
                    <div class="text-4xl mb-3 animate-electric-pulse">💪</div>
                    <h4 class="font-bold text-white mb-2">WEEK 2-3</h4>
                    <p class="text-sm text-gray-400">Power Building</p>
                    <p class="text-xs text-white mt-2">Explosive strength gains</p>
                </div>
                <div class="bg-dark-card rounded-xl p-6 text-center hover-scale border border-neon-blue/30 hover:border-neon-blue transition-all animate-zoom-in stagger-3">
                    <div class="text-4xl mb-3 animate-electric-pulse">🚀</div>
                    <h4 class="font-bold text-neon-blue mb-2">WEEK 4-6</h4>
                    <p class="text-sm text-gray-400">Peak Performance</p>
                    <p class="text-xs text-white mt-2">Maximum power output</p>
                </div>
                <div class="bg-dark-card rounded-xl p-6 text-center hover-scale border border-white/30 hover:border-white transition-all animate-zoom-in stagger-4">
                    <div class="text-4xl mb-3 animate-electric-pulse">🏆</div>
                    <h4 class="font-bold text-white mb-2">WEEK 6+</h4>
                    <p class="text-sm text-gray-400">Beast Mode</p>
                    <p class="text-xs text-white mt-2">Unstoppable strength</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-neon-blue/10 to-white/5"></div>
        <!-- Floating background elements -->
        <div class="absolute top-10 left-10 text-neon-blue text-2xl opacity-10 animate-float stagger-1">💎</div>
        <div class="absolute bottom-10 right-10 text-white text-3xl opacity-10 animate-float stagger-2">⚡</div>
        <div class="absolute top-1/2 left-1/4 text-electric-blue text-xl opacity-10 animate-float stagger-3">🔥</div>
        <div class="absolute top-20 right-1/4 text-ice-blue text-2xl opacity-10 animate-float stagger-4">💪</div>
        
        <div class="container mx-auto px-6 text-center relative z-10">
            <div class="max-w-2xl mx-auto animate-slide-up">
                <h2 class="font-orbitron font-black text-4xl gradient-text mb-6">
                    AMPLIFY YOUR STRENGTH
                </h2>
                <p class="text-xl text-gray-300 mb-8 animate-fade-in stagger-1">
                    Transform your power output with the purest creatine formula ever created
                </p>
                <div class="space-y-4 animate-zoom-in stagger-2">
                    <button class="bg-neon-blue text-black px-12 py-4 rounded-full font-orbitron font-bold text-xl btn-animated hover:bg-white hover:text-black transition-colors animate-pulse-glow">
                        UNLEASH YOUR POWER 💎
                    </button>
                    <div class="text-neon-blue font-semibold animate-bounce-in stagger-3">
                        ⚡ FREE SHIPPING ON ORDERS OVER $50 ⚡
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Enhanced scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0) translateX(0) scale(1)';
                                        // Add animation classes based on data attributes
                    const animation = entry.target.dataset.animation;
                    if (animation) {
                        entry.target.classList.add(animation);
                    }
                }
            });
        }, observerOptions);

        // Observe all elements with animation attributes
        document.querySelectorAll('[data-animation]').forEach(el => {
            observer.observe(el);
        });

        // Mobile menu toggle
        const mobileMenuButton = document.querySelector('.md\\:hidden button');
        const mobileMenu = document.createElement('div');
        mobileMenu.className = 'hidden fixed inset-0 bg-dark-bg/95 backdrop-blur-lg z-40 flex flex-col items-center justify-center space-y-8';
        mobileMenu.innerHTML = `
            <a href="#" class="text-2xl hover:text-neon-blue transition-colors font-semibold">HOME</a>
            <a href="#" class="text-2xl hover:text-neon-blue transition-colors font-semibold">PRODUCTS</a>
            <a href="#" class="text-2xl hover:text-neon-blue transition-colors font-semibold">NUTRITION</a>
            <a href="#" class="text-2xl hover:text-neon-blue transition-colors font-semibold">TRAINING</a>
            <a href="#" class="text-2xl hover:text-neon-blue transition-colors font-semibold">CONTACT</a>
            <button class="mt-8 bg-neon-blue text-black px-8 py-3 rounded-full font-bold hover:bg-white hover:text-black transition-colors">
                SHOP NOW
            </button>
            <button class="absolute top-6 right-6 text-3xl text-neon-blue close-menu">✕</button>
        `;

        mobileMenuButton.addEventListener('click', () => {
            document.body.appendChild(mobileMenu);
            mobileMenu.classList.remove('hidden');
            mobileMenu.classList.add('animate-fade-in');
            document.body.style.overflow = 'hidden';
        });

        mobileMenu.querySelector('.close-menu').addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
            document.body.style.overflow = '';
            setTimeout(() => {
                if (document.body.contains(mobileMenu)) {
                    document.body.removeChild(mobileMenu);
                }
            }, 300);
        });

        // Product quantity selector
        const quantityInput = document.createElement('div');
        quantityInput.className = 'flex items-center mb-6 animate-slide-up stagger-4';
        quantityInput.innerHTML = `
            <span class="font-semibold mr-4">QUANTITY:</span>
            <div class="flex border border-neon-blue rounded-lg overflow-hidden">
                <button class="px-4 py-2 bg-dark-card text-neon-blue hover:bg-neon-blue hover:text-black transition-colors decrease-qty">-</button>
                <input type="number" value="1" min="1" max="10" class="w-16 text-center bg-dark-card text-white focus:outline-none">
                <button class="px-4 py-2 bg-dark-card text-neon-blue hover:bg-neon-blue hover:text-black transition-colors increase-qty">+</button>
            </div>
        `;

        // Insert quantity selector before action buttons
        const productDetails = document.querySelector('.animate-slide-right .space-y-8');
        if (productDetails) {
            const actionButtons = productDetails.querySelector('.animate-slide-up');
            if (actionButtons) {
                actionButtons.before(quantityInput);
                
                // Quantity control functionality
                const input = quantityInput.querySelector('input');
                const decreaseBtn = quantityInput.querySelector('.decrease-qty');
                const increaseBtn = quantityInput.querySelector('.increase-qty');
                
                decreaseBtn.addEventListener('click', () => {
                    if (parseInt(input.value) > 1) {
                        input.value = parseInt(input.value) - 1;
                    }
                });
                
                increaseBtn.addEventListener('click', () => {
                    if (parseInt(input.value) < 10) {
                        input.value = parseInt(input.value) + 1;
                    }
                });
            }
        }

        // Add to cart animation
        const addToCartButtons = document.querySelectorAll('button:contains("ADD TO CART")');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', function() {
                this.innerHTML = 'ADDED TO CART ✓';
                this.classList.remove('bg-neon-blue');
                this.classList.add('bg-white', 'text-black');
                
                // Create floating confetti effect
                for (let i = 0; i < 10; i++) {
                    const confetti = document.createElement('div');
                    confetti.className = 'absolute text-neon-blue text-xl animate-float';
                    confetti.style.left = `${Math.random() * 100}%`;
                    confetti.style.top = '50%';
                    confetti.style.opacity = '0';
                    confetti.innerHTML = ['💎', '⚡', '🔥', '💪'][Math.floor(Math.random() * 4)];
                    this.parentElement.appendChild(confetti);
                    
                    setTimeout(() => {
                        confetti.style.opacity = '1';
                        setTimeout(() => {
                            confetti.style.opacity = '0';
                            setTimeout(() => {
                                confetti.remove();
                            }, 1000);
                        }, 1000);
                    }, i * 100);
                }
                
                setTimeout(() => {
                    this.innerHTML = 'ADD TO CART - $24.99';
                    this.classList.add('bg-neon-blue');
                    this.classList.remove('bg-white', 'text-black');
                }, 2000);
            });
        });
    </script>

    <!-- Footer -->
    <footer class="bg-dark-surface py-12 border-t border-neon-blue/20">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <div class="animate-slide-up stagger-1">
                    <h3 class="font-orbitron font-bold text-xl text-neon-blue mb-4">BruteCharge⚡</h3>
                    <p class="text-gray-400 mb-4">Unleash your true strength potential with premium performance supplements.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-neon-blue hover:text-white transition-colors text-xl">⚡</a>
                        <a href="#" class="text-neon-blue hover:text-white transition-colors text-xl">💪</a>
                        <a href="#" class="text-neon-blue hover:text-white transition-colors text-xl">🔥</a>
                    </div>
                </div>
                <div class="animate-slide-up stagger-2">
                    <h4 class="font-orbitron font-bold text-lg text-white mb-4">PRODUCTS</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-neon-blue transition-colors">Creatine Blends</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-neon-blue transition-colors">Pre-Workout</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-neon-blue transition-colors">Protein Powders</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-neon-blue transition-colors">Recovery</a></li>
                    </ul>
                </div>
                <div class="animate-slide-up stagger-3">
                    <h4 class="font-orbitron font-bold text-lg text-white mb-4">COMPANY</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-neon-blue transition-colors">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-neon-blue transition-colors">Science</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-neon-blue transition-colors">Reviews</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-neon-blue transition-colors">Contact</a></li>
                    </ul>
                </div>
                <div class="animate-slide-up stagger-4">
                    <h4 class="font-orbitron font-bold text-lg text-white mb-4">NEWSLETTER</h4>
                    <p class="text-gray-400 mb-4">Get exclusive offers and strength tips.</p>
                    <div class="flex">
                        <input type="email" placeholder="Your email" class="bg-dark-card text-white px-4 py-2 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-neon-blue w-full">
                        <button class="bg-neon-blue text-black px-4 py-2 rounded-r-lg font-bold hover:bg-white transition-colors">JOIN</button>
                    </div>
                </div>
            </div>
            <div class="border-t border-neon-blue/20 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center animate-fade-in">
                <div class="text-gray-500 text-sm mb-4 md:mb-0">© 2023 BruteCharge. All rights reserved.</div>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-500 hover:text-neon-blue transition-colors text-sm">Privacy Policy</a>
                    <a href="#" class="text-gray-500 hover:text-neon-blue transition-colors text-sm">Terms of Service</a>
                    <a href="#" class="text-gray-500 hover:text-neon-blue transition-colors text-sm">Shipping Policy</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>