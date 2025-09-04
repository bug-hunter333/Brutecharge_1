<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application home page.
     */
    public function index()
    {
        $user = Auth::user();
        
        // You can add any data you want to pass to the view
        $data = [
            'user' => $user,
            'recent_orders' => [], // Add logic to fetch user's recent orders
            'recommended_products' => [], // Add logic for personalized recommendations
            'user_stats' => [
                'total_orders' => 0, // Add logic to count orders
                'favorite_category' => 'Pre-Workout', // Add logic to determine favorite
                'member_since' => $user->created_at->format('M Y'),
                'loyalty_points' => 1250 // Add logic for loyalty system
            ]
        ];
        
        return view('home', $data);
    }
}