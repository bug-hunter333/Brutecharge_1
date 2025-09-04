<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrition | BruteCharge⚡</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'neon-green': '#39ff14',
                        'neon-orange': '#ff6b35',
                        'dark-bg': '#0a0a0a'
                    }
                }
            }
        }
    </script>
    <style>
        .font-orbitron { font-family: 'Orbitron', monospace; }
        .font-rajdhani { font-family: 'Rajdhani', sans-serif; }
        
        .gradient-text {
            background: linear-gradient(45deg, #ffffff, #d1d5db);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .energy-glow {
            box-shadow: 0 0 30px rgba(57, 255, 20, 0.1);
        }
        
        .hover-energy:hover {
            box-shadow: 0 0 40px rgba(57, 255, 20, 0.2);
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }
        
        .pulse-glow {
            animation: pulse-glow 2s infinite;
        }
        
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(57, 255, 20, 0.1); }
            50% { box-shadow: 0 0 40px rgba(57, 255, 20, 0.3); }
        }
        
        .slide-in {
            animation: slideInUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
        }
        
        @keyframes slideInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }
        .stagger-4 { animation-delay: 0.4s; }

        /* Dropdown styles */
        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
            pointer-events: all;
        }

        .dropdown:hover .dropdown-arrow {
            transform: rotate(180deg);
        }

        .dropdown-arrow {
            transition: transform 0.3s ease;
        }

        /* Mobile menu styles */
        .mobile-menu {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-20px);
            transition: all 0.3s ease;
        }

        .mobile-menu.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* Navigation active state */
        .nav-active {
            color: #39ff14 !important;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Loading animation */
        .loading-pulse {
            animation: loadingPulse 1.5s infinite;
        }

        @keyframes loadingPulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
    </style>
</head>
<body class="bg-black text-white font-rajdhani">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-black/95 backdrop-blur-lg border-b border-gray-800">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="font-orbitron font-black text-2xl gradient-text">
                    BruteCharge⚡
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ url('home') }}" class="hover:text-green-400 transition-colors font-semibold nav-link">HOME</a>
                    
                    <!-- Products Dropdown -->
                    <div class="dropdown">
                        <a href="#products" class="hover:text-green-400 transition-colors font-semibold flex items-center nav-link">
                            PRODUCTS
                            <svg class="w-4 h-4 ml-1 dropdown-arrow" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        
                        <!-- Dropdown Menu -->
                        <div class="dropdown-menu absolute top-full left-0 mt-2 w-64 bg-black/95 backdrop-blur-lg border border-green-400/30 rounded-lg shadow-2xl z-50">
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
                    
                    <a href="{{route('nutrition.index')}}"class="text-[#39FF14] hover:text-green-400 transition-colors font-semibold">NUTRITION</a>
                    <a href="{{route('training.index')}}"class="hover:text-neon-green transition-colors font-semibold">TRAINING</a>
                
                </div>
                <!-- Desktop CTA and Mobile Toggle -->
                <div class="flex items-center space-x-4">
                    <button class="hidden md:block bg-green-400 text-black px-6 py-2 rounded-full font-bold hover:bg-green-500 transition-colors pulse-glow">
                        SHOP NOW
                    </button>
                    <button id="mobile-toggle" class="md:hidden text-green-400 text-2xl hover:text-green-500 transition-colors">
                        ☰
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="mobile-menu md:hidden mt-4 bg-gray-900/95 backdrop-blur-lg border border-gray-800 rounded-lg">
                <div class="py-4 px-6 space-y-4">
                    <a href="#home" class="block text-lg font-semibold hover:text-green-400 transition-colors">HOME</a>
                    <div class="border-l-2 border-green-400 pl-4 space-y-2">
                        <div class="text-lg font-semibold text-green-400 mb-2">PRODUCTS</div>
                        <a href="#all-products" class="block text-sm text-gray-300 hover:text-white transition-colors">All Products</a>
                        <a href="#pre-workout" class="block text-sm text-gray-300 hover:text-white transition-colors">Pre-Workout Formulas</a>
                        <a href="#protein" class="block text-sm text-gray-300 hover:text-white transition-colors">Protein Powders</a>
                        <a href="#creatine" class="block text-sm text-gray-300 hover:text-white transition-colors">Creatine Blends</a>
                    </div>
                    <a href="#nutrition" class="block text-lg font-semibold text-green-400">NUTRITION</a>
                    <a href="#training" class="block text-lg font-semibold hover:text-green-400 transition-colors">TRAINING</a>
                
                    <button class="w-full bg-green-400 text-black py-3 px-6 rounded-full font-bold hover:bg-green-500 transition-colors mt-4">
                        SHOP NOW
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative py-32 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-black via-gray-900 to-black"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="slide-in stagger-1">
                <h1 class="text-5xl md:text-7xl font-orbitron font-black gradient-text mb-6">
                    FUEL YOUR<br>
                    <span class="text-green-400">BEAST MODE</span>
                </h1>
            </div>
            <div class="slide-in stagger-2">
                <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto font-rajdhani">
                    Unleash your potential with science-backed nutrition strategies and premium supplements designed for champions
                </p>
            </div>
        <div class="slide-in stagger-3">
    <a href="mailto:brutecharge@gmail.com?subject=Start%20My%20Transformation&body=Hi%20BruteCharge,%0AI%20want%20to%20start%20my%20transformation." 
       class="bg-white text-black font-bold py-4 px-8 rounded-full text-lg font-orbitron hover-energy transition-all duration-300">
        START YOUR TRANSFORMATION
    </a>
