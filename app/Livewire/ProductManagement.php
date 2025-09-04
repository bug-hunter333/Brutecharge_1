<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\AllEnergyBoosters;
use Illuminate\Support\Facades\Storage;

class ProductManagement extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $showModal = false;
    public $editingProduct = null;
    
    // Form fields
    public $name = '';
    public $description = '';
    public $price = '';
    public $image_url = '';
    public $image = null;
    
    protected $paginationTheme = 'tailwind';

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'description' => 'required|min:10',
        'price' => 'required|numeric|min:0.01',
        'image_url' => 'nullable|url',
        'image' => 'nullable|image|max:2048', // 2MB max
    ];

    protected $messages = [
        'name.required' => 'Product name is required',
        'name.min' => 'Product name must be at least 3 characters',
        'description.required' => 'Product description is required',
        'description.min' => 'Description must be at least 10 characters',
        'price.required' => 'Price is required',
        'price.numeric' => 'Price must be a valid number',
        'price.min' => 'Price must be greater than 0',
        'image.image' => 'File must be an image',
        'image.max' => 'Image size cannot exceed 2MB',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        
        $this->sortBy = $field;
    }

    public function openCreateModal()
    {
        $this->resetForm();
        $this->editingProduct = null;
        $this->showModal = true;
    }

    public function openEditModal($productId)
    {
        $product = AllEnergyBoosters::find($productId);
        
        if ($product) {
            $this->editingProduct = $productId;
            $this->name = $product->name;
            $this->description = $product->description;
            $this->price = $product->price;
            $this->image_url = $product->image_url;
            $this->showModal = true;
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->image_url = '';
        $this->image = null;
        $this->editingProduct = null;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ];

        // Handle image upload
        if ($this->image) {
            $imagePath = $this->image->store('products', 'public');
            $data['image_url'] = Storage::url($imagePath);
        } elseif ($this->image_url) {
            $data['image_url'] = $this->image_url;
        }

        if ($this->editingProduct) {
            // Update existing product
            $product = AllEnergyBoosters::find($this->editingProduct);
            $product->update($data);
            session()->flash('success', 'Product updated successfully!');
        } else {
            // Create new product
            AllEnergyBoosters::create($data);
            session()->flash('success', 'Product created successfully!');
        }

        $this->closeModal();
    }

    public function deleteProduct($productId)
    {
        $product = AllEnergyBoosters::find($productId);
        
        if ($product) {
            // Delete image from storage if exists
            if ($product->image_url && str_starts_with($product->image_url, '/storage/')) {
                $imagePath = str_replace('/storage/', '', $product->image_url);
                Storage::disk('public')->delete($imagePath);
            }
            
            $product->delete();
            session()->flash('success', 'Product deleted successfully!');
        } else {
            session()->flash('error', 'Product not found!');
        }
    }

    public function render()
    {
        $query = AllEnergyBoosters::query();

        // Apply search filter
        if ($this->search) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        // Apply sorting
        $query->orderBy($this->sortBy, $this->sortDirection);

        $products = $query->paginate(10);

        return view('livewire.product-management', compact('products'));
    }
}