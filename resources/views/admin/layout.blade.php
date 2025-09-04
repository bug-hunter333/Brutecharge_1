<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - BruteCharge</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Rajdhani:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @livewireStyles
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
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #DC143C 0%, #FF0000 50%, #FF1744 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .admin-card {
            background: linear-gradient(145deg, rgba(28, 28, 28, 0.95) 0%, rgba(11, 11, 11, 0.95) 100%);
            border: 1px solid rgba(220, 20, 60, 0.3);
            transition: all 0.3s ease;
            backdrop-filter: blur(20px);
        }
        
        .admin-card:hover {
            border-color: #DC143C;
            box-shadow: 0 10px 30px rgba(220, 20, 60, 0.3);
        }
        
        .nav-glass {
            background: rgba(11, 11, 11, 0.95);
            border-bottom: 1px solid rgba(220, 20, 60, 0.3);
            backdrop-filter: blur(20px);
        }
        
        .sidebar-glass {
            background: rgba(28, 28, 28, 0.95);
            border-right: 1px solid rgba(220, 20, 60, 0.2);
            backdrop-filter: blur(20px);
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
    </style>
</head>

<body class="bg-obsidian min-h-screen text-white">
    <!-- Top Navigation -->
    <nav class="fixed w-full z-50 nav-glass">
        <div class="px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="font-rajdhani font-black text-2xl">
                    <span class="text-white">BRUTE</span><span class="gradient-text">CHARGE</span>
                    <span class="text-blood-red ml-2">ADMIN</span>
                    <i class="fas fa-shield-alt text-blood-red ml-2"></i>
                </div>
                
                <!-- User Info & Actions -->
                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <div class="font-semibold">{{ auth()->user()->name }}</div>
                        <div class="text-xs text-gray-400">Administrator</div>
                    </div>
                    <div class="w-10 h-10 bg-blood-red rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <a href="{{ route('home') }}" class="text-gray-400 hover:text-blood-red transition-colors">
                        <i class="fas fa-home text-lg"></i>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-400 hover:text-blood-red transition-colors">
                            <i class="fas fa-sign-out-alt text-lg"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex pt-20">
        <!-- Sidebar -->
        <div class="fixed left-0 top-20 h-full w-64 sidebar-glass">
            <div class="p-6">
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-white hover:bg-blood-red/20 hover:text-blood-red rounded-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-blood-red/20 text-blood-red' : '' }}">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.users') }}" class="flex items-center px-4 py-3 text-white hover:bg-blood-red/20 hover:text-blood-red rounded-lg transition-colors {{ request()->routeIs('admin.users') ? 'bg-blood-red/20 text-blood-red' : '' }}">
                        <i class="fas fa-users mr-3"></i>
                        User Management
                    </a>
                    <a href="{{ route('admin.products') }}" class="flex items-center px-4 py-3 text-white hover:bg-blood-red/20 hover:text-blood-red rounded-lg transition-colors {{ request()->routeIs('admin.products') ? 'bg-blood-red/20 text-blood-red' : '' }}">
                        <i class="fas fa-box mr-3"></i>
                        Product Management
                    </a>
                    <a href="{{ route('energy-boosters.all') }}" class="flex items-center px-4 py-3 text-white hover:bg-blood-red/20 hover:text-blood-red rounded-lg transition-colors">
                        <i class="fas fa-eye mr-3"></i>
                        View Store
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="ml-64 flex-1 p-8">
            @if (session()->has('success'))
                <div class="mb-6 bg-green-900/50 border border-green-500/50 text-green-400 px-4 py-3 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="mb-6 bg-red-900/50 border border-red-500/50 text-red-400 px-4 py-3 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            @yield('admin-content')
        </div>
    </div>

    @livewireScripts
</body>
</html>