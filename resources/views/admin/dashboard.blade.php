@extends('admin.layout')

@section('admin-content')
<div class="space-y-8">
    <!-- Dashboard Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-rajdhani font-black gradient-text">ADMIN DASHBOARD</h1>
            <p class="text-gray-400 mt-2">Command center for BruteCharge operations</p>
        </div>
        <div class="text-right">
            <div class="text-2xl font-bold text-white">{{ now()->format('M j, Y') }}</div>
            <div class="text-gray-400">{{ now()->format('l, g:i A') }}</div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Users -->
        <div class="admin-card rounded-xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-400 text-sm font-semibold uppercase tracking-wide">Regular Users</h3>
                    <p class="text-3xl font-bold text-white mt-2">{{ $stats['regular_users'] }}</p>
                </div>
                <div class="w-12 h-12 bg-green-600/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-user text-green-400 text-xl"></i>
                </div>
            </div>
            <div class="mt-4 text-sm text-gray-400">
                <i class="fas fa-dumbbell text-orange-400 mr-1"></i>
                Active athletes
            </div>
        </div>

        <!-- Total Products -->
        <div class="admin-card rounded-xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-400 text-sm font-semibold uppercase tracking-wide">Products</h3>
                    <p class="text-3xl font-bold text-white mt-2">{{ $stats['total_products'] }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-600/20 rounded-lg flex items-center justify-center">
                    <i class="fas fa-box text-purple-400 text-xl"></i>
                </div>
            </div>
            <div class="mt-4 text-sm text-gray-400">
                <i class="fas fa-fire text-red-400 mr-1"></i>
                Available supplements
            </div>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Users -->
        <div class="admin-card rounded-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-rajdhani font-bold text-white">Recent Users</h2>
                <a href="{{ route('admin.users') }}" class="text-blood-red hover:text-white transition-colors text-sm">
                    View All <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="space-y-4">
                @foreach($stats['recent_users'] as $user)
                <div class="flex items-center justify-between p-3 bg-obsidian/50 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blood-red/20 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-user text-blood-red"></i>
                        </div>
                        <div>
                            <div class="font-semibold text-white">{{ $user->name }}</div>
                            <div class="text-sm text-gray-400">{{ $user->email }}</div>
                        </div>
                    </div>
                    <div class="text-right">
                        @if($user->isAdmin())
                            <span class="bg-blood-red/20 text-blood-red px-2 py-1 rounded text-xs font-semibold">ADMIN</span>
                        @else
                            <span class="bg-gray-600/20 text-gray-400 px-2 py-1 rounded text-xs">USER</span>
                        @endif
                        <div class="text-xs text-gray-500 mt-1">{{ $user->created_at->diffForHumans() }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Recent Products -->
        <div class="admin-card rounded-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-rajdhani font-bold text-white">Recent Products</h2>
                <a href="{{ route('admin.products') }}" class="text-blood-red hover:text-white transition-colors text-sm">
                    View All <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="space-y-4">
                @foreach($stats['recent_products'] as $product)
                <div class="flex items-center justify-between p-3 bg-obsidian/50 rounded-lg">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-purple-600/20 rounded-lg flex items-center justify-center mr-3">
                            @if($product->image_url)
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-8 h-8 object-cover rounded">
                            @else
                                <i class="fas fa-box text-purple-400"></i>
                            @endif
                        </div>
                        <div>
                            <div class="font-semibold text-white">{{ Str::limit($product->name, 30) }}</div>
                            <div class="text-sm text-gray-400">${{ number_format($product->price, 2) }}</div>
                        </div>
                    </div>
                    <div class="text-xs text-gray-500">{{ $product->created_at->diffForHumans() }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="admin-card rounded-xl p-6">
        <h2 class="text-xl font-rajdhani font-bold text-white mb-6">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('admin.products') }}" class="red-button text-white px-6 py-4 rounded-lg font-bold text-center transition-all hover:scale-105">
                <i class="fas fa-plus mr-2"></i>
                Add New Product
            </a>
            <a href="{{ route('admin.users') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-4 rounded-lg font-bold text-center transition-all hover:scale-105">
                <i class="fas fa-users mr-2"></i>
                Manage Users
            </a>
            <a href="{{ route('energy-boosters.all') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-4 rounded-lg font-bold text-center transition-all hover:scale-105">
                <i class="fas fa-eye mr-2"></i>
                View Store
            </a>
        </div>
    </div>
</div>
@endsection