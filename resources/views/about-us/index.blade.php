<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - BruteCharge Supplements</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Rajdhani', sans-serif;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #0f1419 0%, #1a2f1a 50%, #0f1f0f 100%);
            position: relative;
        }
        .gradient-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 30%, rgba(34, 197, 94, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 70%, rgba(16, 185, 129, 0.08) 0%, transparent 50%);
        }
        .card-hover {
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
        }
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .slide-in-left {
            animation: slideInLeft 1s ease-out;
        }
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .slide-in-right {
            animation: slideInRight 1s ease-out;
        }
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .pulse-glow {
            animation: pulseGlow 2s infinite;
        }
        @keyframes pulseGlow {
            0%, 100% { box-shadow: 0 0 20px rgba(34, 197, 94, 0.5); }
            50% { box-shadow: 0 0 40px rgba(34, 197, 94, 0.8); }
        }
        .text-gradient {
            background: linear-gradient(90deg, #22c55e, #16a34a, #15803d);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .scroll-reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.6s ease-out;
        }
        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }
        .protein-text {
            font-weight: 900;
            letter-spacing: 0.2em;
            text-transform: uppercase;
        }
        .glow-effect {
            text-shadow: 0 0 20px rgba(34, 197, 94, 0.5);
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-100">

    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 bg-gray-900 bg-opacity-95 backdrop-blur-sm">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <span class="text-2xl font-bold text-green-400">BruteCharge</span>
                    <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                    </svg>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-300 hover:text-green-400 transition-colors">HOME</a>
                    <a href="#" class="text-green-400 hover:text-green-300 transition-colors">PRODUCTS</a>
                    <a href="#" class="text-gray-300 hover:text-green-400 transition-colors">NUTRITION</a>
                    <a href="#" class="text-gray-300 hover:text-green-400 transition-colors">TRAINING</a>
                    <a href="#" class="text-gray-300 hover:text-green-400 transition-colors">CONTACT</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="gradient-bg min-h-screen flex items-center justify-center relative overflow-hidden pt-20">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        
        <!-- Animated Background Elements -->
        <div class="absolute top-20 left-10 w-32 h-32 bg-green-500 bg-opacity-10 rounded-full float-animation"></div>
        <div class="absolute bottom-32 right-20 w-24 h-24 bg-yellow-400 bg-opacity-20 rounded-full float-animation" style="animation-delay: -2s;"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-green-400 bg-opacity-5 rounded-full float-animation" style="animation-delay: -4s;"></div>
        
        <!-- Muscle Silhouette -->
        <div class="absolute left-10 top-1/2 transform -translate-y-1/2 opacity-20">
            <div class="w-64 h-64 bg-gradient-to-br from-green-500 to-transparent rounded-full"></div>
        </div>
        
        <div class="container mx-auto px-6 text-center relative z-10">
            <div class="fade-in">
                <h1 class="text-8xl md:text-9xl font-black text-green-400 mb-4 protein-text glow-effect">
                    ABOUT US
                </h1>
                <h2 class="text-4xl md:text-6xl font-bold text-white mb-6 protein-text">
                    PROTEIN <span class="text-gradient">POWER</span>
                </h2>
                <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-4xl mx-auto font-medium">
                    Build unstoppable muscle mass with premium supplement formulas
                </p>
                <div class="flex flex-wrap justify-center items-center gap-4 mb-12">
                    <span class="text-yellow-400">🔥</span>
                    <span class="text-green-400 font-bold text-lg">MAXIMUM BIOAVAILABILITY</span>
                    <span class="text-gray-400">•</span>
                    <span class="text-green-400 font-bold text-lg">INSTANT MIXING</span>
                    <span class="text-gray-400">•</span>
                    <span class="text-green-400 font-bold text-lg">ZERO BLOAT</span>
                    <span class="text-yellow-400">🔥</span>
                </div>
                <div class="inline-block bg-green-600 bg-opacity-20 backdrop-blur-lg rounded-full px-12 py-6 pulse-glow border border-green-400">
                    <div class="flex items-center justify-center space-x-2">
                        <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                        </svg>
                        <span class="text-green-400 font-black text-xl">30G PROTEIN • 5G BCAA • FAST ABSORPTION</span>
                        <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="py-20 bg-gray-800">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16 scroll-reveal">
                    <h2 class="text-6xl font-black text-green-400 mb-6 protein-text">OUR MISSION</h2>
                    <p class="text-xl text-gray-300 max-w-3xl mx-auto font-medium">
                        To revolutionize athletic performance with scientifically-backed supplements, 
                        making elite-level nutrition accessible to every serious athlete.
                    </p>
                </div>
                
                <div class="grid md:grid-cols-2 gap-16 items-center">
                    <div class="slide-in-left scroll-reveal">
                        <div class="bg-gradient-to-br from-gray-700 to-gray-800 rounded-3xl p-8 card-hover border border-green-500 border-opacity-20">
                            <div class="w-20 h-20 bg-green-600 rounded-2xl flex items-center justify-center mb-6">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-green-400 mb-4 protein-text">SCIENCE FIRST</h3>
                            <p class="text-gray-300 leading-relaxed">
                                We develop cutting-edge formulas backed by the latest research in sports nutrition, 
                                ensuring maximum effectiveness and safety for peak performance.
                            </p>
                        </div>
                    </div>
                    
                    <div class="slide-in-right scroll-reveal">
                        <div class="bg-gradient-to-br from-gray-700 to-gray-800 rounded-3xl p-8 card-hover border border-green-500 border-opacity-20">
                            <div class="w-20 h-20 bg-green-600 rounded-2xl flex items-center justify-center mb-6">
                                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-green-400 mb-4 protein-text">ELITE PERFORMANCE</h3>
                            <p class="text-gray-300 leading-relaxed">
                                Every product is designed to push your limits, helping serious athletes 
                                achieve unprecedented gains and dominate their competition.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-gradient-to-r from-gray-900 to-green-900">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-6xl font-black text-green-400 mb-6 protein-text">OUR IMPACT</h2>
                <p class="text-xl text-green-200">Numbers that showcase our dedication to excellence</p>
            </div>
            
            <div class="grid md:grid-cols-4 gap-8 max-w-5xl mx-auto">
                <div class="text-center card-hover scroll-reveal">
                    <div class="bg-gray-800 bg-opacity-50 backdrop-blur-lg rounded-2xl p-8 border border-green-500 border-opacity-20">
                        <div class="text-5xl font-black text-green-400 mb-2 counter protein-text" data-target="50000">0</div>
                        <div class="text-sm text-green-200 font-bold protein-text">ATHLETES POWERED</div>
                    </div>
                </div>
                
                <div class="text-center card-hover scroll-reveal">
                    <div class="bg-gray-800 bg-opacity-50 backdrop-blur-lg rounded-2xl p-8 border border-green-500 border-opacity-20">
                        <div class="text-5xl font-black text-green-400 mb-2 counter protein-text" data-target="25">0</div>
                        <div class="text-sm text-green-200 font-bold protein-text">PREMIUM FORMULAS</div>
                    </div>
                </div>
                
                <div class="text-center card-hover scroll-reveal">
                    <div class="bg-gray-800 bg-opacity-50 backdrop-blur-lg rounded-2xl p-8 border border-green-500 border-opacity-20">
                        <div class="text-5xl font-black text-green-400 mb-2 counter protein-text" data-target="100">0</div>
                        <div class="text-sm text-green-200 font-bold protein-text">COUNTRIES SERVED</div>
                    </div>
                </div>
                
                <div class="text-center card-hover scroll-reveal">
                    <div class="bg-gray-800 bg-opacity-50 backdrop-blur-lg rounded-2xl p-8 border border-green-500 border-opacity-20">
                        <div class="text-5xl font-black text-green-400 mb-2 counter protein-text" data-target="99">0</div>
                        <div class="text-sm text-green-200 font-bold protein-text">PURITY GUARANTEE</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20 bg-gray-800">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 scroll-reveal">
                <h2 class="text-6xl font-black text-green-400 mb-6 protein-text">MEET OUR TEAM</h2>
                <p class="text-xl text-gray-300">The champions behind BruteCharge's success</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-12 max-w-5xl mx-auto">
                <div class="text-center card-hover scroll-reveal">
                    <div class="bg-gradient-to-br from-gray-700 to-gray-800 rounded-3xl p-8 shadow-lg border border-green-500 border-opacity-20">
                        <div class="w-32 h-32 bg-gradient-to-br from-green-600 to-green-800 rounded-full mx-auto mb-6 flex items-center justify-center">
                            <span class="text-4xl font-black text-white">MD</span>
                        </div>
                        <h3 class="text-2xl font-bold text-green-400 mb-2 protein-text">MIKE DIESEL</h3>
                        <p class="text-green-300 font-bold mb-4">CEO & FOUNDER</p>
                        <p class="text-gray-300 leading-relaxed">
                            Former competitive bodybuilder with 20+ years in sports nutrition, 
                            dedicated to creating the most effective supplements on the market.
                        </p>
                    </div>
                </div>
                
                <div class="text-center card-hover scroll-reveal">
                    <div class="bg-gradient-to-br from-gray-700 to-gray-800 rounded-3xl p-8 shadow-lg border border-green-500 border-opacity-20">
                        <div class="w-32 h-32 bg-gradient-to-br from-green-600 to-green-800 rounded-full mx-auto mb-6 flex items-center justify-center">
                            <span class="text-4xl font-black text-white">SP</span>
                        </div>
                        <h3 class="text-2xl font-bold text-green-400 mb-2 protein-text">SARAH POWER</h3>
                        <p class="text-green-300 font-bold mb-4">HEAD SCIENTIST</p>
                        <p class="text-gray-300 leading-relaxed">
                            PhD in Exercise Physiology, leading our research team to develop 
                            breakthrough formulas that maximize athletic performance.
                        </p>
                    </div>
                </div>
                
                <div class="text-center card-hover scroll-reveal">
                    <div class="bg-gradient-to-br from-gray-700 to-gray-800 rounded-3xl p-8 shadow-lg border border-green-500 border-opacity-20">
                        <div class="w-32 h-32 bg-gradient-to-br from-green-600 to-green-800 rounded-full mx-auto mb-6 flex items-center justify-center">
                            <span class="text-4xl font-black text-white">TB</span>
                        </div>
                        <h3 class="text-2xl font-bold text-green-400 mb-2 protein-text">TANK BEAST</h3>
                        <p class="text-green-300 font-bold mb-4">BRAND AMBASSADOR</p>
                        <p class="text-gray-300 leading-relaxed">
                            Professional strongman and fitness influencer, ensuring our products 
                            meet the demands of elite-level competition and training.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-20 bg-gray-900">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 scroll-reveal">
                <h2 class="text-6xl font-black text-green-400 mb-6 protein-text">OUR VALUES</h2>
                <p class="text-xl text-gray-300">The principles that drive everything we do</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                <div class="text-center card-hover scroll-reveal">
                    <div class="bg-gradient-to-br from-gray-700 to-gray-800 rounded-2xl p-6 border border-green-500 border-opacity-20">
                        <div class="w-16 h-16 bg-green-600 rounded-xl mx-auto mb-4 flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-green-400 mb-3 protein-text">PURITY</h3>
                        <p class="text-gray-300 text-sm">
                            Zero fillers, zero compromises. Only the highest quality ingredients.
                        </p>
                    </div>
                </div>
                
                <div class="text-center card-hover scroll-reveal">
                    <div class="bg-gradient-to-br from-gray-700 to-gray-800 rounded-2xl p-6 border border-green-500 border-opacity-20">
                        <div class="w-16 h-16 bg-green-600 rounded-xl mx-auto mb-4 flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-green-400 mb-3 protein-text">PERFORMANCE</h3>
                        <p class="text-gray-300 text-sm">
                            Results-driven formulas that deliver measurable improvements.
                        </p>
                    </div>
                </div>
                
                <div class="text-center card-hover scroll-reveal">
                    <div class="bg-gradient-to-br from-gray-700 to-gray-800 rounded-2xl p-6 border border-green-500 border-opacity-20">
                        <div class="w-16 h-16 bg-green-600 rounded-xl mx-auto mb-4 flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-green-400 mb-3 protein-text">EXCELLENCE</h3>
                        <p class="text-gray-300 text-sm">
                            Relentless pursuit of perfection in every product we create.
                        </p>
                    </div>
                </div>
                
                <div class="text-center card-hover scroll-reveal">
                    <div class="bg-gradient-to-br from-gray-700 to-gray-800 rounded-2xl p-6 border border-green-500 border-opacity-20">
                        <div class="w-16 h-16 bg-green-600 rounded-xl mx-auto mb-4 flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-green-400 mb-3 protein-text">INTEGRITY</h3>
                        <p class="text-gray-300 text-sm">
                            Transparent processes and honest communication with our community.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="gradient-bg py-20 relative">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="container mx-auto px-6 text-center relative z-10">
            <div class="max-w-4xl mx-auto scroll-reveal">
                <h2 class="text-6xl font-black text-green-400 mb-6 protein-text glow-effect">READY TO DOMINATE?</h2>
                <p class="text-xl text-gray-200 mb-12">
                    Join the elite athletes who trust BruteCharge for their performance needs.
                </p>
                <div class="space-x-4">
                    <button class="bg-green-500 text-black px-10 py-5 rounded-full font-black text-lg hover:bg-green-400 transition-all duration-300 card-hover protein-text">
                        SHOP NOW
                    </button>
                    <button class="border-2 border-green-400 text-green-400 px-10 py-5 rounded-full font-black text-lg hover:bg-green-400 hover:text-black transition-all duration-300 card-hover protein-text">
                        CONTACT US
                    </button>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Scroll reveal animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.scroll-reveal').forEach(el => {
            observer.observe(el);
        });

        // Counter animation
        const counters = document.querySelectorAll('.counter');
        const animateCounter = (counter) => {
            const target = parseInt(counter.getAttribute('data-target'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;
            
            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    if (target === 99) {
                        counter.textContent = '99.9%';
                    } else {
                        counter.textContent = target.toLocaleString() + '+';
                    }
                    clearInterval(timer);
                } else {
                    counter.textContent = Math.floor(current).toLocaleString();
                }
            }, 16);
        };

        // Trigger counter animation when in view
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target.querySelector('.counter');
                    if (counter && !counter.classList.contains('animated')) {
                        counter.classList.add('animated');
                        animateCounter(counter);
                    }
                }
            });
        }, observerOptions);

        document.querySelectorAll('.counter').forEach(counter => {
            counterObserver.observe(counter.parentElement.parentElement);
        });

        // Smooth scrolling for anchor links
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

        // Mobile menu toggle (if needed)
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenu) {
                mobileMenu.classList.toggle('hidden');
            }
        }

        // Add parallax effect to hero section
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('.gradient-bg');
            if (parallax) {
                const speed = scrolled * 0.5;
                parallax.style.transform = `translateY(${speed}px)`;
            }
        });

        // Add glow effect on hover to main elements
        document.querySelectorAll('.card-hover').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.boxShadow = '0 10px 30px rgba(34, 197, 94, 0.3)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.boxShadow = '';
            });
        });
    </script>

</body>
</html>
