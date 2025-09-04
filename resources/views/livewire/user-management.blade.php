<div class="space-y-6">
    <!-- Header with Search and Filters -->
    <div class="admin-card rounded-xl p-6">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center space-y-4 lg:space-y-0">
            <div>
                <h2 class="text-2xl font-rajdhani font-bold text-white">User Management</h2>
                <p class="text-gray-400 mt-1">Manage registered users and their permissions</p>
            </div>
            
            <!-- Search and Filters -->
            <div class="flex flex-col sm:flex-row gap-4 w-full lg:w-auto">
                <div class="relative">
                    <input type="text" 
                           wire:model.live.debounce.300ms="search" 
                           placeholder="Search users..." 
                           class="bg-obsidian border border-blood-red/40 rounded-lg px-4 py-2 pl-10 text-white focus:outline-none focus:ring-2 focus:ring-blood-red w-full sm:w-64">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
                
                <div class="flex gap-2">
                    <button wire:click="setFilter('all')" 
                            class="px-4 py-2 rounded-lg font-semibold transition-colors {{ $filterBy === 'all' ? 'bg-blood-red text-white' : 'bg-obsidian text-gray-400 hover:text-white' }}">
                        All Users
                    </button>
                    <button wire:click="setFilter('admin')" 
                            class="px-4 py-2 rounded-lg font-semibold transition-colors {{ $filterBy === 'admin' ? 'bg-blood-red text-white' : 'bg-obsidian text-gray-400 hover:text-white' }}">
                        Admins
                    </button>
                    <button wire:click="setFilter('regular')" 
                            class="px-4 py-2 rounded-lg font-semibold transition-colors {{ $filterBy === 'regular' ? 'bg-blood-red text-white' : 'bg-obsidian text-gray-400 hover:text-white' }}">
                        Regular
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Flash Messages -->
    @if (session()->has('success'))
        <div class="bg-green-900/50 border border-green-500/50 text-green-400 px-4 py-3 rounded-lg">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-900/50 border border-red-500/50 text-red-400 px-4 py-3 rounded-lg">
            <div class="flex items-center">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                {{ session('error') }}
            </div>
        </div>
    @endif

    <!-- Users Table -->
    <div class="admin-card rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-obsidian/50">
                    <tr>
                        <th class="px-6 py-4 text-left">
                            <button wire:click="sortBy('name')" class="flex items-center text-gray-400 hover:text-white transition-colors">
                                Name
                                @if($sortBy === 'name')
                                    <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-2"></i>
                                @else
                                    <i class="fas fa-sort ml-2 opacity-50"></i>
                                @endif
                            </button>
                        </th>
                        <th class="px-6 py-4 text-left">
                            <button wire:click="sortBy('email')" class="flex items-center text-gray-400 hover:text-white transition-colors">
                                Email
                                @if($sortBy === 'email')
                                    <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-2"></i>
                                @else
                                    <i class="fas fa-sort ml-2 opacity-50"></i>
                                @endif
                            </button>
                        </th>
                        <th class="px-6 py-4 text-left">Role</th>
                        <th class="px-6 py-4 text-left">
                            <button wire:click="sortBy('created_at')" class="flex items-center text-gray-400 hover:text-white transition-colors">
                                Joined
                                @if($sortBy === 'created_at')
                                    <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-2"></i>
                                @else
                                    <i class="fas fa-sort ml-2 opacity-50"></i>
                                @endif
                            </button>
                        </th>
                        <th class="px-6 py-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-blood-red/20">
                    @forelse($users as $user)
                        <tr class="hover:bg-obsidian/30 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blood-red/20 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-user text-blood-red"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-white">{{ $user->name }}</div>
                                        @if($user->id === auth()->id())
                                            <span class="text-xs text-yellow-400">(You)</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-400">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                @if($user->isAdmin())
                                    <span class="bg-blood-red/20 text-blood-red px-3 py-1 rounded-full text-sm font-semibold flex items-center w-fit">
                                        <i class="fas fa-shield-alt mr-1"></i>
                                        ADMIN
                                    </span>
                                @else
                                    <span class="bg-gray-600/20 text-gray-400 px-3 py-1 rounded-full text-sm">USER</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-400">{{ $user->created_at->format('M j, Y') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center space-x-2">
                                    @if($user->id !== auth()->id())
                                        <!-- Toggle Admin Button -->
                                        <button wire:click="toggleAdmin({{ $user->id }})" 
                                                class="p-2 rounded-lg transition-colors {{ $user->isAdmin() ? 'bg-orange-600/20 text-orange-400 hover:bg-orange-600/30' : 'bg-green-600/20 text-green-400 hover:bg-green-600/30' }}"
                                                title="{{ $user->isAdmin() ? 'Remove Admin' : 'Make Admin' }}">
                                            <i class="fas fa-{{ $user->isAdmin() ? 'user-minus' : 'user-plus' }}"></i>
                                        </button>
                                        
                                        <!-- Delete User Button (Only for non-admins) -->
                                        @if(!$user->isAdmin())
                                            <button wire:click="deleteUser({{ $user->id }})" 
                                                    onclick="return confirm('Are you sure you want to delete this user?')"
                                                    class="p-2 bg-red-600/20 text-red-400 rounded-lg hover:bg-red-600/30 transition-colors"
                                                    title="Delete User">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        @endif
                                    @else
                                        <span class="text-gray-500 text-sm italic">Current User</span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                                <i class="fas fa-users text-4xl mb-4 opacity-50"></i>
                                <div>No users found</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($users->hasPages())
            <div class="px-6 py-4 border-t border-blood-red/20">
                {{ $users->links() }}
            </div>
        @endif
    </div>

    <!-- User Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="admin-card rounded-xl p-6 text-center">
            <div class="text-3xl font-bold text-blue-400 mb-2">{{ $users->total() }}</div>
            <div class="text-gray-400">Total Users</div>
        </div>
        <div class="admin-card rounded-xl p-6 text-center">
            <div class="text-3xl font-bold text-blood-red mb-2">{{ $users->where('is_admin', true)->count() }}</div>
            <div class="text-gray-400">Admin Users</div>
        </div>
        <div class="admin-card rounded-xl p-6 text-center">
            <div class="text-3xl font-bold text-green-400 mb-2">{{ $users->where('is_admin', false)->count() }}</div>
            <div class="text-gray-400">Regular Users</div>
        </div>
    </div>
</div>