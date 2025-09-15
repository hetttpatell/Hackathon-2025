<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Tatva Tales - Heritage & Culture' }}</title>
    <meta name="description" content="{{ $meta_description ?? 'Discover authentic cultural heritage and traditional craftsmanship' }}">
    <meta name="keywords" content="{{ $meta_keywords ?? 'heritage, culture, traditional crafts, indigenous art' }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        spinner: 'spin 1s linear infinite',
                        slideInUp: 'slideInUp 0.6s ease-out',
                        slideInFromRight: 'slideInFromRight 0.6s ease-out',
                        slideOutToLeft: 'slideOutToLeft 0.6s ease-out',
                        slideInFromLeft: 'slideInFromLeft 0.6s ease-out',
                        slideOutToRight: 'slideOutToRight 0.6s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        spin: {
                            '0%': { transform: 'rotate(0deg)' },
                            '100%': { transform: 'rotate(360deg)' },
                        },
                        slideInUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        slideInFromRight: {
                            '0%': { transform: 'translateX(100%)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' },
                        },
                        slideOutToLeft: {
                            '0%': { transform: 'translateX(0)', opacity: '1' },
                            '100%': { transform: 'translateX(-100%)', opacity: '0' },
                        },
                        slideInFromLeft: {
                            '0%': { transform: 'translateX(-100%)' },
                            '100%': { transform: 'translateX(0)' },
                        },
                        slideOutToRight: {
                            '0%': { transform: 'translateX(0)' },
                            '100%': { transform: 'translateX(100%)' },
                        }
                    }
                }
            }
        }
    </script>
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .header.scrolled {
            background-color: rgba(245, 245, 233, 0.9); /* bg-light-bg/90 */
            backdrop-filter: blur(4px); /* backdrop-blur-sm */
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05); /* shadow-lg */
        }
        .filter-btn.active {
            background-color: #5B4B4B; /* bg-primary */
            color: #F5F5E9; /* text-light-bg */
        }
        .product-card-overlay {
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .product-card:hover .product-card-overlay {
            opacity: 1;
        }
        .product-card-image-bg, #detail-product-image-container {
            transition: transform 0.3s ease-in-out;
            background-size: cover;
            background-position: center;
        }
        .product-card:hover .product-card-image-bg {
            transform: scale(1.05);
        }
        .loading-spinner {
            display: none;
        }
        .loading-spinner.active {
            display: block;
        }
        .page-section {
            display: none;
        }
        .page-section.active {
            display: block;
            animation: fadeIn 0.8s ease-out;
        }

        /* Off-canvas cart styles */
        #cart-sidebar {
            transform: translateX(100%);
            transition: transform 0.4s ease-in-out;
        }
        #cart-sidebar.open {
            transform: translateX(0);
        }
        .overlay {
            display: none;
            background: rgba(0, 0, 0, 0.5);
            transition: opacity 0.4s ease-in-out;
            opacity: 0;
        }
        .overlay.active {
            display: block;
            opacity: 1;
        }
        
        /* Mobile navigation styles */
        #mobile-nav {
            transform: translateX(-100%);
            transition: transform 0.4s ease-in-out;
        }
        #mobile-nav.active {
            transform: translateX(0);
        }

        /* Style for the confirmation message box */
        #message-box {
            position: fixed;
            bottom: 1rem;
            left: 50%;
            transform: translateX(-50%);
            background-color: #5B4B4B;
            color: #F5F5E9;
            padding: 0.75rem 1.5rem;
            border-radius: 9999px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.06);
            z-index: 50;
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
            opacity: 0;
            pointer-events: none;
        }
        #message-box.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }
        
        /* Product description text wrapping */
        .product-description {
            word-wrap: break-word;
            overflow-wrap: break-word;
            hyphens: auto;
            max-width: 100%;
        }
    </style>
</head>