</div>

        </div>
    </section>

    <!-- Nutrition Categories -->
    <section id="nutrition" class="py-16 bg-gray-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 slide-in">
            <h2 class="text-4xl md:text-5xl font-orbitron font-bold gradient-text mb-4">
                NUTRITION ARSENAL
            </h2>
            <p class="text-xl text-gray-400 font-rajdhani">Choose your weapon for maximum gains</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Pre-Workout -->
            <div class="bg-black border border-gray-800 rounded-lg p-6 hover-energy transition-all duration-300 slide-in stagger-1">
                <div class="text-4xl mb-4">💪</div>
                <h3 class="text-2xl font-orbitron font-bold text-green-400 mb-3">#PRE-WORKOUT</h3>
                <p class="text-gray-300 mb-4 font-rajdhani">Ignite your training with explosive energy and laser focus</p>
                <ul class="text-sm text-gray-400 space-y-2 font-rajdhani">
                    <li>• 200mg Caffeine – Energy & Focus</li>
                    <li>• 3g Beta-Alanine – Endurance & Power</li>
                    <li>• 6g Citrulline Malate – Pump & Blood Flow</li>
                    <li>• 1.5g L-Arginine – Nitric Oxide Support</li>
                </ul>
            </div>
            
            <!-- Protein Powder -->
            <div class="bg-black border border-gray-800 rounded-lg p-6 hover-energy transition-all duration-300 slide-in stagger-2">
                <div class="text-4xl mb-4">🔥</div>
                <h3 class="text-2xl font-orbitron font-bold text-green-400 mb-3">#PROTEIN POWDER</h3>
                <p class="text-gray-300 mb-4 font-rajdhani">Accelerate recovery and maximize muscle synthesis</p>
                <ul class="text-sm text-gray-400 space-y-2 font-rajdhani">
                    <li>• 25g Whey Protein – Muscle Growth</li>
                    <li>• 5g BCAAs – Recovery & Repair</li>
                    <li>• 3g Glutamine – Muscle Preservation</li>
                    <li>• Low Fat & Low Sugar Formula</li>
                </ul>
            </div>
            
            <!-- Creatine -->
            <div class="bg-black border border-gray-800 rounded-lg p-6 hover-energy transition-all duration-300 slide-in stagger-3">
                <div class="text-4xl mb-4">⚡</div>
                <h3 class="text-2xl font-orbitron font-bold text-green-400 mb-3">#CREATINE</h3>
                <p class="text-gray-300 mb-4 font-rajdhani">Pure strength amplification for maximum power output</p>
                <ul class="text-sm text-gray-400 space-y-2 font-rajdhani">
                    <li>• 5g Creatine Monohydrate – Strength Boost</li>
                    <li>• ATP Regeneration – Quick Energy</li>
                    <li>• Increases Muscle Volume</li>
                    <li>• Improves Recovery Between Sets</li>
                </ul>
            </div>
            
            <!-- Mass Gainers -->
            <div class="bg-black border border-gray-800 rounded-lg p-6 hover-energy transition-all duration-300 slide-in stagger-4">
                <div class="text-4xl mb-4">🥩</div>
                <h3 class="text-2xl font-orbitron font-bold text-green-400 mb-3">#MASS GAINERS</h3>
                <p class="text-gray-300 mb-4 font-rajdhani">Build serious size with high-quality calories</p>
                <ul class="text-sm text-gray-400 space-y-2 font-rajdhani">
                    <li>• 50g Protein – Muscle Fuel</li>
                    <li>• 250g Carbs – Energy & Mass Gain</li>
                    <li>• 1,250 Calories per Serving</li>
                    <li>• Added Vitamins & Minerals</li>
                </ul>
            </div>
        </div>
    </div>
