<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training - BruteCharge⚡</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .font-orbitron { font-family: 'Orbitron', monospace; }
        .font-rajdhani { font-family: 'Rajdhani', sans-serif; }
        .neon-blue { color: #00ffff; }
        .bg-neon-blue { background-color: #00ffff; }
        .border-neon-blue { border-color: #00ffff; }
        .shadow-neon { box-shadow: 0 0 20px rgba(0, 255, 255, 0.3); }
        .shadow-neon-strong { box-shadow: 0 0 30px rgba(0, 255, 255, 0.5); }
        .hover-glow { transition: all 0.3s ease; }
        .hover-glow:hover { box-shadow: 0 0 25px rgba(0, 255, 255, 0.4); transform: translateY(-2px); }
        .locked-overlay { background: linear-gradient(45deg, rgba(0,0,0,0.9), rgba(0,0,0,0.7)); }
        .pulse-animation { animation: pulse 2s infinite; }
        .pulse-glow { animation: pulse-glow 2s infinite; }
        
        @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.5; } }
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(34, 197, 94, 0.3); }
            50% { box-shadow: 0 0 40px rgba(34, 197, 94, 0.6); }
        }
        
        .gradient-border { background: linear-gradient(45deg, #00ffff, #0080ff, #00ffff); padding: 2px; }
        .gradient-content { background: #000; }
        .gradient-text {
            background: linear-gradient(45deg, #ffffff, #d1d5db);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Dropdown Styles */
        .dropdown {
            position: relative;
        }
        
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            margin-top: 0.5rem;
            width: 16rem;
            background: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(34, 197, 94, 0.3);
            border-radius: 0.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            z-index: 50;
        }
        
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        
        .dropdown-arrow {
            transition: transform 0.2s ease;
        }
        
        .dropdown:hover .dropdown-arrow {
            transform: rotate(180deg);
        }
        
        /* Mobile Menu Styles */
        .mobile-menu {
            display: none;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }
        
        .mobile-menu.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Navigation Active State */
        .nav-active {
            color: #22c55e !important;
        }
        
        /* Responsive fixes */
        @media (max-width: 768px) {
            .dropdown-menu {
                position: static;
                width: 100%;
                margin-top: 0.5rem;
                box-shadow: none;
                border: none;
                background: rgba(17, 24, 39, 0.95);
            }
        }
    </style>
</head>
<body class="bg-black text-white font-rajdhani">
    <!-- Navigation Bar -->
    <nav class="fixed w-full z-50 bg-black/95 backdrop-blur-lg border-b border-gray-800">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="font-orbitron font-black text-2xl gradient-text">
                    BruteCharge⚡
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ url('home') }}"class="hover:text-green-400 transition-colors font-semibold nav-link">HOME</a>
                    
                    <!-- Products Dropdown -->
                    <div class="dropdown">
                        <a href="#products" class="hover:text-green-400 transition-colors font-semibold flex items-center nav-link">
                            PRODUCTS
                            <svg class="w-4 h-4 ml-1 dropdown-arrow" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        
                        <!-- Dropdown Menu -->
                        <div class="dropdown-menu">
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
                    <a href="{{ route('training.index') }}" class="text-blue-400 hover:text-neon-green transition-colors font-semibold">
                    TRAINING
                    </a>
                </div>

                <!-- Desktop CTA and Mobile Toggle -->
                <div class="flex items-center space-x-4">
                    <button class="hidden md:block bg-green-400 text-black px-6 py-2 rounded-full font-bold hover:bg-green-500 transition-colors pulse-glow">
                        SHOP NOW
                    </button>
                    <button id="mobile-toggle" class="md:hidden text-green-400 text-2xl hover:text-green-500 transition-colors">
                        <i class="fas fa-bars"></i>
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
                    <a href="#nutrition" class="block text-lg font-semibold hover:text-green-400 transition-colors">NUTRITION</a>
                    <a href="#training" class="block text-lg font-semibold text-green-400">TRAINING</a>
                    <a href="#contact" class="block text-lg font-semibold hover:text-green-400 transition-colors">CONTACT</a>
                    <button class="w-full bg-green-400 text-black py-3 px-6 rounded-full font-bold hover:bg-green-500 transition-colors mt-4">
                        SHOP NOW
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative bg-black py-20 pt-32">
        <div class="absolute inset-0 bg-gradient-to-r from-black via-gray-900 to-black opacity-90"></div>
        <div class="relative max-w-7xl mx-auto px-4 text-center">
            <h1 class="font-orbitron text-5xl md:text-7xl font-black mb-6">
                <span class="neon-blue">TRAINING</span> PROGRAMS
            </h1>
            <p class="font-rajdhani text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto">
                Unlock your true potential with scientifically designed workout programs that push limits and deliver results
            </p>
            <div class="flex justify-center items-center space-x-4">
                <div class="h-1 w-20 bg-neon-blue"></div>
                <i class="fas fa-bolt text-3xl neon-blue pulse-animation"></i>
                <div class="h-1 w-20 bg-neon-blue"></div>
            </div>
        </div>
    </div>

    <!-- Training Plans Grid -->
    <div class="py-20 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Free Plan -->
                <div class="bg-gray-800 border border-gray-700 rounded-lg p-8 hover-glow transform transition-all duration-300">
                    <div class="text-center mb-6">
                        <h3 class="font-orbitron text-2xl font-bold text-white mb-2">STARTER 💀</h3>
                        <div class="text-4xl font-bold neon-blue mb-4">FREE</div>
                        <p class="text-gray-400">Get started with basic workouts</p>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center"><i class="fas fa-check neon-blue mr-3"></i>Basic workout routines</li>
                        <li class="flex items-center"><i class="fas fa-check neon-blue mr-3"></i>Exercise demonstrations</li>
                        <li class="flex items-center"><i class="fas fa-check neon-blue mr-3"></i>Progress tracking</li>
                        <li class="flex items-center"><i class="fas fa-times text-gray-500 mr-3"></i>Advanced programs</li>
                        <li class="flex items-center"><i class="fas fa-times text-gray-500 mr-3"></i>Personal coaching</li>
                    </ul>
                    <button class="w-full border-2 border-neon-blue neon-blue font-bold py-3 px-6 rounded-lg hover:bg-neon-blue hover:text-black transition-all duration-300">
                        START FREE
                    </button>
                </div>

                <!-- Premium Plan -->
                <div class="relative bg-gray-800 border-2 border-neon-blue rounded-lg p-8 hover-glow transform transition-all duration-300 shadow-neon">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span class="bg-neon-blue text-black px-6 py-1 rounded-full font-bold text-sm">MOST POPULAR</span>
                    </div>
                    <div class="text-center mb-6">
                        <h3 class="font-orbitron text-2xl font-bold text-white mb-2">BEAST MODE 👻</h3>
                        <div class="text-4xl font-bold neon-blue mb-4">$29.99<span class="text-lg text-gray-400">/month</span></div>
                        <p class="text-gray-400">Unleash your inner beast</p>
                    </div>
                    
                    <!-- Locked Content Overlay -->
                    <div class="relative">
                        <div class="locked-overlay absolute inset-0 z-10 rounded-lg flex flex-col items-center justify-center">
                            <i class="fas fa-lock text-4xl neon-blue mb-4 pulse-animation"></i>
                            <p class="text-center font-bold text-lg mb-4">PREMIUM CONTENT LOCKED</p>
                            <button onclick="showPayment('beast')" class="bg-neon-blue text-black font-bold py-2 px-6 rounded-lg hover:bg-white transition-all duration-300">
                                UNLOCK NOW
                            </button>
                        </div>
                        
                        <ul class="space-y-3 mb-8 blur-sm">
                            <li class="flex items-center"><i class="fas fa-check neon-blue mr-3"></i>Advanced workout programs</li>
                            <li class="flex items-center"><i class="fas fa-check neon-blue mr-3"></i>Nutrition guidance</li>
                            <li class="flex items-center"><i class="fas fa-check neon-blue mr-3"></i>Video tutorials</li>
                            <li class="flex items-center"><i class="fas fa-check neon-blue mr-3"></i>Progress analytics</li>
                            <li class="flex items-center"><i class="fas fa-check neon-blue mr-3"></i>Community access</li>
                        </ul>
                    </div>
                </div>

                <!-- Elite Plan -->
                <div class="relative">
                    <div class="gradient-border rounded-lg">
                        <div class="gradient-content rounded-lg p-8 hover-glow transform transition-all duration-300">
                            <div class="text-center mb-6">
                                <h3 class="font-orbitron text-2xl font-bold text-white mb-2">ELITE WARRIOR ☠</h3>
                                <div class="text-4xl font-bold neon-blue mb-4">$49.99<span class="text-lg text-gray-400">/month</span></div>
                                <p class="text-gray-400">Ultimate training experience</p>
                            </div>
                            
                            <!-- Locked Content Overlay -->
                            <div class="relative">
                                <div class="locked-overlay absolute inset-0 z-10 rounded-lg flex flex-col items-center justify-center">
                                    <i class="fas fa-crown text-4xl neon-blue mb-4 pulse-animation"></i>
                                    <p class="text-center font-bold text-lg mb-4">ELITE CONTENT LOCKED</p>
                                    <button onclick="showPayment('elite')" class="bg-neon-blue text-black font-bold py-2 px-6 rounded-lg hover:bg-white transition-all duration-300">
                                        UNLOCK ELITE
                                    </button>
                                </div>
                                
                                <ul class="space-y-3 mb-8 blur-sm">
                                    <li class="flex items-center"><i class="fas fa-check neon-blue mr-3"></i>Personal trainer access</li>
                                    <li class="flex items-center"><i class="fas fa-check neon-blue mr-3"></i>Custom meal plans</li>
                                    <li class="flex items-center"><i class="fas fa-check neon-blue mr-3"></i>1-on-1 coaching calls</li>
                                    <li class="flex items-center"><i class="fas fa-check neon-blue mr-3"></i>Supplement recommendations</li>
                                    <li class="flex items-center"><i class="fas fa-check neon-blue mr-3"></i>Priority support</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-20 bg-black">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="font-orbitron text-4xl font-bold text-center neon-blue mb-16">WHY CHOOSE BRUTECHARGE?</h2>
            <div class="grid md:grid-cols-3 gap-12">
                <div class="text-center">
                    <div class="w-20 h-20 bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-6 shadow-neon">
                        <i class="fas fa-dumbbell text-3xl neon-blue"></i>
                    </div>
                    <h3 class="font-orbitron text-xl font-bold mb-4">SCIENCE-BASED</h3>
                    <p class="text-gray-400">Programs designed by certified trainers using proven methodologies</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-6 shadow-neon">
                        <i class="fas fa-chart-line text-3xl neon-blue"></i>
                    </div>
                    <h3 class="font-orbitron text-xl font-bold mb-4">TRACK PROGRESS</h3>
                    <p class="text-gray-400">Advanced analytics to monitor your gains and optimize performance</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-6 shadow-neon">
                        <i class="fas fa-users text-3xl neon-blue"></i>
                    </div>
                    <h3 class="font-orbitron text-xl font-bold mb-4">COMMUNITY</h3>
                    <p class="text-gray-400">Join thousands of dedicated athletes on their fitness journey</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Modal -->
    <div id="paymentModal" class="fixed inset-0 z-50 hidden">
        <div class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center p-4">
            <div class="bg-gray-800 rounded-lg p-8 max-w-md w-full border border-neon-blue shadow-neon-strong">
                <div class="text-center mb-6">
                    <h3 class="font-orbitron text-2xl font-bold neon-blue mb-2" id="modalTitle">UNLOCK PREMIUM</h3>
                    <p class="text-gray-400">Complete your purchase to access exclusive content</p>
                </div>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold mb-2">Email Address</label>
                        <input type="email" class="w-full bg-gray-700 border border-gray-600 rounded px-3 py-2 focus:border-neon-blue focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold mb-2">Card Number</label>
                        <input type="text" placeholder="1234 5678 9012 3456" class="w-full bg-gray-700 border border-gray-600 rounded px-3 py-2 focus:border-neon-blue focus:outline-none">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold mb-2">Expiry</label>
                            <input type="text" placeholder="MM/YY" class="w-full bg-gray-700 border border-gray-600 rounded px-3 py-2 focus:border-neon-blue focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">CVC</label>
                            <input type="text" placeholder="123" class="w-full bg-gray-700 border border-gray-600 rounded px-3 py-2 focus:border-neon-blue focus:outline-none">
                        </div>
                    </div>
                </form>
                <div class="flex space-x-4 mt-8">
                    <button onclick="closePayment()" class="flex-1 border border-gray-600 text-white py-3 rounded-lg hover:bg-gray-700 transition-colors duration-300">
                        CANCEL
                    </button>
                    <button onclick="processPayment()" class="flex-1 bg-neon-blue text-black font-bold py-3 rounded-lg hover:bg-white transition-all duration-300">
                        PAY NOW
                    </button>
                </div>
            </div>
        </div>
    </div>

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
        let selectedPlan = '';

        // Mobile menu toggle
        document.getElementById('mobile-toggle').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('active');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileToggle = document.getElementById('mobile-toggle');
            
            if (!mobileMenu.contains(e.target) && !mobileToggle.contains(e.target)) {
                mobileMenu.classList.remove('active');
            }
        });

        function showPayment(plan) {
            selectedPlan = plan;
            const modal = document.getElementById('paymentModal');
            const title = document.getElementById('modalTitle');
            
            if (plan === 'beast') {
                title.textContent = 'UNLOCK BEAST MODE - $29.99/mo';
            } else if (plan === 'elite') {
                title.textContent = 'UNLOCK ELITE WARRIOR - $49.99/mo';
            }
            
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closePayment() {
            const modal = document.getElementById('paymentModal');
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        function processPayment() {
            // Simulate payment processing
            alert('Payment processing... This would integrate with your Laravel backend and payment processor.');
            closePayment();
        }

        // Close modal on background click
        document.getElementById('paymentModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closePayment();
            }
        });

        // Add smooth scrolling and dynamic effects
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallax = scrolled * 0.2;
            
            // Add subtle parallax effects to hero section
            const hero = document.querySelector('.relative.bg-black.py-20.pt-32');
            if (hero) {
                const heroContent = hero.querySelector('.relative.max-w-7xl');
                if (heroContent) {
                    heroContent.style.transform = `translateY(${parallax}px)`;
                }
            }
        });

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
    </script>
</body>
</html>