<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'About Us - Tatva Tales' }}</title>
  <meta name="description" content="{{ $meta_description ?? 'Learn about our mission to preserve heritage and empower artisans' }}">
  <meta name="keywords" content="{{ $meta_keywords ?? 'heritage, culture, traditional crafts, indigenous art, about us' }}">
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
<style>
  /* Container */
.container {
  max-width: 1920px;
  margin: 0 auto;
  min-height: 100vh;
  background: linear-gradient(135deg, #f5f1eb 0%, #e8dcc6 100%);
}

/* Tribal Background Pattern */
body {
  margin: 0;
  font-family: Arial, sans-serif;
  position: relative;
  background: transparent; /* allow background to show */
  scroll-behavior: smooth;
}

body::before {
  content: '';
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: 
    radial-gradient(circle at 25% 25%, #d4c4a8 2px, transparent 2px),
    radial-gradient(circle at 75% 75%, #c9b896 1px, transparent 1px),
    linear-gradient(45deg, transparent 40%, rgba(139, 115, 85, 0.1) 50%, transparent 60%),
    repeating-linear-gradient(90deg, transparent, transparent 20px, rgba(160, 134, 95, 0.05) 20px, rgba(160, 134, 95, 0.05) 40px);
  background-size: 50px 50px, 30px 30px, 100px 100px, 80px 80px;
  z-index: -1;
  opacity: 0.6;
}

/* Additional Tailwind CSS Header Styles */
.header.scrolled {
    background-color: rgba(245, 245, 233, 0.9); /* bg-light-bg/90 */
    backdrop-filter: blur(4px); /* backdrop-blur-sm */
    box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05); /* shadow-lg */
}
.overlay {
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
}
.overlay.active {
    opacity: 1;
    visibility: visible;
}
#mobile-nav {
    transform: translateX(-100%);
    transition: transform 0.3s ease-in-out;
}
#mobile-nav.active {
    transform: translateX(0);
}
.mobile-nav-overlay {
    background-color: rgba(0, 0, 0, 0.5);
}

/* Header - Override with Tailwind-compatible styles */
.header {
  background: rgba(245, 245, 233, 0.95) !important;
  backdrop-filter: blur(10px) !important;
  box-shadow: 0 2px 20px rgba(139, 115, 85, 0.2) !important;
  border-bottom: 2px solid #d4c4a8 !important;
}

/* Ensure Tailwind classes work properly */
.header.fixed {
  position: fixed !important;
  top: 0 !important;
  left: 0 !important;
  width: 100% !important;
  z-index: 50 !important;
}

/* Mobile Navigation Styles */
#mobile-nav {
  transform: translateX(-100%) !important;
  transition: transform 0.3s ease-in-out !important;
}

#mobile-nav.active {
  transform: translateX(0) !important;
}

.overlay {
  opacity: 0 !important;
  visibility: hidden !important;
  transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out !important;
}

