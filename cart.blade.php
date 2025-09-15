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

    /* Cart specific styles */
    .cart-item { transition: all 0.3s ease; }
    .cart-item.removing { opacity: 0; transform: translateX(-100%); }
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
            <span id="cart-count" class="absolute top-0 right-0 -mt-1 -mr-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center {{ count(session('cart', [])) > 0 ? '' : 'hidden' }}">{{ count(session('cart', [])) }}</span>
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

  <!-- Cart Content -->
  <main class="min-h-screen pt-24 px-4 md:px-8 lg:px-16">
    <section id="cart-page" class="py-16 animate-fadeIn">
      <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-6 md:p-8">
          <a href="{{ route('index') }}" class="flex items-center text-dark-bg font-semibold mb-6 hover:text-primary transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Products
          </a>
          <h2 class="text-3xl font-serif font-bold text-primary mb-6">Your Shopping Cart</h2>
          
          <!-- Debug: Show cart data -->
          <div class="col-span-full p-4 bg-yellow-100 border border-yellow-400 rounded mb-4">
            <h4 class="font-bold">CART DEBUG INFO:</h4>
            <p>Cart items count: {{ count($cartItems ?? []) }}</p>
            @if(isset($cartItems) && count($cartItems) > 0)
              <p>First cart item: {{ $cartItems[0]['name'] ?? 'No name' }}</p>
              <p>First cart item image: {{ $cartItems[0]['image'] ?? 'No image' }}</p>
            @else
              <p class="text-red-600">No cart items available</p>
            @endif
          </div>
          
          @if(count($cartItems) > 0)
            <div id="cart-items">
              @foreach($cartItems as $item)
                <div class="cart-item flex justify-between items-center py-4 border-b" data-product-id="{{ $item['id'] }}">
                  <div class="flex items-center space-x-4">
                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded-lg" onerror="this.src='{{ url('public/images/product/placeholder.jpg') }}'">
                    <div>
                      <h3 class="font-semibold text-dark-bg">{{ $item['name'] }}</h3>
                      <p class="text-sm text-primary">₹{{ number_format($item['price'], 2) }} each</p>
                    </div>
                  </div>
                  <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2">
                      <button onclick="updateQuantity({{ $item['id'] }}, {{ $item['quantity'] - 1 }})" class="w-8 h-8 rounded-full bg-light-bg flex items-center justify-center hover:bg-tertiary transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                        </svg>
                      </button>
                      <span class="w-8 text-center font-semibold">{{ $item['quantity'] }}</span>
                      <button onclick="updateQuantity({{ $item['id'] }}, {{ $item['quantity'] + 1 }})" class="w-8 h-8 rounded-full bg-light-bg flex items-center justify-center hover:bg-tertiary transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                      </button>
                    </div>
                    <div class="text-right">
                      <div class="font-bold text-lg">₹{{ number_format($item['subtotal'], 2) }}</div>
                      <button onclick="removeItem({{ $item['id'] }})" class="text-red-500 hover:text-red-700 text-sm">Remove</button>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            
            <div id="cart-summary" class="mt-8 border-t pt-6">
              <div class="flex justify-between items-center mb-4">
                <span class="text-lg font-bold">Total:</span>
                <span id="cart-total" class="text-xl font-bold">₹{{ number_format($total, 2) }}</span>
              </div>
              <div class="flex space-x-4">
                <button onclick="clearCart()" class="flex-1 bg-gray-200 text-dark-bg py-3 rounded-full font-semibold hover:bg-gray-300 transition-colors">
                  Clear Cart
                </button>
                <a href="{{ route('checkout') }}" class="flex-1 bg-primary text-light-bg py-3 rounded-full font-semibold hover:bg-dark-bg text-center transition-colors">
                  Proceed to Checkout
                </a>
              </div>
            </div>
          @else
            <div id="empty-cart" class="py-12 text-center">
              <svg class="mx-auto h-24 w-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
              </svg>
              <h3 class="text-lg font-semibold text-gray-900 mb-2">Your cart is empty</h3>
              <p class="text-gray-500 mb-6">Add some products to get started!</p>
              <a href="{{ route('index') }}" class="inline-block bg-primary text-light-bg px-6 py-3 rounded-full font-semibold hover:bg-dark-bg transition-colors">
                Continue Shopping
              </a>
            </div>
          @endif
        </div>
      </div>
    </section>
  </main>

  <footer class="bg-dark-bg text-light-bg py-8 text-center">
    <p>&copy; 2025 Tatva Tales. All rights reserved.</p>
  </footer>

  <!-- ✅ JavaScript -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // --- NAVIGATION ELEMENTS ---
      const mobileMenuBtn = document.getElementById('mobile-menu-btn');
      const mobileNav = document.getElementById('mobile-nav');
      const closeMobileNavBtn = document.getElementById('close-mobile-nav-btn');
      const mobileNavOverlay = document.getElementById('mobile-nav-overlay');
      const cartCountSpan = document.getElementById('cart-count');

      // CSRF token for AJAX requests
      const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';

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

      // --- CART FUNCTIONS ---
      function updateQuantity(productId, newQuantity) {
        if (newQuantity < 0) return;
        
        fetch('{{ route("cart.update") }}', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
          },
          body: JSON.stringify({
            product_id: productId,
            quantity: newQuantity
          })
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            location.reload(); // Simple reload for now
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
      }

      function removeItem(productId) {
        if (confirm('Are you sure you want to remove this item from your cart?')) {
          fetch('{{ route("cart.remove") }}', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
              product_id: productId
            })
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              location.reload();
            }
          })
          .catch(error => {
            console.error('Error:', error);
          });
        }
      }

      function clearCart() {
        if (confirm('Are you sure you want to clear your entire cart?')) {
          fetch('{{ route("cart.clear") }}', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': csrfToken
            }
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              location.reload();
            }
          })
          .catch(error => {
            console.error('Error:', error);
          });
        }
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

      // Make functions globally available for onclick handlers
      window.updateQuantity = updateQuantity;
      window.removeItem = removeItem;
      window.clearCart = clearCart;
    });
  </script>
</body>
</html>
