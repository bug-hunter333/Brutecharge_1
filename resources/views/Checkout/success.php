<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmed - BruteCharge</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Rajdhani', sans-serif; }
        .lightning-pulse {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'rajdhani': ['Rajdhani', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-black text-white font-rajdhani min-h-screen">
    <!-- Header -->
    <header class="bg-black border-b border-red-600">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center">
                <div class="text-2xl font-bold">
                    <span class="text-white">BRUTE</span><span class="text-red-600">CHARGE</span>
                    <span class="text-red-600 ml-2">⚡</span>
                </div>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Success Animation -->
            <div class="mb-8">
                <div class="inline-block">
                    <div class="w-24 h-24 bg-red-600 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <span class="text-4xl lightning-pulse">⚡</span>
                    </div>
                </div>
            </div>

            <!-- Success Message -->
            <h1 class="text-5xl font-bold mb-4">
                <span class="text-red-600">ORDER CONFIRMED!</span>
            </h1>
            <h2 class="text-3xl font-bold mb-6 text-white">
                YOUR BEAST HAS BEEN UNLEASHED
            </h2>
            
            <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Thank you for your order! A confirmation email has been sent to 
                <span class="text-red-600 font-semibold">{{ $order->customer->email ?? $order['customer']['email'] ?? 'your email' }}</span>
            </p>

            <!-- Order Info Card -->
            <div class="bg-gray-900 border border-red-600 rounded-lg p-8 mb-8 max-w-2xl mx-auto">
                <h3 class="text-2xl font-bold text-red-600 mb-6">Order Details</h3>
                
                <div class="grid grid-cols-2 gap-4 text-left mb-6">
                    <div>
                        <p class="text-gray-400">Order Number</p>
                        <p class="font-bold text-lg text-red-600">{{ $order->order_id ?? $order['order_id'] ?? '#BC-001' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400">Total Amount</p>
                        <p class="font-bold text-lg">${{ number_format($order->total ?? $order['total'] ?? 0, 2) }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400">Order Date</p>
                        <p class="font-bold">{{ $order->created_at ? $order->created_at->format('M d, Y') : ($order['date'] ?? date('M d, Y')) }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400">Payment Method</p>
                        <p class="font-bold">{{ $order->payment_method ?? $order['payment_method'] ?? 'Credit Card' }}</p>
                    </div>
                </div>

                <div class="border-t border-gray-700 pt-6">
                    <h4 class="text-lg font-bold text-red-600 mb-4">Shipping Information</h4>
                    <div class="text-left">
                        <p class="font-semibold">{{ $order->customer->name ?? $order['customer']['name'] ?? 'Customer Name' }}</p>
                        <p>{{ $order->shipping_address->address ?? $order['shipping_address']['address'] ?? 'Address' }}</p>
                        <p>{{ $order->shipping_address->city ?? $order['shipping_address']['city'] ?? 'City' }}, {{ $order->shipping_address->state ?? $order['shipping_address']['state'] ?? 'State' }} {{ $order->shipping_address->zip_code ?? $order['shipping_address']['zip_code'] ?? 'ZIP' }}</p>
                    </div>
                </div>
            </div>

            <!-- What's Next -->
            <div class="bg-red-600 rounded-lg p-6 mb-8 max-w-2xl mx-auto">
                <h3 class="text-2xl font-bold mb-4">What happens next?</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">
                    <div class="bg-black bg-opacity-50 p-4 rounded">
                        <h4 class="font-bold mb-2">📦 Processing</h4>
                        <p class="text-sm">Your order is being prepared within 24 hours</p>
                    </div>
                    <div class="bg-black bg-opacity-50 p-4 rounded">
                        <h4 class="font-bold mb-2">🚚 Shipping</h4>
                        <p class="text-sm">You'll receive tracking info via email</p>
                    </div>
                    <div class="bg-black bg-opacity-50 p-4 rounded">
                        <h4 class="font-bold mb-2">📱 Updates</h4>
                        <p class="text-sm">SMS and email notifications included</p>
                    </div>
                    <div class="bg-black bg-opacity-50 p-4 rounded">
                        <h4 class="font-bold mb-2">💪 Beast Mode</h4>
                        <p class="text-sm">Start unleashing your potential!</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-4">
                <a href="{{ route('home') }}" 
                   class="inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-4 px-8 rounded-lg text-lg transition-colors uppercase tracking-wide">
                    <span>⚡ Continue Shopping</span>
                </a>
                
                <div class="text-center">
                    <a href="mailto:support@brutecharge.com" 
                       class="text-red-600 hover:text-red-500 underline font-semibold">
                        Need help? Contact Support
                    </a>
                </div>
            </div>

            <!-- Footer Message -->
            <div class="mt-12 p-6 bg-gray-900 rounded-lg border border-red-600">
                <p class="text-xl font-bold text-red-600 mb-2">
                    <span class="lightning-pulse">⚡</span> 
                    BEAST MODE ACTIVATED 
                    <span class="lightning-pulse">⚡</span>
                </p>
                <p class="text-gray-300">
                    Join thousands of elite athletes who refuse to compromise on performance
                </p>
            </div>
        </div>
    </div>
</body>
</html>