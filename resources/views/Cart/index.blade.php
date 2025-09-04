<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - BruteCharge</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Rajdhani:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Include your existing Tailwind config from the product page -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'blood-red': '#DC143C',
                        'fire-red': '#FF0000',
                        'dark-red': '#8B0000',
                        'obsidian': '#0B0B0B',
                        'charcoal': '#1C1C1C',
                        'steel': '#2D2D2D',
                        'accent-red': '#FF1744',
                    },
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                        'rajdhani': ['Rajdhani', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Include your existing CSS styles -->
    <style>
        body {
            background: linear-gradient(135deg, #0B0B0B 0%, #1C1C1C 50%, #0B0B0B 100%);
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #DC143C 0%, #FF0000 50%, #FF1744 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .filter-glass {
            background: rgba(28, 28, 28, 0.95);
            border: 1px solid rgba(220, 20, 60, 0.2);
            backdrop-filter: blur(20px);
        }
        
        .product-card {
            background: linear-gradient(145deg, rgba(28, 28, 28, 0.95) 0%, rgba(11, 11, 11, 0.95) 100%);
            border: 1px solid rgba(220, 20, 60, 0.3);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            backdrop-filter: blur(20px);
        }
        
        .red-button {
            background: linear-gradient(135deg, #DC143C 0%, #FF0000 100%);
            box-shadow: 0 8px 32px rgba(220, 20, 60, 0.4);
            transition: all 0.3s ease;
        }
        
        .red-button:hover {
            box-shadow: 0 12px 40px rgba(220, 20, 60, 0.6);
            transform: translateY(-3px);
        }
    </style>
    
    @livewireStyles
</head>
<body>
    <!-- Include your existing navigation bar here -->
    
    <!-- Main Cart Content -->
    <main class="pt-24">
        @livewire('cart')
    </main>
    
    <!-- Include your existing footer here -->
    
    @livewireScripts
</body>
</html>