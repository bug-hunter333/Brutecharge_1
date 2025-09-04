<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - BruteCharge</title>
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
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: linear-gradient(135deg, #0B0B0B 0%, #1C1C1C 50%, #0B0B0B 100%);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #DC143C 0%, #FF0000 50%, #FF1744 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .login-card {
            background: linear-gradient(145deg, rgba(28, 28, 28, 0.95) 0%, rgba(11, 11, 11, 0.95) 100%);
            border: 1px solid rgba(220, 20, 60, 0.3);
            backdrop-filter: blur(20px);
            box-shadow: 0 25px 50px rgba(220, 20, 60, 0.2);
        }
        
        .red-button {
            background: linear-gradient(135deg, #DC143C 0%, #FF0000 100%);
            box-shadow: 0 8px 32px rgba(220, 20, 60, 0.4);
            transition: all 0.3s ease;
        }
        
        .red-button:hover {
            box-shadow: 0 12px 40px rgba(220, 20, 60, 0.6);
            transform: translateY(-2px);
        }
        
        .form-input {
            background: rgba(11, 11, 11, 0.8);
            border: 2px solid rgba(220, 20, 60, 0.3);
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            border-color: #DC143C;
            box-shadow: 0 0 20px rgba(220, 20, 60, 0.3);
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        
        .floating-elements::before,
        .floating-elements::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(220, 20, 60, 0.1) 0%, transparent 50%);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-elements::before {
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .floating-elements::after {
            bottom: 10%;
            right: 10%;
            animation-delay: 3s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-20px) scale(1.1); }
        }
    </style>
</head>

<body class="bg-obsidian min-h-screen flex items-center justify-center relative">
    <!-- Floating Background Elements -->
    <div class="floating-elements"></div>
    
    <div class="w-full max-w-md mx-4">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="font-rajdhani font-black text-4xl mb-4">
                <span class="text-white">BRUTE</span><span class="gradient-text">CHARGE</span>
            </div>
            <div class="flex items-center justify-center mb-6">
                <div class="w-16 h-16 bg-blood-red/20 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-shield-alt text-blood-red text-2xl"></i>
                </div>
                <div class="text-left">
                    <h1 class="text-2xl font-rajdhani font-bold text-white">ADMIN ACCESS</h1>
                    <p class="text-gray-400 text-sm">Administrative Command Center</p>
                </div>
            </div>
        </div>

        <!-- Login Form -->
        <div class="login-card rounded-2xl p-8">
            <!-- Flash Messages -->
            @if (session('success'))
                <div class="mb-6 bg-green-900/50 border border-green-500/50 text-green-400 px-4 py-3 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 bg-red-900/50 border border-red-500/50 text-red-400 px-4 py-3 rounded-lg">
                    @foreach ($errors->all() as $error)
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            {{ $error }}
                        </div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-6">
                @csrf
                
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-300 mb-2">
                        <i class="fas fa-envelope mr-2 text-blood-red"></i>
                        Admin Email
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}"
                           required 
                           autofocus
                           class="form-input w-full px-4 py-3 rounded-lg text-white placeholder-gray-400 focus:outline-none"
                           placeholder="admin@brutecharge.com">
                    @error('email')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-300 mb-2">
                        <i class="fas fa-lock mr-2 text-blood-red"></i>
                        Admin Password
                    </label>
                    <div class="relative">
                        <input type="password" 
                               id="password" 
                               name="password" 
                               required
                               class="form-input w-full px-4 py-3 rounded-lg text-white placeholder-gray-400 focus:outline-none pr-12"
                               placeholder="Enter your admin password">
                        <button type="button" 
                                onclick="togglePassword()"
                                class="absolute right-4 top-3 text-gray-400 hover:text-blood-red transition-colors">
                            <i id="password-icon" class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input type="checkbox" 
                           id="remember" 
                           name="remember" 
                           class="w-4 h-4 text-blood-red bg-obsidian border-blood-red/40 rounded focus:ring-blood-red focus:ring-2">
                    <label for="remember" class="ml-2 text-sm text-gray-300">
                        Remember this device
                    </label>
                </div>

                <!-- Login Button -->
                <button type="submit" 
                        class="red-button w-full text-white py-4 px-6 rounded-lg font-rajdhani font-bold text-lg tracking-wide hover:scale-105 transition-transform">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    ACCESS ADMIN PORTAL
                </button>
            </form>

            <!-- Quick Access Info -->
            <div class="mt-8 pt-6 border-t border-blood-red/20">
                <div class="text-center">
                    <p class="text-gray-400 text-sm mb-4">Need help accessing the admin panel?</p>
                    <div class="space-y-2 text-xs text-gray-500">
                        <div class="flex items-center justify-center">
                            <i class="fas fa-info-circle mr-2 text-blood-red"></i>
                            Only authorized administrators can access this area
                        </div>
                        <div class="flex items-center justify-center">
                            <i class="fas fa-shield-alt mr-2 text-blood-red"></i>
                            Your session is secured and monitored
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back to Main Site -->
        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-gray-400 hover:text-blood-red transition-colors text-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Main Site
            </a>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }

        // Auto-focus and form enhancement
        document.addEventListener('DOMContentLoaded', function() {
            const emailField = document.getElementById('email');
            const passwordField = document.getElementById('password');
            
            // Enhanced focus states
            [emailField, passwordField].forEach(field => {
                field.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });
                
                field.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
                });
            });

            // Keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                if (e.ctrlKey && e.key === 'Enter') {
                    document.querySelector('form').submit();
                }
            });
        });
    </script>
</body>
</html>