.overlay.active {
  opacity: 1 !important;
  visibility: visible !important;
}
</style>
</head>
<body class="bg-light-bg text-gray-800 font-sans antialiased">

    <!-- Header Section -->
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

        <div class="container mx-auto">
            <!-- Hero Section -->
            <section class="text-center my-12 md:my-20">
                <h1 class="text-4xl md:text-6xl font-extrabold text-primary leading-tight mb-4">Our Story: Preserving Heritage, Empowering Artisans</h1>
                <p class="text-lg md:text-xl text-secondary max-w-3xl mx-auto">
                    At Tatva Tales, we believe that every piece of tribal art tells a story. Our mission is to connect you with these stories, ensuring the rich legacy of tribal communities endures for generations.
                </p>
            </section>

        <!-- Mission & Vision Section -->
        <section class="mb-12">
            <div class="grid md:grid-cols-2 gap-10">
                <div class="bg-light-bg rounded-xl shadow-lg p-8 md:p-12">
                    <h2 class="text-3xl font-bold text-primary mb-4">Our Mission</h2>
                    <p class="text-secondary leading-relaxed">
                        To serve as a bridge between indigenous artists and the global community. We are dedicated to providing a sustainable platform that not only promotes and sells authentic tribal art but also ensures fair compensation and recognition for the talented artisans who create it.
                    </p>
                </div>
                <div class="bg-tertiary rounded-xl shadow-lg p-8 md:p-12">
                    <h2 class="text-3xl font-bold text-primary mb-4">Our Vision</h2>
                    <p class="text-secondary leading-relaxed">
                        To create a world where tribal art is celebrated, respected, and accessible. We envision a future where traditional craftsmanship thrives, and the economic well-being of tribal communities is enhanced through dignified and direct trade.
                    </p>
                </div>
            </div>
        </section>

        <!-- Our Values Section -->
        <section class="my-12">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-primary mb-8">What We Stand For</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Value 1 -->
                <div class="bg-light-bg rounded-xl shadow-lg p-6 text-center">
                    <div class="w-16 h-16 mx-auto bg-secondary rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-2.485 0-4.5 2.015-4.5 4.5S9.515 17 12 17s4.5-2.015 4.5-4.5S14.485 8 12 8zM12 21c-4.965 0-9-4.035-9-9s4.035-9 9-9 9 4.035 9 9-4.035 9-9 9z"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-2">Authenticity</h3>
                    <p class="text-secondary">
                        Every piece is genuinely handcrafted by tribal artisans, preserving traditional techniques and cultural integrity.
                    </p>
                </div>

                <!-- Value 2 -->
                <div class="bg-tertiary rounded-xl shadow-lg p-6 text-center">
                    <div class="w-16 h-16 mx-auto bg-secondary rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-2">Fair Trade</h3>
                    <p class="text-secondary">
                        We ensure that artisans receive fair and transparent compensation for their invaluable work, fostering economic empowerment.
                    </p>
                </div>

                <!-- Value 3 -->
                <div class="bg-light-bg rounded-xl shadow-lg p-6 text-center">
                    <div class="w-16 h-16 mx-auto bg-secondary rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-2">Preservation</h3>
                    <p class="text-secondary">
                        Our platform is a vehicle for cultural preservation, protecting ancient art forms from fading away.
                    </p>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="bg-tertiary rounded-xl shadow-lg p-8 md:p-12 text-center my-12">
            <h2 class="text-3xl font-bold text-primary mb-4">Join Us on Our Journey</h2>
            <p class="text-lg text-secondary mb-6">
                Your support helps us continue our mission. Explore our curated collections and bring home a piece of living history.
            </p>
            <a href="{{ route('home') }}#products" class="inline-block bg-secondary text-white font-semibold py-3 px-8 rounded-full shadow-md hover:bg-primary transition-colors">Explore Collections</a>
        </section>

        </div>
    </main>


    <script>
        // Mobile Navigation
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileNav = document.getElementById('mobile-nav');
        const closeMobileNavBtn = document.getElementById('close-mobile-nav-btn');
        const mobileNavOverlay = document.getElementById('mobile-nav-overlay');

        function openMobileNav() {
            mobileNav.classList.add('active');
            mobileNavOverlay.classList.add('active');
        }

        function closeMobileNav() {
            mobileNav.classList.remove('active');
            mobileNavOverlay.classList.remove('active');
        }

        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', openMobileNav);
        }
        if (closeMobileNavBtn) {
            closeMobileNavBtn.addEventListener('click', closeMobileNav);
        }
        if (mobileNavOverlay) {
            mobileNavOverlay.addEventListener('click', closeMobileNav);
        }

        // Cart count functionality
        function updateCartCount() {
            fetch('{{ route("cart.count") }}')
                .then(response => response.json())
                .then(data => {
                    const cartCountSpan = document.getElementById('cart-count');
                    if (data.count > 0) {
                        cartCountSpan.textContent = data.count;
                        cartCountSpan.classList.remove('hidden');
                    } else {
                        cartCountSpan.classList.add('hidden');
                    }
                })
                .catch(error => {
                    console.error('Error updating cart count:', error);
                });
        }

        // Update cart count on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateCartCount();
        });
    </script>
</body>
</html>