<body class="bg-light-bg text-dark-bg font-sans antialiased">

    <header class="header fixed top-0 left-0 w-full z-50 py-4 px-4 md:px-8 lg:px-16 transition-all duration-300">
        <nav class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <a href="{{ route('home') }}" class="text-3xl font-bold text-primary font-serif">Artribe</a>
            </div>
            
            <ul class="hidden md:flex items-center gap-8 text-primary font-semibold">
                <li><a href="{{ route('home') }}" class="hover:text-secondary transition-colors">Home</a></li>
                <li><a href="{{ route('products') }}" class="hover:text-secondary transition-colors">Products</a></li>
                <li><a href="{{ route('about-us') }}" class="hover:text-secondary transition-colors">About Us</a></li>
                <li><a href="{{ route('contact-us') }}" class="hover:text-secondary transition-colors">Contact</a></li>
            </ul>

            <div class="flex items-center gap-4">
                <button id="mobile-menu-btn" class="md:hidden text-primary hover:text-secondary transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <a href="{{ route('cart') }}" class="hidden md:inline-block text-primary hover:text-secondary transition-colors font-semibold">
                    <button id="cart-button" class="relative text-primary hover:text-secondary transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                        </svg>
                        <span id="cart-count" class="absolute top-0 right-0 -mt-1 -mr-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center hidden">0</span>
                    </button>
                </a>
            </div>
        </nav>
    </header>

    <div id="mobile-nav-overlay" class="overlay fixed inset-0 z-40 md:hidden"></div>
    <div id="mobile-nav" class="fixed top-0 left-0 h-full w-64 bg-light-bg shadow-xl z-50 p-6 md:hidden flex flex-col">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-primary font-serif">Artribe</a>
            <button id="close-mobile-nav-btn" class="text-gray-500 hover:text-gray-800 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <ul class="flex flex-col gap-4 text-primary font-semibold text-lg">
            <li><a href="{{ route('home') }}" class="hover:text-secondary transition-colors">Home</a></li>
            <li><a href="#products" class="hover:text-secondary transition-colors">Products</a></li>
            <li><a href="{{ route('about-us') }}" class="hover:text-secondary transition-colors">About Us</a></li>
            <li><a href="{{ route('contact-us') }}" class="hover:text-secondary transition-colors">Contact</a></li>
        </ul>
    </div>

    <main class="min-h-screen pt-24 px-4 md:px-8 lg:px-16">
        <section id="checkout-page" class="py-16 animate-fadeIn">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
                    
                    <!-- Order Summary -->
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 order-2 md:order-1">
                        <h2 class="text-3xl font-serif font-bold text-primary mb-6">Order Summary</h2>
                        
                        @if(count($cartItems) > 0)
                            <div id="checkout-items" class="divide-y divide-tertiary">
                                @foreach($cartItems as $item)
                                    <div class="flex items-center gap-4 py-4">
                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-16 h-16 rounded-lg object-cover" onerror="this.src='{{ url('public/images/product/placeholder.jpg') }}'">
                                        <div class="flex-grow">
                                            <h3 class="font-semibold text-dark-bg">{{ $item['name'] }}</h3>
                                            <p class="text-secondary">₹{{ number_format($item['price'], 2) }} x {{ $item['quantity'] }}</p>
                                        </div>
                                        <span class="text-primary font-bold">₹{{ number_format($item['subtotal'], 2) }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <p class="text-tertiary">Your cart is empty.</p>
                                <a href="{{ route('index') }}" class="inline-block mt-4 bg-primary text-light-bg px-6 py-3 rounded-full font-semibold hover:bg-dark-bg transition-colors">
                                    Continue Shopping
                                </a>
                            </div>
                        @endif
                        
                        @if(count($cartItems) > 0)
                            <div class="mt-8 pt-4 border-t-2 border-primary">
                                <div class="flex justify-between items-center text-primary font-semibold mb-2">
                                    <span>Subtotal:</span>
                                    <span id="summary-subtotal" class="text-secondary">₹{{ number_format($subtotal, 2) }}</span>
                                </div>
                                <div class="flex justify-between items-center text-primary font-semibold mb-2">
                                    <span>Taxes (5%):</span>
                                    <span id="summary-taxes" class="text-secondary">₹{{ number_format($taxes, 2) }}</span>
                                </div>
                                <div class="flex justify-between items-center text-primary font-semibold mb-2">
                                    <span>Shipping:</span>
                                    <span id="summary-shipping" class="text-secondary">₹{{ number_format($shipping, 2) }}</span>
                                </div>
                                <div class="flex justify-between items-center text-primary font-bold text-xl mt-4">
                                    <span>Order Total:</span>
                                    <span id="summary-total" class="text-primary">₹{{ number_format($total, 2) }}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Checkout Form -->
                    <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 order-1 md:order-2">
                        <h2 class="text-3xl font-serif font-bold text-primary mb-6">Shipping & Payment</h2>
                        
                        @if(count($cartItems) > 0)
                            <form id="checkout-form" class="space-y-6">
                                
                                <div class="space-y-2">
                                    <h3 class="font-semibold text-primary">Contact Information</h3>
                                    <input type="email" id="email" name="email" placeholder="Email address" required class="w-full px-4 py-3 rounded-full bg-light-bg text-dark-bg border-2 border-tertiary focus:outline-none focus:ring-2 focus:ring-primary">
                                    <input type="tel" id="phone" name="phone" placeholder="Phone number" class="w-full px-4 py-3 rounded-full bg-light-bg text-dark-bg border-2 border-tertiary focus:outline-none focus:ring-2 focus:ring-primary">
                                </div>

                                <div class="space-y-2">
                                    <h3 class="font-semibold text-primary">Shipping Address</h3>
                                    <input type="text" id="fullname" name="fullname" placeholder="Full Name" required class="w-full px-4 py-3 rounded-full bg-light-bg text-dark-bg border-2 border-tertiary focus:outline-none focus:ring-2 focus:ring-primary">
                                    <input type="text" id="address" name="address" placeholder="Address" required class="w-full px-4 py-3 rounded-full bg-light-bg text-dark-bg border-2 border-tertiary focus:outline-none focus:ring-2 focus:ring-primary">
                                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                        <input type="text" id="city" name="city" placeholder="City" required class="w-full px-4 py-3 rounded-full bg-light-bg text-dark-bg border-2 border-tertiary focus:outline-none focus:ring-2 focus:ring-primary">
                                        <input type="text" id="state" name="state" placeholder="State" class="w-full px-4 py-3 rounded-full bg-light-bg text-dark-bg border-2 border-tertiary focus:outline-none focus:ring-2 focus:ring-primary">
                                        <input type="text" id="zip" name="zip" placeholder="ZIP Code" required class="w-full px-4 py-3 rounded-full bg-light-bg text-dark-bg border-2 border-tertiary focus:outline-none focus:ring-2 focus:ring-primary">
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <h3 class="font-semibold text-primary">Payment Method</h3>
                                    <div class="flex items-center space-x-4">
                                       
                                        <input type="radio" id="cod-payment" name="payment_method" value="cod" class="text-primary focus:ring-primary h-4 w-4">
                                        <label for="cod-payment" class="text-primary font-medium">Cash on Delivery (COD)</label>
                                    </div>
                                  
                                    <div id="cod-address-section" class="hidden">
                                        <h3 class="font-semibold text-primary mb-2">COD Address</h3>
                                        <textarea id="cod-address" name="cod_address" placeholder="Enter your full address for delivery" rows="4" class="w-full px-4 py-3 rounded-lg bg-light-bg text-dark-bg border-2 border-tertiary focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                                    </div>
                                </div>
                                
                                <button type="submit" id="pay-now-btn" class="w-full bg-primary text-light-bg py-3 px-8 rounded-full font-semibold hover:bg-dark-bg transition-colors duration-300">
                                    Pay Now
                                </button>
                            </form>
                        @else
                            <div class="text-center py-8">
                                <p class="text-tertiary">Please add items to your cart before checkout.</p>
                                <a href="{{ route('index') }}" class="inline-block mt-4 bg-primary text-light-bg px-6 py-3 rounded-full font-semibold hover:bg-dark-bg transition-colors">
                                    Continue Shopping
                                </a>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </section>
    </main>
    
    <div id="message-box" class="fixed bottom-4 left-1/2 -translate-x-1/2 bg-primary text-light-bg p-4 rounded-full shadow-lg transition-all duration-300 opacity-0 pointer-events-none"></div>

    <footer class="bg-dark-bg text-light-bg py-8 text-center">
        <p>&copy; 2025 Tatva Tales. All rights reserved.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // --- NAVIGATION ELEMENTS ---
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileNav = document.getElementById('mobile-nav');
            const closeMobileNavBtn = document.getElementById('close-mobile-nav-btn');
            const mobileNavOverlay = document.getElementById('mobile-nav-overlay');
            const cartCountSpan = document.getElementById('cart-count');

            // --- CHECKOUT FORM ELEMENTS ---
            const checkoutForm = document.getElementById('checkout-form');
            const payNowBtn = document.getElementById('pay-now-btn');
            const qrPaymentRadio = document.getElementById('qr-payment');
            const codPaymentRadio = document.getElementById('cod-payment');
            const qrCodeSection = document.getElementById('qr-code-section');
            const codAddressSection = document.getElementById('cod-address-section');
            const codAddressTextarea = document.getElementById('cod-address');
            
            function showMessage(text, type = 'success') {
                const messageBox = document.getElementById('message-box');
                messageBox.textContent = text;
                messageBox.className = `fixed bottom-4 left-1/2 -translate-x-1/2 ${type === 'success' ? 'bg-green-500' : 'bg-red-500'} text-light-bg p-4 rounded-full shadow-lg transition-all duration-300 opacity-100 pointer-events-auto`;
                
                setTimeout(() => {
                    messageBox.classList.remove('opacity-100', 'pointer-events-auto');
                    messageBox.classList.add('opacity-0', 'pointer-events-none');
                }, 4000);
            }

            // --- CART COUNT UPDATE ---
            function updateCartCount() {
                fetch('{{ route("cart.count") }}')
                    .then(response => response.json())
                    .then(data => {
                        if (data.count > 0) {
                            cartCountSpan.textContent = data.count;
                            cartCountSpan.classList.remove('hidden');
                        } else {
                            cartCountSpan.textContent = '';
                            cartCountSpan.classList.add('hidden');
                        }
                    })
                    .catch(error => {
                        console.error('Error updating cart count:', error);
                    });
            }

            // --- MOBILE NAVIGATION ---
            function openMobileNav() {
                mobileNav.classList.add('active');
                mobileNavOverlay.classList.add('active');
            }
            
            function closeMobileNav() {
                mobileNav.classList.remove('active');
                mobileNavOverlay.classList.remove('active');
            }

            // Handle radio button changes
            if (qrPaymentRadio) {
                qrPaymentRadio.addEventListener('change', () => {
                    if (qrPaymentRadio.checked) {
                        qrCodeSection.classList.remove('hidden');
                        codAddressSection.classList.add('hidden');
                        codAddressTextarea.removeAttribute('required');
                    }
                });
            }

            if (codPaymentRadio) {
                codPaymentRadio.addEventListener('change', () => {
                    if (codPaymentRadio.checked) {
                        codAddressSection.classList.remove('hidden');
                        qrCodeSection.classList.add('hidden');
                        codAddressTextarea.setAttribute('required', 'required');
                    }
                });
            }
            
            // Set default checked option
            if (qrPaymentRadio) {
                qrPaymentRadio.checked = true;
                qrPaymentRadio.dispatchEvent(new Event('change'));
            }

            // Handle form submission
            if (checkoutForm) {
                checkoutForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    
                    if (!payNowBtn) return;
                    
                    payNowBtn.textContent = 'Processing...';
                    payNowBtn.disabled = true;

                    const formData = new FormData(checkoutForm);
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    fetch('{{ route("checkout.process") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
            if (data.success) {
                showMessage('Order placed successfully', 'success');
                payNowBtn.textContent = 'Order Placed!';
                payNowBtn.classList.remove('bg-primary', 'hover:bg-dark-bg');
                payNowBtn.classList.add('bg-green-500');
                payNowBtn.disabled = true;
            } else {
                showMessage(data.message || 'Failed to process order. Please try again.', 'error');
                payNowBtn.textContent = 'Pay Now';
                payNowBtn.disabled = false;
            }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showMessage('Failed to process order. Please try again.', 'error');
                        payNowBtn.textContent = 'Pay Now';
                        payNowBtn.disabled = false;
                    });
                });
            }

            // --- EVENT LISTENERS ---
            mobileMenuBtn.addEventListener('click', openMobileNav);
            closeMobileNavBtn.addEventListener('click', closeMobileNav);
            mobileNavOverlay.addEventListener('click', closeMobileNav);

            // Header scroll effect
            window.addEventListener('scroll', () => {
                const header = document.querySelector('.header');
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            // Initial load
            updateCartCount();
        });
    </script>
</body>
</html>
