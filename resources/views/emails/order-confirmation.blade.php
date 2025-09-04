<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Rajdhani', sans-serif; 
            margin: 0; 
            padding: 0; 
            background-color: #000000;
            color: #ffffff;
        }
        .container { 
            max-width: 600px; 
            margin: 0 auto; 
            background-color: #000000; 
            padding: 20px; 
        }
        .header { 
            background: linear-gradient(135deg, #000000 0%, #1f1f1f 100%);
            border-bottom: 3px solid #ef4444;
            padding: 20px;
            text-align: center;
        }
        .logo { 
            font-size: 32px; 
            font-weight: 700; 
            letter-spacing: 2px;
        }
        .content { 
            padding: 30px 20px; 
            background-color: #111111;
        }
        .order-info { 
            background-color: #1f1f1f; 
            border: 1px solid #ef4444; 
            border-radius: 8px; 
            padding: 20px; 
            margin: 20px 0; 
        }
        .item { 
            display: flex; 
            justify-content: space-between; 
            padding: 10px 0; 
            border-bottom: 1px solid #333;
        }
        .total { 
            background-color: #ef4444; 
            color: white; 
            padding: 15px; 
            border-radius: 8px; 
            margin-top: 20px; 
            text-align: center;
        }
        .footer { 
            background-color: #000000; 
            padding: 20px; 
            text-align: center; 
            color: #888888; 
        }
        h1, h2, h3 { color: #ef4444; }
        .lightning { color: #ef4444; font-size: 24px; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo">
                <span style="color: #ffffff;">BRUTE</span><span style="color: #ef4444;">CHARGE</span>
                <span class="lightning">⚡</span>
            </div>
            <h1 style="margin: 10px 0 0 0; font-size: 24px;">ORDER CONFIRMATION</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <h2>Thank you for your order!</h2>
            <p style="font-size: 18px; margin-bottom: 20px;">
                Hey <strong>{{ $order['customer']['name'] }}</strong>, your beast mode supplements are on the way! 
                Get ready to unleash your full potential.
            </p>

            <!-- Order Details -->
            <div class="order-info">
                <h3 style="margin-top: 0;">Order Details</h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <strong>Order Number:</strong><br>
                        <span style="color: #ef4444; font-weight: bold;">{{ $order['order_id'] }}</span>
                    </div>
                    <div>
                        <strong>Order Date:</strong><br>
                        {{ $order['date'] }}
                    </div>
                </div>

                <h4 style="color: #ef4444; margin: 20px 0 10px 0;">Customer Information:</h4>
                <p style="margin: 5px 0;">
                    <strong>Name:</strong> {{ $order['customer']['name'] }}<br>
                    <strong>Email:</strong> {{ $order['customer']['email'] }}<br>
                    <strong>Phone:</strong> {{ $order['customer']['phone'] }}
                </p>

                <h4 style="color: #ef4444; margin: 20px 0 10px 0;">Shipping Address:</h4>
                <p style="margin: 5px 0;">
                    {{ $order['shipping_address']['address'] }}<br>
                    {{ $order['shipping_address']['city'] }}, {{ $order['shipping_address']['state'] }} {{ $order['shipping_address']['zip_code'] }}
                </p>

                <h4 style="color: #ef4444; margin: 20px 0 10px 0;">Payment Method:</h4>
                <p style="margin: 5px 0;">Credit Card ending in {{ $order['payment_method'] }}</p>
            </div>

            <!-- Order Items -->
            @if(!empty($order['items']))
                <div class="order-info">
                    <h3 style="margin-top: 0;">Your Beast Mode Arsenal</h3>
                    @foreach($order['items'] as $item)
                        <div class="item">
                            <div>
                                <strong>{{ $item['name'] }}</strong><br>
                                <small style="color: #888888;">Quantity: {{ $item['quantity'] }}</small>
                            </div>
                            <div style="text-align: right;">
                                <strong>${{ number_format($item['price'] * $item['quantity'], 2) }}</strong>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Total -->
            <div class="total">
                <h2 style="margin: 0; font-size: 24px;">
                    TOTAL: ${{ number_format($order['total'], 2) }}
                </h2>
            </div>

            <!-- What's Next -->
            <div style="margin-top: 30px; padding: 20px; background-color: #1f1f1f; border-radius: 8px;">
                <h3 style="margin-top: 0; color: #ef4444;">What happens next?</h3>
                <ul style="color: #cccccc; line-height: 1.6;">
                    <li>Your order is being prepared by our beast mode team</li>
                    <li>You'll receive a shipping confirmation within 24-48 hours</li>
                    <li>Your supplements will arrive within 3-5 business days</li>
                    <li>Start unleashing your beast potential!</li>
                </ul>
            </div>

            <div style="margin-top: 30px; text-align: center;">
                <p style="font-size: 18px; color: #ef4444; font-weight: bold;">
                    <span class="lightning">⚡</span> 
                    UNLEASH YOUR BEAST 
                    <span class="lightning">⚡</span>
                </p>
                <p style="color: #888888;">
                    Questions? Contact us at support@brutecharge.com
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} BruteCharge. All rights reserved.</p>
            <p>Premium energy boosters engineered for elite athletes</p>
        </div>
    </div>
</body>
</html>