</section>

    <!-- Nutrition Calculator -->
    <section class="py-16 bg-black">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 slide-in">
                <h2 class="text-4xl md:text-5xl font-orbitron font-bold gradient-text mb-4">
                    MACRO CALCULATOR 
                </h2>
                <p class="text-xl text-gray-400 font-rajdhani">Precision nutrition for maximum results</p>
            </div>
            
            <div class="bg-gray-950 border border-gray-800 rounded-lg p-8 energy-glow">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="block text-sm font-orbitron font-bold text-green-400 mb-2">WEIGHT (KG)</label>
                        <input id="weight-input" type="number" class="w-full bg-black border border-gray-700 rounded px-4 py-3 text-white font-rajdhani focus:border-green-400 focus:outline-none transition-colors" placeholder="75" min="30" max="300">
                    </div>
                    <div>
                        <label class="block text-sm font-orbitron font-bold text-green-400 mb-2">HEIGHT (CM)</label>
                        <input id="height-input" type="number" class="w-full bg-black border border-gray-700 rounded px-4 py-3 text-white font-rajdhani focus:border-green-400 focus:outline-none transition-colors" placeholder="180" min="100" max="250">
                    </div>
                    <div>
                        <label class="block text-sm font-orbitron font-bold text-green-400 mb-2">AGE</label>
                        <input id="age-input" type="number" class="w-full bg-black border border-gray-700 rounded px-4 py-3 text-white font-rajdhani focus:border-green-400 focus:outline-none transition-colors" placeholder="25" min="10" max="100">
                    </div>
                    <div>
                        <label class="block text-sm font-orbitron font-bold text-green-400 mb-2">GENDER</label>
                        <select id="gender-input" class="w-full bg-black border border-gray-700 rounded px-4 py-3 text-white font-rajdhani focus:border-green-400 focus:outline-none transition-colors">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-orbitron font-bold text-green-400 mb-2">ACTIVITY LEVEL</label>
                        <select id="activity-input" class="w-full bg-black border border-gray-700 rounded px-4 py-3 text-white font-rajdhani focus:border-green-400 focus:outline-none transition-colors">
                            <option value="1.2">Sedentary (desk job, no exercise)</option>
                            <option value="1.375">Lightly Active (light exercise 1-3 days/week)</option>
                            <option value="1.55" selected>Moderately Active (moderate exercise 3-5 days/week)</option>
                            <option value="1.725">Very Active (hard exercise 6-7 days/week)</option>
                            <option value="1.9">Extremely Active (very hard exercise, 2x/day)</option>
                        </select>
                    </div>
                </div>
                
                <div class="text-center">
                    <button id="calculate-btn" class="bg-green-500 hover:bg-green-600 text-black font-bold py-3 px-8 rounded-full font-orbitron transition-all duration-300 hover-energy">
                        CALCULATE MACROS
                    </button>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-8" id="macro-results">
                    <div class="bg-black border border-gray-800 rounded-lg p-4 text-center">
                        <div id="calories-result" class="text-2xl font-orbitron font-bold text-green-400">2450</div>
                        <div class="text-sm text-gray-400 font-rajdhani">CALORIES</div>
                    </div>
                    <div class="bg-black border border-gray-800 rounded-lg p-4 text-center">
                        <div id="protein-result" class="text-2xl font-orbitron font-bold text-green-400">180g</div>
                        <div class="text-sm text-gray-400 font-rajdhani">PROTEIN</div>
                    </div>
                    <div class="bg-black border border-gray-800 rounded-lg p-4 text-center">
                        <div id="carbs-result" class="text-2xl font-orbitron font-bold text-green-400">245g</div>
                        <div class="text-sm text-gray-400 font-rajdhani">CARBS</div>
                    </div>
                    <div class="bg-black border border-gray-800 rounded-lg p-4 text-center">
                        <div id="fats-result" class="text-2xl font-orbitron font-bold text-green-400">82g</div>
                        <div class="text-sm text-gray-400 font-rajdhani">FATS</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Meal Plans -->
    <section class="py-16 bg-gray-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 slide-in">
                <h2 class="text-4xl md:text-5xl font-orbitron font-bold gradient-text mb-4">
                    BEAST MODE MEAL PLANS
                </h2>
                <p class="text-xl text-gray-400 font-rajdhani">Scientifically crafted nutrition protocols</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-black border border-gray-800 rounded-lg overflow-hidden hover-energy transition-all duration-300 slide-in stagger-1">
                    <div class="p-6">
                        <h3 class="text-2xl font-orbitron font-bold text-green-400 mb-3">CUTTING PROTOCOL</h3>
                        <p class="text-gray-300 mb-4 font-rajdhani">Shred fat while maintaining muscle mass</p>
                        <div class="space-y-2 text-sm text-gray-400 font-rajdhani">
                            <div class="flex justify-between">
                                <span>Daily Calories:</span>
                                <span class="text-white">1800-2000</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Protein:</span>
                                <span class="text-white">40%</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Carbs:</span>
                                <span class="text-white">30%</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Fats:</span>
                                <span class="text-white">30%</span>
                            </div>
                        </div>
                      <a href="{{ route('training.index') }}">
                        <button class="w-full mt-6 bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded font-rajdhani transition-colors">
                            VIEW PLAN
                        </button>
                    </a>

                    </div>
                </div>
                
                <div class="bg-black border border-gray-800 rounded-lg overflow-hidden hover-energy transition-all duration-300 slide-in stagger-2">
                    <div class="p-6">
                        <h3 class="text-2xl font-orbitron font-bold text-green-400 mb-3">BULKING PROTOCOL</h3>
                        <p class="text-gray-300 mb-4 font-rajdhani">Maximum muscle growth and size gains</p>
                        <div class="space-y-2 text-sm text-gray-400 font-rajdhani">
                            <div class="flex justify-between">
                                <span>Daily Calories:</span>
                                <span class="text-white">3200-3500</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Protein:</span>
                                <span class="text-white">30%</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Carbs:</span>
                                <span class="text-white">45%</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Fats:</span>
                                <span class="text-white">25%</span>
                            </div>
                        </div>
                      <a href="{{ route('training.index') }}">
                        <button class="w-full mt-6 bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded font-rajdhani transition-colors">
                            VIEW PLAN
                        </button>
                    </a>
                    </div>
                </div>
                
                <div class="bg-black border border-gray-800 rounded-lg overflow-hidden hover-energy transition-all duration-300 slide-in stagger-3">
                    <div class="p-6">
                        <h3 class="text-2xl font-orbitron font-bold text-green-400 mb-3">MAINTENANCE MODE</h3>
                        <p class="text-gray-300 mb-4 font-rajdhani">Sustain your physique and performance</p>
                        <div class="space-y-2 text-sm text-gray-400 font-rajdhani">
                            <div class="flex justify-between">
                                <span>Daily Calories:</span>
                                <span class="text-white">2400-2600</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Protein:</span>
                                <span class="text-white">35%</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Carbs:</span>
                                <span class="text-white">40%</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Fats:</span>
                                <span class="text-white">25%</span>
                            </div>
                        </div>
                        <a href="{{ route('training.index') }}">
                        <button class="w-full mt-6 bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded font-rajdhani transition-colors">
                            VIEW PLAN
                        </button>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-black">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="slide-in">
                <h2 class="text-4xl md:text-6xl font-orbitron font-black gradient-text mb-6">
                    READY TO TRANSFORM?
                </h2>
                <p class="text-xl text-gray-400 mb-8 font-rajdhani">
                    Join thousands of athletes who trust BruteCharge⚡ for their nutrition needs
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="bg-green-500 hover:bg-green-600 text-black font-bold py-4 px-8 rounded-full text-lg font-orbitron hover-energy transition-all duration-300">
                        SHOP SUPPLEMENTS
                    </button>
                    <button class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-4 px-8 rounded-full text-lg font-orbitron hover-energy transition-all duration-300">
                        FREE CONSULTATION
                    </button>
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
                <p>&copy; 2025 BruteChargeNutri. All rights reserved. Go Beast Mode! 💪</p>
            </div>
        </div>
    </footer>


    <script>
        // Mobile menu toggle
        document.getElementById('mobile-toggle').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('active');
            
            // Change hamburger icon
            this.textContent = mobileMenu.classList.contains('active') ? '✕' : '☰';
        });

        // Close mobile menu when clicking nav links
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', function() {
                const mobileMenu = document.getElementById('mobile-menu');
                const mobileToggle = document.getElementById('mobile-toggle');
                mobileMenu.classList.remove('active');
                mobileToggle.textContent = '☰';
            });
        });

        // Smooth scroll for navigation links
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

        // Active navigation highlighting
        function updateActiveNav() {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-link');
            
            let currentSection = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                const sectionHeight = section.offsetHeight;
                const scrollPosition = window.scrollY;
                
                if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                    currentSection = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('nav-active');
                if (link.getAttribute('href') === `#${currentSection}`) {
                    link.classList.add('nav-active');
                }
            });
        }

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('slide-in');
                }
            });
        }, observerOptions);

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize scroll animations
            const slideElements = document.querySelectorAll('.slide-in');
            slideElements.forEach(el => {
                observer.observe(el);
            });

            // Initialize macro calculator
            initMacroCalculator();
            
            // Initialize input validation
            setTimeout(addInputValidation, 100);
        });

        // Scroll event listener
        window.addEventListener('scroll', () => {
            updateActiveNav();
        });

        function initMacroCalculator() {
            const calculateBtn = document.getElementById('calculate-btn');
            
            if (calculateBtn) {
                calculateBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    calculateMacros();
                });
            }

            // Auto-calculate on input change (debounced)
            let calcTimeout;
            const inputs = document.querySelectorAll('#weight-input, #height-input, #age-input, #gender-input, #activity-input');
            inputs.forEach(input => {
                input.addEventListener('input', () => {
                    clearTimeout(calcTimeout);
                    calcTimeout = setTimeout(() => {
                        if (isFormValid()) {
                            calculateMacros();
                        }
                    }, 500);
                });
            });
        }

        function isFormValid() {
            const weight = parseFloat(document.getElementById('weight-input').value);
            const height = parseFloat(document.getElementById('height-input').value);
            const age = parseFloat(document.getElementById('age-input').value);
            
            return weight >= 30 && weight <= 300 && 
                   height >= 100 && height <= 250 && 
                   age >= 10 && age <= 100;
        }

        function calculateMacros() {
            // Get input values
            const weight = parseFloat(document.getElementById('weight-input').value) || 75;
            const height = parseFloat(document.getElementById('height-input').value) || 180;
            const age = parseFloat(document.getElementById('age-input').value) || 25;
            const gender = document.getElementById('gender-input').value;
            const activityMultiplier = parseFloat(document.getElementById('activity-input').value) || 1.55;

            // Calculate BMR using Mifflin-St Jeor Equation
            let bmr;
            if (gender === 'male') {
                bmr = (10 * weight) + (6.25 * height) - (5 * age) + 5;
            } else {
                bmr = (10 * weight) + (6.25 * height) - (5 * age) - 161;
            }

            // Calculate TDEE (Total Daily Energy Expenditure)
            const tdee = Math.round(bmr * activityMultiplier);

            // Calculate macros
            const protein = Math.round(weight * 2.2); // 2.2g per kg bodyweight
            const proteinCals = protein * 4;
            
            const fatPercentage = 0.25; // 25% of calories from fat
            const fatCals = Math.round(tdee * fatPercentage);
            const fats = Math.round(fatCals / 9);
            
            const carbCals = tdee - proteinCals - fatCals;
            const carbs = Math.round(carbCals / 4);

            // Update display with animation
            updateMacroDisplay(tdee, protein, carbs, fats);
            
            // Show nutrition tips
            showNutritionTips(weight, tdee);

            // Add success feedback
            const btn = document.getElementById('calculate-btn');
            const originalText = btn.textContent;
            btn.textContent = '✅ CALCULATED!';
            btn.style.backgroundColor = '#10b981';
            
            setTimeout(() => {
                btn.textContent = originalText;
                btn.style.backgroundColor = '#22c55e';
            }, 2000);
        }

        function updateMacroDisplay(calories, protein, carbs, fats) {
            const updates = [
                { id: 'calories-result', value: calories.toLocaleString() },
                { id: 'protein-result', value: protein + 'g' },
                { id: 'carbs-result', value: carbs + 'g' },
                { id: 'fats-result', value: fats + 'g' }
            ];

            updates.forEach((update, index) => {
                setTimeout(() => {
                    const element = document.getElementById(update.id);
                    if (element) {
                        // Animation effect
                        element.style.transform = 'scale(0.8)';
                        element.style.opacity = '0.5';
                        element.style.transition = 'all 0.3s ease';
                        
                        setTimeout(() => {
                            element.textContent = update.value;
                            element.style.transform = 'scale(1.1)';
                            element.style.opacity = '1';
                            
                            setTimeout(() => {
                                element.style.transform = 'scale(1)';
                            }, 200);
                        }, 150);
                    }
                }, index * 100);
            });
        }

        function showNutritionTips(weight, calories) {
            // Remove existing tips
            const existingTips = document.getElementById('nutrition-tips');
            if (existingTips) {
                existingTips.remove();
            }

            // Calculate recommendations
            const waterIntake = Math.round(weight * 35); // 35ml per kg
            const mealsPerDay = 5;
            const caloriesPerMeal = Math.round(calories / mealsPerDay);

            // Create tips container
            const tipsContainer = document.createElement('div');
            tipsContainer.id = 'nutrition-tips';
            tipsContainer.className = 'mt-6 grid grid-cols-1 md:grid-cols-3 gap-4';
            tipsContainer.style.opacity = '0';
            tipsContainer.style.transform = 'translateY(20px)';
            tipsContainer.style.transition = 'all 0.5s ease';
            
            tipsContainer.innerHTML = `
                <div class="bg-gray-900 border border-gray-700 rounded-lg p-4 text-center hover-energy">
                    <div class="text-2xl mb-2">💧</div>
                    <h4 class="font-orbitron font-bold text-green-400 text-sm mb-1">DAILY WATER</h4>
                    <p class="text-lg font-rajdhani text-white">${waterIntake}ml</p>
                    <p class="text-xs text-gray-400 font-rajdhani">Stay hydrated for peak performance</p>
                </div>
                <div class="bg-gray-900 border border-gray-700 rounded-lg p-4 text-center hover-energy">
                    <div class="text-2xl mb-2">🍽️</div>
                    <h4 class="font-orbitron font-bold text-green-400 text-sm mb-1">MEAL FREQUENCY</h4>
                    <p class="text-lg font-rajdhani text-white">${mealsPerDay} meals</p>
                    <p class="text-xs text-gray-400 font-rajdhani">~${caloriesPerMeal} calories each</p>
                </div>
                <div class="bg-gray-900 border border-gray-700 rounded-lg p-4 text-center hover-energy">
                    <div class="text-2xl mb-2">⏰</div>
                    <h4 class="font-orbitron font-bold text-green-400 text-sm mb-1">MEAL TIMING</h4>
                    <p class="text-lg font-rajdhani text-white">Every 3-4h</p>
                    <p class="text-xs text-gray-400 font-rajdhani">Consistent fuel for gains</p>
                </div>
            `;

            // Insert after macro results
            const macroResults = document.getElementById('macro-results');
            macroResults.parentNode.insertBefore(tipsContainer, macroResults.nextSibling);

            // Animate appearance
            setTimeout(() => {
                tipsContainer.style.opacity = '1';
                tipsContainer.style.transform = 'translateY(0)';
            }, 300);
        }

        // Input validation
        function addInputValidation() {
            const inputs = document.querySelectorAll('input[type="number"]');
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    const value = parseFloat(this.value);
                    let isValid = true;
                    
                    // Validation rules
                    if (this.id === 'weight-input' && (value < 30 || value > 300)) isValid = false;
                    if (this.id === 'height-input' && (value < 100 || value > 250)) isValid = false;
                    if (this.id === 'age-input' && (value < 10 || value > 100)) isValid = false;
                    
                    this.style.borderColor = isValid ? '#22c55e' : '#ef4444';
                    this.style.transition = 'border-color 0.3s ease';
                });

                // Clear validation on focus
                input.addEventListener('focus', function() {
                    this.style.borderColor = '#22c55e';
                });
            });
        }

        // Loading state management
        function showLoading(element) {
            element.classList.add('loading-pulse');
        }

        function hideLoading(element) {
            element.classList.remove('loading-pulse');
        }

        // Error handling
        function showError(message) {
            const errorDiv = document.createElement('div');
            errorDiv.className = 'fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300';
            errorDiv.textContent = message;
            document.body.appendChild(errorDiv);

            setTimeout(() => {
                errorDiv.style.opacity = '0';
                errorDiv.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    document.body.removeChild(errorDiv);
                }, 300);
            }, 3000);
        }

        // Success notification
        function showSuccess(message) {
            const successDiv = document.createElement('div');
            successDiv.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300';
            successDiv.textContent = message;
            document.body.appendChild(successDiv);

            setTimeout(() => {
                successDiv.style.opacity = '0';
                successDiv.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    document.body.removeChild(successDiv);
                }, 300);
            }, 3000);
        }

        // Initialize tooltips and enhanced UX
        document.addEventListener('DOMContentLoaded', () => {
            // Add tooltips to form inputs
            const tooltips = {
                'weight-input': 'Enter your current body weight in kilograms',
                'height-input': 'Enter your height in centimeters',
                'age-input': 'Enter your age in years',
                'gender-input': 'Select your biological gender for accurate BMR calculation',
                'activity-input': 'Choose the option that best describes your weekly activity level'
            };

            Object.keys(tooltips).forEach(id => {
                const element = document.getElementById(id);
                if (element) {
                    element.title = tooltips[id];
                }
            });

            // Enhanced keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' && e.target.matches('input')) {
                    e.preventDefault();
                    calculateMacros();
                }
                if (e.key === 'Escape') {
                    const mobileMenu = document.getElementById('mobile-menu');
                    const mobileToggle = document.getElementById('mobile-toggle');
                    if (mobileMenu.classList.contains('active')) {
                        mobileMenu.classList.remove('active');
                        mobileToggle.textContent = '☰';
                    }
                }
            });
        });
    </script>
</body>
</html>