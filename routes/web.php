<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreatineController;
use App\Http\Controllers\PreWorkoutController;
use App\Http\Controllers\ProteinController;
use App\Http\Controllers\AllEnergyBoostersController;
use App\Http\Controllers\NutritionController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Models\AllEnergyBoosters;
use Illuminate\Http\Request;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes (accessible without authentication)
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/about-us', [PageController::class, 'about'])->name('about.us');

// Company pages group
Route::prefix('company')->group(function () {
    Route::get('/about', [PageController::class, 'about'])->name('company.about');
    Route::get('/team', [PageController::class, 'team'])->name('company.team');
    Route::get('/careers', [PageController::class, 'careers'])->name('company.careers');
});

// Newsletter subscription (public)
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

// Admin Login Routes (Public - but will redirect to admin area if authenticated)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');
});

// Authentication routes are already handled by Jetstream
// Login: /login
// Register: /register
// Password reset: /forgot-password

// Protected routes (require authentication)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    
    // Protected home page
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Protected product routes
    Route::get('/creatine', [CreatineController::class, 'index'])->name('creatine.index');
    Route::get('/preworkout', [PreWorkoutController::class, 'index'])->name('preworkout.index');
    Route::get('/protein', [ProteinController::class, 'index'])->name('protein.index');
    Route::get('/nutrition', [NutritionController::class, 'index'])->name('nutrition.index');
    Route::get('/training', [TrainingController::class, 'index'])->name('training.index');
    
    // Energy Boosters Routes
    Route::get('/energy-boosters', [AllEnergyBoostersController::class, 'index'])->name('energy-boosters.all');
    Route::get('/energy-boosters/{id}', [AllEnergyBoostersController::class, 'show'])->name('energy-boosters.show');
    
    // Alternative route names (if you prefer different naming)
    Route::get('/all', [AllEnergyBoostersController::class, 'index'])->name('all.products');
    Route::get('/products/{id}', [AllEnergyBoostersController::class, 'show'])->name('products.show');
    
    // Cart routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', function(Request $request) {
        $productId = $request->input('product_id');
        $product = AllEnergyBoosters::find($productId);
        
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        
        $cart = session()->get('cart', []);
        
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => (float)$product->price,
                'quantity' => 1,
                'image' => $product->image_url
            ];
        }
        
        session()->put('cart', $cart);
        
        $cartCount = array_sum(array_column($cart, 'quantity'));
        $cartTotal = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
        
        return response()->json([
            'success' => true,
            'cart_count' => $cartCount,
            'cart_total' => $cartTotal,
            'message' => "Added {$product->name} to cart!"
        ]);
    });

    Route::get('/cart/count', function() {
        $cart = session()->get('cart', []);
        $cartCount = array_sum(array_column($cart, 'quantity'));
        $cartTotal = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
        
        return response()->json([
            'count' => $cartCount,
            'total' => $cartTotal
        ]);
    });

    // Checkout routes
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    
    // Newsletter stats (protected)
    Route::get('/admin/newsletter/stats', [NewsletterController::class, 'stats'])->name('admin.newsletter.stats');
});

// Admin Routes (require authentication + admin privileges)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin'
])->prefix('admin')->name('admin.')->group(function () {
    
    // Admin Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    
    // User Management
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');
    Route::patch('/users/{user}/toggle-admin', [AdminController::class, 'toggleAdmin'])->name('users.toggle-admin');
    
    // Product Management
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    
});

// API Routes (optional - can be protected or public based on your needs)
Route::prefix('api')->group(function () {
    Route::get('/energy-boosters', [AllEnergyBoostersController::class, 'apiIndex'])->name('api.energy-boosters');
});

// Optional: Redirect alternative URLs to the main about page
Route::redirect('/about-brutecharge', '/about');
Route::redirect('/company', '/about');