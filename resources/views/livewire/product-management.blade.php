<div class="space-y-6">
    <!-- Header with Search and Create Button -->
    <div class="admin-card rounded-xl p-6">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center space-y-4 lg:space-y-0">
            <div>
                <h2 class="text-2xl font-rajdhani font-bold text-white">Product Management</h2>
                <p class="text-gray-400 mt-1">Manage your supplement inventory</p>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-4 w-full lg:w-auto">
                <!-- Search -->
                <div class="relative">
                    <input type="text" 
                           wire:model.live.debounce.300ms="search" 
                           placeholder="Search products..." 
                           class="bg-obsidian border border-blood-red/40 rounded-lg px-4 py-2 pl-10 text-white focus:outline-none focus:ring-2 focus:ring-blood-red w-full sm:w-64">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
                
                <!-- Create Product Button -->
                <button wire:click="openCreateModal" class="red-button text-white px-6 py-2 rounded-lg font-bold hover:scale-105 transition-transform">
                    <i class="fas fa-plus mr-2"></i>
                    Add Product
                </button>
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

    <!-- Products Table -->
    <div class="admin-card rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-obsidian/50">
                    <tr>
                        <th class="px-6 py-4 text-left">Product</th>
                        <th class="px-6 py-4 text-left">
                            <button wire:click="sortBy('price')" class="flex items-center text-gray-400 hover:text-white transition-colors">
                                Price
                                @if($sortBy === 'price')
                                    <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-2"></i>
                                @else
                                    <i class="fas fa-sort ml-2 opacity-50"></i>
                                @endif
                            </button>
                        </th>
                        <th class="px-6 py-4 text-left">Description</th>
                        <th class="px-6 py-4 text-left">
                            <button wire:click="sortBy('created_at')" class="flex items-center text-gray-400 hover:text-white transition-colors">
                                Created
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
                    @forelse($products as $product)
                        <tr class="hover:bg-obsidian/30 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-16 h-16 bg-obsidian/50 rounded-lg flex items-center justify-center mr-4">
                                        @if($product->image_url)
                                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-14 h-14 object-cover rounded-lg">
                                        @else
                                            <i class="fas fa-box text-gray-400 text-xl"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="font-semibold text-white">{{ $product->name }}</div>
                                        <div class="text-sm text-gray-400">ID: {{ $product->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-green-400 font-bold text-lg">${{ number_format($product->price, 2) }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-gray-400 max-w-xs truncate" title="{{ $product->description }}">
                                    {{ Str::limit($product->description, 80) }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-400">{{ $product->created_at->format('M j, Y') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center space-x-2">
                                    <!-- Edit Button -->
                                    <button wire:click="openEditModal({{ $product->id }})" 
                                            class="p-2 bg-blue-600/20 text-blue-400 rounded-lg hover:bg-blue-600/30 transition-colors"
                                            title="Edit Product">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    
                                    <!-- Delete Button -->
                                    <button wire:click="deleteProduct({{ $product->id }})" 
                                            onclick="return confirm('Are you sure you want to delete this product?')"
                                            class="p-2 bg-red-600/20 text-red-400 rounded-lg hover:bg-red-600/30 transition-colors"
                                            title="Delete Product">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                                <i class="fas fa-box text-4xl mb-4 opacity-50"></i>
                                <div>No products found</div>
                                <button wire:click="openCreateModal" class="mt-4 red-button text-white px-4 py-2 rounded-lg font-bold">
                                    Create Your First Product
                                </button>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($products->hasPages())
            <div class="px-6 py-4 border-t border-blood-red/20">
                {{ $products->links() }}
            </div>
        @endif
    </div>

    <!-- Product Modal -->
    @if($showModal)
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50" wire:click.self="closeModal">
            <div class="bg-charcoal border border-blood-red/30 rounded-xl p-6 w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-rajdhani font-bold text-white">
                        {{ $editingProduct ? 'Edit Product' : 'Create New Product' }}
                    </h3>
                    <button wire:click="closeModal" class="text-gray-400 hover:text-white text-xl">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form wire:submit="save" class="space-y-6">
                    <!-- Product Name -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">Product Name *</label>
                        <input type="text" 
                               wire:model="name" 
                               class="w-full bg-obsidian border border-blood-red/40 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blood-red"
                               placeholder="Enter product name">
                        @error('name') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                    </div>

                    <!-- Product Description -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">Description *</label>
                        <textarea wire:model="description" 
                                  rows="4"
                                  class="w-full bg-obsidian border border-blood-red/40 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blood-red resize-none"
                                  placeholder="Describe your product..."></textarea>
                        @error('description') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                    </div>

                    <!-- Product Price -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">Price *</label>
                        <div class="relative">
                            <span class="absolute left-3 top-3 text-green-400 font-bold">$</span>
                            <input type="number" 
                                   wire:model="price" 
                                   step="0.01"
                                   min="0"
                                   class="w-full bg-obsidian border border-blood-red/40 rounded-lg pl-8 pr-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blood-red"
                                   placeholder="0.00">
                        </div>
                        @error('price') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                    </div>

                    <!-- Image Options -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Image URL -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-300 mb-2">Image URL</label>
                            <input type="url" 
                                   wire:model="image_url" 
                                   class="w-full bg-obsidian border border-blood-red/40 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blood-red"
                                   placeholder="https://example.com/image.jpg">
                            @error('image_url') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <!-- File Upload -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-300 mb-2">Or Upload Image</label>
                            <input type="file" 
                                   wire:model="image" 
                                   accept="image/*"
                                   class="w-full bg-obsidian border border-blood-red/40 rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-blood-red file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-blood-red file:text-white hover:file:bg-red-700">
                            @error('image') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                            
                            @if($image)
                                <div class="mt-2 text-sm text-green-400">
                                    <i class="fas fa-check mr-1"></i>
                                    Image selected: {{ $image->getClientOriginalName() }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Image Preview -->
                    @if($image_url && !$image)
                        <div>
                            <label class="block text-sm font-semibold text-gray-300 mb-2">Current Image</label>
                            <div class="w-32 h-32 bg-obsidian rounded-lg overflow-hidden">
                                <img src="{{ $image_url }}" alt="Product image" class="w-full h-full object-cover">
                            </div>
                        </div>
                    @endif

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-4 pt-6 border-t border-blood-red/20">
                        <button type="button" 
                                wire:click="closeModal" 
                                class="px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg font-semibold transition-colors">
                            Cancel
                        </button>
                        <button type="submit" 
                                class="red-button text-white px-6 py-3 rounded-lg font-semibold hover:scale-105 transition-transform">
                            {{ $editingProduct ? 'Update Product' : 'Create Product' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <!-- Product Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="admin-card rounded-xl p-6 text-center">
            <div class="text-3xl font-bold text-purple-400 mb-2">{{ $products->total() }}</div>
            <div class="text-gray-400">Total Products</div>
        </div>
        <div class="admin-card rounded-xl p-6 text-center">
            <div class="text-3xl font-bold text-green-400 mb-2">${{ number_format($products->avg('price'), 2) }}</div>
            <div class="text-gray-400">Average Price</div>
        </div>
        <div class="admin-card rounded-xl p-6 text-center">
            <div class="text-3xl font-bold text-blue-400 mb-2">${{ number_format($products->max('price'), 2) }}</div>
            <div class="text-gray-400">Highest Price</div>
        </div>
        <div class="admin-card rounded-xl p-6 text-center">
            <div class="text-3xl font-bold text-yellow-400 mb-2">${{ number_format($products->min('price'), 2) }}</div>
            <div class="text-gray-400">Lowest Price</div>
        </div>
    </div>
</div>