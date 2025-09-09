<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BruteCharge - Beast Mode Authentication</title>
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
                        'slide-in': 'slide-in 0.6s ease-out',
                        'fade-in': 'fade-in 0.5s ease-out'
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
                        'slide-in': {
                            'from': { transform: 'translateX(100%)', opacity: '0' },
                            'to': { transform: 'translateX(0)', opacity: '1' }
                        },
                        'fade-in': {
                            'from': { opacity: '0', transform: 'scale(0.9)' },
                            'to': { opacity: '1', transform: 'scale(1)' }
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
        
        .auth-bg {
            background: radial-gradient(circle at 20% 80%, rgba(57, 255, 20, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(255, 102, 0, 0.1) 0%, transparent 50%),
                        #0a0a0a;
        }
        
        .form-container {
            backdrop-filter: blur(20px);
            background: linear-gradient(145deg, rgba(42, 42, 42, 0.9), rgba(26, 26, 26, 0.9));
        }
        
        .input-field {
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            box-shadow: 0 0 20px rgba(57, 255, 20, 0.3);
            border-color: #39ff14;
        }
        
        .btn-beast {
            background: linear-gradient(45deg, #39ff14, #32cd32);
            transition: all 0.3s ease;
        }
        
        .btn-beast:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(57, 255, 20, 0.4);
        }
        
        .btn-secondary {
            background: linear-gradient(45deg, #ff6600, #ff8533);
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(255, 102, 0, 0.4);
        }
    </style>
</head>
<body class="bg-dark-bg text-white font-rajdhani min-h-screen auth-bg">
    
    <!-- Navigation Bar -->
    <nav class="fixed w-full z-50 bg-dark-bg/90 backdrop-blur-lg border-b border-neon-green/20">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="font-orbitron font-black text-2xl gradient-text">
                    BruteCharge⚡
                </div>
                <a href="/" class="text-neon-green hover:text-neon-orange transition-colors font-semibold">
                    ← BACK TO HOME
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Authentication Container -->
    <div class="min-h-screen flex items-center justify-center pt-20 px-6">
        <div class="max-w-md w-full">
            
            <!-- Logo and Welcome -->
            <div class="text-center mb-8 animate-fade-in">
                <div class="text-6xl mb-4 animate-float">💪</div>
                <h1 class="font-orbitron font-black text-3xl gradient-text mb-4">
                    BEAST MODE ACCESS
                </h1>
                <p class="text-gray-400 text-lg">
                    Join the elite. Transform your limits.
                </p>
            </div>

            <!-- Auth Toggle Buttons -->
            <div class="flex mb-6 bg-dark-surface rounded-lg p-2 animate-fade-in">
                <button id="loginTab" class="flex-1 py-3 px-4 rounded-lg font-bold transition-all duration-300 bg-neon-green text-black">
                    LOGIN
                </button>
                <button id="registerTab" class="flex-1 py-3 px-4 rounded-lg font-bold transition-all duration-300 text-gray-400 hover:text-white">
                    REGISTER
                </button>
            </div>

            <!-- Login Form -->
            <div id="loginForm" class="form-container rounded-2xl p-8 border border-neon-green/30 neon-border animate-slide-in">
                <form id="loginFormSubmit" class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-neon-green mb-2">EMAIL</label>
                        <input 
                            type="email" 
                            id="loginEmail" 
                            required
                            placeholder="beast@example.com"
                            class="input-field w-full px-4 py-3 rounded-lg bg-dark-bg border-2 border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:border-neon-green"
                        >
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-neon-green mb-2">PASSWORD</label>
                        <input 
                            type="password" 
                            id="loginPassword" 
                            required
                            placeholder="••••••••"
                            class="input-field w-full px-4 py-3 rounded-lg bg-dark-bg border-2 border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:border-neon-green"
                        >
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="checkbox" class="rounded bg-dark-bg border-gray-600 text-neon-green focus:ring-neon-green">
                            <span class="text-sm text-gray-400">Remember me</span>
                        </label>
                        <a href="#" class="text-sm text-neon-orange hover:underline">Forgot password?</a>
                    </div>
                    
                    <button type="submit" class="btn-beast w-full py-4 rounded-lg font-orbitron font-bold text-black text-lg">
                        🚀 ENTER BEAST MODE
                    </button>
                </form>
            </div>

            <!-- Register Form (Hidden by default) -->
            <div id="registerForm" class="form-container rounded-2xl p-8 border border-neon-orange/30 hidden">
                <form id="registerFormSubmit" class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-neon-orange mb-2">FULL NAME</label>
                        <input 
                            type="text" 
                            id="registerName" 
                            required
                            placeholder="Beast Warrior"
                            class="input-field w-full px-4 py-3 rounded-lg bg-dark-bg border-2 border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:border-neon-orange"
                        >
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-neon-orange mb-2">EMAIL</label>
                        <input 
                            type="email" 
                            id="registerEmail" 
                            required
                            placeholder="beast@example.com"
                            class="input-field w-full px-4 py-3 rounded-lg bg-dark-bg border-2 border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:border-neon-orange"
                        >
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-neon-orange mb-2">PASSWORD</label>
                        <input 
                            type="password" 
                            id="registerPassword" 
                            required
                            placeholder="••••••••"
                            class="input-field w-full px-4 py-3 rounded-lg bg-dark-bg border-2 border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:border-neon-orange"
                        >
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-neon-orange mb-2">CONFIRM PASSWORD</label>
                        <input 
                            type="password" 
                            id="registerPasswordConfirm" 
                            required
                            placeholder="••••••••"
                            class="input-field w-full px-4 py-3 rounded-lg bg-dark-bg border-2 border-gray-600 text-white placeholder-gray-400 focus:outline-none focus:border-neon-orange"
                        >
                    </div>
                    
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="agreeTerms" required class="rounded bg-dark-bg border-gray-600 text-neon-orange focus:ring-neon-orange">
                        <label for="agreeTerms" class="text-sm text-gray-400">
                            I agree to the <a href="#" class="text-neon-orange hover:underline">Beast Mode Terms</a>
                        </label>
                    </div>
                    
                    <button type="submit" class="btn-secondary w-full py-4 rounded-lg font-orbitron font-bold text-white text-lg">
                        🔥 JOIN THE BEAST ARMY
                    </button>
                </form>
            </div>

            <!-- Social Login (Optional) -->
            <div class="mt-8 animate-fade-in">
                <div class="text-center text-gray-500 mb-4">
                    <span class="px-4 bg-dark-bg">Or continue with</span>
                </div>
                <div class="flex space-x-4">
                    <button class="flex-1 bg-dark-surface border border-gray-600 py-3 rounded-lg hover:bg-gray-700 transition-colors">
                        📧 Google
                    </button>
                    <button class="flex-1 bg-dark-surface border border-gray-600 py-3 rounded-lg hover:bg-gray-700 transition-colors">
                        📘 Facebook
                    </button>
                </div>
            </div>

            <!-- Success/Error Messages -->
            <div id="messageContainer" class="mt-6 hidden">
                <div id="successMessage" class="hidden bg-neon-green/20 border border-neon-green rounded-lg p-4">
                    <div class="flex items-center text-neon-green">
                        <span class="text-xl mr-3">✅</span>
                        <span id="successText">Success message here</span>
                    </div>
                </div>
                <div id="errorMessage" class="hidden bg-red-500/20 border border-red-500 rounded-lg p-4">
                    <div class="flex items-center text-red-400">
                        <span class="text-xl mr-3">❌</span>
                        <span id="errorText">Error message here</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tab switching functionality
        const loginTab = document.getElementById('loginTab');
        const registerTab = document.getElementById('registerTab');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');

        loginTab.addEventListener('click', () => {
            loginTab.classList.add('bg-neon-green', 'text-black');
            loginTab.classList.remove('text-gray-400');
            registerTab.classList.remove('bg-neon-orange', 'text-black');
            registerTab.classList.add('text-gray-400');
            
            loginForm.classList.remove('hidden');
            registerForm.classList.add('hidden');
        });

        registerTab.addEventListener('click', () => {
            registerTab.classList.add('bg-neon-orange', 'text-black');
            registerTab.classList.remove('text-gray-400');
            loginTab.classList.remove('bg-neon-green', 'text-black');
            loginTab.classList.add('text-gray-400');
            
            registerForm.classList.remove('hidden');
            loginForm.classList.add('hidden');
        });

        // Message display functions
        function showMessage(type, message) {
            const messageContainer = document.getElementById('messageContainer');
            const successDiv = document.getElementById('successMessage');
            const errorDiv = document.getElementById('errorMessage');
            const successText = document.getElementById('successText');
            const errorText = document.getElementById('errorText');

            messageContainer.classList.remove('hidden');
            
            if (type === 'success') {
                successDiv.classList.remove('hidden');
                errorDiv.classList.add('hidden');
                successText.textContent = message;
            } else {
                errorDiv.classList.remove('hidden');
                successDiv.classList.add('hidden');
                errorText.textContent = message;
            }

            // Auto-hide after 5 seconds
            setTimeout(() => {
                messageContainer.classList.add('hidden');
            }, 5000);
        }

        // Login form submission
        document.getElementById('loginFormSubmit').addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;
            const submitBtn = e.target.querySelector('button[type="submit"]');
            
            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '⚡ AUTHENTICATING...';
            
            try {
                const response = await fetch('/api/auth/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        email: email,
                        password: password
                    })
                });

                const data = await response.json();

                if (data.success) {
                    showMessage('success', 'Login successful! Redirecting to beast mode...');
                    
                    // Store token if needed
                    if (data.token) {
                        localStorage.setItem('beast_token', data.token);
                    }
                    
                    // Redirect after 2 seconds
                    setTimeout(() => {
                        window.location.href = '/dashboard'; // Change to your desired redirect
                    }, 2000);
                } else {
                    showMessage('error', data.message || 'Login failed. Check your credentials.');
                }
            } catch (error) {
                showMessage('error', 'Network error. Please try again.');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '🚀 ENTER BEAST MODE';
            }
        });

        // Register form submission
        document.getElementById('registerFormSubmit').addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const name = document.getElementById('registerName').value;
            const email = document.getElementById('registerEmail').value;
            const password = document.getElementById('registerPassword').value;
            const passwordConfirm = document.getElementById('registerPasswordConfirm').value;
            const submitBtn = e.target.querySelector('button[type="submit"]');
            
            // Client-side validation
            if (password !== passwordConfirm) {
                showMessage('error', 'Passwords do not match!');
                return;
            }
            
            if (password.length < 8) {
                showMessage('error', 'Password must be at least 8 characters long!');
                return;
            }
            
            // Show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '⚡ CREATING BEAST ACCOUNT...';
            
            try {
                const response = await fetch('/api/auth/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        name: name,
                        email: email,
                        password: password,
                        password_confirmation: passwordConfirm
                    })
                });

                const data = await response.json();

                if (data.success) {
                    showMessage('success', 'Registration successful! Welcome to the beast family!');
                    
                    // Store token if needed
                    if (data.token) {
                        localStorage.setItem('beast_token', data.token);
                    }
                    
                    // Redirect after 2 seconds
                    setTimeout(() => {
                        window.location.href = '/dashboard'; // Change to your desired redirect
                    }, 2000);
                } else {
                    let errorMsg = 'Registration failed. ';
                    if (data.errors) {
                        errorMsg += Object.values(data.errors).flat().join(' ');
                    } else {
                        errorMsg += data.message || 'Please try again.';
                    }
                    showMessage('error', errorMsg);
                }
            } catch (error) {
                showMessage('error', 'Network error. Please try again.');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '🔥 JOIN THE BEAST ARMY';
            }
        });

        // Add floating animation to elements
        document.addEventListener('DOMContentLoaded', () => {
            const forms = document.querySelectorAll('.form-container');
            forms.forEach((form, index) => {
                setTimeout(() => {
                    form.style.opacity = '1';
                    form.style.transform = 'translateY(0)';
                }, index * 200);
            });
        });
    </script>
</body>
</html>