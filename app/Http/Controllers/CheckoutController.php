<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\OrderConfirmation;

class CheckoutController extends Controller
{
    public function index()
    {
        // Get cart items from session or database
        $cartItems = session('cart', []);
        $total = $this->calculateTotal($cartItems);
        
        return view('checkout.index', compact('cartItems', 'total'));
    }

    public function process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip_code' => 'required|string|max:20',
            'card_number' => 'required|digits:16',
            'expiry_month' => 'required|string|size:2',
            'expiry_year' => 'required|string|size:4',
            'cvv' => 'required|digits:3',
            'card_name' => 'required|string|max:255',
        ], [
            'card_number.required' => 'Card number is required.',
            'card_number.digits' => 'Card number must be exactly 16 digits.',
            'cvv.required' => 'CVV is required.',
            'cvv.digits' => 'CVV must be exactly 3 digits.',
            'expiry_month.required' => 'Expiry month is required.',
            'expiry_month.size' => 'Expiry month must be 2 digits.',
            'expiry_year.required' => 'Expiry year is required.',
            'expiry_year.size' => 'Expiry year must be 4 digits.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Additional card validation
        if (!$this->isValidCardNumber($request->card_number)) {
            return back()->withErrors(['card_number' => 'Invalid card number.'])->withInput();
        }

        if (!$this->isValidExpiryDate($request->expiry_month, $request->expiry_year)) {
            return back()->withErrors(['expiry_month' => 'Card has expired or invalid expiry date.'])->withInput();
        }

        try {
            // Get cart items
            $cartItems = session('cart', []);
            $total = $this->calculateTotal($cartItems);

            // Here you would integrate with your payment processor (Stripe, PayPal, etc.)
            // For this example, we'll simulate a successful payment
            
            $orderData = [
                'order_id' => 'BC-' . time(),
                'customer' => [
                    'name' => $request->first_name . ' ' . $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                ],
                'shipping_address' => [
                    'address' => $request->address,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zip_code' => $request->zip_code,
                ],
                'items' => $cartItems,
                'total' => $total,
                'payment_method' => '**** **** **** ' . substr($request->card_number, -4),
                'date' => now()->format('F j, Y'),
            ];

            // Send confirmation email
            Mail::to($request->email)->send(new OrderConfirmation($orderData));

            // Clear cart
            session()->forget('cart');

            return redirect()->route('checkout.success')->with('order', $orderData);

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Payment processing failed. Please try again.'])->withInput();
        }
    }

    public function success()
    {
        $order = session('order');
        
        if (!$order) {
            return redirect()->route('checkout.index');
        }

        return view('checkout.success', compact('order'));
    }

    private function calculateTotal($cartItems)
    {
        $subtotal = 0;
        foreach ($cartItems as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        
        $tax = $subtotal * 0.08; // 8% tax
        $shipping = $subtotal > 100 ? 0 : 10; // Free shipping over $100
        
        return $subtotal + $tax + $shipping;
    }

    /**
     * Validate card number using Luhn algorithm
     */
    private function isValidCardNumber($cardNumber)
    {
        // Remove any non-digit characters
        $cardNumber = preg_replace('/\D/', '', $cardNumber);
        
        // Check if it's 16 digits
        if (strlen($cardNumber) !== 16) {
            return false;
        }

        // Luhn algorithm validation
        $sum = 0;
        $alternate = false;
        
        for ($i = strlen($cardNumber) - 1; $i >= 0; $i--) {
            $digit = intval($cardNumber[$i]);
            
            if ($alternate) {
                $digit *= 2;
                if ($digit > 9) {
                    $digit = ($digit % 10) + 1;
                }
            }
            
            $sum += $digit;
            $alternate = !$alternate;
        }
        
        return ($sum % 10) === 0;
    }

    /**
     * Validate expiry date
     */
    private function isValidExpiryDate($month, $year)
    {
        $month = intval($month);
        $year = intval($year);
        
        // Check if month is valid
        if ($month < 1 || $month > 12) {
            return false;
        }
        
        // Check if the card hasn't expired
        $currentYear = intval(date('Y'));
        $currentMonth = intval(date('n'));
        
        if ($year < $currentYear || ($year == $currentYear && $month < $currentMonth)) {
            return false;
        }
        
        // Don't allow cards that expire too far in the future (10+ years)
        if ($year > $currentYear + 10) {
            return false;
        }
        
        return true;
    }
}