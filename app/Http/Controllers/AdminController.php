<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\AllEnergyBoosters;

class AdminController extends Controller
{
    /**
     * Display admin dashboard
     */
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'admin_users' => User::admins()->count(),
            'regular_users' => User::regularUsers()->count(),
            'total_products' => AllEnergyBoosters::count(),
            'recent_users' => User::latest()->take(5)->get(),
            'recent_products' => AllEnergyBoosters::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    /**
     * Manage users
     */
    public function users()
    {
        return view('admin.users');
    }

    /**
     * Manage products
     */
    public function products()
    {
        return view('admin.products');
    }

    /**
     * Delete user
     */
    public function deleteUser(User $user)
    {
        // Get current authenticated user ID with type hint
        /** @var \App\Models\User $currentUser */
        $currentUser = Auth::user();
        
        // Prevent admin from deleting themselves
        if ($user->id === $currentUser->id) {
            return response()->json(['error' => 'You cannot delete yourself!'], 400);
        }

        // Prevent deletion of other admins (optional security measure)
        if ($user->isAdmin()) {
            return response()->json(['error' => 'Cannot delete admin users!'], 400);
        }

        $user->delete();

        return response()->json(['success' => 'User deleted successfully!']);
    }

    /**
     * Toggle admin status
     */
    public function toggleAdmin(User $user)
    {
        // Get current authenticated user ID with type hint
        /** @var \App\Models\User $currentUser */
        $currentUser = Auth::user();
        
        if ($user->id === $currentUser->id) {
            return response()->json(['error' => 'You cannot change your own admin status!'], 400);
        }

        if ($user->isAdmin()) {
            $user->removeAdmin();
            $message = 'Admin privileges removed from ' . $user->name;
        } else {
            $user->makeAdmin();
            $message = 'Admin privileges granted to ' . $user->name;
        }

        return response()->json(['success' => $message]);
    }
}