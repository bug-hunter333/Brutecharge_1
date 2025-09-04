<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserManagement extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $filterBy = 'all'; // all, admin, regular
    
    protected $paginationTheme = 'tailwind';

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

    public function setFilter($filter)
    {
        $this->filterBy = $filter;
        $this->resetPage();
    }

    public function deleteUser($userId)
    {
        /** @var \App\Models\User $user */
        $user = User::find($userId);
        
        if (!$user) {
            session()->flash('error', 'User not found!');
            return;
        }

        /** @var \App\Models\User $currentUser */
        $currentUser = Auth::user();

        // Prevent admin from deleting themselves
        if ($user->id === $currentUser->id) {
            session()->flash('error', 'You cannot delete yourself!');
            return;
        }

        // Prevent deletion of other admins
        if ($user->isAdmin()) {
            session()->flash('error', 'Cannot delete admin users!');
            return;
        }

        $user->delete();
        session()->flash('success', 'User deleted successfully!');
    }

    public function toggleAdmin($userId)
    {
        /** @var \App\Models\User $user */
        $user = User::find($userId);
        
        if (!$user) {
            session()->flash('error', 'User not found!');
            return;
        }

        /** @var \App\Models\User $currentUser */
        $currentUser = Auth::user();

        if ($user->id === $currentUser->id) {
            session()->flash('error', 'You cannot change your own admin status!');
            return;
        }

        if ($user->isAdmin()) {
            $user->removeAdmin();
            session()->flash('success', 'Admin privileges removed from ' . $user->name);
        } else {
            $user->makeAdmin();
            session()->flash('success', 'Admin privileges granted to ' . $user->name);
        }
    }

    public function render()
    {
        $query = User::query();

        // Apply search filter
        if ($this->search) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        // Apply role filter - Fixed to use 'role' column instead of 'is_admin'
        switch ($this->filterBy) {
            case 'admin':
                $query->admins(); // Use the scope we created
                break;
            case 'regular':
                $query->regularUsers(); // Use the scope we created
                break;
        }

        // Apply sorting
        $query->orderBy($this->sortBy, $this->sortDirection);

        $users = $query->paginate(10);

        return view('livewire.user-management', compact('users'));
    }
}