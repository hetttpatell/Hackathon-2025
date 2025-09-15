<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Tatva Tales - Heritage & Culture' }}</title>
    <meta name="description" content="{{ $meta_description ?? 'Discover authentic cultural heritage and traditional craftsmanship' }}">
    <meta name="keywords" content="{{ $meta_keywords ?? 'heritage, culture, traditional crafts, indigenous art' }}">
    <link rel="stylesheet" href="{{ asset('front/css/globals.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/Hero.css') }}">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#5B4B4B', // Earthy brown
                        'secondary': '#A47D68', // Light terracotta
                        'tertiary': '#D4C4B5', // Dusty rose
                        'light-bg': '#F5F5E9', // Off-white
                        'dark-bg': '#312A2A', // Dark brown
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    animation: {
                        fadeIn: 'fadeIn 0.8s ease-out forwards',
                        bounce: 'bounce 1s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        bounce: {
                            '0%, 20%, 53%, 80%, 100%': { transform: 'translate3d(0,0,0)' },
                            '40%, 43%': { transform: 'translate3d(0, -30px, 0)' },
                            '70%': { transform: 'translate3d(0, -15px, 0)' },
                            '90%': { transform: 'translate3d(0, -4px, 0)' },
                        }
                    }
                }
            }
        }
    </script>
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-light-bg text-dark-bg font-sans antialiased">

    <!-- 🔥 Navbar -->
    <header class="bg-dark-bg text-light-bg py-4 shadow-lg sticky top-0 z-50">
        <nav class="container mx-auto px-6 flex justify-between items-center">
            <a href="{{ route('index') }}" class="text-2xl font-serif font-bold flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z"
                        clip-rule="evenodd" />
                </svg>
                Tatva Tales
            </a>

            <div class="flex items-center space-x-4">
                <ul class="hidden md:flex space-x-6">
                    <li><a href="{{ route('index') }}" class="hover:text-tertiary transition-colors">Home</a></li>
                    <li><a href="{{ route('products') }}" class="hover:text-tertiary transition-colors">Products</a></li>
                    <li><a href="{{ route('about-us') }}" class="hover:text-tertiary transition-colors">About</a></li>
                    <li><a href="{{ route('contact-us') }}" class="hover:text-tertiary transition-colors">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="min-h-screen">
        <section class="py-16 animate-fadeIn">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto text-center">
                    
                    <!-- Success Icon -->
                    <div class="mb-8">
                        <div class="inline-flex items-center justify-center w-32 h-32 bg-gradient-to-r from-green-400 to-green-600 rounded-full mb-6 animate-bounce shadow-2xl">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Success Message -->
                    <div class="text-center mb-12">
                        <h1 class="text-5xl md:text-6xl font-serif font-bold text-primary mb-6">
                            🎉 Order Placed Successfully! 🎉
                        </h1>
                        <p class="text-2xl text-secondary mb-4">
                            Thank you for your purchase!
                        </p>
                        <p class="text-lg text-tertiary">
                            Your order has been confirmed and will be processed shortly.
                        </p>
                    </div>

                    <!-- Order Details -->
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 mb-8 text-left">
                        <h2 class="text-2xl font-serif font-bold text-primary mb-6">Order Details</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <h3 class="font-semibold text-primary mb-2">Order Information</h3>
                                <p class="text-secondary"><strong>Order ID:</strong> #{{ $order->id }}</p>
                                <p class="text-secondary"><strong>Order Number:</strong> {{ $order->order_number }}</p>
                                <p class="text-secondary"><strong>Order Date:</strong> {{ $order->created_at->format('M d, Y') }}</p>
                                <p class="text-secondary"><strong>Status:</strong> <span class="text-green-600 font-semibold">{{ ucfirst($order->status) }}</span></p>
                                <p class="text-secondary"><strong>Payment Method:</strong> {{ str_contains($order->notes, 'COD') ? 'Cash on Delivery' : 'QR Code' }}</p>
                            </div>
                            
                            <div>
                                <h3 class="font-semibold text-primary mb-2">Shipping Information</h3>
                                <p class="text-secondary"><strong>Name:</strong> {{ $order->customer_name }}</p>
                                <p class="text-secondary"><strong>Email:</strong> {{ $order->customer_email }}</p>
                                <p class="text-secondary"><strong>Address:</strong> {{ $order->shipping_address }}</p>
                                <p class="text-secondary"><strong>City:</strong> {{ $order->city }}, {{ $order->pincode }}</p>
                            </div>
                        </div>

                        <!-- Order Items -->
                        <div class="border-t pt-6">
                            <h3 class="font-semibold text-primary mb-4">Order Items</h3>
                            <div class="space-y-4">
                                @foreach($order->orderItems as $item)
                                    <div class="flex items-center justify-between py-2 border-b border-gray-200">
                                        <div class="flex items-center space-x-4">
                                            <div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center">
                                                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-dark-bg">{{ $item->product_name }}</p>
                                                <p class="text-sm text-secondary">Qty: {{ $item->quantity }}</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-semibold text-primary">₹{{ number_format($item->total, 2) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Order Total -->
                        <div class="border-t pt-6 mt-6">
                            <div class="flex justify-between items-center text-lg font-semibold text-primary mb-2">
                                <span>Subtotal:</span>
                                <span>₹{{ number_format($order->subtotal, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-center text-lg font-semibold text-primary mb-2">
                                <span>Taxes (5%):</span>
                                <span>₹{{ number_format($order->tax_amount, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-center text-lg font-semibold text-primary mb-2">
                                <span>Shipping:</span>
                                <span>₹{{ number_format($order->shipping_amount, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-center text-2xl font-bold text-primary pt-4 border-t-2 border-primary">
                                <span>Total:</span>
                                <span>₹{{ number_format($order->total_amount, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('index') }}" class="bg-primary text-light-bg px-8 py-3 rounded-full font-semibold hover:bg-dark-bg transition-colors">
                            Continue Shopping
                        </a>
                        <button onclick="window.print()" class="bg-secondary text-light-bg px-8 py-3 rounded-full font-semibold hover:bg-primary transition-colors">
                            Print Order
                        </button>
                    </div>

                    <!-- Additional Information -->
                    <div class="mt-12 text-center bg-gradient-to-r from-primary to-secondary rounded-xl p-8 text-white">
                        <h3 class="text-2xl font-serif font-bold mb-4">What's Next?</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <span class="text-2xl">📧</span>
                                </div>
                                <h4 class="font-semibold mb-2">Email Confirmation</h4>
                                <p class="text-sm">We'll send you an email with your order details shortly.</p>
                            </div>
                            <div class="text-center">
                                <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <span class="text-2xl">📦</span>
                                </div>
                                <h4 class="font-semibold mb-2">Order Processing</h4>
                                <p class="text-sm">Your order is being prepared and will be shipped soon.</p>
                            </div>
                            <div class="text-center">
                                <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <span class="text-2xl">🚚</span>
                                </div>
                                <h4 class="font-semibold mb-2">Delivery</h4>
                                <p class="text-sm">You'll receive tracking information once shipped.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="mt-8 text-center">
                        <p class="text-secondary mb-4">
                            Need help? We're here for you!
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="mailto:support@Artribe.com" class="inline-flex items-center bg-primary text-light-bg px-6 py-3 rounded-full font-semibold hover:bg-dark-bg transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Email Support
                            </a>
                            <a href="{{ route('contact-us') }}" class="inline-flex items-center bg-secondary text-light-bg px-6 py-3 rounded-full font-semibold hover:bg-primary transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                Contact Us
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <footer class="bg-dark-bg text-light-bg py-8 text-center">
        <p>&copy; 2025 Tatva Tales. All rights reserved.</p>
    </footer>

    <script>
        // Confetti animation
        function createConfetti() {
            const confettiCount = 100;
            const confettiContainer = document.createElement('div');
            confettiContainer.style.position = 'fixed';
            confettiContainer.style.top = '0';
            confettiContainer.style.left = '0';
            confettiContainer.style.width = '100%';
            confettiContainer.style.height = '100%';
            confettiContainer.style.pointerEvents = 'none';
            confettiContainer.style.zIndex = '9999';
            document.body.appendChild(confettiContainer);

            for (let i = 0; i < confettiCount; i++) {
                const confetti = document.createElement('div');
                confetti.style.position = 'absolute';
                confetti.style.width = Math.random() * 10 + 5 + 'px';
                confetti.style.height = confetti.style.width;
                confetti.style.backgroundColor = ['#5B4B4B', '#A47D68', '#D4C4B5', '#F5F5E9', '#312A2A'][Math.floor(Math.random() * 5)];
                confetti.style.left = Math.random() * 100 + '%';
                confetti.style.top = '-10px';
                confetti.style.borderRadius = Math.random() > 0.5 ? '50%' : '0';
                confetti.style.animation = `confettiFall ${Math.random() * 3 + 2}s linear forwards`;
                confettiContainer.appendChild(confetti);
            }

            setTimeout(() => {
                document.body.removeChild(confettiContainer);
            }, 5000);
        }

        // Add confetti animation CSS
        const style = document.createElement('style');
        style.textContent = `
            @keyframes confettiFall {
                to {
                    transform: translateY(100vh) rotate(720deg);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Trigger confetti on page load
        window.addEventListener('load', function() {
            setTimeout(createConfetti, 500);
        });

        // Auto-print functionality (optional)
        // window.addEventListener('load', function() {
        //     setTimeout(function() {
        //         window.print();
        //     }, 1000);
        // });
    </script>
</body>
</html>
