<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Checkout - BruteCharge</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .secure-badge {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }
        .payment-icons {
            filter: grayscale(0.3) brightness(1.1);
        }
        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
        }
        .step-indicator {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen text-white font-inter">
    <!-- Security Banner -->
    <div class="bg-green-600 text-white text-center py-2 text-sm">
        <i class="fas fa-shield-alt mr-2"></i>
        SSL Secured • 256-bit Encryption • Your data is protected
    </div>

    <!-- Header -->
    <header class="bg-slate-900/80 backdrop-blur-sm border-b border-slate-700 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="text-2xl font-bold">
                        <span class="text-white">BRUTE</span>
                        <span class="text-red-500">CHARGE</span>
                        <i class="fas fa-bolt text-red-500 ml-2"></i>
                    </div>
                </div>
                <div class="secure-badge text-white text-xs px-3 py-1 rounded-full">
                    <i class="fas fa-lock mr-1"></i>
                    SECURE CHECKOUT
                </div>
            </div>
        </div>
    </header>

    <!-- Progress Steps -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex items-center justify-center space-x-4">
            <div class="flex items-center">
                <div class="step-indicator w-8 h-8 rounded-full flex items-center justify-center text-sm font-medium">1</div>
                <span class="ml-2 text-sm text-gray-300">Cart</span>
            </div>
            <div class="w-16 h-0.5 bg-gray-600"></div>
            <div class="flex items-center">
                <div class="step-indicator w-8 h-8 rounded-full flex items-center justify-center text-sm font-medium">2</div>
                <span class="ml-2 text-sm font-medium">Checkout</span>
            </div>
            <div class="w-16 h-0.5 bg-gray-600"></div>
            <div class="flex items-center">
                <div class="w-8 h-8 rounded-full bg-gray-600 flex items-center justify-center text-sm">3</div>
                <span class="ml-2 text-sm text-gray-400">Complete</span>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        @if ($errors->any())
            <div class="glass-card border-red-500 text-red-100 p-4 rounded-xl mb-6">
                <div class="flex items-center mb-2">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <h3 class="font-medium">Please fix the following errors:</h3>
                </div>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('checkout.process') }}" method="POST" id="checkout-form">
            @csrf
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Left Side - Billing & Shipping -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Billing Information -->
                    <div class="glass-card p-6 rounded-xl">
                        <div class="flex items-center mb-6">
                            <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-user text-sm"></i>
                            </div>
                            <h2 class="text-xl font-semibold">Billing Information</h2>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">First Name *</label>
                                <input type="text" name="first_name" value="{{ old('first_name') }}" 
                                       class="form-input w-full bg-slate-800/50 border border-slate-600 rounded-lg px-4 py-3 text-white placeholder-gray-400 focus:border-red-500 focus:outline-none transition-all duration-200" 
                                       placeholder="Enter first name" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Last Name *</label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" 
                                       class="form-input w-full bg-slate-800/50 border border-slate-600 rounded-lg px-4 py-3 text-white placeholder-gray-400 focus:border-red-500 focus:outline-none transition-all duration-200" 
                                       placeholder="Enter last name" required>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Email Address *</label>
                                <input type="email" name="email" value="{{ old('email') }}" 
                                       class="form-input w-full bg-slate-800/50 border border-slate-600 rounded-lg px-4 py-3 text-white placeholder-gray-400 focus:border-red-500 focus:outline-none transition-all duration-200" 
                                       placeholder="your@email.com" required>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Phone Number *</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" 
                                       class="form-input w-full bg-slate-800/50 border border-slate-600 rounded-lg px-4 py-3 text-white placeholder-gray-400 focus:border-red-500 focus:outline-none transition-all duration-200" 
                                       placeholder="+1 (555) 000-0000" required>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Address -->
                    <div class="glass-card p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-truck text-sm"></i>
                                </div>
                                <h2 class="text-xl font-semibold">Shipping Address</h2>
                            </div>
                            <label class="flex items-center text-sm text-gray-300">
                                <input type="checkbox" id="same-as-billing" class="mr-2 rounded border-gray-600 bg-slate-800 text-red-500 focus:ring-red-500">
                                Same as billing
                            </label>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Street Address *</label>
                                <input type="text" name="address" value="{{ old('address') }}" 
                                       class="form-input w-full bg-slate-800/50 border border-slate-600 rounded-lg px-4 py-3 text-white placeholder-gray-400 focus:border-red-500 focus:outline-none transition-all duration-200" 
                                       placeholder="123 Main Street" required>
                            </div>
                            <div class="grid md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">City *</label>
                                    <input type="text" name="city" value="{{ old('city') }}" 
                                           class="form-input w-full bg-slate-800/50 border border-slate-600 rounded-lg px-4 py-3 text-white placeholder-gray-400 focus:border-red-500 focus:outline-none transition-all duration-200" 
                                           placeholder="City" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">State *</label>
                                    <input type="text" name="state" value="{{ old('state') }}" 
                                           class="form-input w-full bg-slate-800/50 border border-slate-600 rounded-lg px-4 py-3 text-white placeholder-gray-400 focus:border-red-500 focus:outline-none transition-all duration-200" 
                                           placeholder="State" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">ZIP Code *</label>
                                    <input type="text" name="zip_code" value="{{ old('zip_code') }}" 
                                           class="form-input w-full bg-slate-800/50 border border-slate-600 rounded-lg px-4 py-3 text-white placeholder-gray-400 focus:border-red-500 focus:outline-none transition-all duration-200" 
                                           placeholder="12345" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="glass-card p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-credit-card text-sm"></i>
                                </div>
                                <h2 class="text-xl font-semibold">Payment Method</h2>
                            </div>
                            <div class="flex items-center space-x-2 payment-icons">
                                <i class="fab fa-cc-visa text-2xl"></i>
                                <i class="fab fa-cc-mastercard text-2xl"></i>
                                <i class="fab fa-cc-amex text-2xl"></i>
                                <i class="fab fa-cc-paypal text-2xl"></i>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Cardholder Name *</label>
                                <input type="text" name="card_name" value="{{ old('card_name') }}" 
                                       class="form-input w-full bg-slate-800/50 border border-slate-600 rounded-lg px-4 py-3 text-white placeholder-gray-400 focus:border-red-500 focus:outline-none transition-all duration-200" 
                                       placeholder="Name as it appears on card" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Card Number *</label>
                                <div class="relative">
                                    <input type="text" name="card_number" value="{{ old('card_number') }}" 
                                           placeholder="1234 5678 9012 3456"
                                           class="form-input w-full bg-slate-800/50 border border-slate-600 rounded-lg px-4 py-3 pr-12 text-white placeholder-gray-400 focus:border-red-500 focus:outline-none transition-all duration-200" 
                                           maxlength="19" id="card-number" pattern="[0-9\s]{13,19}" required>
                                    <i class="fas fa-lock absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                </div>
                                <p class="text-xs text-gray-400 mt-1">Enter your 16-digit card number</p>
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Month *</label>
                                    <select name="expiry_month" 
                                            class="w-full bg-slate-800/50 border border-slate-600 rounded-lg px-4 py-3 text-white focus:border-red-500 focus:outline-none transition-all duration-200" 
                                            required>
                                        <option value="">MM</option>
                                        @for($i = 1; $i <= 12; $i++)
                                            <option value="{{ sprintf('%02d', $i) }}" {{ old('expiry_month') == sprintf('%02d', $i) ? 'selected' : '' }}>
                                                {{ sprintf('%02d', $i) }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Year *</label>
                                    <select name="expiry_year" 
                                            class="w-full bg-slate-800/50 border border-slate-600 rounded-lg px-4 py-3 text-white focus:border-red-500 focus:outline-none transition-all duration-200" 
                                            required>
                                        <option value="">YYYY</option>
                                        @for($i = date('Y'); $i <= date('Y') + 10; $i++)
                                            <option value="{{ $i }}" {{ old('expiry_year') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">CVV *</label>
                                    <div class="relative">
                                        <input type="text" name="cvv" value="{{ old('cvv') }}" 
                                               placeholder="123"
                                               class="form-input w-full bg-slate-800/50 border border-slate-600 rounded-lg px-4 py-3 text-white placeholder-gray-400 focus:border-red-500 focus:outline-none transition-all duration-200" 
                                               maxlength="3" required>
                                        <i class="fas fa-question-circle absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 cursor-help" title="3 digits on the back of your card"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Order Summary -->
                <div class="lg:col-span-1">
                    <div class="glass-card p-6 rounded-xl sticky top-24">
                        <div class="flex items-center mb-6">
                            <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-receipt text-sm"></i>
                            </div>
                            <h2 class="text-xl font-semibold">Order Summary</h2>
                        </div>
                        
                        @if(!empty($cartItems))
                            <div class="space-y-4 mb-6">
                                @foreach($cartItems as $item)
                                    <div class="flex items-center space-x-3 p-3 bg-slate-800/30 rounded-lg">
                                        <img src="{{ $item['image'] ?? 'https://via.placeholder.com/48x48' }}" 
                                             alt="{{ $item['name'] }}" 
                                             class="w-12 h-12 object-cover rounded-md">
                                        <div class="flex-1 min-w-0">
                                            <h4 class="font-medium text-sm truncate">{{ $item['name'] }}</h4>
                                            <p class="text-gray-400 text-xs">Qty: {{ $item['quantity'] }}</p>
                                        </div>
                                        <div class="font-semibold text-sm">${{ number_format($item['price'] * $item['quantity'], 2) }}</div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="border-t border-slate-600 pt-4 space-y-3">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Subtotal</span>
                                    <span>${{ number_format($total - ($total * 0.08) - ($total > 100 ? 0 : 10), 2) }}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Tax (8%)</span>
                                    <span>${{ number_format($total * 0.08, 2) }}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">Shipping</span>
                                    <span class="{{ $total > 100 ? 'text-green-400' : '' }}">{{ $total > 100 ? 'FREE' : '$10.00' }}</span>
                                </div>
                                <div class="border-t border-slate-600 pt-3">
                                    <div class="flex justify-between text-lg font-bold">
                                        <span>Total</span>
                                        <span class="text-red-500">${{ number_format($total, 2) }}</span>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" 
                                    class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold py-4 px-6 rounded-lg mt-6 text-base transition-all duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-slate-900"
                                    id="checkout-btn">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-lock mr-2"></i>
                                    <span>Complete Secure Order</span>
                                </div>
                            </button>
                        @else
                            <div class="text-center py-8">
                                <i class="fas fa-shopping-cart text-4xl text-gray-600 mb-4"></i>
                                <p class="text-gray-400">Your cart is empty</p>
                            </div>
                        @endif

                        <!-- Security Badges -->
                        <div class="mt-6 pt-6 border-t border-slate-600">
                            <div class="text-center space-y-3">
                                <div class="flex items-center justify-center space-x-2 text-green-400 text-sm">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>256-bit SSL Encryption</span>
                                </div>
                                <div class="flex items-center justify-center space-x-2 text-green-400 text-sm">
                                    <i class="fas fa-lock"></i>
                                    <span>PCI DSS Compliant</span>
                                </div>
                                <div class="text-xs text-gray-400 mt-2">
                                    Your payment information is secure and encrypted
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Card number formatting and validation
        document.getElementById('card-number').addEventListener('input', function(e) {
            // Remove all non-digits
            let value = e.target.value.replace(/\D/g, '');
            
            // Limit to 16 digits
            if (value.length > 16) {
                value = value.substr(0, 16);
            }
            
            // Format with spaces every 4 digits
            let formattedValue = value.replace(/(.{4})/g, '$1 ').trim();
            e.target.value = formattedValue;
        });

        // Add hidden input for unformatted card number to send to server
        document.getElementById('checkout-form').addEventListener('submit', function(e) {
            const cardInput = document.getElementById('card-number');
            const unformattedCardNumber = cardInput.value.replace(/\s/g, '');
            
            // Create hidden input with unformatted card number
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'card_number_clean';
            hiddenInput.value = unformattedCardNumber;
            this.appendChild(hiddenInput);
            
            // Update the original input with unformatted value for validation
            cardInput.value = unformattedCardNumber;
        });

        // CVV input restriction
        document.querySelector('input[name="cvv"]').addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/\D/g, '');
        });

        // Phone number formatting
        document.querySelector('input[name="phone"]').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            let formattedValue = value.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
            e.target.value = formattedValue;
        });

        // Same as billing checkbox
        document.getElementById('same-as-billing').addEventListener('change', function() {
            const billingInputs = document.querySelectorAll('input[name="first_name"], input[name="last_name"]');
            const shippingInputs = document.querySelectorAll('input[name="address"], input[name="city"], input[name="state"], input[name="zip_code"]');
            
            if (this.checked) {
                // Copy billing to shipping (you'd need to implement this logic)
                console.log('Copy billing to shipping');
            }
        });

        // Form submission with enhanced loading state
        document.getElementById('checkout-form').addEventListener('submit', function(e) {
            const btn = document.getElementById('checkout-btn');
            const originalContent = btn.innerHTML;
            
            btn.disabled = true;
            btn.classList.add('opacity-75', 'cursor-not-allowed');
            btn.innerHTML = `
                <div class="flex items-center justify-center">
                    <div class="animate-spin rounded-full h-4 w-4 border-2 border-white border-t-transparent mr-2"></div>
                    <span>Processing...</span>
                </div>
            `;

            // Reset after 3 seconds if no redirect (for demo purposes)
            setTimeout(() => {
                btn.disabled = false;
                btn.classList.remove('opacity-75', 'cursor-not-allowed');
                btn.innerHTML = originalContent;
            }, 3000);
        });

        // Enhanced form validation
        function validateForm() {
            const requiredFields = document.querySelectorAll('input[required], select[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                const value = field.value.trim();
                const fieldContainer = field.closest('div');
                
                // Remove existing error states
                field.classList.remove('border-red-500');
                const existingError = fieldContainer.querySelector('.error-message');
                if (existingError) existingError.remove();

                if (!value) {
                    field.classList.add('border-red-500');
                    const errorMsg = document.createElement('p');
                    errorMsg.className = 'error-message text-red-400 text-xs mt-1';
                    errorMsg.textContent = 'This field is required';
                    fieldContainer.appendChild(errorMsg);
                    isValid = false;
                }

                // Email validation
                if (field.type === 'email' && value) {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(value)) {
                        field.classList.add('border-red-500');
                        const errorMsg = document.createElement('p');
                        errorMsg.className = 'error-message text-red-400 text-xs mt-1';
                        errorMsg.textContent = 'Please enter a valid email address';
                        fieldContainer.appendChild(errorMsg);
                        isValid = false;
                    }
                }

                // Card number validation
                if (field.name === 'card_number' && value) {
                    const cardNumber = value.replace(/\s/g, '');
                    if (cardNumber.length !== 16 || !/^\d+$/.test(cardNumber)) {
                        field.classList.add('border-red-500');
                        const errorMsg = document.createElement('p');
                        errorMsg.className = 'error-message text-red-400 text-xs mt-1';
                        errorMsg.textContent = 'Please enter a valid 16-digit card number';
                        fieldContainer.appendChild(errorMsg);
                        isValid = false;
                    }
                }

                // CVV validation
                if (field.name === 'cvv' && value) {
                    if (value.length !== 3 || !/^\d+$/.test(value)) {
                        field.classList.add('border-red-500');
                        const errorMsg = document.createElement('p');
                        errorMsg.className = 'error-message text-red-400 text-xs mt-1';
                        errorMsg.textContent = 'Please enter a valid 3-digit CVV';
                        fieldContainer.appendChild(errorMsg);
                        isValid = false;
                    }
                }
            });

            return isValid;
        }

        // Real-time validation
        document.querySelectorAll('input[required], select[required]').forEach(field => {
            field.addEventListener('blur', function() {
                const fieldContainer = this.closest('div');
                const existingError = fieldContainer.querySelector('.error-message');
                if (existingError) existingError.remove();

                if (!this.value.trim()) {
                    this.classList.add('border-red-500');
                    const errorMsg = document.createElement('p');
                    errorMsg.className = 'error-message text-red-400 text-xs mt-1';
                    errorMsg.textContent = 'This field is required';
                    fieldContainer.appendChild(errorMsg);
                } else {
                    this.classList.remove('border-red-500');
                }
            });

            field.addEventListener('focus', function() {
                this.classList.remove('border-red-500');
                const fieldContainer = this.closest('div');
                const existingError = fieldContainer.querySelector('.error-message');
                if (existingError) existingError.remove();
            });
        });

        // Smooth animations on load
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.glass-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'all 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>
</html>